@extends('layouts.master')
@section('title','文章详情')


@section('css')
<style>
    .article-content-body{
        padding: 15px;
    }
</style>
@endsection

@section('content')
    <div style="min-height: 500px">
        <div class="head-title">
            <p class="news-title">{{$article['title']}}</p>
            <p class="news-reporter">
                <span>{{$article['created_at']}}</span>
                <span>{{$article['author']}}</span>
            </p>
        </div>
        <div class="article-content-body">
            {!! $article['content'] !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
        !function () {
            //网页编辑器
            KindEditor.options.filterMode = false;

            KindEditor.ready(function (K) {
                window.editor1 = K.create('#content', {
                    resizeType: 0,
                    uploadJson: "/crm/kindeditor/uploadfile",
                    width: "90%",
                    height:'200%',
                    urlType: "domain",
                    items: [
                        'fontsize','fontname','justifyleft', 'justifycenter', 'justifyright', 'forecolor', 'hilitecolor', 'bold',
                        'italic', 'underline', 'image','quickformat'
                    ], afterBlur: function () {
                        this.sync();
                    }
                });
            })
        }()

    </script>
@endsection