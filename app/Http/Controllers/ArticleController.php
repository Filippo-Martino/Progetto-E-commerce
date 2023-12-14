<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except('articlesIndex','show');
    }
    /**
     * Display a listing of the resource.
     */
    public function articlesIndex()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(8);
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("articles.create");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // filtro per i correlati
        
        $articles_filtered_category = Article::where('category_id' , $article->category_id)->where('id', '!=', $article->id)->where('is_accepted', true)->get();
        return view("articles.show", compact("article" ,"articles_filtered_category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
