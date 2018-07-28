<div>
    <div class="header">
        <div onclick="main_page()">
            <div><span>CHENGLHAIZXL.COM</span></div>
            <div class="header-cnsty">我爱程序媛</div>
        </div>
        <div class="header-title">
            你好，@if(getCurrentUser())
                {{getCurrentUser()}}
            @else
                请<a href="{{route('login')}}">登录</a>
            @endif
{{--            <div style=""><a href="{{route('index')}}">首页</a> | <a href="{{route('article')}}">文章列表</a>  | <a href="{{route('article-add')}}">新增文章</a></div>--}}
        </div>
    </div>
    <div class="second-nav">
        <div class="container">
            <header id="header">
                <nav>
                    <ul>
                        <li><a>全部视频</a></li>
                        <li><a>学习路径</a></li>
                        <li><a>问答社区</a></li>
                        <li><a href="/allArticle">全部文章</a></li>
                        <li><a>订阅本站</a></li>
                        <li><a>我的文章</a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
</div>