<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
</style>
</head>

<body>
<div id="banner">
	<?php include("top.php"); ?>
</div>
<div id="content">
	<div style="width:1160px;text-align:center;margin-top:20px;margin-bottom:20px;">欢迎登录，管理员 <?php if(!session_id()){session_start();} echo $_SESSION['adminname']; ?></div>
</div>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>