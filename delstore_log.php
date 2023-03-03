<?php
	include("conn.php");
	
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$log_id=$_GET['id'];
	
	$sql=mysqli_query($conn,"delete from tb_tk_logstore where store_logid='$log_id' and store_uid='$uid'");
	$sql1=mysqli_query($conn,"update tb_tk_log set log_store=log_store-1 where log_id='$log_id'");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('取消收藏成功！');history.back();</script>";
	}else{
		echo "<script>alert('取消收藏失败！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>