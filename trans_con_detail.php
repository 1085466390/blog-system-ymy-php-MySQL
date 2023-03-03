<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>转发详情</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#ff9406;}

._hotlog{margin:0 auto;width:1160px;margin-bottom:20px;padding-left:20px;padding-top:10px;border-bottom:1px #ccc solid;padding-bottom:5px;}
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

._hotlog .hotlog-top .right .trans_con{background-color:rgba(204,204,204,0.2);border-radius:5px;margin-top:10px;padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;}
._hotlog .hotlog-top .right .trans_con .trans_left{display:inline-block;vertical-align:top;margin-right:15px;}
._hotlog .hotlog-top .right .trans_con .trans_right{display:inline-block;vertical-align:top;}
._hotlog .hotlog-top .right .trans_con .trans_right .title span{color:#999;}
._hotlog .hotlog-top .right .trans_con .trans_right .content{}
._hotlog .hotlog-top .right .trans_con .trans_right .pic{margin-top:10px;}
._hotlog .hotlog-top .right .trans_con .trans_right .pic img{margin-right:10px;}
._hotlog .hotlog-top .right .trans_con .trans_right .topic{color:#36C;margin-top:5px;}
._hotlog .hotlog-top .right .trans_con .trans_right .topic a{text-decoration:none;color:#36C;}
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
	$trans_id=$_GET['id'];
	$sql=mysqli_query($conn,"select * from tb_tk_logtrans join tb_tk_user on tb_tk_logtrans.trans_uid=tb_tk_user.user_uid where trans_id='$trans_id'");
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
	if(s==1) xmlhttp.open("GET","transCom.php?id=<?php echo $trans_id;?>",true);
	else if(s==2) xmlhttp.open("GET","transTag.php?id=<?php echo $trans_id;?>",true);
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
          	    <div><a href=""><?php echo $info['user_uname'];?></a>&nbsp;&nbsp;<span><?php echo $info['trans_time'];?></span></div>
            </div>
            <div class="content" onclick=""><?php if($info['trans_content']!=""){echo $info['trans_content'];}else{echo "转发博文";}?></div>
            <div class="trans_con">
            	<?php
				$trans_logid=$info['trans_logid'];
				$sql2=mysqli_query($conn,"select * from tb_tk_log join tb_tk_user on tb_tk_user.user_uid=tb_tk_log.log_uid where log_id='$trans_logid'");
				$info2=mysqli_fetch_array($sql2);
				if($info2){
					?>
                    <div class="trans_left">
                    	<img src="<?php echo $info2['user_upic'];?>" width="50" alt="">
                    </div>
                    <div class="trans_right">
                    	<div class="title">
                        	<div><a href=""><?php echo $info2['user_uname'];?></a></div>
                            <span><?php echo $info2['log_time'];?> &nbsp;&nbsp; <?php echo $info2['log_store'];?>&nbsp;收藏</span>
                        </div>
                        <div class="content" onclick="javascript:window.location='log_con_detail.php?id=<?php echo $trans_logid;?>';"><?php echo $info2['log_content'];?></div>
                        <div class="pic">
                        	<img src="<?php echo $info2['log_pic1'];?>" alt="" width="80px"><img src="<?php echo $info2['log_pic2'];?>" alt="" width="80px"><img src="<?php echo $info2['log_pic3'];?>" alt="" width="80px">
                        </div>
                        <div class="topic">
                        	<?php
							$tpid=$info2['log_topid'];
							$sql3=mysqli_query($conn,"select * from tb_tk_topic where tp_id='$tpid'");
							$info3=mysqli_fetch_array($sql3);
							?>
                            <?php if($info3){?> <a href="topic_con_detail.php?id=<?php echo $tpid; ?>"> <?php echo "#".$info3['tp_top']."#"; ?> </a><?php } ?>
                        </div>
                    </div>
                    <?php
				}else{
					echo "转发博文已被删除";
				}
				?>
            </div>
        </div>
    
      
    <div class="hotlog-bottom">
        <div class="func" style="width:47%;"><a href="javascript:showLog(1);">评论</a><span>&nbsp;&nbsp;<?php echo $info['trans_com'];?></span></div>&nbsp;|
        <div class="func" style="width:47%;"><a href="javascript:showLog(2);">点赞</a><span>&nbsp;&nbsp;<?php echo $info['trans_tag'];?></span></div>
    </div>
</div>
    </div>
    <div id="logButton"></div>

</div>
<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>