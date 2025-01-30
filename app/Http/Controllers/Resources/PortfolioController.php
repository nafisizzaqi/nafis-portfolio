<?php

namespace App\Http\Controllers\Resources;

use Carbon\Carbon;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 10;

        $query = Portfolio::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('image', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        $portfolios = $query->orderByDesc('id')->paginate($perPage);

        return view('portfolio.index', compact('portfolios'));
    }

    public function showPortfolio(){
        $portfolios = Portfolio::all();
        return view('portfolio.showPortfolio', compact('portfolios'));
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id); // Cari data berdasarkan ID
        return view('portfolio.show', compact('portfolio')); // Tampilkan view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:1240',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $portfolios                      = new Portfolio();
        $portfolios->image                = $request->image;
        $portfolios->title               = $request->title;
        $portfolios->description               = $request->description;
        $portfolios->date               = $request->date;

        $namaFile = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaFile = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/images'), $namaFile);
        }

        $portfolio = Portfolio::create([
            'image' => $namaFile,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()
            ->route('portfolio.index')
            ->with('message', [
                'status' => $portfolio ? 'success' : 'failed',
                'message' => $portfolio ? 'Data created successfully' : 'Data failed to create!',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2240',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                File::delete(public_path('media/images/' . $portfolio->image));
            }

            $image = $request->file('image');
            $namaFile = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/images'), $namaFile);
            $portfolio->image = $namaFile;
        }

        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->date = $request->date;
        $portfolio->save();

        return redirect()
            ->route('portfolio.index')
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
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return back()->with('message', [
            'status' => 'success',
            'message' => 'Data deleted successfully',
        ]);
    }
}
