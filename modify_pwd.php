<?php
	include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if(!session_id()){session_start();} 
	if(isset($_SESSION['uid'])){$uid=$_SESSION['uid'];}
	
	$sql = mysqli_query("select * from tb_tk_user where user_uid='$uid'",$conn);
	$info = mysqli_fetch_array($sql);

	$pw_old = $_POST['pw_old'];
	if($info['user_pwd']!=$pw_old){
		echo "<script>alert('您输入的原密码错误，请重新输入！');history.back();</script>";
	}else{
		$pw_new = $_POST['pw_new'];
		$sql2 = mysqli_query("update tb_tk_user set user_pwd='$pw_new' where user_uid='$uid'",$conn);
		if($sql2){
			echo "<script>alert('修改成功！');window.location='personal.php?state=3&uid=8'</script>";
		}else{
			echo "<script>alert('很抱歉，修改失败，请重试！');history.back();</script>";
		}
	}
	
	mysqli_close($conn);
?>