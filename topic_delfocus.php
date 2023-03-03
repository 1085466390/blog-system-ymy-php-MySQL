<?php
	include("conn.php");
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$tp_id=$_GET['id'];
	
	$sql=mysqli_query($conn,"delete from tb_tk_topicfocus where tpfc_tpid='$tp_id' and tpfc_uid='$uid'");
	$sql1=mysqli_query($conn,"update tb_tk_topic set tp_follow=tp_follow-1 where tp_id='$tp_id'");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('取消关注成功！');history.back();</script>";
	}else{
		echo "<script>alert('取消关注失败！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>