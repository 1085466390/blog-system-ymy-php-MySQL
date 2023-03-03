<style type="text/css">
.message_comback_title{padding-top:10px;padding-bottom:10px;padding-left:10px;font-size:18px;font-family:"黑体";margin-bottom:10px;}
.message_comback_con{}
.message_comback_con .message_comback_con_m{border-bottom:1px #ccc solid;margin-top:10px;padding-top:10px;padding-bottom:10px;display:flex;padding-left:10px;padding-right:10px;}

.message_comback_con .message_comback_con_m .left{display:inline-block;vertical-align:middle;margin-right:15px;align-self:center;}
.message_comback_con .message_comback_con_m .right{display:inline-block;vertical-align:top;}

.message_comback_con .message_comback_con_m .right .right_left{display:inline-block;vertical-align:top;width:830px;} 
.message_comback_con .message_comback_con_m .right .right_left .name{margin-bottom:5px;}
.message_comback_con .message_comback_con_m .right .right_left .name a{text-decoration:none;color:#000;}
.message_comback_con .message_comback_con_m .right .right_left .con{margin-bottom:5px;}
.message_comback_con .message_comback_con_m .right .right_left .time{color:#999;}
.message_comback_con .message_comback_con_m .right .right_left .time a{text-decoration:none;color:#000;}

.message_comback_con .message_comback_con_m .right .right_right{float:right;display:inline-block;vertical-align:top;width:60px;height:60px;overflow:hidden;text-overflow: ellipsis;word-break: break-word;font-size: 14px; line-height: 15px;max-height: 4.285714285714286em;background-color:rgba(255,255,255,0.3);}
.message_comback_con .message_comback_con_m .right .right_right:hover{cursor:pointer;}
</style>

<div class="message_comback_title">回复我的</div>
<div class="message_comback_con">
<?php 
    include("conn.php");
    if(!session_id()){session_start();}
    $uid=$_SESSION['uid'];
	$sql=mysqli_query($conn,"select * from tb_tk_comtadd join tb_tk_comment on tb_tk_comtadd.add_comtid=tb_tk_comment.comt_id where add_uid2='$uid' order by add_time desc");
	while($info=mysqli_fetch_array($sql)){
?>
	<div class="message_comback_con_m">
    <?php
	$comt_uid=$info['add_uid'];
	$sql2=mysqli_query($conn,"select * from tb_tk_user where user_uid='$comt_uid'");
	$info2=mysqli_fetch_array($sql2);
	?>
    	<div class="left"><img src="<?php echo $info2['user_upic']; ?>" width="50" alt=""></div>
        <div class="right">
            <div class="right_left">
        	<div class="name"><a href="personal.php?state=1&uid=<?php echo $comt_uid;?>"><?php echo $info2['user_uname'];?></a></div>
            <div class="con"><?php echo $info['add_content']; ?></div>
            <div class="time"><?php echo $info['add_time']; ?>&nbsp;&nbsp;<a href="check_delcomtadd.php?id=<?php echo $info['add_id'];?>">删除</a></div>
            </div>
            <?php
			$log_id=$info['comt_logid'];
			if($info['comt_logord']==1){
				$sql3=mysqli_query($conn,"select * from tb_tk_log where log_id='$log_id'");
				$info3=mysqli_fetch_array($sql3);
			    ?>
                <div class="right_right" onClick="javascript:window.location='log_con_detail.php?id=<?php echo $log_id;?>';"><?php echo $info['comt_content']; ?></div>	
                <?php			
			}else if($info['comt_logord']==2){
				$sql3=mysqli_query($conn,"select * from tb_tk_logtrans where trans_id='$log_id'");
				$info3=mysqli_fetch_array($sql3);
				?>
                <div class="right_right" onClick="javascript:window.location='trans_con_detail.php?id=<?php echo $log_id;?>';"><?php if($info3['trans_content']!=""){echo $info3['trans_content'];}else{echo "转发博文";} ?></div>
                <?php
			}
			?>
			
        </div>
    </div>
    <?php
	}
	?>
</div>



