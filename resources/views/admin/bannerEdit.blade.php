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
            <h2>编辑</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div>
                <form action="/admin/banner/edit" method="post" enctype="multipart/form-data" id="myForm">
                    @foreach($result as $res)
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="bannerId" value="{{ $res->bannerId }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">标题</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="标题" value="{{ $res->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">图片</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">链接地址</label>
                        <input type="text" class="form-control" id="text" name="url"  value="{{ $res->url }}">
                    </div>
                    {{--<input type="text" name="title">--}}
                    {{--<input type="file" name="image">--}}
                    {{--<input type="text" name="text">--}}
                    <div id="sub" onclick="sub(this)" class="btn btn-default">Submit</div>

                    @endforeach
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
                if (inputArr[i].value==''&&inputArr[i].type!='file')
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