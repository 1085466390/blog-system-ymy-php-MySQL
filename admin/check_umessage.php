<?php
	include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	
	if(!session_id()){session_start();}
	$admin_id = $_SESSION['adminid'];
	
	$user_id = $_POST['user_id'];
	$mail_con = $_POST['mail_con'];
	
	$sql = mysqli_query("select * from tb_tk_user where user_uid = '$user_id'",$conn);
	$info = mysqli_fetch_array($sql);
	if($info){
		$time=date('Y-m-d H:i:s');
		$sql1 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_time,adtalk_con) values (NULL,'$admin_id','$user_id','$time','$mail_con')",$conn);
		if($sql1){
			echo "<script>alert('私信成功！');history.back();</script>";
		}else{
			echo "<script>alert('私信失败，请重试！');history.back();</script>";
		}
	}else{
		echo "<script>alert('不存在此用户！');history.back();</script>";
	}
?>