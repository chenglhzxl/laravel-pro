<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CommonExport;
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

    public function export()
    {
        $data = [['011','123456'],['011','123457']];
        $exportData[]=[
            "序号","仓库编号","订单号"
        ];
        $i = 0;
        foreach ($data as $item){
            $i ++;
            $exportData[] = [
                $i,
                $item[0],
                $item[1],
            ];
        }
        if (count($exportData) > 0){
            $export = new CommonExport($exportData);
            return Excel::download();
        }
    }

    public function get_password()
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
            if(strlen($i)==1) {
                $len = '00' . $i;
            }elseif(strlen($i)==2){
                $len = '0'.$i;
            }else{
                $len = $i;
            }
            $i++;
            fwrite($fhandle,"TEST0$len\t{$pass}\tsystem\t{$time}\t0\t"."\r\n");
        }
        echo "写入成功，耗时：".(time()-$t);
    }
// LOAD DATA LOCAL INFILE '/Users/zhuxiaoliang/Desktop/password.sql' INTO TABLE customer_password (`customerid`,`password`,`created_by`,`created_at`,`first_login`);

    public function get_profile()
    {
        $t = time();
        $time = date('Y-m-d H:i:s',time());
        set_time_limit(1000);
        $myfile = "/Users/zhuxiaoliang/Desktop/profile.sql";
        $fhandle = fopen($myfile,'wb');
        $i = 1;
        while($i<=500){
            if(strlen($i)==1) {
                $len = '00' . $i;
            }elseif(strlen($i)==2){
                $len = '0'.$i;
            }else{
                $len = $i;
            }
            $i++;
            fwrite($fhandle,"TEST0$len\tceshi$len\t1\t中国\t342222199107204542\t身份证\t1991-04-10\t13654694455\tSP\tSO\tSO\tCN100177\t1\t2018-05-07 00:00:00\tsystem\t{$time}\t9000$len\tvivi9000\t2310060\t"."\r\n");
        }
        echo "写入成功，耗时：".(time()-$t);
    }
// LOAD DATA LOCAL INFILE '/Users/zhuxiaoliang/Desktop/profile.sql' INTO TABLE customer_profile(`customerid`,`namecn`,`gender`,`nationality`,`tincode`,`tincodetype`,`birthday`,`phoneno1`,`type`,`subtype`,`sptype`,`upline`,`status`,`renewdate`,`created_by`,`created_at`);


    public function viviGet_profile()
    {
        $t = time();
        $time = date('Y-m-d H:i:s',time());
        set_time_limit(1000);
        $myfile = "/Users/zhuxiaoliang/Desktop/profilevivi.sql";
        $fhandle = fopen($myfile,'wb');
        $i = 1;
        while($i<=500){
            if(strlen($i)==1) {
                $len = '00' . $i;
            }elseif(strlen($i)==2){
                $len = '0'.$i;
            }else{
                $len = $i;
            }
            $i++;
            fwrite($fhandle,"TEST0$len\tceshi$len\t1\t中国\t342222199107204542\t身份证\t1991-04-10\t13654694455\tSP\tSO\tSO\tCN100177\t1\t2020-05-07 00:00:00\tsystem\t{$time}\t9000$len\tvivi9000$len\t2310060\t"."\r\n");
        }
        echo "写入成功，耗时：".(time()-$t);
    }
// LOAD DATA LOCAL INFILE '/Users/zhuxiaoliang/Desktop/profile.sql' INTO TABLE customer_profile(`customerid`,`namecn`,`gender`,`nationality`,`tincode`,`tincodetype`,`birthday`,`phoneno1`,`type`,`subtype`,`sptype`,`upline`,`status`,`renewdate`,`created_by`,`created_at`,`cpId`,`customerNumber`,`upline_cpId`);
// update `customer_profile` as a set cpId = CONCAT('90',a.id),`customerNumber` =  CONCAT('comp90',a.id) where a.id >= 40969;

    public function get_address()
    {
        $t = time();
        $time = date('Y-m-d H:i:s',time());
        set_time_limit(1000);
        $myfile = "/Users/zhuxiaoliang/Desktop/address.sql";
        $fhandle = fopen($myfile,'wb');
        $i = 1;
        while($i<=500){
            // echo $i.'/t';
            if(strlen($i)==1) {
                $len = '00' . $i;
            }elseif(strlen($i)==2){
                $len = '0'.$i;
            }else{
                $len = $i;
            }
            fwrite($fhandle,"wangduanli\t2\t10\t107\t1170\t呼兰路4号楼\t18839261967\t1\tsystem\t{$time}\t9000$len\t"."\r\n");
            $i++;
        }
        echo "写入成功，耗时：".(time()-$t);
    }
// LOAD DATA LOCAL INFILE '/Users/zhuxiaoliang/Desktop/address.sql' INTO TABLE customer_address(`receivername`,`type`,`province_id`,`city_id`,`district_id`,`address`,`phoneno`,`status`,`created_by`,`created_at`,`customerprofile_id`);
// update `customer_address` as a set cpId = CONCAT('90',a.customerprofile_id),addressId = a.customerprofile_id where a.customerprofile_id >= 40969;


    public function get_wechat()
    {
        $t = time();
        $time = date('Y-m-d H:i:s',time());
        set_time_limit(1000);
        $myfile = "/Users/zhuxiaoliang/Desktop/wechat.sql";
        $fhandle = fopen($myfile,'wb');
        $i = 18756773228;
        while($i<=18756773727){
            fwrite($fhandle,"$i\toJuYu1eqapy8YaIv$i\t10\tsystem\ttest$i\t1\thttp://thirdwx.qlogo.cn/mmopen/iccd1Z4XsCwcYwFLric01ibNnicfJnhh5N8Ur96mHzNtuxdVIahx6Rl4vLwzWZbHPEkEJ0xeHiciaR5DqpuwfVkYAu9Zyzibasj5ZRI/132\tow7jr0TRNRzj9_DxRS_A$i\t"."\r\n");
            $i++;
        }
        echo "写入成功，耗时：".(time()-$t);
    }

// LOAD DATA LOCAL INFILE '/Users/zhuxiaoliang/Desktop/wechat.sql' INTO TABLE customer_wechat(`customerprofile_id`,`openid`,`province_id`,`created_by`,`nickname`,`sex`,`headimgurl`,`unionid`);



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

    public function test()
    {
        /*
        $a= "hello";
        $b= &$a;
        unset($b);
        $b="world";
        echo $a;*/
       /* $var = FALSE;
        if (empty($var)){
            echo 'null';
        }else{
            echo 'have value';
        }
       */
        /*$str = "LAMP";
        $str1 = "LAMPB";
        $strc = strcmp($str,$str1);
        switch ($strc){
            case '1':
                echo"str > str1";
                break;
            case '–1':
                echo"str < str1";
                break;
            case 0:
                echo"str=str1";
                break;
            default:
                echo"str <> str1";
        }
        */
        /*
        if ($this->p()){
            echo 'false';
        }else{
            echo 'true';
        }*/

        $vip_type = ['VIP','VIP1','VIP2','VIP3','VIP4','SVIP','SVIP1','SVIP2','SVIP3','SVIP4'];
        $type = 'SR';
        dd(!in_array($type,$vip_type));
    }
    function p(){
        return 1;
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
