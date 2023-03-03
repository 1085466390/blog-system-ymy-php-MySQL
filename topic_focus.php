<?php
	include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	$tp_id=$_GET['id'];
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$time=date('Y-m-d H:i:s');
	
	$sql=mysqli_query($conn,"update tb_tk_topic set tp_follow=tp_follow+1 where tp_id='$tp_id'");
	$sql1=mysqli_query($conn,"insert into tb_tk_topicfocus (tpfc_id,tpfc_tpid,tpfc_uid,tpfc_time) values (NULL,'$tp_id','$uid','$time')");
	
	if($sql && $sql1){
		echo "<script>alert('关注成功！');history.back();</script>";
	}else{
		echo "<script>alert('关注失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>