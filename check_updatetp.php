<?php 
include("conn.php");
if(!session_id()){session_start();}
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$uid=$_SESSION['uid'];
$top = $_POST['name'];
$content = $_POST['word'];
$classid = intval($_POST['class']);
$time=date('Y-m-d H:i:s');
$state=0;

$sql1=mysqli_query($conn,"insert into tb_tk_topic (tp_id,tp_uid,tp_top,tp_content,tp_classid,tp_time,tp_state) values (NULL,'$uid','$top','$content','$classid','$time','$state')");
if($sql){
	echo "<script>alert('发布成功，管理员将在7个工作日内进行审核。');window.location='topic.php';</script>";
}else{
	echo "<script>alert('发布失败，请重试！');history.back();</script>";
}

mysqli_close($conn);
?>