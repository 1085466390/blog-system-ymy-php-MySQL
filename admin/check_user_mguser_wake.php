<?php
    include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	$user = $_GET['id'];
	$sql=mysqli_query("update tb_tk_user set user_ustate=1 where user_uid='$user'",$conn);
	$user_name = $_GET['form_user_name'];
	$mail_con = "您好".$user_name."用户，您的账号被管理员解冻，现可正常使用！";
	if(!session_id()){session_start();}
	$aid = $_SESSION['adminid'];
	$time=date('Y-m-d H:i:s');
	
	$sql2 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_time,adtalk_con) values (NULL,'$aid','$user','$time','$mail_con')",$conn);
	if($sql&&$sql2){
		echo "<script>alert('操作成功！');window.location='user_mguser.php';</script>";
	}else{
		echo "<script>alert('操作失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>