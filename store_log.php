<?php
	include("conn.php");

	$log_id=$_GET['id'];
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$time=date('Y-m-d H:i:s');
	
	$sql=mysqli_query($conn,"insert into tb_tk_logstore (store_id,store_logid,store_uid,store_time) values (NULL,'$log_id','$uid','$time')");
	$sql1=mysqli_query($conn,"update tb_tk_log set log_store=log_store+1 where log_id='$log_id'");
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('收藏成功！');history.back();</script>";
	}else{
		echo "<script>alert('收藏失败，请重试！');history.back();</script>";
	}

	mysqli_close($conn);
?>