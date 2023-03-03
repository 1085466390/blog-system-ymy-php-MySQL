<?php
    include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	$uid=$_GET['tuid'];    //举报人
	$uid1=$_GET['uid'];    //被举报人
	
	$reaid=$_POST['reason'];
	$reacon=$_POST['reason1'];
	
	$time=date('Y-m-d H:i:s');
	
	$sql=mysqli_query($conn,"insert into tb_tk_usercom (ucom_id,ucom_uid1,ucom_uid2,ucom_classid,ucom_content,ucom_time) values (NULL,'$uid','$uid1','$reaid','$reacon','$time')");
	if($sql){
		echo "<script>alert('举报成功，管理员将在七天内受理！');history.back();</script>";
	}else{
		echo "<script>alert('举报失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>