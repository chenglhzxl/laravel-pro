<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function getArticleLists()
    {
        $articleLists = Article::select('*')->where('isdeleted', 0)->get()->toarray();
        return view('article.articles', compact('articleLists'));
    }

    public function articleAdd()
    {
        $now = Carbon::now();
        return view('article.article_add', compact('now'));
    }

    public function postArticleAdd(Request $request)
    {
        $data = $request->all();
        $user = Users::where('id', 1)->first()->name;
        $postData = [
            'title' => $data['title'],
            'abstract' => $data['abstract'],
            'content' => $data['content'],
            'created_at' => $data['creatTime'],
            'author' => $user
        ];
        $ret = Article::insert($postData);
        if ($ret) {
            return alertMsg(1, '文章新增成功！');
        }
        return alertMsg(0, '文章新增失败！');
    }

    public function articleEdit(Request $request)
    {
        $data = $request->all();
        $article = Article::where('id', $data['id'])->where('isdeleted', 0)->get()->first();
        return view('article.article_add', compact('article'));
    }

    public function postArticleEdit($id,Request $request)
    {
        $data = $request->all();
        $user = Users::where('id', 1)->first()->name;
        $now = Carbon::now();
        $postData = [
            'title' => $data['title'],
            'abstract' => $data['abstract'],
            'content' => $data['content'],
            'updated_at' => $now,
            'author' => $user
        ];
        $ret = Article::where('id', $id)->where('isdeleted', 0)->update($postData);
        if ($ret) {
            return alertMsg(1, '文章编辑成功！');
        }
        return alertMsg(0, '文章编辑失败！');
    }

    public function articleDelete($id)
    {
        $ret = Article::where('id', $id)->where('isdeleted', 0)->update(['isdeleted' => 1]);
        if ($ret) {
            return alertMsg(1, "文章删除成功！");
        }
        return alertMsg(0, "文章删除失败！");
    }
}
