<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员信息查看</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.admin_info{padding-left:5px;padding-top:20px;padding-bottom:20px;}
.admin_info .info_top .id,.admin_info .info_top .name,.admin_info .info_top .pwd{border-bottom:1px #999 solid;width:33%;display:inline-block;text-align:center;height:20px;line-height:20px;}
.admin_info .info_bottom .id,.admin_info .info_bottom .name,.admin_info .info_bottom .pwd{border-bottom:1px #999 solid;width:33%;display:inline-block;text-align:center;height:30px;line-height:30px;}

#admin_admin{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
<div id="banner">
	<?php include("top.php"); ?>
    <?php include("conn.php"); ?>
</div>
<div id="content">

	<div class="admin_info">
    	<div class="info_top">
        	<div class="id">管理员id</div><div class="name">管理员名</div><div class="pwd">管理员密码</div>
        </div>
        
        <?php
		$sql=mysqli_query("select * from tb_tk_admin order by admin_id",$conn);
		while($info=mysqli_fetch_array($sql)){
		?>
        <div class="info_bottom">
        	<div class="id"><?php echo $info['admin_id'];?></div><div class="name"><?php echo $info['admin_name'];?></div><div class="pwd"><?php echo $info['admin_pwd'];?></div>
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