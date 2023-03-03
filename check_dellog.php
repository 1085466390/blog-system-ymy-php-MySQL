<?php
    include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    $log_id=$_GET['id'];
	$st=$_GET['state'];
	
	if($st==1){$sql=mysqli_query($conn,"delete from tb_tk_log where log_id='$log_id'");}
	else if($st==2){
		$sql2=mysqli_query($conn,"update tb_tk_log set log_trans=log_trans-1 where log_id=(select trans_logid from tb_tk_logtrans where trans_id='$log_id')");
		$sql=mysqli_query($conn,"delete from tb_tk_logtrans where trans_id='$log_id'");
		}
	
	if($sql){
		if($st==2){
			if($sql2){echo "<script>alert('删除成功！');</script>";}
		}else{echo "<script>alert('删除成功！');</script>";}
	}else{
		echo "<script>alert('删除失败，请重试！');</script>";
	}
	
	echo "<script>history.back();</script>";
	
    mysqli_close($conn);
?>