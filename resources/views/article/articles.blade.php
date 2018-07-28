@extends('layouts.master')
@section('title','文章列表')

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
                <th>发表时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results->items() as $index=>$articleList)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$articleList['title']}}</td>
                    <td>{{$articleList['abstract']}}</td>
                    <td>{{$articleList['created_at']}}</td>
                    <td><a href="{{route('myArticle-review',['id'=>$articleList['id']])}}">查看</a> |<a href="{{route('myArticle-edit',['id'=>$articleList['id']])}}">编辑</a> | <a href="javascript:;" onclick="article_delete({{$articleList['id']}})">删除</a></td>
                </tr>
            @endforeach
            @if(empty($results->items()))
                <tr><td colspan="5">暂时没有文章</td></tr>
            @endif
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-3 hidden-xs"></div>
            <div class="col-sm-4 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">当前显示 {{ $results->firstItem() }}
                    -{{ $results->lastItem() }} 共 {{ $results->total() }} 条
                </small>
            </div>
            <div class="col-sm-5 text-right text-center-xs">
                {{ $results->links() }}
            </div>
        </div>
        {{--<div  style="float: right;display: flex" class="order-paging-operate">--}}
        {{--<div>共{{$response['pagination']['total']}}条，每页显示--}}
            {{--<select name="per_page" id="per_page" onchange="select_page()">--}}
                {{--<option value="5" @if($response['pagination']['per_page']==5) selected @endif >5</option>--}}
                {{--<option value="10" @if($response['pagination']['per_page']==10) selected @endif>10</option>--}}
                {{--<option value="20" @if($response['pagination']['per_page']==20) selected @endif>20</option>--}}
                {{--<option value="50" @if($response['pagination']['per_page']==50) selected @endif>50</option>--}}
            {{--</select>--}}
            {{--<input type="hidden" id="current_page" value="{{$response['pagination']['current_page']}}">--}}
            {{--条</div>--}}
        {{--<button class="btn-paging-prev" onclick="btn_paging_prev({{$response['pagination']['current_page']}})"></button>--}}
        {{--<input type="hidden" id="current_page" value="{{$response['pagination']['current_page']}}">--}}
        {{--<span class="page-now">{{$response['pagination']['current_page']}}</span>--}}
        {{--<button class="btn-paging-next" onclick="btn_paging_next({{$response['pagination']['current_page']}})"></button>--}}
        {{--</div>--}}
    </section>
@endsection