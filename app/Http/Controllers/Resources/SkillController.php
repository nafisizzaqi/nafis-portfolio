<?php

namespace App\Http\Controllers\Resources;

use Carbon\Carbon;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 10;

        $query = Skill::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('image', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        $skills = $query->orderByDesc('id')->paginate($perPage);

        return view('skill.index', compact('skills'));
    }

    public function showSkill() {
        $skills = Skill::all();
        return view('home', compact('skills'));
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id); // Cari data berdasarkan ID
        return view('skill.show', compact('skill')); // Tampilkan view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:1240',
            'title' => 'required|string|max:255',
        ]);

        $skills                      = new Skill();
        $skills->image                = $request->image;
        $skills->title               = $request->title;

        $namaFile = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaFile = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/images'), $namaFile);
        }

        $skill = Skill::create([
            'image' => $namaFile,
            'title' => $request->title,
        ]);

        return redirect()
            ->route('skill.index')
            ->with('message', [
                'status' => $skill ? 'success' : 'failed',
                'message' => $skill ? 'Data created successfully' : 'Data failed to create!',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);

        return view('skill.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:1240',
        ]);

        if ($request->hasFile('image')) {
            if ($skill->image) {
                File::delete(public_path('media/images/' . $skill->image));
            }

            $image = $request->file('image');
            $namaFile = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/images'), $namaFile);
            $skill->image = $namaFile;
        }

        $skill->title = $request->title;
        $skill->save();

        return redirect()
            ->route('skill.index')
            ->with('message', [
                'status' => 'success',
                'message' => 'Data updated successfully',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return back()->with('message', [
            'status' => 'success',
            'message' => 'Data deleted successfully',
        ]);
    }
}
