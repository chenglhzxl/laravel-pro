@extends('layouts.master')
@section('title','文章列表')

@section('css')
    <style>
        .login-modal-pro {
            position: fixed;
            top: 50%;
            left: 50%;
            z-index: 1;
            width: 390px;
            padding: 20px 35px;
            background-color: #ffffff;
            -webkit-box-shadow: 3px 3px 15px 4px rgba(224, 182, 217, 0.4);
            -webkit-transform: translate(-50%, -65%);
            -ms-transform: translate(-50%, -65%);
            transform: translate(-50%, -65%);
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
        .login-modal-pro .input-wrapper {
            margin: 10px 0 15px;
            border: 1px solid #c5c5c5;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        .login-modal-pro .input {
            display: inline-block;
            height: 30px;
            font-size: 12px;
            padding: 0 10px;
            vertical-align: middle;
            width: calc(100% - 37px);
            outline: none;
            border: 0;
        }
        .code-wrapper .input {
            width: 100px;
            border: 1px solid #c5c5c5;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }
        .code-wrapper .change-code {
            float: right;
            display: inline-block;
            font-size: 14px;
            line-height: 30px;
            color: #999999;
        }
        .login-modal-pro .code {
            float: right;
            display: inline-block;
            width: 90px;
            height: 30px;
            margin-right: 15px;
            vertical-align: middle;
            background-color: #ddd;
        }
        .login-modal-pro .login-btn {
            display: block;
            border: none;
            background-color: rgb(212, 152, 210);
            color: rgba(82, 74, 40, 0.6);
            text-align: center;
            width: 100%;
            padding: 10px 0;
            margin: 20px 0 10px;
        }
        input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
            background-color: rgb(221, 193, 255)!important;
            background-image: none;
            color: rgb(0, 0, 0);
        }
        .submit-error-tips {
            display: none;
            line-height: 20px;
            padding: 4px 10px;
            color: #E2003B;
            background-color: #FEE6ED;
            margin-bottom: 10px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .submit-error-tips.active {
            display: block;
        }
        .logo{
            height: 100px;
            text-align: center;
            width: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="login-modal-pro">

            <div class="header-logo">
                <img src="/images/index.jpeg" class="logo">
            </div>
            @if($errors->has('captcha'))
                <div class="submit-error-tips active">{{ $errors->first('captcha') }}</div>
            @endif
            @if($errors->has('email'))
                <div class="submit-error-tips active">{{ $errors->first('email') }}</div>
            @endif
            <form id="login" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="input-wrapper">
                    <img class="user-icon" src="/images/user.png">
                    <input class="input" type="text" name="email" id="email" placeholder="请输入用户名" autocomplete="off">
                </div>
                <div class="input-wrapper">
                    <img class="user-icon" src="/images/password.png">
                    <input class="input" type="password" name="password" id="password" placeholder="请输入密码" autocomplete="off">
                </div>
                <div class="code-wrapper">
                    <input type="text" placeholder="验证码" name="loginCaptcha" id="loginCaptcha" class="input"/>
                    <p onclick="$('#captcha').click()" class="change-code">看不清?</p>
                    <div class="code">
                        <img id="captcha" src="{{ route('captcha',['login'])}}" style="cursor:pointer"
                             onclick="this.src='{{ route('captcha','1')}}'+Math.random()" alt="验证码"
                             title="点击刷新"
                             width="90" height="30" border="0">
                    </div>
                </div>
                <button class="login-btn" id="loginIn">登录</button>
                <button class="login-btn" id="logging" style="display: none"><div class="ball-spin-fade-loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>登录中……</button>
            </form>
        </div>
    </div>
@endsection