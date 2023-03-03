<?php

    include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	$user = $_POST['form_user'];
	if(!session_id()){session_start();}
	$aid = $_SESSION['adminid'];
	$user_name = $_POST['form_user_name'];
	$time = '+'.$_POST['Time'].' day';
	$adtime=date('Y-m-d H:i:s',strtotime($time));
		
	$sql=mysqli_query("update tb_tk_user set user_ustate=0, user_utime='$adtime' where user_uid='$user'",$conn);
	$mail_con = "您好".$user_name."用户，您的账号被管理员冻结，冻结时间至".$adtime."，可进行用户申诉解冻账户。";
	$sql2 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_time,adtalk_con) values (NULL,'$aid','$user','$time','$mail_con')",$conn);
	if($sql &&$sql2){
		echo "<script>alert('操作成功！');window.location='user_mguser.php';</script>";
	}else{
		echo "<script>alert('操作失败，请重试！');history.back();</script>";
	}
	

    mysqli_close($conn);

?>