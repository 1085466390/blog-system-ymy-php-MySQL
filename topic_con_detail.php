<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>主题详情</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#banner{height:50px;line-height:50px;padding-left:30px;}
#banner a{text-decoration:none;color:#000;font-size:18px;}
#banner a:hover{color:#ff9406;}
#topic{width:1160px;}

#topic_con{margin:0 auto;width:1160px;border-bottom:1px #ccc solid;font-family:"黑体";padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;}
#topic_con .title a{text-decoration:none;color:#000;font-size:20px;font-weight:600;}
#topic_con .time{color:#999;font-size:16px;}
#topic_con .time .flw{display:inline-block;float:right;text-align:center;height:30px;}
#topic_con .time .flw a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
#topic_con .author{margin-top:10px;}
#topic_con .author a{text-decoration:none;color:#000;}

#uptopic{width:1160px;height:40px;line-height:40px;text-align:center;}
#uptopic a{display:inline-block;width:100px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}

#log{width:1160px;}

._hotlog{margin:0 auto;width:1160px;margin-bottom:20px;padding-left:20px;padding-top:10px;border-bottom:1px #ccc solid;}
._hotlog .hotlog-top .left{width:90px;display:inline-block;vertical-align:top;margin-right:20px;}
._hotlog .hotlog-top .right{width:1000px;display:inline-block;vertical-align:top;}
._hotlog .hotlog-top .right .collect{display:inline-block;float:right;text-align:center;height:30px;margin-right:20px;}
._hotlog .hotlog-top .right .collect a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
._hotlog .hotlog-top .right .content{margin-top:10px;}
._hotlog .hotlog-top .right .content:hover{cursor:pointer;}
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
	<div><a href="javascript:history.back();">返回</a></div>
</div>
<div id="content">
	<div id="topic">
    	<?php 
		$tp_id=$_GET['id'];
		$sql = mysqli_query($conn,"select * from tb_tk_topic join tb_tk_user on tb_tk_topic.tp_uid=tb_tk_user.user_uid where tp_id='$tp_id'");
		$info=mysqli_fetch_array($sql);
		?>
        <div style="margin-bottom:20px;">
        	<div id="topic_con">
	            <div class="title"><a href="topic_con_detail.php?id=<?php echo $info['tp_id'];?>"><?php echo $info['tp_top'];?></a></div>
                <div class="time"><?php echo $info['tp_adtime'];?>&nbsp;&nbsp;关注量 <?php echo $info['tp_follow'];?> 讨论数 <?php echo $info['tp_log'];?>
                	 <?php
			    if(!session_id()){session_start();}
				if(isset($_SESSION['uid'])){
					$uid=$_SESSION['uid'];
					if($info['tp_uid']==$uid){$t=1;} //话题发布者
					else{
    				    $sql2=mysqli_query($conn,"select * from tb_tk_topicfocus where tpfc_tpid='$tp_id' and tpfc_uid='$uid'");
					    $info2=mysqli_fetch_array($sql2);
						if($info2) $t=2; //已关注者
						else $t=0; //未关注者
					}
				}else{$t=0;} //未登录者
				if(!$t){
				?>
                	<div class="flw"><a href="<?php if(isset($_SESSION['uid'])){?> topic_focus.php?id=<?php echo $info['tp_id'];?> <?php }else{?> user_login.php <?php }?>">关注</a></div>
                    <?php
				}else if($t==2){
					?>
                    <div class="flw"><a href="topic_delfocus.php?id=<?php echo $info['tp_id'];?>">取消关注</a></div>
                    <?php
				}
				?>
                </div>
                <div class="author">发布者：<a href=""><?php echo $info['user_uname'];?></a></div>
                <div class="tutor">话题导语：<?php echo $info['tp_content'];?></div>
             </div>
        </div>
    </div>
     <?php
		if(!session_id()){session_start();}
		if(isset($_SESSION['uid'])){
			?>
        <div id="uptopic"><a href="sdlog.php?id=<?php echo $tp_id;?>&name=<?php echo $info['tp_top'];?>">参与讨论</a></div>
        <?php
		}
        ?>
    <div id="log">
    	
    <?php
	$sql=mysqli_query($conn,"select * from tb_tk_log join tb_tk_user on tb_tk_log.log_uid=tb_tk_user.user_uid where log_state=1 and log_topid='$tp_id' order by log_tag desc,log_com desc,log_trans desc,log_time desc");
	while($info=mysqli_fetch_array($sql)){
	?>
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
				if(!session_id()){session_start();}
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
            <div class="content" onclick="javascript:window.location='log_con_detail.php?id=<?php echo $info['log_id'];?>';"><?php echo $info['log_content'];?></div>
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
        <div class="func" style="margin-left:10px;"><a href="log_con_detail.php?id=<?php echo $info['log_id'];?>&state=1">转发</a><span>&nbsp;&nbsp;<?php echo $info['log_trans'];?></span></div>&nbsp;|
        <div class="func"><a href="log_con_detail.php?id=<?php echo $info['log_id'];?>&state=2">评论</a><span>&nbsp;&nbsp;<?php echo $info['log_com'];?></span></div>&nbsp;|
        <div class="func"><a href="log_con_detail.php?id=<?php echo $info['log_id'];?>&state=3">点赞</a><span>&nbsp;&nbsp;<?php echo $info['log_tag'];?></span></div>
    </div>
</div>
    <?php 
	}
	?>
    </div>        
</div>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>