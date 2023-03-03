<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>话题详情</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#content .bg{margin:0 auto;border:1px #000 dashed;padding-left:100px;padding-right:100px;margin-left:20px;margin-right:20px;padding-top:20px;padding-bottom:20px;border-radius:20px;background-color:rgba(255,255,255,0.3);}
#content .back{margin-bottom:20px;margin-left:20px;}
#content .back a{text-decoration:none;color:#C63;font-size:18px;}
#content .button{margin:0 auto;width:300px;margin-top:20px;}
input[type="submit"] {background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}

#admin_topic{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
<div id="banner"><?php include("top.php"); include("conn.php"); $tp_id=$_GET['id'];?></div>
<div id="content" style="padding-bottom:20px;padding-top:20px;">
<div class="back"><a href="javascript:history.back();">返回</a></div>
	<div class="bg">
    	<?php
		 $sql=mysqli_query("select * from tb_tk_topic join tb_tk_topicclass on tb_tk_topic.tp_classid=tb_tk_topicclass.tpclass_id where tp_id='$tp_id'",$conn);
		 $info = mysqli_fetch_array($sql);
		?>
        <div>话题id：<?php echo $info['tp_id'];?></div>
        <div>用户id：<?php echo $info['tp_uid'];?></div>
        <div>话题名：<?php echo $info['tp_top'];?></div>
        <div>话题导语：<?php echo $info['tp_content'];?></div>
        <div>话题类别：<?php echo $info['tpclass_con'];?></div>
        <div>上传时间：<?php echo $info['tp_time']?></div>
    </div>
    <div class="button">
        <input type="submit" id="admit" name="admit" value="通过" style="margin-right:50px;" onclick="javascript:window.location='check_topic.php?ck=1&id=<?php echo $tp_id?>';">
        <input type="submit" id="disadmit" name="disadmit" value="不通过" onclick="javascript:window.location='check_topic.php?ck=2&id=<?php echo $tp_id?>';">
    </div>
</div>
<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>