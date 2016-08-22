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
            <h2>{{ $data['kindName'][0]->kindName }} 管理</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
    @foreach( $data['result'] as $res )
        <div>
            <h3>
                <a href="{{ url('admin/activity/edit',$res->activityId) }}" target="_blank">
                {{ $res->title }}
                </a>
            </h3>
            <h4 style="color: green;">
                @if( $res->top != 'yes')
                    <a href="{{ url('admin/activity/top',$res->activityId) }}">置顶</a>
                @else
                    <a href="{{ url('admin/activity/cancelTop',$res->activityId) }}">取消置顶</a>
                @endif
            </h4>
        </div>
    @endforeach
        <div>
            <a href="{{ url('admin/activity/add',$data['kindId']) }}">
                添加新活动
            </a>
        </div>
        </div>
    </div>

@stop