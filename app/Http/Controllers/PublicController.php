<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    
    public function homepage(){
        $articles=Article::where('is_accepted',true)->take(8)->orderBy('created_at', 'desc')->get();
        return view('welcome',compact('articles'));
    }
    public function aboutUs(){
        return view('aboutUs');
    }
    public function categoryShow(Category $category){

        $articlesByCategory = Article::where('category_id', $category->id)->where('is_accepted', true)->paginate(8);
        return view('category-show', compact('category','articlesByCategory'));
    }

    public function searchArticles(Request $request){
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(8);

        return view('articles.index', compact('articles'));
    }
    /* funzione area utente */
    public function authProfile(User $user){
        $articles= Article::where('user_id',Auth::id())->paginate(8);
        // dd(Auth::id());
        return view('auth.profile',compact('articles'));
    }
    /* funzione per lingua */
    public function language($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }
}
