<style type="text/css">
.sysadmin_title{height:30px;line-height:30px;padding-left:20px;font-size:18px;}
.sysadmin_con{height:450px;margin-top:20px;overflow-y: auto;}
.sysadmin_con1{margin-bottom:20px;}

.sysadmin_con1_left{width:50px;display:inline-block;vertical-align:top;margin-right:20px;}
.sysadmin_con1_right{width:900px;display:inline-block;vertical-align:top;}
.sysadmin_con1_right .right_top{font-size:18px;font-weight:500;height:40px;line-height:40px;}
.sysadmin_con1_right .right_top span{color:#999;margin-left:10px;font-weight:500;font-size:16px;}
.sysadmin_con1_right .right_top .button{display:inline-block;margin-left:50px;}
.sysadmin_con1_right .right_top .button a{text-decoration:none;color:#000;}
.sysadmin_con1_right .right_top .button a:hover{color:#069;}
.sysadmin_con1_right .right_bottom{margin-top:10px;}
.sysadmin_con1_right .right_bottom img{margin-right:10px;}

.mess_con{border:2px #999 dashed;padding:20px;border-radius:15px;margin-bottom:10px;}
.mess_con .mess_con_b{margin-top:10px;}
.mess_con .mess_con_p span{color:#999;}
.mess_con .mess_con_p .ad{display:inline-block;font-weight:600;font-size:15px;}
</style>

<?php
	include("conn.php");
?>
<div class="sysadmin_title">>&nbsp;系统管理员消息</div>

<div class="sysadmin_con">
<?php
    if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	
	$sql = mysqli_query($conn,"select * from tb_tk_adtalkuser join tb_tk_admin on tb_tk_admin.admin_id = tb_tk_adtalkuser.adtalk_aid where adtalk_uid='$uid' order by adtalk_time desc");
	while($info = mysqli_fetch_array($sql)){
?>
	<div class="mess_con">
		<div class="mess_con_p"><div class="ad"><?php echo $info['admin_name'];?></div>&nbsp;&nbsp;<span><?php echo $info['adtalk_time'];?></span></div>
		<div class="mess_con_b">：&nbsp;&nbsp;<?php echo $info['adtalk_con'];?></div>
	</div>
<?php 
}
?>
</div>