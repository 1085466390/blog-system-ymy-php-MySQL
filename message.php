<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>消息中心</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.content #left{width:140px;height:100%;display:inline-block;vertical-align:top;margin-right:15px;padding-top:10px;}
.content #left div{text-align:center;height:60px;line-height:60px;font-weight:600;font-size:18px;font-family:"黑体";}
.content #left div a{text-decoration:none;color:#000;}

.content #right{width:1000px;height:100%;display:inline-block;vertical-align:top;overflow-y:auto;}
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
		xmlhttp.open("GET","message_mail.php<?php if(isset($_GET['uid'])){ echo "?uid=".$_GET['uid'];}?>",true);
		document.getElementById("left_mes").style="border-left:2px solid #F45B4B;";
		document.getElementById("left_com").style-="border-left:2px solid #F45B4B;";
		document.getElementById("left_tag").style-="border-left:2px solid #F45B4B;";
		document.getElementById("left_trans").style-="border-left:2px solid #F45B4B;";
		document.getElementById("left_back").style-="border-left:2px solid #F45B4B;";
	}
	else if(s==2){
		xmlhttp.open("GET","message_com.php",true);
		document.getElementById("left_com").style="border-left:2px solid #F45B4B;";
		document.getElementById("left_mes").style="border-left:0px;";
		document.getElementById("left_tag").style="border-left:0px;";
		document.getElementById("left_trans").style="border-left:0px;";
		document.getElementById("left_back").style="border-left:0px;";
	}
	else if(s==3){
		xmlhttp.open("GET","message_tag.php",true);
		document.getElementById("left_tag").style="border-left:2px solid #F45B4B;";
		document.getElementById("left_com").style="border-left:0px;";
		document.getElementById("left_mes").style="border-left:0px;";
		document.getElementById("left_trans").style="border-left:0px;";
		document.getElementById("left_back").style="border-left:0px;";
	}
    else if(s==4){
		xmlhttp.open("GET","message_trans.php",true);
		document.getElementById("left_trans").style="border-left:2px solid #F45B4B;";
		document.getElementById("left_com").style="border-left:0px;";
		document.getElementById("left_mes").style="border-left:0px;";
		document.getElementById("left_tag").style="border-left:0px;";
		document.getElementById("left_back").style="border-left:0px;";
	}
	else if(s==5){
		xmlhttp.open("GET","message_comback.php",true);
		document.getElementById("left_back").style="border-left:2px solid #F45B4B;";
		document.getElementById("left_com").style="border-left:0px;";
		document.getElementById("left_mes").style="border-left:0px;";
		document.getElementById("left_tag").style="border-left:0px;";
		document.getElementById("left_trans").style="border-left:0px;";
	}
    xmlhttp.send();
}
</script>
<script type="text/javascript">
function showLog1(uid){
	var xmlhttp;    
    if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("mail_right").innerHTML=xmlhttp.responseText;
        }
     }
	 var url="message_mail_dialog.php?uid="+uid;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
</script>
</head>

<body>

<?php include("conn.php");?>
<?php include("banner.php");?>

<div class="content" style="height:500px;">
	<div id="left">
        <div style="margin-bottom:20px;height:40px;line-height:40px;""">>&nbsp;消息中心</div>
    	<div id="left_mes"><a href="javascript:showLog(1);">私信</a></div>
        <div id="left_com"><a href="javascript:showLog(2);">评论我的</a></div>
        <div id="left_back"><a href="javascript:showLog(5);">回复我的</a></div>
        <div id="left_tag"><a href="javascript:showLog(3);">点赞我的</a></div>
        <div id="left_trans"><a href="javascript:showLog(4);">转发我的</a></div>
    </div>
    <div id="right">
    	<?php if(isset($_GET['st'])){ ?> <script type="text/javascript">showLog(<?php echo $_GET['st'];?>);</script> <?php } ?>
    </div>
</div>

<?php mysqli_close($conn);?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>