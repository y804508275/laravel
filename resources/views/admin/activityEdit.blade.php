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
            <h2>活动添加</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div>
    @foreach( $result['res'] as $res )
                <form action="/admin/activity/edit" method="post" id="myForm" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="activityId" value="{{ $res->activityId }}">
                    <input type="hidden" name="kindId" value="{{ $res->kindId }}">
                    <select class="form-control" name="show">
                        @if( $res->show == '显示' )
                            <option>显示</option>
                            <option>不显示</option>
                        @else
                            <option>不显示</option>
                            <option>显示</option>
                        @endif
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">标题</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="标题" value="{{ $res->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">封面图片</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <select class="form-control" name="city" id="selectCity">
                        @foreach( $result['city'] as $city )
                            @if( $city->cityName == $res->city )
                                <option selected>{{ $city->cityName }}</option>

                            @else
                                <option >{{ $city->cityName }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">地点</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="地点" value="{{ $res->place }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">价格</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="价格" value="{{ $res->price }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">活动亮点</label>
                        <div style="width: 100%;">
                            <script id="tipsEditor" type="text/html" style="width:100%;height:300px;">
                                <?php echo $res->tips; ?>
                            </script>
                        </div>
                        <input type="hidden" class="form-control" id="tips" name="tips" placeholder="活动亮点">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">活动介绍</label>
                        <div style="width: 100%;">
                            <script id="editor" type="text/html" style="width:100%;height:500px;">
                                <?php echo $res->details; ?>
                            </script>
                        </div>
                        {{--<button onclick="getContent()">获得内容</button>--}}
                        <input type="hidden" class="form-control" id="details" name="details" placeholder="活动介绍">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">发起人姓名</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="发起人姓名" value="{{ $res->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">发起人介绍</label>
                        <input type="text" class="form-control" id="personInfo" name="personInfo" placeholder="发起人介绍" value="{{ $res->personInfo }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">活动日期</label>
                        <input type="text" class="form-control" id="date" name="date" placeholder="活动日期" value="{{ $res->date }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">最多参与人数</label>
                        <input type="text" class="form-control" id="maxNum" name="maxNum" placeholder="最多参与人数" value="{{ $res->maxNum }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">最少参与人数</label>
                        <input type="text" class="form-control" id="minNum" name="minNum" placeholder="最少参与人数" value="{{ $res->minNum }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">活动时长</label>
                        <input type="text" class="form-control" id="time" name="time" placeholder="活动时长" value="{{ $res->time }}">
                    </div>
                    <div id="sub" onclick="sub(this)" class="btn btn-default">Submit</div>
                </form>


    @endforeach
            </div>
        </div>
    </div>

    <script type="text/javascript">

        //实例化编辑器
        //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
        var ue = UE.getEditor('editor');
        var ue = UE.getEditor('tipsEditor');


        function isFocus(e){
            alert(UE.getEditor('editor').isFocus());
            UE.dom.domUtils.preventDefault(e)
        }
        function setblur(e){
            UE.getEditor('editor').blur();
            UE.dom.domUtils.preventDefault(e)
        }
        function insertHtml() {
            var value = prompt('插入html代码', '');
            UE.getEditor('editor').execCommand('insertHtml', value)
        }
        function createEditor() {
            enableBtn();
            UE.getEditor('editor');
        }
        function getAllHtml() {
            alert(UE.getEditor('editor').getAllHtml())
        }
        function getContent() {
            var arr = [];
            arr.push(UE.getEditor('editor').getContent());
//            alert(arr.join("\n"));
            document.getElementById('details').value = arr;
            var tipsArr = [];
            tipsArr.push(UE.getEditor('tipsEditor').getContent());
//            alert(arr.join("\n"));
            document.getElementById('tips').value = tipsArr;
        }
        function sub(obj)
        {
            getContent();
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
        function getPlainTxt() {
            var arr = [];
//            arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
//            arr.push("内容为：");
            arr.push(UE.getEditor('editor').getPlainTxt());
            alert(arr.join('\n'));
//            document.getElementById('editor')
        }
        function setContent(isAppendTo) {
            var arr = [];
            arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
            UE.getEditor('tipsEditor').setContent('欢迎使用ueditor', isAppendTo);
            alert(arr.join("\n"));
        }
        function DetailsSetContent(isAppendTo) {
            var arr = [];
            arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
            UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
            alert(arr.join("\n"));
        }
        function setDisabled() {
            UE.getEditor('editor').setDisabled('fullscreen');
            disableBtn("enable");
        }

        function setEnabled() {
            UE.getEditor('editor').setEnabled();
            enableBtn();
        }

        function getText() {
            //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
            var range = UE.getEditor('editor').selection.getRange();
            range.select();
            var txt = UE.getEditor('editor').selection.getText();
            alert(txt)
        }

        function getContentTxt() {
            var arr = [];
            arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
            arr.push("编辑器的纯文本内容为：");
            arr.push(UE.getEditor('editor').getContentTxt());
            alert(arr.join("\n"));
        }
        function hasContent() {
            var arr = [];
            arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
            arr.push("判断结果为：");
            arr.push(UE.getEditor('editor').hasContents());
            alert(arr.join("\n"));
        }
        function setFocus() {
            UE.getEditor('editor').focus();
        }
        function deleteEditor() {
            disableBtn();
            UE.getEditor('editor').destroy();
        }
        function disableBtn(str) {
            var div = document.getElementById('btns');
            var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
            for (var i = 0, btn; btn = btns[i++];) {
                if (btn.id == str) {
                    UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                } else {
                    btn.setAttribute("disabled", "true");
                }
            }
        }
        function enableBtn() {
            var div = document.getElementById('btns');
            var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
            for (var i = 0, btn; btn = btns[i++];) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            }
        }

        function getLocalData () {
            alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
        }

        function clearLocalData () {
            UE.getEditor('editor').execCommand( "clearlocaldata" );
            alert("已清空草稿箱")
        }
        window.onload = function()
        {
            setContent(true);
        }
    </script>
@stop
