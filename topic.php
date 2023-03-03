<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#_banner{width:1160px;height:40px;text-align:center;line-height:40px;}
#_banner a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;}
#_banner a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}
#uptopic{width:833px;height:40px;line-height:40px;text-align:center;}
#uptopic a{display:inline-block;width:100px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
#topic-top{width:300px;height:40px;font-size:20px;font-weight:600px;font-family:"黑体";}
#topic-bottom div{margin:0 auto;padding-bottom:5px;border-bottom:1px #CCC solid;width:250px;height:30px;text-align:center;margin-top:5px;line-height:30px;margin-bottom:10px;}
#topic-bottom div a{text-decoration:none;font-size:18px;font-family:"黑体";color:#000;}

#topic_con{margin:0 auto;width:833px;font-family:"黑体";padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;border-bottom:1px #CCC solid;}
#topic_con .title a{text-decoration:none;color:#000;font-size:20px;font-weight:600;}
#topic_con .time{color:#999;font-size:16px;}
#topic_con .time .flw{display:inline-block;float:right;text-align:center;height:30px;}
#topic_con .time .flw a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
#topic_con .author{margin-top:10px;}
#topic_con .author a{text-decoration:none;color:#000;}
#banner2 .left .left_topic{background-color:#507884;color:#FFF;border-radius:5px;}
</style>
<title>话题</title>
</head>

<body>
<?php include("banner.php"); ?>
<?php include("conn.php"); ?>
<?php if(!session_id()){session_start();}?>
<div id="content">  
    <div id="left">
    	<div id="topic" style="margin-top:30px;">
        	<div id="topic-top">&nbsp;&nbsp;话题分类</div>
        	<div id="topic-bottom">
            	<div><a href="topic.php" <?php if(!isset($_GET['clid'])){?> style="color:#63F;" <?php } ?>>全部</a></div>
            <?php
			    $sql = mysqli_query($conn,"select * from tb_tk_topicclass");
				while($info=mysqli_fetch_array($sql)){
					?>
                    <div><a href="topic.php?clid=<?php echo $info['tpclass_id'];?>" <?php if(isset($_GET['clid'])){if($_GET['clid']==$info['tpclass_id']){ ?> style="color:#63f;" <?php }} ?> ><?php echo $info['tpclass_con'];?></a></div>
                    <?php
				}
			?>
            </div>
        </div>
    </div>
    <div id="right">
    	<div id="search" class="bar">
        	<form action="search.php" method="get">
            	<input type="text" placeholder="搜索博文/话题/用户" name="keywd" style="width:400px;">
				<input type="hidden" name="ck" id="ck" value="3">
	            <button type="submit"></button>
            </form>
        </div>
        <br>
        <?php
		if(!session_id()){session_start();}
		if(isset($_SESSION['uid'])){
			?>
        <div id="uptopic"><a href="sdtopic.php<?php if(isset($_GET['clid'])){ ?> ?clid=<?php echo $_GET['clid'];?> <?php } ?>">发布话题</a></div>
        <br>
        <?php
		}
        ?>
        <?php 
		if(isset($_GET['clid'])){
			$clid=$_GET['clid'];
			$sql = mysqli_query($conn,"select * from tb_tk_topic join tb_tk_user on tb_tk_topic.tp_uid=tb_tk_user.user_uid where tp_state=1 and tp_classid='$clid'");
		}else{
		    $sql = mysqli_query($conn,"select * from tb_tk_topic join tb_tk_user on tb_tk_topic.tp_uid=tb_tk_user.user_uid where tp_state=1");
		}
		while($info = mysqli_fetch_array($sql)){
		?>
        <div style="margin-bottom:20px;">
        	<div id="topic_con">
	            <div class="title"><a href="topic_con_detail.php?id=<?php echo $info['tp_id'];?>"><?php echo $info['tp_top'];?></a></div>
                <div class="time"><?php echo $info['tp_adtime'];?>&nbsp;&nbsp;关注量 <?php echo $info['tp_follow'];?> 讨论数 <?php echo $info['tp_log'];?>
                <?php
				if(isset($_SESSION['uid'])){
					$uid=$_SESSION['uid'];
					$tp_id = $info['tp_id'];
					
					if($info['tp_uid']==$uid){$t=1;} //话题发布者
					else{
    				    $sql2=mysqli_query($conn,"select * from tb_tk_topicfocus where tpfc_tpid='$tp_id' and tpfc_uid='$uid'");
					    $info2=mysqli_fetch_array($sql2);
						if($info2) $t=2; //已关注者
						else $t=0; //未关注者
					}
				}else{
					$t=0; //未登录者
				}
				
				if(!$t){
				?>
                	<div class="flw"><a href="<?php if(isset($_SESSION['uid'])){?> topic_focus.php?id=<?php echo $info['tp_id'];?> <?php }else{?> user_login.php <?php }?>">关注</a></div>
                    <?php
				}else if($t==2){
					?>
                    <div class="flw"><a href="topic_con_detail.php?id=<?php echo $info['tp_id'];?>">已关注</a></div>
                    <?php
				}
				?>
                </div>
                <div class="author">发布者：<a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
                <div class="tutor">话题导语：<?php echo $info['tp_content'];?></div>
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
