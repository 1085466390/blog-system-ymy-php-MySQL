<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>发布话题</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
input[type="text"] {outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 5px 10px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;width:250px;margin-bottom:20px;}
input[type="password"]{outline: none;font-size: 15px;font-weight: 500;color: #818181;padding: 5px 10px;background: #CACACA;border: 1px solid #ccc;border-radius:25px;margin-top:15px;width:250px;margin-bottom:20px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
input[type="reset"] {background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#c5464a;}
</style>
<script type="text/javascript">
function checkinput(){
	if(document.getElementById("name").value==""){
		alert("请输入主题名！");
		document.getElementById("name").focus();
		return false;
	}
	if(document.getElementById("word").value==""){
		alert("请输入导语！");
		document.getElementById("word").focus();
		return false;
	}
	if(document.getElementById("class").value==0){
		alert("请选择话题类别！");
		document.getElementById("class").focus();
		return false;
	}
	return true;
}
</script>
</head>

<body onload='getProvince()'>

<div id="banner"><a href="javascript:history.back();">返回</a></div>

<div id="content" style="text-align:justify;padding-top:40px;padding-bottom:20px;">
<div style="width:600px;border:1px #000 dashed;margin-left:300px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;border-radius:20px;background-color:rgba(255,255,255,0.3);">
<form action="check_updatetp.php" method="post">
	<div>主题名：<input type="text" name="name" id="name"></div>
    <div>导<span style="color:rgba(240,240,240,0);">一</span>语：<input type="text" name="word" id="word" style="height:100px;"></div>
    <div>话题类型：
    	<select name="class" id="class">
        	<option value="0">请选择话题类别</option>
        	<option value="1">热门</option>
            <option value="2">头条</option>
            <option value="3">视频</option>
            <option value="4">榜单</option>
            <option value="5">搞笑</option>
            <option value="6">社会</option>
            <option value="7">时尚</option>
            <option value="8">电影</option>
            <option value="9">美女</option>
            <option value="10">体育</option>
            <option value="11">动漫</option>
            <option value="12">其他</option>
        </select>
    </div>
</div>
	<div style="width:600px;margin-left:330px;padding-top:20px;padding-bottom:20px;padding-left:100px;padding-right:100px;">
	    <input type="reset" value="重置" name="submit1" style="margin-right:60px;margin-left:30px;">
        <input type="submit" value="发布" name="submit" onClick="return checkinput();">
    </div>
</form>
</div>

<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>