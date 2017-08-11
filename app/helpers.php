<?php

/**
 * 消息提醒
 * @param int $status 状态 0/1(0=>false,1=>true)
 * @param string $msg 消息标题
 * @param string $errorMsg 错误消息
 * @return array
 */
function alertMsg($status, $msg="", $errorMsg="")
{
    return ['status' => ($status == 0 ? false : true), 'msg' => $msg, 'error' => ['message' => $errorMsg]];
}

function getCurrentUser()
{
    $user = session('cxy.login.userid');
    $name = '';
    if($user){
        $name = \App\Models\Users::where('id',$user)->where('isdeleted',0)->first()->name;
    }
    return $name;
}