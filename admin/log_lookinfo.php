<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>博文查看</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.ban{width:1160px;height:40px;text-align:center;line-height:40px;}
.ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.ban a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}
.search{width:1160px;height:40px;text-align:center;}

.lg{width:1140px;margin:0 auto;}
.lg .lgrecord1 div, .lg .lgrecord div{display:inline-block;border-bottom:1px #999 solid;padding-left:10px;padding-right:10px;text-align:center;}
.lg .lgrecord1 .user, .lg .lgrecord .user{width:100px;}
.lg .lgrecord1 .log, .lg .lgrecord .log{width:280px;}
.lg .lgrecord1 .pic, .lg .lgrecord .pic{width:200px;}
.lg .lgrecord1 .top, .lg .lgrecord .top{width:160px;}
.lg .lgrecord1 .time, .lg .lgrecord .time{width:200px;}
.lg .lgrecord1 .check{}
.lg .lgrecord1 .detail {}

.lg .lgrecord div{vertical-align:top;}
.lg .lgrecord .user, .lg .lgrecord .pic, .lg .lgrecord .top, .lg .lgrecord .time, .lg .lgrecord .detail{height:80px;line-height:80px;}
.lg .lgrecord .log{height:80px;overflow:hidden;}
.lg .lgrecord .detail a{text-decoration:none;color:#000;}

#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #ff9406;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#ff9406;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}

#admin_log{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
<div id="banner">
	<?php include("top.php"); $ck=$_GET['ck']; include("conn.php");?>
</div>
<div id="content">
	<div class="ban"><a href="log_lookinfo.php?ck=1" <?php if($ck==1){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>未冻结博文</a><a href="log_lookinfo.php?ck=0" <?php if($ck==0){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>冻结博文</a></div>
    <div id="search" class="bar">
    	<form action="log_lookinfo.php" method="get">
        	<input type="text" placeholder="搜索用户id/博文id" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
			<input type="hidden" name="ck" value="<?php echo $ck;?>">
            <button type="submit"></button>
        </form>
    </div>
    
    <div class="lg">
    	<div class="lgrecord1">
        	<div class="user">用户id</div><div class="log">博文内容</div><div class="pic">图片</div><div class="top">话题</div><div class="time">发布时间</div><div class="detail">查看详情</div>
        </div>
        <div class="lgrecord">
        	<?php
			if(isset($_GET['user']) && $_GET['user']!=''){
				$user = $_GET['user'];
				$sql=mysqli_query("select * from tb_tk_log where log_state='$ck' and (log_id='$user' or log_uid='$user')",$conn);
			}else{
				$sql=mysqli_query("select * from tb_tk_log where log_state='$ck'",$conn);
			}
			while($info=mysqli_fetch_array($sql)){
				$topid=$info['log_topid'];
				$sql1=mysqli_query("select * from tb_tk_topic where tp_id='$topid'",$conn);
				$info1=mysqli_fetch_array($sql1);
			?>
            <div class="user"><?php echo $info['log_uid'];?></div><div class="log"><?php echo $info['log_content'];?></div><div class="pic"><img src="<?php echo '../'.$info['log_pic1'];?>" alt="" width=50><img src="<?php echo '../'.$info['log_pic2'];?>" alt="" width=50><img src="<?php echo '../'.$info['log_pic3'];?>" alt="" width=50></div><div class="top"><?php echo $info1['tp_top'];?></div><div class="time"><?php echo $info['log_time']; ?></div><div class="detail"><a href="log_gtlog_detail.php?id=<?php echo $info['log_id'];?>">查看详情</a></div>
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