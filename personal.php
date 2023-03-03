<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
#banner2 .left .left_personal{background-color:#507884;color:#FFF;border-radius:5px;}
</style>
<title>个人中心</title>
</head>

<body>
<?php include("banner.php");?>
<?php $uid=$_GET['uid']; ?>
<div id="content">
	<?php  $_GET['uid']=$uid; include("person_banner.php");
		if(!session_id()){session_start();}
    	if(isset($_SESSION['uid'])){$t_uid=$_SESSION['uid'];}
	?>
    
     <div id="_banner">
    <?php
	$state=$_GET['state'];
	if( isset($_SESSION['uid']) && $t_uid==$uid ){
	?>
    	<a href="personal.php?state=1&uid=<?php echo $uid;?>" <?php if($state==1){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>博文</a><a href="personal.php?state=2&uid=<?php echo $uid;?>" <?php if($state==2){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>话题</a><a href="personal.php?state=3&uid=<?php echo $uid;?>" <?php if($state==3){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>个人信息</a>
        <a href="message.php?st=1" <?php if($state==4){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>我的消息</a>
        <a href="user_bin.php" <?php if($state==5){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>草稿箱</a>
        <?php
	}else{
		?>
        <a href="personal.php?state=1&uid=<?php echo $uid;?>" <?php if($state==1){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>博文</a><a href="personal.php?state=2&uid=<?php echo $uid;?>" <?php if($state==2){echo "style='padding-bottom:3px;border-bottom:2px #ff9406 solid;'";} ?>>话题</a>
        <?php
	}
	?>
    </div>
    
    <?php
	if(isset($_SESSION['uid']) && $uid=$t_uid){
	if(isset($_GET['state'])){
        $state=$_GET['state'];
		if($state==1){$_GET['uid']; include("person_self.php");}
		else if($state==2){$_GET['uid']; include("person_topic.php");}
		else if($state==3){$_GET['uid']; include("personIntro.php");}
	}
	}else{
		if(isset($_GET['state'])){
        $state=$_GET['state'];
		if($state==1){$_GET['uid']; include("person_self.php");}
		else if($state==2){$_GET['uid']; include("person_topic.php");}
		}
	}
	?>
</div>


<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>

</body>
</html>
