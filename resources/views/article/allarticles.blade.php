@extends('layouts.master')
@section('title','文章列表')

@section('content')
    <section class="content">
        <div>
            <span>文章</span> | 全部文章
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
                <th>作者</th>
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
                    <td>{{$articleList['author']}}</td>
                    <td>{{$articleList['created_at']}}</td>
                    <td><a href="{{route('article-review',['id'=>$articleList['id']])}}">查看</a></td>
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
    </section>
@endsection