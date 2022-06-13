<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Season;
use App\Models\Publication;

class HomeController extends Controller
{
    public function index()
    {
        
        $articles = Article::take(3)->get();
        $year = date('Y');
        $seasons = Season::where('tahun',$year)->get();

        return view('welcome', compact('articles','seasons'));
    }

    public function news() 
    {
        $articles = Article::orderBy('tanggal', 'desc')->paginate(3);
        return view('components.news',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
    }
}
