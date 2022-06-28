<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }


    /**
     * Display Articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();
        $this->data['articles'] = $articles;

        return view('articles.index', $this->data);
    }

    /**
     * Display the specified Article.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }

    /**
     * Store article in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => Auth::id()
        ]);

        return redirect('/articles/'.$article->id);
    }
}
