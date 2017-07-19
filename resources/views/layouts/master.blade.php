<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') - chenglh</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link rel="stylesheet" href="/js/layui/css/layui.css">
    <link rel="stylesheet" href="/css/lte/AdminLTE.css">
    <link rel="stylesheet" href="/css/chenglh.css">
    @yield('css')
</head>
<body>
@include('components.header')

@yield('content')

@include('components.footer')

<script type="text/javascript" src="/js/jQuery-2.2.0.min.js"></script>
<script src="/js/chenglh.js"></script>
</body>
</html>
