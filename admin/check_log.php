<?php
include("conn.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$state = $_GET['ck'];
$log_id = $_GET['id'];
$adtime=date('Y-m-d H:i:s');

if(!session_id()){session_start();} 
$aid = $_SESSION['adminid'];

$sql_q = mysqli_query("select * from tb_tk_log join tb_tk_user on tb_tk_user.user_uid = tb_tk_log.log_uid where log_id='$log_id'",$conn);
$info_q = mysqli_fetch_array($sql_q);

$uname=$info_q['user_uname'];
$user_id=$info_q['user_uid'];
$log_content=$info_q['log_content'];
$log_con='';
for($i=0;$i<max(strlen($log_content),10);$i++) $log_con=$log_con.$log_content[$i];

if($state){
	$mail_con="您好，用户".$uname."，您发布的博文：".$log_con."... 被激活！";
}else{
	$mail_con="您好，用户".$uname."，您发布的博文：".$log_con."... 被冻结！";
}

$sql=mysqli_query("update tb_tk_log set log_adminid='$aid',log_adtime='$adtime',log_state='$state' where log_id='$log_id'",$conn);
$sql1 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_time,adtalk_con) values (NULL,'$aid','$user_id','$adtime','$mail_con')",$conn);
if($sql && $sql1){
	echo "<script>alert('操作成功！');window.location='log_lookinfo.php?ck=1';</script>";
}else{
	echo "<script>alert('操作失败，请重试！');history.back();</script>";
}

mysqli_close($conn);
?>