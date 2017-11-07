<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>chenglh</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link rel="icon" href="data:image/vnd.microsoft.icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERERERERERERERERERERERERERERERERAAAAAAEREREAAAAAAREREQABERERERERAAEREREREREAAAAAEREREQAAAAARERERAAEREREREREAAREREREREQAAAAABERERAAAAAAEREREREREREREREREREREREREREREREREREAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" type="image/x-icon">
    <style>
        #wrapper {
            position: absolute;
            left: 0;
            width: 320px;
            text-align: center;
            top: 50%;
            left: 50%;
            margin-left: -160px;
            margin-top: -160px;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        h1, h2 {
            position: relative;
        }
        h1 {
            font-family: 'Montserrat', 'Helvetica Neue', Arial, sans-serif;
            font-weight: 700;
            font-size: 25px;
            letter-spacing: 9px;
            text-transform: uppercase;
            margin: 12px 0;
            left: 4px;
        }
        h2 {
            color: #999;
            font-weight: normal;
            font-size: 18px;
            letter-spacing: .12em;
            margin-bottom: 30px;
            left: 3px;
        }
        p {
            font-size: 14px;
            line-height: 2em;
            margin: 0;
            letter-spacing: 2px;
        }
        a {
            color: #999;
            text-decoration: none;
            transition: color .2s ease;
        }
        a:hover {
            color: #f33;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <h1>CHENGLHAIZXL.COM</h1>
    <h2>我爱程序媛</h2>
    <p><a href="http://weibo.com/u/1712433191" target="_blank">全部视频</a></p>
    <p><a href="https://github.com/chenglhzxl" target="_blank">文章教程</a></p>
    {{--<p><a href="http://weibo.com/u/1712433191" target="_blank">学习视频</a></p>--}}

    <p><a href="{{route('myArticle')}}" target="_blank">我的文章</a></p>
    @if(getCurrentUser())
        <p><a href="{{route('myArticle')}}" target="_blank">我的文章</a></p>
        <p><a href="{{route('logout')}}">退出</a></p>
    @else
    <p><a href="{{route('login')}}">登录</a></p>
    @endif
</div>
<canvas></canvas>

<script>
    document.addEventListener('touchmove', function (e) {
        e.preventDefault()
    })
    var c = document.getElementsByTagName('canvas')[0],
            x = c.getContext('2d'),
            pr = window.devicePixelRatio || 1,
            w = window.innerWidth,
            h = window.innerHeight,
            f = 90,
            q,
            m = Math,
            r = 0,
            u = m.PI*2,
            v = m.cos,
            z = m.random
    c.width = w*pr
    c.height = h*pr
    x.scale(pr, pr)
    x.globalAlpha = 0.6
    function i(){
        x.clearRect(0,0,w,h)
        q=[{x:0,y:h*.7+f},{x:0,y:h*.7-f}]
        while(q[1].x<w+f) d(q[0], q[1])
    }
    function d(i,j){
        x.beginPath()
        x.moveTo(i.x, i.y)
        x.lineTo(j.x, j.y)
        var k = j.x + (z()*2-0.25)*f,
                n = y(j.y)
        x.lineTo(k, n)
        x.closePath()
        r-=u/-50
        x.fillStyle = '#'+(v(r)*127+128<<16 | v(r+u/3)*127+128<<8 | v(r+u/3*2)*127+128).toString(16)
        x.fill()
        q[0] = q[1]
        q[1] = {x:k,y:n}
    }
    function y(p){
        var t = p + (z()*2-1.1)*f
        return (t>h||t<0) ? y(p) : t
    }
    document.onclick = i
    document.ontouchstart = i
    i()
</script>

{{--<script type="text/javascript" src="/js/jQuery-2.2.0.min.js"></script>--}}
{{--<script type="text/javascript" src="/js/layui/css/modules/layer/layer.js"></script>--}}
{{--<script charset="utf-8" src="/css/kindeditor/kindeditor-min.js"></script>--}}
{{--<script charset="utf-8" src="/css/kindeditor/lang/zh_CN.js"></script>--}}
{{--<script src="/js/chenglh.js"></script>--}}

{{--@yield('script')--}}
</body>
</html>
