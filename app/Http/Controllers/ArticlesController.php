<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticlesController extends Controller
{
    public function index()
    {
        $article = Article::all();
        return view('articles.index')->with('articles',$article);
    }
    public function show($id)
    {
        $article = Article::find($id);
        if($article == null)
            return "sorry";
        else
            // return $article;
            return view('articles.article')->with('article',$article);
    }
}
