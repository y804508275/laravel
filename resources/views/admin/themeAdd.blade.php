@extends('app')

@section('head')
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <script src="/js/jquery-3.0.0"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="{{asset('/ueditor/ueditor.config.js')}}"></script>
    <script src="{{asset('/ueditor/ueditor.all.min.js')}}"></script>
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
            <h2>添加</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div>
                <form action="/admin/theme/add" method="post" enctype="multipart/form-data" id="myForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">标题</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="标题">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">图片</label>
                        <input type="file" id="image" name="image">
                    </div>
                    {{--<input type="text" name="title">--}}
                    {{--<input type="file" name="image">--}}
                    {{--<input type="text" name="text">--}}
                    <div id="sub" onclick="sub(this)" class="btn btn-default">Submit</div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function sub(obj)
        {
            var ifSub = 1;
            var inputArr = obj.parentNode.getElementsByTagName('input');
            var num = inputArr.length;
            for (var i=0;i<num;i++)
            {
                if (inputArr[i].value=='')
                {
                    ifSub = 0;
                }
            }
            if (ifSub == 1) {
                document.getElementById('myForm').submit();
            }
            else
            {
                alert('请补全信息');
            }
        }
    </script>
@stop