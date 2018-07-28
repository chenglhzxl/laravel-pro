<?php

namespace App\Http\Controllers\Article;

use App\Models\Article;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;

class ArticleController extends Controller
{
    public function getArticleLists(Request $request)
    {
//        $params = $request->all();
        $user = getCurrentUser();
        $articleList = Article::select('*')->where('isdeleted', 0)->where('author',$user)
                                    ->orderBy("id", "desc");
//        $limit = isset($params["per_page"]) ? intval($params["per_page"]) : 10;
//        $current = isset($params["current_page"]) ? intval($params["current_page"]) : '';
        $results = $articleList->paginate(10)->appends($request->all());
//        $response = [
//            'pagination' => [
//                'total' => $results->total(),
//                'per_page' => $results->perPage(),
//                'current_page' => $results->currentPage(),
//                'last_page' => $results->lastPage(),
//                'from' => $results->firstItem(),
//                'to' => $results->lastItem()
//            ]
//        ];
//        $articleLists = $articleList->orderBy("id", "desc")->get()->toarray();
        return view('article.articles', compact('results'));
    }

    public function getAllArticleLists(Request $request)
    {
//        $params = $request->all();
        $user = getCurrentUser();
        $articleList = Article::select('*')->where('isdeleted', 0)
            ->where('is_secret',0)
            ->orderBy("id", "desc");
        $results = $articleList->paginate(10)->appends($request->all());
        return view('article.allarticles', compact('results'));
    }

    public function articleAdd()
    {
        $now = Carbon::now();
        return view('article.article_add', compact('now'));
    }

    public function postArticleAdd(Request $request)
    {
        $data = $request->all();
        $user = getCurrentUser();
        $body = strip_tags(html_entity_decode(trim($data['content'])));
        if($body == "" || strlen($body) == 0){
            return alertMsg(0,'wen内容有效内容为空或包含非法字符！');
        }
        $postData = [
            'title' => $data['title'],
            'abstract' => $data['abstract'],
            'content' => $data['content'],
            'is_secret' => $data['secret'],
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

    public function articleReview(Request $request)
    {
        $data = $request->all();
        $article = Article::where('id', $data['id'])->where('isdeleted', 0)->get()->first();
        return view('article.article_review', compact('article'));
    }

    public function postArticleEdit($id,Request $request)
    {
        $data = $request->all();
        $user = getCurrentUser();
        $now = Carbon::now();
        $body = strip_tags(html_entity_decode(trim($data['content'])));
        if($body == "" || strlen($body) == 0){
            return alertMsg(0,'wen内容有效内容为空或包含非法字符！');
        }
        $postData = [
            'title' => $data['title'],
            'abstract' => $data['abstract'],
            'content' => $data['content'],
            'is_secret' => $data['secret'],
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
