<?php
    include("conn.php");
	
	$uid1=$_GET['uid1'];
	$uid2=$_GET['uid2'];
	$time=date('Y-m-d H:i:s');
	$con=$_POST['mail_con'];
	
	$sql=mysqli_query($conn,"insert into tb_tk_usertalk (utalk_id,utalk_uid1,utalk_uid2,utalk_con,utalk_time) values (NULL,'$uid1','$uid2','$con','$time')");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql){
		echo "<script>alert('发送成功');</script>";
	}else{
		echo "<script>alert('发送失败！')</script>";
	}
	
	echo "<script>window.location='message.php?st=1&uid=$uid2';</script>";
	
	mysqli_close($conn);
?>