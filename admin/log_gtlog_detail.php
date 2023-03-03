<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>话题详情</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#content .bg{margin:0 auto;border:2px #999 dashed;padding-left:50px;padding-right:50px;margin-left:20px;margin-right:20px;padding-top:20px;padding-bottom:20px;border-radius:20px;background-color:rgba(255,255,255,0.3);}
#content .back{margin-bottom:20px;margin-left:20px;}
#content .back a{text-decoration:none;color:#C63;font-size:18px;}
#content .button{margin:0 auto;width:300px;margin-top:20px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}

#admin_log{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
<div id="banner"><?php include("top.php"); include("conn.php"); $log_id=$_GET['id'];?></div>
<div id="content" style="padding-bottom:20px;padding-top:20px;">
<div class="back"><a href="javascript:history.back();">返回</a></div>
	<div class="bg">
    	<?php
		 $sql=mysqli_query("select * from tb_tk_log where log_id='$log_id'",$conn);
		 $info = mysqli_fetch_array($sql);
		?>
		<div>博文id：<?php echo $info['log_id'];?></div>
        <div>用户id：<?php echo $info['log_uid'];?></div>
        <div>博文内容：<?php echo $info['log_content'];?></div>
        <div>博文照片：<img src="<?php echo '../'.$info['log_pic1'];?>" width=50 alt=""><img src="<?php echo '../'.$info['log_pic2'];?>" width=50 alt=""><img src="<?php echo '../'.$info['log_pic3'];?>" width=50 alt=""></div>
        <div>发布时间：<?php echo $info['log_time'];?></div>
        <?php
		$topid=$info['log_topid'];
		$sql1=mysqli_query("select * from tb_tk_topic where tp_id='$topid'",$conn);
		$info1=mysqli_fetch_array($sql1);
		?>
        <div>话题：<?php echo $info1['tp_top'];?></div>
        <div>点赞数：<?php echo $info['log_tag'];?></div>
        <div>转发数：<?php echo $info['log_trans']; ?></div>
        <div>评论数：<?php echo $info['log_com']; ?></div>
        <div>收藏数：<?php echo $info['log_store']; ?></div>
        <div>博文状态：<?php if($info['log_state']){ echo "激活";}else{ echo "冻结"; }?></div>
        <?php 
		$aid=$info['log_adminid'];
		if($aid!=''){
		$sql2=mysqli_query("select * from tb_tk_admin where admin_id='$aid'",$conn);
		$info2=mysqli_fetch_array($sql2);
		?>
        <div>管理员：<?php echo $info2['admin_name'];?></div>
        <div>管理时间：<?php echo $info['log_adtime'];?></div>
        <div>管理原因类别：<?php echo $info['log_adreid'];?></div>
        <?php
		}
		?>
        <div></div>
    </div>
    <div class="button">
        <input type="submit" id="admit" name="admit" value="激活" style="margin-right:50px;" onclick="javascript:window.location='check_log.php?ck=1&id=<?php echo $log_id?>';">
        <input type="submit" id="disadmit" name="disadmit" value="冻结" onclick="javascript:window.location='check_log.php?ck=0&id=<?php echo $log_id?>';">
    </div>
</div>
<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>