<style type="text/css">
.bin_log_title{height:30px;line-height:30px;padding-left:20px;font-size:18px;}
.bin_log_con{margin-left:20px;height:450px;margin-top:20px;overflow-y: auto;}
.bin_log_con1{border-bottom:1px #999 solid;padding-bottom:10px;margin-bottom:10px;}

.bin_log_con1_left{width:50px;display:inline-block;vertical-align:top;margin-right:20px;}
.bin_log_con1_right{width:900px;display:inline-block;vertical-align:top;}
.bin_log_con1_right .right_top{font-size:18px;font-weight:500;height:40px;line-height:40px;}
.bin_log_con1_right .right_top span{color:#999;margin-left:10px;font-weight:500;font-size:16px;}
.bin_log_con1_right .right_top .button{display:inline-block;margin-left:50px;}
.bin_log_con1_right .right_top .button a{text-decoration:none;color:#000;}
.bin_log_con1_right .right_top .button a:hover{color:#069;}
.bin_log_con1_right .right_bottom{margin-top:10px;}
.bin_log_con1_right .right_bottom img{margin-right:10px;}
</style>

<?php
	include("conn.php");
?>
<div class="bin_log_title">我的博文</div>

<div class="bin_log_con">
<?php
    if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
    $sql=mysqli_query($conn,"select * from tb_tk_log join tb_tk_user on tb_tk_user.user_uid=tb_tk_log.log_uid where log_uid='$uid' and log_state=0 order by log_time desc");
	while($info=mysqli_fetch_array($sql)){
		?>
        <div class="bin_log_con1">
        	<div class="bin_log_con1_left"><img src="<?php echo $info['user_upic'];?>" width=50 alt=""></div>
            <div class="bin_log_con1_right">
            	<div class="right_top">
				    <?php echo $info['user_uname'];?> <span><?php echo $info['log_time'];?></span>
                    <div class="button"><a href="check_dellog.php?id=<?php echo $info['log_id'];?>&state=1">删除</a></div>
                </div>
                <div class="right_bottom">
                	<div><?php echo $info['log_content']; ?></div>
                    <div><img src="<?php echo $info['log_pic1'];?>" width=50 alt=""><img src="<?php echo $info['log_pic2'];?>" alt=""><img src="<?php echo $info['log_pic2'];?>" alt=""></div>
                    <?php
					$topicid=$info['log_topid'];
					if($topicid!=''){
					$sql2=mysqli_query($conn,"select * from tb_tk_topic where tp_id='$topicid'");
					$info2=mysqli_fetch_array($sql2);
					?>
                    <div style="color:#06C;">#<?php echo $info2['tp_content'];?>#</div>
                    <?php
					}
					?>
                </div>
            </div>
        </div>
        <?php
	}
?>
</div>