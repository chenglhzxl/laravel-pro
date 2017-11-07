@extends('layouts.master')
@section('title','文章列表')

@section('css')
    <style>
        .btn-paging-prev, .btn-paging-next {
            width: 19px;
            height: 19px;
            border-radius: 2px;
            border: solid 1px #00a9ac;
            background-color: #fff;
            vertical-align: middle;
            outline: 0;
        }
        .btn-paging-prev:after, .btn-paging-next:after {
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
        }
        .btn-paging-prev:hover, .btn-paging-next:hover {
            background-color:#00A9AC;
        }
        .btn-paging-prev:after {
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            left: 2px;
        }
        .btn-paging-next:after {
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
            right: 1px;
        }
        .btn-paging-prev:after, .btn-paging-next:after {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border: solid 1px #00a9ac;
            border-right: 0;
            border-bottom: 0;
            position: relative;
            top: -2px;
        }
        .btn-paging-prev:after:hover, .btn-paging-next:after:hover {
            border-color: #fff
        }
        .order-paging-operate {
            float: right;
            color: #4b556a;
            font-size: 12px;
        }
        .order-paging-operate .page-now {
            text-align: center;
            height: 19px;
            border: 0;
            width: 28px;
            display: inline-block;
        }
    </style>
@endsection

@section('script')
    <script>
        function select_page() {
            var current_page = $("#current_page").val(), per_page = $('#per_page').val();
            location.href = '{{route('myArticle')}}' + '?per_page=' + per_page + '&current_page=' + current_page;
        }
        function btn_paging_prev(current_page) {
            var per_page = $('#per_page').val(), page = current_page - 1;
            if (page == 0) {
                return;
            }
            location.href = '{{route('myArticle')}}' + '?per_page=' + per_page + '&current_page=' + page;
        }
        function btn_paging_next(current_page) {
            var per_page = $('#per_page').val(), page = current_page + 1, last_page = '{{$response['pagination']['last_page']}}';
            if (page > last_page) {
                return;
            }
            location.href = '{{route('myArticle')}}' + '?per_page=' + per_page + '&current_page=' + page;
        }
    </script>
@endsection

@section('content')
    <section class="content">
        <div>
            <span>文章</span> | 文章列表 <a style="text-decoration: underline" href="{{route('myArticle-add')}}" target="_blank">新增文章</a>
        </div>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>编号</th>
                <th>标题</th>
                <th>摘要</th>
                {{--<td>内容</td>--}}
                <th>发表时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articleLists as $index=>$articleList)
                <tr>
                    {{--{{dd($articleList)}}--}}
                    <td>{{$index+1}}</td>
                    <td>{{$articleList['title']}}</td>
                    <td>{{$articleList['abstract']}}</td>
                    {{--<td>{{$articleList['content']}}</td>--}}
                    <td>{{$articleList['created_at']}}</td>
                    <td><a href="{{route('myArticle-edit',['id'=>$articleList['id']])}}">编辑</a> | <a href="javascript:;" onclick="article_delete({{$articleList['id']}})">删除</a></td>
                </tr>
            @endforeach
            @if(empty($articleLists))
                <tr><td colspan="5">暂时没有文章</td></tr>
            @endif
            </tbody>
        </table>
        <div  style="float: right;display: flex" class="order-paging-operate">
        <div>共{{$response['pagination']['total']}}条，每页显示
            <select name="per_page" id="per_page" onchange="select_page()">
                <option value="5" @if($response['pagination']['per_page']==5) selected @endif >5</option>
                <option value="10" @if($response['pagination']['per_page']==10) selected @endif>10</option>
                <option value="20" @if($response['pagination']['per_page']==20) selected @endif>20</option>
                <option value="50" @if($response['pagination']['per_page']==50) selected @endif>50</option>
            </select>
            <input type="hidden" id="current_page" value="{{$response['pagination']['current_page']}}">
            条</div>
        <button class="btn-paging-prev" onclick="btn_paging_prev({{$response['pagination']['current_page']}})"></button>
        <input type="hidden" id="current_page" value="{{$response['pagination']['current_page']}}">
        <span class="page-now">{{$response['pagination']['current_page']}}</span>
        <button class="btn-paging-next" onclick="btn_paging_next({{$response['pagination']['current_page']}})"></button>
        </div>
    </section>
@endsection