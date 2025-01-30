<?php

namespace App\Http\Controllers\Resources;

use Carbon\Carbon;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 10;

        $query = Experience::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('date', 'like', '%' . $search . '%');
            });
        }

        $experiences = $query->orderByDesc('id')->paginate($perPage);

        return view('experience.index', compact('experiences'));
    }

    public function showExperience(){
        $experiences = Experience::all();
        return view('experience.showExperience', compact('experiences'));
    }

    public function show($id)
    {
        $experience = Experience::findOrFail($id); // Cari data berdasarkan ID
        return view('experience.show', compact('experience')); // Tampilkan view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:1240',
            'description' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $experiences                      = new Experience();
        $experiences->title                = $request->title;
        $experiences->description               = $request->description;
        $experiences->date               = $request->date;


        $experience = Experience::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()
            ->route('experience.index')
            ->with('message', [
                'status' => $experience ? 'success' : 'failed',
                'message' => $experience ? 'Data created successfully' : 'Data failed to create!',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);

        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1240',
            'date' => 'required|date',
        ]);

        $experience->title = $request->title;
        $experience->description = $request->description;
        $experience->date = $request->date;
        $experience->save();

        return redirect()
            ->route('experience.index')
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
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return back()->with('message', [
            'status' => 'success',
            'message' => 'Data deleted successfully',
        ]);
    }
}
