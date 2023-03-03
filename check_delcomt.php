<?php
    include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    $comt_id=$_GET['id'];
	$st=$_GET['state'];
	
	$sql = mysqli_query($conn,"delete from tb_tk_comment where comt_id='$comt_id'");
	
	if($sql){
		echo "<script>alert('删除成功！');</script>";
	}else{
		echo "<script>alert('删除失败，请重试！');</script>";
	}
	
	echo "<script>history.back();</script>";
	
    mysqli_close($conn);
?>