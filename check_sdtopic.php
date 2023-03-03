<?php
include("conn.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
if(!session_id()){session_start();}
if(!isset($_SESSION['uid'])){
	echo "<script>alert('请先登录！');window.location='user_login.php';</script>";
}else{
    $uid = $_SESSION['uid'];
}

$top = $_POST['top'];
$content = $_POST['con'];
$classid = $_POST['classid'];
$time=date('Y-m-d H:i:s');
$state = 0;
$follow = 0;
$log = 0;

$sql1 = mysqli_query($conn,"elect tp_top, tp_id from tb_tk_topic");
$st=1;
while($info1 = mysqli_fetch_array($sql1)){
	if($info1['tp_top']==$top){
		$tpid=$info1['tp_id'];
		$st=0;
		echo "<script>alert('已存在该话题，快去讨论吧！');</script>";
		?>
        <script type="text/javascript">window.location='topic_con_detail.php?id=<?php echo $tpid;?>';</script>
        <?php
	}
}

if($st){
	$sql =  mysqli_query($conn,"insert into tb_tk_topic (tp_id,tp_uid,tp_top,tp_content,tp_classid,tp_time,tp_state,tp_follow,tp_log) values (NULL,'$uid','$top','$content','$classid','$time','$state','$follow','$log')");
	
	if($sql){
		echo "<script>alert('成功，请等待管理员的审核！');window.location='topic.php';</script>";
	}else{
		echo "<script>alert('发布失败，请重试！');history.back();</script>";
	}
}

mysqli_close($conn);
?>