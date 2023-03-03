<?php
	include("conn.php");
	
	$log_id=$_GET['id'];
	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$time=date('Y-m-d H:i:s');
	$tag_logord=$_GET['state'];
	
	$sql=mysqli_query($conn,"insert into tb_tk_tag (tag_id,tag_logid,tag_logord,tag_uid,tag_time) values (NULL,'$log_id','$tag_logord','$uid','$time')");
    if($tag_logord==1){$sql1=mysqli_query($conn,"update tb_tk_log set log_tag=log_tag+1 where log_id='$log_id'");}
	else if($tag_logord==2){$sql1=mysqli_query($conn,"update tb_tk_logtrans set trans_tag=trans_tag+1 where trans_id='$log_id'");}
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('点赞成功！');</script>";
		if($tag_logord==1){
		?>
        <script type="text/javascript">window.location="log_con_detail.php?id=<?php echo $log_id;?>&state=3&tran=1"</script>
        <?php
		}else if($tag_logord==2){
			?>
            <script type="text/javascript">window.location="trans_con_detail.php?id=<?php echo $log_id;?>&state=2&tran=1"</script>
            <?php
		}
	}else{
		echo "<script>alert('点赞失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>