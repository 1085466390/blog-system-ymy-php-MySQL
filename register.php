<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
input[type="text"] {outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 5px 10px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;width:250px;margin-bottom:20px;}
input[type="password"]{outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 5px 10px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;margin-top:15px;width:250px;margin-bottom:20px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
input[type="reset"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#ff9406;}
</style>
<script language="javascript" src="js/province.js" type="text/javascript" charset="utf-8"></script>
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
	if(document.getElementById("pwd1").value==""){
		alert("请输入确认密码！");
		document.getElementById("pwd1").focus();
		return false;
	}
	if(document.getElementById("pwd").value!=document.getElementById("pwd1").value){
		alert("密码与确认密码不一致！");
		document.getElementById("pwd1").focus();
		return false;
	}
	if(document.getElementById("pwq").value==""){
		alert("请输入密保问题！");
		document.getElementById("pwq").focus();
		return false;
	}
	if(document.getElementById("pwa").value==""){
		alert("请输入密保答案！");
		document.getElementById("pwa").focus();
		return false;
	}
	if(document.getElementById("province").value!="-1"){
		if(document.getElementById("city").value=="-2"){
			alert("请选择所在地的市！");
			document.getElementById("city").focus();
			return false;
		}
		if(document.getElementById("area").value=="-3"){
			alert("请选择所在地的区！");
			document.getElementById("area").focus();
			return false;
		}
	}
	return true;
}
</script>
</head>

<body onload='getProvince()'>
<div id="banner"><a href="javascript:history.back();">返回</a></div>

<div id="content" style="text-align:justify;padding-top:40px;padding-bottom:20px;">
<form action="register1.php" method="post" id="form_register" enctype="multipart/form-data">
<div style="text-align:center;margin-bottom:10px;">用户注册必填部分：</div>
<div style="width:600px;border:1px #000 dashed;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;border-radius:20px;background-color:rgba(255,255,255,0.3);">
	<div>用户名：<input type="text" id="username" name="username"></div>
    <div>密<span style="color:rgb(248,244,221);">一</span>码：<input type="password" id="pwd" name="pwd"></div>
    <div>确认密码：<input type="password" id="pwd1" name="pwd1"></div>
    <div>密保问题：<input type="text" id="pwq" name="pwq"></div>
    <div>密保答案：<input type="text" id="pwa" name="pwa"></div>
</div>
<div style="width:600px;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;margin-top:20px;border-radius:20px;background-color:rgba(255,255,255,0.3);">
    <div>用户简介：<input type="text" id="uword" name="uword" size="20"></div>
    <div>上传头像：<strong></strong><input type="file" name="upfile" id="upfile" size="30"><br>
    <img src="" alt="" title="preview-img" width="100"></div>
    <script>
        var fileInput = document.querySelector('input[type=file]'),
        previewImg = document.querySelector('img');
        fileInput.addEventListener('change', function () {
            var file = this.files[0];
            var reader = new FileReader();
      // 监听reader对象的的onload事件，当图片加载完成时，把base64编码賦值给预览图片
            reader.addEventListener("load", function () {
                previewImg.src = reader.result;
            }, false);
      // 调用reader.readAsDataURL()方法，把图片转成base64
            reader.readAsDataURL(file);
        }, false);
    </script><br>
    <div>真实姓名：<input type="text" id="tname" name="tname"></div>
    <div>性<span style="color:rgb(248,244,221);">一一</span>别：<input type="radio" name="sex" value="1">男 &nbsp;&nbsp; <input type="radio" name="sex" value="2">女</div><br>
    <div>身份证：<input type="text" id="uid" name="uid"></div>
    <div>电话号码：<input type="text" id="phone" name="phone"></div>
    <div>所在地：
    <select id="province" name="province" onchange="chooseProvince(this)">
		<option value="-1">请选择省</option>
	</select>
    </div>
</div>
	<div style="width:600px;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;">
	    <input type="reset" value="重置" name="submit1" style="margin-right:30px;margin-left:30px;">
        <input type="submit" value="注册" name="submit" onClick="return checkinput();">
        &nbsp;&nbsp;已有账户？<a href="user_login.php">请登录</a>
    </div>
</form>
</div>

<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>