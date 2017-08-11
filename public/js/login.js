/**
 * Created by zhuxiaoliang on 2017/8/11.
 */

$.ajaxSetup({//ajax表单提交TOKEN
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// $('#loginIn').click(function () {
//     var email = $("#email").val(), password = $("#password").val(), loginCaptcha = $("#loginCaptcha").val();
//     if (email && password && loginCaptcha) {
//         var data = {
//             'email': email, 'password': password, 'loginCaptcha': loginCaptcha
//         };
//         $.ajax({
//             type: 'post',
//             data:data,
//             url:'/login',
//             success:function (e) {
//
//             }
//         })
//     } else {
//         layer.msg('请输入完整信息！')
//     }
// });