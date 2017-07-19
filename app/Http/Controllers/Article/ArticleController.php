<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function getArticleLists(){
        $articleLists = Article::select('*')->where('isdeleted',0)->get()->toarray();
        return view('article.articles',compact('articleLists'));
    }

    public function getArticleEdit(Request $request){
        $data = $request->all();
        $article = Article::where('id',$data['id'])->where('isdeleted',0)->get();
        dd($article);
        $articleLists = Article::select('*')->where('isdeleted',0)->get()->toarray();
        return view('article.articles',compact('articleLists'));
    }
}
