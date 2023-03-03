<?php 
if(!session_id()){
	session_start();
}
$uid=$_SESSION['uid'];
include("conn.php");
$sql = mysqli_query($conn,"select * from tb_tk_user where user_uid='$uid'");
$info = mysqli_fetch_array($sql);
?>
<link type="text/css" rel="styleSheet"  href="CSS/logged.css" />
<div class="logged">
	<div class="logged-top">
    	<div class="img"><img src="<?php echo $info['user_upic'];?>" alt="头像" width="80"></div>
        <div class="ucontent">
        	<div class="username"><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
            <div class="userword"><?php echo $info['user_uword'];?></div>
            <div class="useraction"><a href="user_friend.php?st=1&uid=<?php echo $info['user_uid'];?>">关注</a> <?php echo $info['user_follow'];?> | <a href="user_friend.php?st=2&uid=<?php echo $info['user_uid'];?>">粉丝</a> <?php echo $info['user_follower'];?> | <a href="user_friend.php?st=3&uid=<?php echo $info['user_uid'];?>">互相关注</a> <?php echo $info['user_friend'];?></div>
            <div class="useraction2" style="margin-top:5px;"><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>">博文</a> <?php echo $info['user_blog'];?></div>
        </div>
    </div>
</div>