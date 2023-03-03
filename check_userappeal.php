<?php
    include("conn.php");
	$uid=$_POST['user_uid'];
	$reaid=$_POST['reason1'];
	$appl_reason = $_POST['appl_reason'];
	$time=date('Y-m-d H:i:s');
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	$sql=mysqli_query($conn,"insert into tb_tk_userappl (appl_id,appl_classid,appl_uid,appl_con,appl_time) values (NULL,'$reaid','$uid','$appl_reason','$time')");
	if($sql){
		echo "<script>alert('申诉成功，管理员将在七天内受理！');history.back();</script>";
	}else{
		echo "<script>alert('申诉失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>