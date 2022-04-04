<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();

        return view('admin.articles.index', [
            'articles' => $articles
        ]);
    }

    public function create(){
        return view('admin.articles.create');
    }

    public function store(Request $request){
        Article::query()->create($request->all());
        // create article
    }

    public function edit(Request $request, $id){
        $article = Article::query()->findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id){
        $article  = Article::query()->findOrFail($id);
        $article->fill($request->all());
        $article->save();
    }

    public function delete($id){
       dd( Article::select(['id', 'name'])
               ->where('id', 5  )
               ->get());
        $article = Article::query()->find($id);
        $article->delete();

    }
}
