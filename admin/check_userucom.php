<?php
	include("conn.php");
	$ucomid = $_GET['ucomid'];
	
	if(!session_id()){session_start();}
	$aid = $_SESSION['adminid'];
	
	$uid = $_GET['uid'];
	$time=date('Y-m-d H:i:s');
	
	$sql = mysqli_query("update tb_tk_usercom set ucom_aid='$aid',ucom_atime='$time' where ucom_id='$ucomid'",$conn);

	$sql1 = mysqli_query("select * from tb_tk_user where user_uid = '$uid'",$conn);
	$info1 = mysqli_fetch_array($sql1);
	$con = "您好，用户".$info1['user_uname']."，您的举报".$ucomid."号已被管理员受理！";
	
	$sql2 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_time,adtalk_con) values (NULL,'$aid','$uid','$time','$con')",$conn);
	
	if($sql && $sql2){
		echo "<script>alert('受理成功！');window.location='user_ucom.php?ck=1&cl=0';</script>";
	}else{
		echo "<script>alert('受理失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>