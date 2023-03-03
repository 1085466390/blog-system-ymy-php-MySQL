<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户信息查看</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #c5464a;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#c5464a;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}

.ban{width:1160px;height:40px;text-align:center;line-height:40px;}
.ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.ban a:hover{padding-bottom:3px;border-bottom:2px #c5464a solid;transition: 0.5s all;}

.u{width:800px;margin:0 auto;}
.u .urecord{border:2px #999 dashed;border-radius:15px; margin-bottom:5px;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;background-color: rgba(255,255,255,0.3);}
.u .urecord .urecord_top div{display:inline-block;vertical-align: top;}
.u .urecord .urecord_top .top_uid{margin-right:20px;}
.u .urecord .uword,.u .urecord .ubgtime{margin-left:40px;margin-top:5px;}
.u .urecord .urecord_top .top_pic{margin-right:5px;}
.u .urecord .urecord_left{display:inline-block;}
.u .urecord .urecord_right{display:inline-block;float:right;margin-top:35px;}
.u .urecord .urecord_right a{text-decoration:none;color:#000;}
.u .urecord .urecord_right a:hover{color: #006699;}

#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
	<?php 
	if(!isset($_GET['ck']) || $_GET['ck']=='') echo "<script>window.location='user_lookinfo.php?ck=1';</script>";
	?>
<div id="banner">
	<?php include("top.php"); $ck=$_GET['ck']; include("conn.php");if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];}?>
</div>
<div id="content">
	<div class="ban"><a href="user_lookinfo.php?ck=1" <?php if($ck==1){echo "style='border-bottom:2px #c5464a solid;'";} ?>>普通用户</a><a href="user_lookinfo.php?ck=0" <?php if($ck==0){echo "style='border-bottom:2px #c5464a solid;'";} ?>>已管理用户</a></div>
    <div id="search" class="bar">
    	<form action="user_lookinfo.php?ck=<?php echo $ck;?>" method="get">
        	<input type="text" placeholder="搜索用户id/用户昵称" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
            <button type="submit"></button>
			<input type="hidden" name="ck" value="<?php echo $ck;?>">
        </form>
    </div>
    
    <div class="u">
		<div>
			<?php
			if(isset($s_user)){$sql = mysqli_query("select * from tb_tk_user where user_ustate='$ck' and (user_uid='$s_user' or user_uname='$s_user')",$conn);}
			else{$sql = mysqli_query("select * from tb_tk_user where user_ustate='$ck'",$conn);}
			while($info=mysqli_fetch_array($sql)){
				?>
				<div class="urecord">
					<div class="urecord_left">
					<div class="urecord_top">
						<div class="top_uid"><?php echo $info['user_uid'];?></div>
						<div class="top_pic"><img src="<?php echo '../'.$info['user_upic'];?>" width=50 height=50 alt=""></div>
						<div><?php echo $info['user_uname'];?></div>
					</div>
					<div class="uword">用户简介：<?php echo $info['user_uword'];?></div>
					<div class="ubgtime">注册时间：<?php echo $info['user_bgtime'];?></div>
					</div>
					<div class="urecord_right">
					<div><a href="user_lookinfo_detail.php?id=<?php echo $info['user_uid'];?>">查看详情</a></div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
    </div>
    
</div>
<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>