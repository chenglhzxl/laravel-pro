@extends('layouts.master')
@if(isset($article))
    @section('title','文章编辑')
@else
    @section('title','文章新增')
@endif


@section('css')

@endsection

@section('content')
    <div class="box box-primary" style="min-height: 650px">
        <div class="box-header with-border">
            <h3 class="box-title">@if(isset($article)) 编辑@else新增@endif文章</h3>
            <input type="hidden" value="@if(isset($article)){{$article->id}}@else''@endif" id="articleid">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
            <div class="box-body">
                <div class="form-group">
                    <label for="title">文章标题</label>
                    <input type="text" class="form-control" style="width: 30%" id="title" placeholder="请输入标题" @if(isset($article)) value="{{$article->title}}" @endif>
                </div>
                <div class="form-group">
                    <label for="abstract">文章摘要</label>
                    <input type="text" class="form-control" style="width: 30%"id="abstract" placeholder="请输入摘要" @if(isset($article)) value="{{$article->abstract}}" @endif>
                </div>
                <div class="form-group">
                    <label for="creatTime">录入时间</label>
                    <input type="text" class="form-control" style="width: 30%"id="creatTime" value=" @if(isset($article)) {{$article->created_at}} @else {{$now}} @endif " readonly>
                </div>
                <div class="form-group">
                    <label for="content">文章内容</label>
                    <textarea class="form-control" id="content" placeholder="请输入内容">@if(isset($article)) {{$article->content}} @endif</textarea>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="inputFile">File input</label>--}}
                    {{--<input type="file" id="inputFile">--}}

                    {{--<p class="help-block">Example block-level help text here.</p>--}}
                {{--</div>--}}
                {{--<div class="checkbox">--}}
                    {{--<label>--}}
                        {{--<input type="checkbox"> Check me out--}}
                    {{--</label>--}}
                {{--</div>--}}
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="button" class="btn btn-primary" onclick="submitArticle($('#articleid').val())">提交</button>
                <a type="button" class="btn btn-primary" onclick="go_lastPage()">返回</a>
            </div>
        </form>
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