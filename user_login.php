<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户登录</title>
<style type="text/css">
body{background:url(img/login-bg.jpg);background-repeat:no-repeat ;background-size:100% 100%;background-attachment: fixed;}
#content{border:1px #000 dashed;width:800px;margin:0 auto;margin-top:130px;border-radius:20px;background-color:rgba(50,50,50,0.7);padding-top:20px;padding-bottom:20px;}
#content h2{text-align:center;color:#fff;}
input[type="text"] {outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 15px 20px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;width:250px;}
input[type="password"]{outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 15px 20px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;margin-top:15px;width:250px;margin-bottom:20px;}
#content .forgot{text-align:center;}
#content .login-bottom{text-align:right;margin-right:40px;}

.forgot a{text-decoration:none;font-size: 16px;font-weight: 500;color:#ff9406;display: inline-block;border-right: 2px solid #F45B4B;padding: 0px 7px 0px 0px;}
.forgot  a:hover{color: #818181;}
.forgot input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
.forgot input[type="submit"]:hover {background:#818181;transition: 0.5s all;}
.forgot {text-align: right;}

.login-bottom h3 {font-size: 14px;font-weight: 500;color:#fff;}
.login-bottom h3 a {text-decoration:none;font-size: 20px;font-weight: 500;color:#fff;}
.login-bottom h3 a:hover {color:#696969;transition: 0.5s all;}
</style>
<script type="text/javascript">
function checkinput(){
	if(document.getElementById("username").value==""){
		alert("请输入用户名！");
		document.getElementById("username").focus();
		return false;
	}
	if(document.getElementById("pwd").value==""){
		alert("请输入密码！");
		document.getElementById("pwd").focus();
		return false;
	}
	return true;
}
</script>
</head>

<body>
<div id="content">
<form action="check_login.php" method="post">
	<h2>用户登录</h2><br>
	<div style="margin-left:200px;color:#fff;">用户名：<input type="text" name="username" id="username"></div>
    <div style="margin-left:200px;color:#fff;">密<span style="color:rgba(0,0,0,0);">一</span>码：<input type="password" name="pwd" id="pwd"></div>
    <div class="forgot">
    	<a href="#">忘记密码</a>
     	<input type="submit" value="登录" name="submit" onClick="return checkinput();">
</form>
	</div>
    <div class="login-bottom">
		<h3>新用户&nbsp;&nbsp;<a href="register.php">注册</a></h3>
	</div>
</div>
</body>
</html>