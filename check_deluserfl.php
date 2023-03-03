<?php

	include("conn.php");
	
	$flid=$_GET['flid'];
	$st=$_GET['st'];
	$t_uid=$_GET['tuid'];
	$uid1=$_GET['uid1'];
	$uid=$_GET['uid'];
	
	if($st==1 || $st==2){    //单向关注情况取关
		$sql=mysqli_query($conn,"delete from tb_tk_userfl where ufl_id='$flid'");
		$sql3=mysqli_query($conn,"update tb_tk_user set user_follow=CASE user_uid when '$t_uid' then user_follow-1 when '$uid' then user_follow end, user_follower=CASE user_uid when '$uid' then user_follower-1  when '$t_uid' then user_follower end where user_uid in ('$t_uid','$uid')");
	}else if($st==3){    //互相关注情况取关
		if($uid1==$t_uid){
			$sql=mysqli_query($conn,"update tb_tk_userfl set ufl_state=2 where ufl_id='$flid'");
		}else{
			$sql=mysqli_query($conn,"update tb_tk_userfl set ufl_state=1 where ufl_id='$flid'");
		}
		$sql3=mysqli_query($conn,"update tb_tk_user set user_follow=CASE user_uid when '$t_uid' then user_follow-1 when '$uid' then user_follow end, user_friend=CASE user_uid when '$t_uid' then user_friend-1 when '$uid' then user_friend-1 end, user_follower=CASE user_uid when '$uid' then user_follower-1  when '$t_uid' then user_follower end where user_uid in ('$t_uid','$uid') ");
	}
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
	if($sql && $sql3){
		echo "<script>alert('取消关注成功！');</script>";
	}else{
		echo "<script>alert('取消关注失败，请重试！');</script>";
	}
	
	echo "<script>history.back();</script>";
	
	mysqli_close($conn);

?>