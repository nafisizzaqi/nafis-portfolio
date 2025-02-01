<?php

namespace App\Http\Controllers\Resources;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = 10;

        $query = Article::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('image', 'like', '%' . $search . '%')
                    ->orWhere('title', 'like', '%' . $search . '%');
            });
        }

        $articles = $query->orderByDesc('id')->paginate($perPage);

        return view('adminarticle.index', compact('articles'));
    }

    public function showArticle() {
        $articles = Article::all();
        return view('home', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id); // Cari data berdasarkan ID
        return view('adminarticle.show', compact('article')); // Tampilkan view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminarticle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:1240',
            'author' => 'required|string|max:255',
            'content' => 'required|string|min:10',
        ]);

        $articles                      = new Article();
        $articles->title               = $request->title;
        $articles->image                = $request->image;
        $articles->author               = $request->author;
        $articles->content               = $request->content;


        $namaFile = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaFile = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/images'), $namaFile);
        }

        $article = Article::create([
            'title' => $request->title,
            'image' => $namaFile,
            'author' => $request->author,
            'content' => $request->content,

        ]);

        return redirect()
            ->route('adminarticle.index')
            ->with('message', [
                'status' => $article ? 'success' : 'failed',
                'message' => $article ? 'Data created successfully' : 'Data failed to create!',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('adminarticle.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:1240',
            'author' => 'required|string|max:255',
            'content' => 'required|string|min:10',

        ]);
 

        if ($request->hasFile('image')) {
            if ($article->image) {
                File::delete(public_path('media/images/' . $article->image));
            }

            $image = $request->file('image');
            $namaFile = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('media/images'), $namaFile);
            $article->image = $namaFile;
        }

        $article->title = $request->title;
        $article->author = $request->author;
        $article->content = $request->content;
        $article->save();

        return redirect()
            ->route('adminarticle.index')
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
        $article = Article::findOrFail($id);
        $article->delete();

        return back()->with('message', [
            'status' => 'success',
            'message' => 'Data deleted successfully',
        ]);
    }
}
