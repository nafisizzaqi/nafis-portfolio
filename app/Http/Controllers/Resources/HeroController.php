<?php

namespace App\Http\Controllers\Resources;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    public function index(Request $request)
    {
        // Ambil hero pertama (atau sesuaikan sesuai kebutuhan)
        $hero = Hero::first();
        return view('hero.index', compact('hero'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'id' => 'nullable|exists:heroes,id', // ID opsional, untuk update
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
            'title' => 'required|string|max:255', // Validasi title
            'description' => 'required|string|max:1000', // Validasi description
        ]);

        // Proses penyimpanan data
        if ($request->id) {
            // Jika ada ID, lakukan update
            $hero = Hero::find($request->id);

            // Cek jika hero ditemukan
            if (!$hero) {
                return redirect()->back()->withErrors(['hero' => 'Hero not found']);
            }

            // Menangani upload gambar jika ada
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($hero->image && Storage::exists('public/heroes/' . $hero->image)) {
                    Storage::delete('public/heroes/' . $hero->image);
                }

                // Simpan gambar baru
                $path = $request->file('image')->store('heroes', 'public');
                $hero->image = $path;
            }

            // Update data lainnya
            $hero->title = $validatedData['title'];
            $hero->description = $validatedData['description'];
            $hero->save();

            // Simpan path gambar ke sesi
            session(['imagePath' => $hero->image]);

            return redirect()->back()->with('success', 'Hero updated successfully!')->withInput();
        } else {
            // Jika tidak ada ID, simpan data baru
            $path = null;

            // Menangani upload gambar jika ada
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('heroes', 'public');
            }

            // Membuat hero baru
            $hero = Hero::create([
                'image' => $path,
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
            ]);

            // Simpan path gambar ke sesi
            session(['imagePath' => $hero->image]);

            return redirect()->back()->with('success', 'Hero created successfully!')->withInput();
        }
    }
}

