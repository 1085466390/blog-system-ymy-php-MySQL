<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>好友</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#pintro{width:1160px;padding-top:20px;padding-bottom:20px;text-align:center;}
#pintro .focus a{text-decoration:none;color:#000;}
#pintro .focus a:hover{color:#ff9406;}
#pintro .pintro_a{margin-top:10px;display:inline-block;text-align:center;height:30px;}
#pintro .pintro_a a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;margin-right:10px;}

#_banner{width:1160px;height:40px;text-align:center;line-height:40px;}
#_banner a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;}
#_banner a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}

#friend{width:1160px;}

#friend .friend_back{margin-top:10px;margin-left:20px;font-size:17px;}
#friend .friend_back a{text-decoration:none;color:#06C;}

#friend .friend_title{height:40px;margin-bottom:10px;padding-left:100px;font-size:18px;font-family:"黑体";padding-top:10px;}

#friend .user_fd{margin:0 auto;width:850px;border-bottom:1px #ccc solid;padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;}
#friend .user_fd .left{display:inline-block;vertical-align:top;margin-right:15px;}
#friend .user_fd .right{display:inline-block;vertical-align:top;}
#friend .user_fd .right .right_top{margin-bottom:5px;}
#friend .user_fd .right .right_top a{text-decoration:none;color:#000;}
#friend .user_fd .right .right_top span{color:#999;}
</style>
</head>

<body>

<?php include("banner.php"); include("conn.php");?>
<?php $uid=$_GET['uid']; $st=$_GET['st'];?>

<div class="content" style="margin-bottom:10px;">
<?php

$_GET['uid']=$uid; include("person_banner.php");
?>

<div id="friend">
	<div class="friend_back"><a href="personal.php?state=1&uid=<?php echo $uid;?>">返回</a></div>
	<div class="friend_title">
    	<?php
		if($st==1){
			echo "> 关注";
		}else if($st==2){
			echo "> 粉丝";
		}else if($st==3){
			echo "> 互相关注";
		}
		?>
    </div>
<?php

if($st==1){
	$sql=mysqli_query($conn,"select * from tb_tk_userfl where (ufl_uid1='$uid' and ufl_state=1) or (ufl_uid2='$uid' and ufl_state=2) or (ufl_uid1='$uid' and ufl_state=3) or (ufl_uid2='$uid' and ufl_state=3)");
}else if($st==2){
	$sql=mysqli_query($conn,"select * from tb_tk_userfl where (ufl_uid1='$uid' and ufl_state=2) or (ufl_uid2='$uid' and ufl_state=1) or (ufl_uid1='$uid' and ufl_state=3) or (ufl_uid2='$uid' and ufl_state=3)");
}else if($st==3){
	$sql=mysqli_query($conn,"select * from tb_tk_userfl where (ufl_uid1='$uid' and ufl_state=3) or (ufl_uid2='$uid' and ufl_state=3)");
}
while($info=mysqli_fetch_array($sql)){
	if($info['ufl_uid1']==$uid){
		$fd_uid=$info['ufl_uid2'];
	}else{
		$fd_uid=$info['ufl_uid1'];
	}
	$sql2=mysqli_query($conn,"select * from tb_tk_user where user_uid='$fd_uid'");
	$info2=mysqli_fetch_array($sql2);
	?>
    <div class="user_fd">
    	<div class="left"><img src="<?php echo $info2['user_upic'];?>" width="50" alt=""></div>
        <div class="right">
        	<div class="right_top"><a href="personal.php?state=1&uid=<?php echo $info2['user_uid'];?>"><?php echo $info2['user_uname'];?></a>&nbsp;&nbsp;<span>粉丝&nbsp;<?php echo $info2['user_follower'];?></span></div>
            <div class="right_bottom"><?php echo $info2['user_uword'];?></div>
        </div>
    </div>
    <?php
}
?>

</div>

</div>

<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>

</body>
</html>