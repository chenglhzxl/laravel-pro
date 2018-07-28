<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Log;
use Maatwebsite\Excel\Excel;

class AdminController extends Controller
{

    public function test_object()
    {
        $t = time();
        $time = date('Y-m-d H:i:s',time());
        set_time_limit(1000);
        $myfile = "/Users/zhuxiaoliang/Desktop/password.sql";
        $fhandle = fopen($myfile,'wb');
        if($fhandle){
            $pass = md5('123456');
        }
        $i = 1;
        while($i<=500){
            echo $i.'/t';
            if(strlen($i)==1) {
                $len = '00' . $i;
            }elseif(strlen($i)==2){
                $len = '0'.$i;
            }else{
                $len = $i;
            }
            $i++;
            fwrite($fhandle,"TEST0$len\t123456\t"."\r\n");
        }
        echo "写入成功，耗时：".(time()-$t);
    }

    public function getCurrentDate($tags='-')
    {
        $begindate = '2017-10';
        $enddate = '2018-01';
        $bgTime = strtotime($begindate);
        $endTime = strtotime($enddate);
        while ($bgTime <= $endTime){
            $month[]=$begindate;
            $begindate = date('Y-m',strtotime("$begindate +1 month"));
            $bgTime = strtotime($begindate);
        }
        dd($month);

        list($y1, $m1) = explode($tags,$begindate);
        list($y2, $m2) = explode($tags,$enddate);
        $sum = abs($y1 - $y2) * 12 + abs($m1 -$m2);
        $thismonth = (int)$m1;
        $thisyear = $y1;
        for($i=0;$i<=$sum;$i++){
            if(strlen($thismonth)==1){
                $thismonth = '0'.$thismonth;
            }
            $month[] = $thisyear.$thismonth;
            $thismonth++;
            if($thismonth==13){
                $thisyear++;
                $thismonth = 1;
            }
        }

    }

    public function test_open_file(Excel $excel)
    {
        $file_path = '/Users/zhuxiaoliang/Desktop/test11111.xlsx';
        $arrays = array();
        if(file_exists($file_path)){
            $excel->load($file_path,function ($reader) use (&$arrays){
               $reader = $reader->getSheet(0);
                $arrays = $reader->toArray();
            },'UTF-8');
            foreach ($arrays as $key=>&$array){
                foreach ($array as $kry1=>$item){
                    if (!$item){
                        unset($array[$kry1]);
                        if(count($array)==0){
                            unset($arrays[$key]);
                        }
                        continue;
                    }

                }
            }
            dd($arrays);
        }
//        $fhandle = fopen($file_path,'wb');
//        $store = [
//            'store' => [
//                'all' => [
//                    'rencong'
//                ],
//                '011' => [
//                    'chenglh',
//                    'admin'
//                ]
//            ]
//        ];
//        fwrite($fhandle,json_encode($store));
//        echo 'ok';
        if(file_exists($file_path)){
            $fp = fopen($file_path,'r');
            $str = "";
            $buffer = 1024;
            while (!feof($fp)){
                $str .=fread($fp,$buffer);
            }
            $str = str_replace("\r\n",'<br />',$str);
//            $str = json_decode($str,true);
            dd($str);
        }
    }
    public function index()
    {
        return view('layouts.index');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function registering(Request $request)
    {
//        $params = $request->all();
        try{
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'password'=>'required'
            ]);
            if($validator->fails()){
                return back()->withErrors(['message'=>'信息不完整！']);
            }
            $params = $request->except('_token');
            $existname = Users::where('name',$params['name'])->where('isdeleted',0)->first();
            if($existname){
                return back()->withErrors(['name'=>'用户名已被注册，请更换其他用户名！']);
            }
            $existemail = Users::where('email',$params['email'])->where('isdeleted',0)->first();
            if($existemail){
                return back()->withErrors(['name'=>'邮箱已被注册，请更换其他邮箱！']);
            }
            if(strlen($params['password'])<6){
                return back()->withErrors(['password'=>'密码不低于6位数']);
            }
            $data = [
                'name'=>$params['name'],
                'email'=>$params['email'],
                'password'=>password_hash($params['password'], PASSWORD_DEFAULT)
            ];
            $user = Users::insertGetId($data);
            Session::put('cxy.login.userid',$user);
            return redirect('/');
        }catch (\Exception $exception){
            Log::error('注册失败原因：',[$exception->getMessage()]);
            return back()->withErrors(['error'=>'注册失败']);
        }
    }

    public function logout()
    {
        Session::forget('cxy.login.userid');
        return redirect('/');
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
            $user = Users::where('name',$email)->where('password',$pwd)->where('isdeleted',0)->first();
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
