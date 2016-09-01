@extends('app')

@section('head')
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/alert.css">
    <script src="/js/jquery-3.0.0.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <style>

        .jumbotron{
            background-image: url(../images/bg.jpg);
            background-position: center;
            background-size: cover;
        }
        .jumbotron h2{
            color: #ffffff;
        }
        .container .title{
            width: 80%;
            margin-left: 10%;
            margin-top: 80px;
        }
        .row .text{
            width: 80%;
            margin-left: 10%;
        }

    </style>
    @foreach( $result as $res )
    <style>
        .jumbotron{
            background-image: url({{ $res->image }});
            background-position: center;
            background-size: cover;
        }
    </style>
    @endforeach
@stop

@section('body')
    @foreach( $result as $res )
    <div class="jumbotron">
        <div class="container">
            <h2 class="title">{{ $res->title }}</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="text">
                <?php
                echo $res->text;
                ?>
            </div>
        </div>
    </div>
    @endforeach
@stop