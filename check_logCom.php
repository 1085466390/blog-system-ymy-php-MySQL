<?php
	include("conn.php");
	
	$log_id=$_GET['id'];
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$com_content=$_POST['com_content'];
	$time=date('Y-m-d H:i:s');
	$comt_logord=$_GET['state'];
	
	$sql=mysqli_query($conn,"insert into tb_tk_comment (comt_id,comt_logid,comt_logord,comt_uid,comt_time,comt_content) values (NULL,'$log_id','$comt_logord','$uid','$time','$com_content')");
    if($comt_logord==1){$sql1=mysqli_query($conn,"update tb_tk_log set log_com=log_com+1 where log_id='$log_id'");}
	else if($comt_logord==2){$sql1=mysqli_query($conn,"update tb_tk_logtrans set trans_com=trans_com+1 where trans_id='$log_id'");}
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('评论成功！');</script>";
		if($comt_logord==1){
		?>
        <script type="text/javascript">window.location="log_con_detail.php?id=<?php echo $log_id;?>&state=2&tran=1"</script>
        <?php
		}else if($comt_logord==2){
			?>
            <script type="text/javascript">window.location="trans_con_detail.php?id=<?php echo $log_id;?>&state=1&tran=1"</script>
            <?php
		}
	}else{
		echo "<script>alert('评论失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>