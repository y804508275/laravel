<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>有趣文化</title>
    <link rel="stylesheet" href="/css/showStyle.css">
    <style type="text/css">
        
    </style>
</head>
<body>
<div class="header">
    <div class="header-txt">
        <div class="head-text">
            <p class="head-title">Travel like a local</p>
            <p class="head-note">像本地人一样行走</p>
        </div>
    </div>
</div>
<div class="list-body">
    <div class="list-block">
        <div class="list-textrow">
            @foreach( $result['list'] as $res )
            <div class="list-activityRow">
                <div class="activity-des" onclick="location.href='{{ url('/activity',$res->activityId) }}'">
                    <div class="activity-img" style="background-image: url({{ $res->image }});">
                        <div class="activity-text">
                            <p class="activity-title">{{ $res -> title }}</p>
                            <p class="activity-note">{{ $res -> place }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div style="clear: both;"></div>
        </div>
    </div>
    <div class="list-right">
        <div class="all-kinds">
            <p class="title">精选分类</p>
            @foreach( $result['kind'] as $kind )
            <div class="kinds-btn" onclick="location.href='{{ url('/list',$kind->kindId) }}'">{{ $kind->kindName }}</div>
            @endforeach
        </div>
    </div>
</div>
<div style="clear: both;"></div>
<div class="footer">
    <div class="footer-block">
        <div class="footer-textrow">
            <p class="pc-title" style="color: #a9b7b7;margin-bottom: 10px;">联系我们</p>
            <div class="footer-icon">
                <div>
                    <img src="/images/mail.png">
                    <p>hello@voluntour.cn</p>  
                </div>
                <div>
                    <img src="/images/weibo.png">
                    <p>@voluntour义工旅行</p>   
                </div>
                <div>
                    <img src="/images/weixin.png">
                    <p>公众微信号：youquwenhua</p>   
                </div>
            </div>
            <div style="clear: both;"></div>
            <p style="margin:0;">© 有趣文化.</p>
        </div>
    </div>
</div>
</html>