@extends('app')

@section('head')
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <script src="/js/jquery-3.0.0"></script>
    <script src="/js/bootstrap.min.js"></script>
    <style>
        .jumbotron{
            background-image: url(/images/bg.jpg);
            background-position: center;
            background-size: cover;
        }
        .jumbotron h2{
            color: #ffffff;
        }
    </style>
@stop


@section('body')
    <div class="jumbotron">
        <div class="container">
            <h2>有趣后台管理</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h3><a href='/admin/activity' target="_blank">分类管理</a></h3>
            <h3><a href='/admin/theme' target="_blank">主题管理</a></h3>
        </div>
    </div>


@stop