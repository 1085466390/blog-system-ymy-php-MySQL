<?php
	include("conn.php");
	
	$log_id=$_GET['id'];
	$comt=$_GET['comt'];
	$uid=$_GET['uid'];
	if(!session_id()){session_start();}
	$uid2=$_SESSION['uid'];
	$st=$_GET['state'];
	
	$adcom_content=$_POST['adcom_content'];
	$time=date('Y-m-d H:i:s');
	
	$sql=mysqli_query($conn,"insert into tb_tk_comtadd (add_id,add_comtid,add_uid,add_uid2,add_content,add_time) values (NULL,'$comt','$uid','$uid2','$adcom_content','$time')");
    if($st==1){$sql1=mysqli_query($conn,"update tb_tk_log set log_com=log_com+1 where log_id='$log_id'");}
	else if($st==2){$sql1=mysqli_query($conn,"update tb_tk_logtrans set trans_com=trans_com+1 where trans_id='$log_id'");}
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql&&$sql1){
		echo "<script>alert('追评成功！');</script>";
		if($st==1){
		?>
        <script type="text/javascript">window.location="log_con_detail.php?id=<?php echo $log_id;?>&state=2&tran=1"</script>
        <?php
		}else if($st==2){
			?>
            <script type="text/javascript">window.location="trans_con_detail.php?id=<?php echo $log_id;?>&state=1&tran=1"</script>
            <?php
		}
	}else{
		echo "<script>alert('追评失败，请重试！');history.back();</script>";
	}
	
	mysqli_close($conn);
?>