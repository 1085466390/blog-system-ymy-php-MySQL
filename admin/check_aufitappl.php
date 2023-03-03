<?php 
	include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	
	if(!session_id()){session_start();}
	$admin_id = $_SESSION['adminid'];
	$adtime=date('Y-m-d H:i:s');
	
	$choice = $_POST['choice'];
	$applid = $_POST['applid'];
	$mail_con = $_POST['mail_con'];
	$uid = $_POST['appluid'];
	
	if($choice){
		$mail_con = "管理员已审核您的申诉，申诉已通过，理由：".$mail_con; 
	}else{
		$mail_con = "管理员已审核您的申诉，申诉未通过，理由：".$mail_con;
	}
	
	$sql = mysqli_query("update tb_tk_userappl set appl_aid='$admin_id',appl_atime='$adtime' where appl_id='$applid'",$conn);
	$sql2 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_con,adtalk_time) values (NULL,'$admin_id','$uid','$mail_con','$adtime')",$conn);
	
	if($sql && $sql2){
		echo "<script>alert('操作成功！');window.location='user_appeal.php?ck=1&cl=0';</script>";
	}else{
		echo "<script>alert('操作失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>