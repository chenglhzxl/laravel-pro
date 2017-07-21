@extends('layouts.master')
@section('title','文章列表')

@section('css')

@endsection

@section('content')
    <section class="content">
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
                    <td><a href="{{route('article-edit',['id'=>$articleList['id']])}}">编辑</a> | <a href="javascript:;" onclick="article_delete({{$articleList['id']}})">删除</a></td>
{{--                    <td><a href="{{route('article-edit',['id'=>$articleList['id']])}}">编辑</a> | 删除</td>--}}
                </tr>
            @endforeach
            @if(empty($articleLists))
                <tr><td colspan="5">暂时没有文章</td></tr>
            @endif
            </tbody>
        </table>
    </section>
@endsection