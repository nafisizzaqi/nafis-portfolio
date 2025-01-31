<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Skill;
use App\Models\Article;
use App\Models\Portfolio;
use App\Models\Experience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hero = Hero::first();
        $skills = Skill::all();
        $experiences = Experience::all();
        $portfolios = Portfolio::all();
        $articles = Article::all();
        // dd($hero);
        return view('home', compact('hero', 'skills', 'experiences', 'portfolios', 'articles'));
    }
}
