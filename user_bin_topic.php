<style type="text/css">
.bin_topic_title{height:30px;line-height:30px;padding-left:20px;font-size:18px;}
.bin_topic_con{margin-left:20px;height:450px;margin-top:20px;overflow-y: auto;}
.bin_topic_con1{margin-bottom:10px;border-bottom:1px #999 solid;padding-bottom:10px;}

.bin_topic_con1_right{width:900px;display:inline-block;vertical-align:top;}
.bin_topic_con1_right .right_top{font-size:18px;font-weight:500;height:40px;line-height:40px;}
.bin_topic_con1_right .right_top span{color:#999;margin-left:10px;font-weight:500;font-size:16px;}
.bin_topic_con1_right .right_top .button{display:inline-block;margin-left:50px;}
.bin_topic_con1_right .right_top .button a{text-decoration:none;color:#000;}
.bin_topic_con1_right .right_top .button a:hover{color:#069;}
.bin_topic_con1_right .right_bottom{margin-top:10px;background-color:rgba(255,255,255,0.3);}
.bin_topic_con1_right .right_bottom div{margin-left:50px;}
</style>

<div class="bin_topic_title">我的话题</div>
<div class="bin_topic_con">
<?php
    include("conn.php");
    if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
    $sql=mysqli_query($conn,"select * from tb_tk_topic join tb_tk_user on tb_tk_user.user_uid=tb_tk_topic.tp_uid where tp_uid='$uid' and tp_state=0 order by tp_time desc");
	while($info=mysqli_fetch_array($sql)){
?>
        <div class="bin_topic_con1">
        	<div class="bin_topic_con1_right">
				<div class="right_top">
					<?php echo $info['tp_top']; ?>
					<span><?php echo $info['tp_time']; ?></span>
					<div class="button"><a href="check_deltopic.php?id=<?php echo $info['tp_id'];?>">删除</a></div>
				</div>
			
				<div class="right_bottom">
					<div>发布者：<?php echo $info['user_uname'];?></div>
					<div>话题导语：<?php echo $info['tp_content'];?></div>
				</div>
			</div>
        </div>
<?php
	}
?>
</div>