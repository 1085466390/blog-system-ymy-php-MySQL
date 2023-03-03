<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>系统消息</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.content #left{width:140px;height:100%;display:inline-block;vertical-align:top;margin-right:15px;padding-top:10px;}
.content #left div{text-align:center;height:60px;line-height:60px;font-weight:600;font-size:18px;font-family:"黑体";}
.content #left div a{text-decoration:none;color:#000;}
.content #right{width:1000px;height:100%;display:inline-block;vertical-align:top;}
</style>

<script type="text/javascript">
function showLog(s){
	var xmlhttp;    
    if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("right").innerHTML=xmlhttp.responseText;
        }
     }
    if(s==1){
		xmlhttp.open("GET","sysmess_admin.php",true);
		document.getElementById("left_admin").style="border-left:2px solid #F45B4B;";
	}
    xmlhttp.send();
}
</script>
</head>

<body>

<?php include("conn.php");?>
<?php include("banner.php");?>

<div class="content" style="height:500px;">
	<div id="left">
        <div style="margin-bottom:20px;height:40px;line-height:40px;">>&nbsp;系统消息</div>
		<div id="left_admin" style="border-left:2px solid #F45B4B;"><a href="javascript:showLog(1);">系统管理员</a></div>
    </div>
    <div id="right">
    	<?php if(!isset($_GET['st']) || $_GET['st']==null) echo "<script>showLog(1);</script>"; ?>
    </div>
</div>

<?php mysqli_close($conn);?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>