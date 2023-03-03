<style type="text/css">
.message_trans_title{padding-top:10px;padding-bottom:10px;padding-left:10px;font-size:18px;font-family:"黑体";margin-bottom:10px;}
.message_trans_con{}
.message_trans_con .message_trans_con_m{border-bottom:1px #ccc solid;margin-top:10px;padding-top:10px;padding-bottom:10px;display:flex;padding-left:10px;padding-right:10px;}
.message_trans_con .message_trans_con_m .left{display:inline-block;vertical-align:top;margin-right:15px;align-self:center;}
.message_trans_con .message_trans_con_m .right{display:inline-block;vertical-align:top;}
.message_trans_con .message_trans_con_m .right .right_left{display:inline-block;vertical-align:top;width:830px;}
.message_trans_con .message_trans_con_m .right .right_left .name{margin-bottom:5px;}
.message_trans_con .message_trans_con_m .right .right_left .name a{text-decoration:none;color:#000;}
.message_trans_con .message_trans_con_m .right .right_left .con{margin-bottom:5px;}
.message_trans_con .message_trans_con_m .right .right_left .con:hover{cursor:pointer;}
.message_trans_con .message_trans_con_m .right .right_left .time{color:#999;}
.message_trans_con .message_trans_con_m .right .right_right{float:right;display:inline-block;vertical-align:top;width:60px;height:60px;overflow:hidden;text-overflow: ellipsis;word-break: break-word;font-size: 14px; line-height: 15px;max-height: 4.285714285714286em;background-color:rgba(255,255,255,0.3);}
.message_trans_con .message_trans_con_m .right .right_right:hover{cursor:pointer;}
</style>

<div class="message_trans_title">转发我的</div>
<div class="message_trans_con">
<?php 
    include("conn.php");
    if(!session_id()){session_start();}
    $uid=$_SESSION['uid'];
	$sql=mysqli_query($conn,"select * from tb_tk_logtrans join tb_tk_log on tb_tk_logtrans.trans_logid=tb_tk_log.log_id where log_uid='$uid' order by trans_time desc");
	while($info=mysqli_fetch_array($sql)){
?>
	<div class="message_trans_con_m">
    <?php
	$trans_uid=$info['trans_uid'];
	$sql2=mysqli_query($conn,"select * from tb_tk_user where user_uid='$trans_uid'");
	$info2=mysqli_fetch_array($sql2);
	?>
    	<div class="left"><img src="<?php echo $info2['user_upic'];?>" width="50" alt=""></div>
        <div class="right">
        	<div class="right_left">
        	<div class="name"><a href="personal.php?state=1&uid=<?php echo $tag_uid;?>"><?php echo $info2['user_uname'];?></a></div>
            <div class="con" onClick="javascript:window.location='trans_con_detail.php?id=<?php echo $info['trans_id'];?>';">转发内容&nbsp;<?php echo $info['trans_content']; ?></div>
            <div class="time"><?php echo $info['trans_time']; ?></div>
            </div>
            <div class="right_right" onClick="javascript:window.location='log_con_detail.php?id=<?php echo $info['log_id'];?>';"><?php echo $info['log_content'];?></div>
        </div>
    </div>
    
    <?php
	}
	?>
</div>