<?php
include("conn.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

	if(!session_id()){session_start();}
	$aid = $_SESSION['adminid'];
	
$state = $_GET['ck'];
$tp_id = $_GET['id'];

$sql_q1 = mysqli_query("select * from tb_tk_topic join tb_tk_user on tb_tk_user.user_uid = tb_tk_topic.tp_uid where tp_id='$tp_id'",$conn);
$info_q1 = mysqli_fetch_array($sql_q1);
$tp_top = $info_q1['tp_top'];
$uname = $info_q1['user_uname'];
$user_id = $info_q1['user_uid'];

if($state==1){
	$mail_con="您好，用户".$uname.",您申请发布的话题：".$tp_top." 已通过！";
}else if($state==2){
	$mail_con="您好，用户".$uname.",您申请发布的话题：".$tp_top." 未被通过！";
}


$adtime=date('Y-m-d H:i:s');

$sql=mysqli_query("update tb_tk_topic set tp_aid='$aid',tp_adtime='$adtime',tp_state='$state' where tp_id='$tp_id'",$conn);
$sql1 = mysqli_query("insert into tb_tk_adtalkuser (adtalk_id,adtalk_aid,adtalk_uid,adtalk_time,adtalk_con) values (NULL,'$aid','$user_id','$adtime','$mail_con')",$conn);

if($sql && $sql1){
	echo "<script>alert('审核成功！');window.location='topic_gttopic.php';</script>";
}else{
	echo "<script>alert('审核失败，请重试！');history.back();</script>";
}

mysqli_close($conn);
?>