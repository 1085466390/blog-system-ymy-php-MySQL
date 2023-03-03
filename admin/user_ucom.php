<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户举报管理</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.ban{width:1160px;height:40px;text-align:center;line-height:40px;}
.ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.ban a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}
.search{width:1160px;height:40px;text-align:center;}

.u{width:1160px;margin:0 auto;}
.u .urecord{border:2px #999 dashed;background-color:rgba(255,255,255,0.3);border-radius:15px;margin-bottom:10px;padding:10px;}
.u .urecord .urecord_left, .u .urecord .urecord_right{display:inline-block;vertical-align:top;}
.u .urecord .urecord_left{margin-right:300px;}

.u .urecord .urecord_button{display: inline-block;float:right;margin-right:20px;margin-top:25px;}
.u .urecord .urecord_button a{text-decoration:none;background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:50px;text-align:center;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #ff9406;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#ff9406;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}

.choice{width:1160px;height:40px;text-align:center;line-height:40px;}
.choice a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.choice a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}

.appclass{text-align:center;padding-top:10px;padding-bottom:10px;}
.appclass a{text-decoration:none;color:#000;margin-left:20px;margin-right:20px;}
.appclass a:hover{color: #006699;}

#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
	<?php
	if((!isset($_GET['ck']) || $_GET['ck']=='')) {echo "<script>window.location='user_ucom.php?ck=1';</script>";}
	$ck = $_GET['ck'];
	if((!isset($_GET['cl']) || $_GET['cl']=='')) {echo "<script>window.location='user_ucom.php?ck=$ck&cl=0';</script>";}
	$cl = $_GET['cl'];
	?>
<div id="banner">
	<?php include("top.php"); include("conn.php"); if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];}?>
</div>
<div id="content">
	<div class="choice">
		<a href="user_ucom.php?ck=1" <?php if($ck==1){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>待审核</a><a href="user_ucom.php?ck=0" <?php if($ck==0){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>已审核</a>
	</div>
	<div class="appclass">
		<a href="user_ucom.php?ck=<?php echo $ck;?>&cl=0" <?php if(!isset($_GET['cl']) || $_GET['cl']==0) echo "style='color: #006699;';" ?>>全部</a>
		<?php
		$sql = mysqli_query("select * from tb_tk_usercomclass",$conn);
		while($info = mysqli_fetch_array($sql)){
		?>
		<a href="user_ucom.php?ck=<?php echo $ck;?>&cl=<?php echo $info['ucomcl_id'];?>" <?php if(isset($_GET['cl']) && $_GET['cl']==$info['ucomcl_id']) echo "style='color: #006699;';" ?>><?php echo $info['ucomcl_con'];?></a>
		<?php
		}
		?>
	</div>
    <div id="search" class="bar">
    	<form action="user_ucom.php" method="get">
        	<input type="text" placeholder="搜索用户id" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
			<input type="hidden" name="ck" id="ck" value="<?php echo $ck;?>">
			<input type="hidden" name="cl" id="cl" value="<?php echo $cl;?>">
            <button type="submit"></button>
        </form>
    </div>
    
    <div class="u">
		<div>
			<?php
			if($ck){
				if(!isset($_GET['cl']) || $_GET['cl']==0){
					if(isset($s_user)) $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where ucom_uid1='$s_user' or ucom_uid2='$s_user' and ucom_aid is null",$conn);
					else $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where ucom_aid is null",$conn);
				}else{
					if(isset($s_user)) $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where (ucom_uid1='$s_user' or ucom_uid2='$s_user') and ucomcl_id='$cl' and ucom_aid is null",$conn);
					else $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where ucomcl_id='$cl' and ucom_aid is null",$conn);
				}
			}else{
				if(!isset($_GET['cl']) || $_GET['cl']==0){
					if(isset($s_user)) $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where ucom_uid1='$s_user' or ucom_uid2='$s_user' and ucom_aid is not null",$conn);
					else $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where ucom_aid is not null ",$conn);
				}else{
					if(isset($s_user)) $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where (ucom_uid1='$s_user' or ucom_uid2='$s_user') and ucomcl_id='$cl' and ucom_aid is not null",$conn);
					else $sql=mysqli_query("select * from tb_tk_usercom join tb_tk_usercomclass on tb_tk_usercom.ucom_classid=tb_tk_usercomclass.ucomcl_id where ucomcl_id='$cl' and ucom_aid is not null",$conn);
				}
			}
			
			if($ck){
			while($info=mysqli_fetch_array($sql)){
			?>
			<div class="urecord">
				<div class="urecord_left">
					<div>举报用户id：<?php echo $info['ucom_uid1'];?>&nbsp;&nbsp;&nbsp;&nbsp;被举报用户id：<?php echo $info['ucom_uid2'];?></div>
					<div>举报时间：<?php echo $info['ucom_time'];?></div>
					<div>举报理由：<?php echo $info['ucomcl_con'];?></div>
					<div>其他理由：<?php echo $info['ucom_content'];?></div>
				</div>
				<div class="urecord_button">
					<a href="check_userucom.php?ucomid=<?php echo $info['ucom_id'];?>&uid=<?php echo $info['ucom_uid1'];?>">受理</a>
				</div>
			</div>
			<?php
			}}else{
				while($info=mysqli_fetch_array($sql)){
			?>
			<div class="urecord">
				<div class="urecord_left">
					<div>举报用户id：<?php echo $info['ucom_uid1'];?>&nbsp;&nbsp;&nbsp;&nbsp;被举报用户id：<?php echo $info['ucom_uid2'];?></div>
					<div>举报时间：<?php echo $info['ucom_time'];?></div>
					<div>举报理由：<?php echo $info['ucomcl_con'];?></div>
					<div>其他理由：<?php echo $info['ucom_content'];?></div>
				</div>
				<div class="urecord_right">
					<div>受理管理员id：<?php echo $info['ucom_aid'];?></div>
					<div>受理时间：<?php echo $info['ucom_atime'];?></div>
				</div>
			</div>
			<?php
			}}
			?>
		</div>
    </div>
    
</div>


<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>