<?php
	include("conn.php");
	
	$log_id=$_GET['id'];
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$trans_content=$_POST['trans_content'];
	$time=date('Y-m-d H:i:s');
	$tag=0;
	$com=0;
	
	$sql=mysqli_query($conn,"insert into tb_tk_logtrans (trans_id,trans_logid,trans_uid,trans_time,trans_content,trans_tag,trans_com) values (NULL,'$log_id','$uid','$time','$trans_content','$tag','$com')");
    $sql1=mysqli_query($conn,"update tb_tk_log set log_trans=log_trans+1 where log_id='$log_id'");
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('转发成功！');</script>";
		?>
        <script type="text/javascript">window.location="log_con_detail.php?id=<?php echo $log_id;?>&state=1&tran=1"</script>
        <?php
	}else{
		echo "<script>alert('转发失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>