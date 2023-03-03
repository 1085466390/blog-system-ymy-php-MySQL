<?php
	include("conn.php");
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	$t_uid=$_GET['tuid'];
	$uid=$_GET['uid'];
	$time=date('Y-m-d H:i:s');
	$state=1;
	
	if(isset($_GET['flid'])){    //双向关注
		$flid=$_GET['flid'];   
		$sql2=mysqli_query($conn,"update tb_tk_userfl set ufl_state=3 where ufl_id='$flid'");
		$sql3=mysqli_query($conn,"update tb_tk_user set user_follow=CASE user_uid when '$t_uid' then user_follow+1 when '$uid' then user_follow end, user_friend=CASE user_uid when '$t_uid' then user_friend+1 when '$uid' then user_friend+1 end, user_follower=CASE user_uid when '$uid' then user_follower+1  when '$t_uid' then user_follower end where user_uid in ('$t_uid','$uid') ");
	}else{    //单向关注
        $sql2=mysqli_query($conn,"insert into tb_tk_userfl (ufl_id,ufl_uid1,ufl_uid2,ufl_state,ufl_time) values (NULL,'$t_uid','$uid','$state','$time')");	        $sql3=mysqli_query($conn,"update tb_tk_user set user_follow=CASE user_uid when '$t_uid' then user_follow+1 when '$uid' then user_follow end, user_follower=CASE user_uid when '$uid' then user_follower+1  when '$t_uid' then user_follower end where user_uid in ('$t_uid','$uid')");
	}
	
	if($sql2 && $sql3){
		echo "<script>alert('关注成功！');</script>";
	}else{
		echo "<script>alert('关注失败，请重试！');</script>";
	}
	
	echo "<script>history.back();</script>";
	
	
	mysqli_close($conn);
?>