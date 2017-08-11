<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.index');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function loginIn(Request $request)
    {
        if(empty($request->get('loginCaptcha')) || empty(Session::get('loginCaptcha'))){
            Session::put("loginCaptchaOk", false);
            return back()->withErrors(['captcha'=>'请输入验证码']);
        }
        if (!empty(Session::get('loginCaptcha')) && Session::get('loginCaptcha') != strtolower($request->get("loginCaptcha"))) {
            Session::put("loginCaptchaOk", false);
            return back()->withErrors(['captcha'=>'请输入正确的验证码']);
        } else {
            Session::put("loginCaptchaOk", true);
        }
        $email = $request->get('email');
        $pwd = md5($request->get('password'));
        if($email && $pwd){
            $user = Users::where('email',$email)->where('password',$pwd)->where('isdeleted',0)->first();
            if($user){
                Session::put('cxy.login.userid',$user->id);
                return redirect('/');
            }else{
                return back()->withErrors(['email'=>'登录名或密码错误']);
            }
        }else{
            return back()->withErrors(['email'=>'登录名或密码错误']);
        }
    }
    /**
     * 生成登录验证码
     * @param Request $request
     */
    public function loginCaptchaAction(Request $request)
    {
        $pb = new PhraseBuilder();
        $builder = new CaptchaBuilder($pb->build(4), $pb);
        $builder->setBackgroundColor(255, 255, 255);
        $builder->build($width = 100, $height = 38, $font = null);
        $phrase = $builder->getPhrase();
        Session::put('loginCaptcha', $phrase);
        $imgBinaryStr = $builder->get();
        return response($imgBinaryStr)->header('Content-Type', 'image/jpeg');
    }
}
