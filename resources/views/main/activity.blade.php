<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="/css/showStyle.css" rel="stylesheet" type="text/css">
    <title>有趣文化</title>
    <style>
        body{
            width: 100%;
            height: 100%;
            margin: 0;
        }
        p{
            color: #707070;
            font-size: 16px;
        }
        div{
            margin: 0;
        }
        .headerImg{
            width: 100%;
            height: 200px;
            border-bottom: 1px solid #CFCFCF;
        }
        .headerImg img{
            width: 100%;
            height: 200px;

        }
        .textrow .titleDiv{
            width: 80%;
            margin-left: 10%;
        }
        .textrow .price
        {
            color: #FF6638;
            font-size: 22px;
            font-weight: 500;
        }
        .titleDiv .left{
            width: 70%;
            float: left;
            text-align: left;
            height: 100px;
            display: table;
        }
        .titleDiv .title{
            font-size: 18px;
            text-align: left;
            word-wrap: break-word;
            word-break: normal;
            display: table-cell;
            color: #707070;
            vertical-align: middle;
        }
        .titleDiv .right{
            width: 30%;
            float: left;
            height: 100px;
            display: table;
        }
        .titleDiv .right .price
        {
            display: table-cell;
            vertical-align: middle;
        }
        .activityTips{
            width: 80%;
            margin-left: 10%;
            margin-top: 30px;
        }
        .iconNote{
            width: 33%;
            float: left;
        }
        .iconNote p{
            font-size: 12px;
            color: dimgrey;
        }
        .iconNote .iconPng{
            vertical-align: middle;
        }
        .iconPng img{
            width: 45%;
        }
        .activityText{
            width: 80%;
            margin-left: 10%;
            font-size: 14px;
        }
        .activityTitle{
            color: #707070;
            text-align: center;
            font-weight: 500;
            font-size: 18px;
        }
        .footer{
            width: 100%;
            height: 60px;
            background-color: #FF6638;
            position: fixed;
            bottom: 0;
            z-index: 100;
            display: table;
        }
        .footerRow{
            display: table-cell;
            vertical-align: middle;
            text-align: center;
        }
        .footerPrice{
            width: 40%;
            margin-left: 10%;
            float: left;
            color: #ffffff;
            font-weight: 500;
            text-align: center;
        }
        .footerBtn{
            width: 40%;
            margin-right: 10%;
            float: left;
            color: #ffffff;
            font-weight: 500;

        }
        .textInfo img{
            width: 100%;
        }
        @media screen and (min-width: 800px){
            .activity-body{
                width:50%;
                margin-left: 25%;
            }
            .headerImg{
                height: 300px;
            }
            .headerImg img{
                height: 300px;
            }
            .footer{
                width: 50%;
            }
            .activityTitle{
                font-size: 1.3em;
            }
        }
    </style>
</head>
<body>
<div class="activity-body">
    @foreach( $result as $res )
        <div class="headerImg">
            <img src="{{ $res->image }}">
        </div>
        <div class="block" style="background-color:#ffffff;">
            <div class="textrow">
                {{--<p class="activityTitle" style="font-weight: 700;color: #333333;">{{ $res->title }}</p>--}}
                <div class="titleDiv">
                    <div class="left">
                        <div class="title">{{ $res->title }}</div>
                    </div>
                    <div class="right">
                        <p class="price">￥{{ $res->price }}</p>
                    </div>
                </div>
                <div class="activityTips">
                    <div class="iconNote">
                        <div class="iconPng"><img src="/images/rili.png"></div>
                        <p>{{ $res->date }}</p>
                    </div>
                    <div class="iconNote">
                        <div class="iconPng"><img src="/images/renren.png"></div>
                        <p>{{ $res->minNum }}到{{ $res->maxNum }}人</p>
                    </div>
                    <div class="iconNote">
                        <div class="iconPng"><img src="/images/time.png"></div>
                        <p>{{ $res->time }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block" style="background-color: #ffffff">
            <p class="activityTitle">活动亮点</p>
            <div class="textInfo" style="width:80%;margin-left:10%;"><?php echo $res->tips; ?></div>
        </div>
        <div class="block" style="background-color: #ffffff">
            <p class="activityTitle">发起人</p>
            <p class="activityText" style="text-align: center">{{ $res->name }}</p>
            <p class="activityText" style="text-align: center">{{ $res->personInfo }}</p>
        </div>
        <div class="block" style="background-color: #ffffff;">
            <p class="activityTitle">活动详情</p>
            <div class="textInfo" style="width:80%;margin-left:10%;"><?php echo $res->details; ?></div>
        </div>
        <div class="footer" onclick="">
            <div class="footerRow">
                <div class="footerPrice">{{ $res->price }}元/人</div>
                <div class="footerBtn" >报名</div>
            </div>
        </div>
        @endforeach
            
    </div>
        
    
    
</body>
</html>