<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
	<link rel="stylesheet" type="text/css" href="/css/login.css">
	<link rel="stylesheet" type="text/css" href="/css/style-responsive.css">
	<script type="text/javascript" src="/js/login.js"></script>
</head>
<body  class="login-body">

<div id="signin">
 <div class="container">
 	<form class="signin" action="/admin/login" method="post">
 		<div class="signin-title-center">
 			<h1 class="write-style">登陆</h1>
            <p style="color:red;"><?php if(isset($infomation)){ echo $infomation; } ?></p>
 			<img src="/images/1.png" style="width:100px"  alt="">
        </div>

 		<div  class="signin-middle-text">
 		
 			<div class="form-input">
 				<div class="form-icon"><img src="/images/username.png"></div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
 				<input type="text" class="form-control" name="username" id="username" placeholder="用户名" autofocus onkeyup="showClear()"/>
 				<div class="form-input-clear"><img id="username-clear" src="/images/off.png" onclick="clearUserName()"></div>
 			</div>


 			<div class="form-input"> 
 				<div class="form-icon"><img src="/images/password.png"></div>
 				<input type="password" class="form-control" name="password" id="password" placeholder="请输入您的密码" onkeyup="showPwClear()"/>
 				<div class="form-input-clear"><img src="/images/off.png" id="password-clear" onclick="clearPassword()"></div>
 			</div>

 			 <input class="signin-bottom-btn" type="submit" style="color:white;">
 			 <img src="/images/duihao.png" style="width:20px">
        </div>
 	

 	</form>
</div>

</div>

<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/modernizr.min.js"></script>


</body>
</html>