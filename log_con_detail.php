<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>博文详情</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#ff9406;}

._hotlog{margin:0 auto;border-bottom:1px #ccc solid;width:1160px;margin-bottom:20px;padding-left:20px;padding-top:10px;}
._hotlog .hotlog-top .left{width:90px;display:inline-block;vertical-align:top;margin-right:20px;}
._hotlog .hotlog-top .right{width:1000px;display:inline-block;vertical-align:top;}
._hotlog .hotlog-top .right .collect{display:inline-block;float:right;text-align:center;height:30px;margin-right:20px;}
._hotlog .hotlog-top .right .collect a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
._hotlog .hotlog-top .right .content{margin-top:10px;}
._hotlog .hotlog-top .right .hotlog-img{margin-top:10px;}
._hotlog .hotlog-top .right .hotlog-img img{margin-right:10px;}
._hotlog .hotlog-topic{width:1160px;text-align:center;color:#36C;}
._hotlog .hotlog-topic a{text-decoration:none;color:#36C;}
._hotlog .hotlog-bottom{width:1160px;margin-top:10px;}
._hotlog .hotlog-bottom .func{display:inline-block;width:31%;text-align:center;}
._hotlog .hotlog-bottom .func a, ._hotlog .hotlog-top .right a{text-decoration:none;color:#000;}
._hotlog span{color:#999;}
</style>
</head>

<body>
<?php include("conn.php"); ?>
<div id="banner">
	<div><a href="<?php if(isset($_GET['tran'])){?> javascript:history.go(-2); <?php }else{?> javascript:history.back(); <?php } ?>">返回</a></div>
</div>
<div id="content">

<?php 
    if(!session_id()){session_start();}
	$log_id=$_GET['id'];
	$sql=mysqli_query($conn,"select * from tb_tk_log join tb_tk_user on tb_tk_log.log_uid=tb_tk_user.user_uid where log_id='$log_id'");
	$info=mysqli_fetch_array($sql);
?>
<script type="text/javascript">
function showLog(s){
	var xmlhttp;    
    if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("logButton").innerHTML=xmlhttp.responseText;
        }
     }
    if(s==1) xmlhttp.open("GET","logTrans.php?id=<?php echo $log_id;?>",true);
	else if(s==2) xmlhttp.open("GET","logCom.php?id=<?php echo $log_id;?>",true);
	else if(s==3) xmlhttp.open("GET","logTag.php?id=<?php echo $log_id;?>",true);
    xmlhttp.send();
}
</script>
<?php if(isset($_GET['state'])){$state=$_GET['state'];echo "<script>showLog('$state');</script>";} ?>
	<div id="log">
<div class="_hotlog">
	<div class="hotlog-top">
    	<div class="left">
            <img src="<?php echo $info['user_upic'];?>" width="80px" alt="">
        </div>
        <div class="right">
        	<div class="title">
          	    <div><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
                <span><?php echo $info['log_time'];?> &nbsp;&nbsp; <?php echo $info['log_store'];?>&nbsp;收藏</span>
                <?php
				if(isset($_SESSION['uid'])){
					if($_SESSION['uid']!=$info['log_uid']){
						$uid=$_SESSION['uid'];$log_id=$info['log_id'];
						$sql4=mysqli_query($conn,"select * from tb_tk_logstore where store_logid='$log_id' and store_uid='$uid'");
						if(!$info4=mysqli_fetch_array($sql4)){
				?>
				<div class="collect"><a href="store_log.php?id=<?php echo $info['log_id'];?>">收藏</a></div>
                <?php
						}else{
							?>
                            <div class="collect"><a href="delstore_log.php?id=<?php echo $info['log_id'];?>">取消收藏</a></div>
                            <?php
						}
					}
				}
				?>
            </div>
            <div class="content"><?php echo $info['log_content'];?></div>
            <div class="hotlog-img">
    	        <img src="<?php echo $info['log_pic1'];?>" alt="" width="80px"><img src="<?php echo $info['log_pic2'];?>" alt="" width="80px"><img src="<?php echo $info['log_pic3'];?>" alt="" width="80px">
            </div>
        </div>
    </div>    
    <?php 
	$tp_id=$info['log_topid'];
	$sql2=mysqli_query($conn,"select * from tb_tk_topic where tp_id='$tp_id'");
	$info2=mysqli_fetch_array($sql2);
	?>
    <div class="hotlog-topic"><a href=""><?php if($info2){}?></a></div>
    <div class="hotlog-topic"><?php if($info2){?> <a href="topic_con_detail.php?id=<?php echo $tp_id; ?>"> <?php echo "#".$info2['tp_top']."#"; ?> </a><?php } ?></div>
    <div class="hotlog-bottom">
        <div class="func" style="margin-left:10px;"><a href="javascript:showLog(1);">转发</a><span>&nbsp;&nbsp;<?php echo $info['log_trans'];?></span></div>&nbsp;|
        <div class="func"><a href="javascript:showLog(2);">评论</a><span>&nbsp;&nbsp;<?php echo $info['log_com'];?></span></div>&nbsp;|
        <div class="func"><a href="javascript:showLog(3);">点赞</a><span>&nbsp;&nbsp;<?php echo $info['log_tag'];?></span></div>
    </div>
</div>
    </div>
    <div id="logButton"></div>

</div>
<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>