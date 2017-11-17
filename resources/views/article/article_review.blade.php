@extends('layouts.master')
@section('title','文章详情')


@section('css')

@endsection

@section('content')
    <div style="min-height: 650px">
        <div class="head-title">
            <p class="news-title">靖江恒艾健康服务产业园签约奠基 项目总投资50.5亿元</p>
            <p class="news-reporter">2017-3-15 8:57 靖江日报 </p>
        </div>
        <div>
            {{$article['content']}}
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