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
    </style>
    <script>
        function auto()
        {

//            location.href='http://localhost:8000/admin/activity';
        }
        window.onload=auto();
    </script>
@stop

@section('body')
    <div class="jumbotron">
        <div class="container">
            <h2>活动管理</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">


            @foreach( $articles as $article )
                <h2 class="" role="button" data-toggle="collapse" href="#{{ $article->articleId }}" aria-expanded="false" aria-controls="{{ $article->articleId }}">
                    {{ $article->title }}
                </h2>
                <div class="collapse" id="{{ $article->articleId }}">
                    <div class="well">
                        <div class="form-group">
                            <label for="exampleInputName2">
                                <h4><a href="{{ url('admin/article/edit',$article->articleId) }}">管理</a></h4>
                                <h4><input value="{{ url('/article',$article->articleId) }}" onclick="copy(this)"></h4>
                                <h4><a href="{{ url('/article',$article->articleId) }}" target="_blank">查看</a></h4>
                                <h4 style="color: #ff0000;" onclick="checkDel('{{ $article->articleId }}')">删除</h4>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach

            <h2 class="" style="color: #269abc;text-align: center">
                <a href="/admin/article/add">添加文章</a>
            </h2>
        </div>
    </div>

    <form method="post" action="/admin/article/delete" id="deleteForm">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input name="articleId" id='articleId' value="" type="hidden">
    </form>

    <div class="alertBg" style="display: none;" id="alertBg">
        <div class="menu">
            <div class="menuHead">确定要删除吗?</div>
            <div class="menuBody">
                <div class="leftBtn" onclick="hideAlert()">取消</div>
                <div class="rightBtn" onclick="del()">删除</div>
            </div>
        </div>
    </div>

    <script>
        var delId;
        function checkDel(obj)
        {
            document.getElementById('alertBg').style.display = 'block';
            delId = obj;
        }
        function hideAlert()
        {
            document.getElementById('alertBg').style.display = 'none';
        }
        function del(){
            document.getElementById('articleId').value = delId;
            document.getElementById('deleteForm').submit();
        }
        function copy(obj){
            obj.select();
            document.execCommand("Copy");
            alert('复制成功');
        }
    </script>
@stop