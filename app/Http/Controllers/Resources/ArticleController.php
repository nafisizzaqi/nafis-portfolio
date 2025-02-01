<?php

namespace App\Http\Controllers\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        // Artikel sudah otomatis diambil berdasarkan slug melalui route model binding
        return view('articles.show', compact('article'));
    }

}
