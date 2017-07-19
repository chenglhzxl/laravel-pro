<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.index');
//        $users = Article::select('*')->get();
//        dd($users);
    }
}
