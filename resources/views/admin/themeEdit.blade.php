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
                <form action="/admin/theme/edit" method="post" enctype="multipart/form-data" id="myForm">
                    @foreach( $result['themes'] as $res )
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="themeId" value="{{ $res->themeId }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">标题</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="标题" value="{{ $res->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">图片</label>
                        <input type="file" id="image" name="image">
                    </div>

                        <?php $themeActivities = $res->activities;

                        ?>


                    @endforeach
                    <div class="checkbox">
                        @foreach( $result['activities'] as $activity )

                            <?php
                            $i = 0;
                            $arr = explode(",", $themeActivities);
                            foreach ($arr as $a){
                                if ($activity->activityId == $a)
                                    $i = 1;
                            }
                            ?>
                            @if( $i == 1 )
                                <label class="checkbox">
                                    <input type="checkbox" name="activity[]" value="{{ $activity->activityId }}" checked>{{ $activity->title }}
                                </label>
                            @else
                                <label class="checkbox">
                                    <input type="checkbox" name="activity[]" value="{{ $activity->activityId }}">{{ $activity->title }}
                                </label>
                            @endif
                        @endforeach
                    </div>
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