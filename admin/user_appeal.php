<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>私信用户</title>
<link rel="stylesheet" href="css/frame.css">
<style>
.choice{width:1160px;height:40px;text-align:center;line-height:40px;}
.choice a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.choice a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}

.appl_record .appl_record_con{border:2px #999 dashed;border-radius:15px;padding:10px;padding-left:30px;margin-bottom:10px;}
.appl_record_con .con_left, .appl_record_con .con_right{display:inline-block;vertical-align: top;}
.appl_record_con .con_right{margin-left:700px;margin-top:20px;}
.appl_record_con .con_right a{text-decoration:none;background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
.appclass{text-align:center;padding-top:10px;padding-bottom:10px;}
.appclass a{text-decoration:none;color:#000;margin-left:20px;margin-right:20px;}
.appclass a:hover{color: #006699;}

#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #ff9406;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#ff9406;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}

#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
	<?php
	if((!isset($_GET['ck']) || $_GET['ck']=='')) {echo "<script>window.location='user_appeal.php?ck=1';</script>";}
	$ck = $_GET['ck'];
	if((!isset($_GET['cl']) || $_GET['cl']=='')){echo "<script>window.location='user_appeal.php?ck=$ck&cl=0';</script>";}
	$cl = $_GET['cl'];
	?>
<div id="banner">
	<?php include("top.php"); include("conn.php"); if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];} if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];}?>
</div>
<div id="content">
	<div class="choice">
		<a href="user_appeal.php?ck=1" <?php if($ck==1){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>待审核</a><a href="user_appeal.php?ck=0" <?php if($ck==0){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>已审核</a>
	</div>
	<div class="appclass">
		<a href="user_appeal.php?ck=<?php echo $ck;?>&cl=0" <?php if(!isset($_GET['cl']) || $_GET['cl']==0) echo "style='color: #006699;';" ?>>全部</a>
		<?php
		$sql = mysqli_query("select * from tb_tk_applclass",$conn);
		while($info = mysqli_fetch_array($sql)){
		?>
		<a href="user_appeal.php?ck=<?php echo $ck;?>&cl=<?php echo $info['appclass_id'];?>" <?php if(isset($_GET['cl']) && $_GET['cl']==$info['appclass_id']) echo "style='color: #006699;';" ?>><?php echo $info['appclass_con'];?></a>
		<?php
		}
		?>
	</div>
	<div id="search" class="bar">
		<form action="user_appeal.php" method="get">
	    	<input type="text" placeholder="搜索用户id" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
	        <button type="submit"></button>
			<input type="hidden" name="ck" value="<?php echo $ck;?>">
			<input type="hidden" name="cl" value="<?php echo $cl;?>">
	    </form>
	</div>
    <div class="appl_record">
		<?php
		if($ck){
			if(!isset($_GET['cl']) || $_GET['cl']==0){
				if(isset($s_user)) $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is null and appl_uid='$s_user' order by appl_time desc",$conn);
				else $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is null order by appl_time desc",$conn);
			}else{
				if(isset($s_user)) $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is null and appclass_id='$cl' and appl_uid='$s_user' order by appl_time desc",$conn);
				else $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is null and appclass_id='$cl' order by appl_time desc",$conn);
			}
		}else{
			if(!isset($_GET['cl']) || $_GET['cl']==0){
				if(isset($s_user)) $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is not null and appl_uid='$s_user' order by appl_time desc",$conn);
				else $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is not null order by appl_time desc",$conn);
			}else{
				if(isset($s_user)) $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is not null and appclass_id='$cl' and appl_uid='$s_user' order by appl_time desc",$conn);
				else $sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_aid is not null and appclass_id='$cl' order by appl_time desc",$conn);
			}
		}
		if($ck==1){
		while($info = mysqli_fetch_array($sql)){
		?>
		<div class="appl_record_con">
			<div class="con_left">
				<div>用户id：<?php echo $info['appl_uid'];?></div>
				<div>申诉类别：<?php echo $info['appclass_con'];?></div>
				<div>申诉内容：<?php echo $info['appl_con'];?></div>
				<div>申诉时间：<?php echo $info['appl_time'];?></div>
			</div>
			<div class="con_right">
				<a href="aufit_appeal.php?applid=<?php echo $info['appl_id'];?>">进入审核</a>
			</div>
		</div>
		<?php 
		}}else{
			while($info = mysqli_fetch_array($sql)){
		?>
		<div class="appl_record_con">
			<div class="con_left">
				<div>用户id：<?php echo $info['appl_uid'];?></div>
				<div>申诉类别：<?php echo $info['appclass_con'];?></div>
				<div>申诉内容：<?php echo $info['appl_con'];?></div>
				<div>申诉时间：<?php echo $info['appl_time'];?></div>
				<div>审核管理员：<?php echo $info['appl_aid'];?></div>
				<div>审核时间：<?php echo $info['appl_atime'];?></div>
			</div>
		</div>
		<?php 
		}}
		?>
	</div>
</div>


<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>