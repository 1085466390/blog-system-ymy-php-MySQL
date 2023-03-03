<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>话题查看</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.ban{width:1160px;height:40px;text-align:center;line-height:40px;}
.ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.ban a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}
.search{width:1160px;height:40px;text-align:center;}

#content .bg{width:1140px;margin:0 auto;}
#content .bg .tprecord{width:1140px;margin:0 auto;}
#content .bg .tprecord1 div{display:inline-block;border-bottom:1px #999 solid;padding-left:10px;padding-right:10px;text-align:center;}
#content .bg .tprecord div{display:inline-block;border-bottom:1px #999 solid;text-align:center;height:80px;vertical-align:top;padding-left:10px;padding-right:10px;}
#content .bg .tprecord .user,#content .bg .tprecord1 .user{width:100px;}
#content .bg .tprecord .con,#content .bg .tprecord1 .con{width:280px;}
#content .bg .tprecord .top,#content .bg .tprecord1 .top{width:280px;}
#content .bg .tprecord .tpclass,#content .bg .tprecord1 .tpclass{width:70px;}
#content .bg .tprecord .time,#content .bg .tprecord1 .time{width:200px;}
#content .bg .tprecord .check,#content .bg .tprecord1 .check{}
#content .bg .tprecord .detail,#content .bg .tprecord1 .detail{}

#content .bg .tprecord .user,#content .bg .tprecord .top,#content .bg .tprecord .tpclass,#content .bg .tprecord .time,#content .bg .tprecord .check,#content .bg .tprecord .detail{line-height:80px;}
#content .bg .tprecord .con{overflow:hidden;height:60px;padding-top:10px;padding-bottom:10px;text-align:left;}

#content .bg .tprecord .detail a{text-decoration:none;color:#000;}
#content .bg .tprecord .detail a:hover{color:#C66;}

#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #ff9406;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#ff9406;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}

#admin_topic{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
<div id="banner"><?php include("conn.php"); include("top.php"); $ck=$_GET['ck'];?></div>
<div id="content">
	<div class="ban"><a href="topic_lookinfo.php?ck=1" <?php if($ck==1){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>通过审核</a><a href="topic_lookinfo.php?ck=2" <?php if($ck==2){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>未通过审核</a><a href="topic_lookinfo.php?ck=0" <?php if($ck==0){echo "style='border-bottom:2px #ff9406 solid;'";} ?>>未审核</a></div>
    <div id="search" class="bar">
    	<form action="topic_lookinfo.php" method="get">
        	<input type="text" placeholder="搜索用户id/话题id" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
			<input type="hidden" name="ck" value="<?php echo $ck;?>">
            <button type="submit"></button>
        </form>
    </div>
    <div class="bg">
    	<div class="tprecord1">
        	<div class="user">用户id</div><div class="top">话题名</div><div class="con">话题导语</div><div class="tpclass">话题类别</div><div class="time">发布时间</div><div class="detail">查看详情</div>
        </div>
        <?php 
	       if(isset($_GET['user']) && $_GET['user']!=''){
			   $user = $_GET['user'];
			   $sql=mysqli_query("select * from tb_tk_topic join tb_tk_topicclass on tb_tk_topic.tp_classid=tb_tk_topicclass.tpclass_id where tp_state='$ck' and (tp_id='$user' or tp_uid='$user')",$conn);
		   }else{
			   $sql=mysqli_query("select * from tb_tk_topic join tb_tk_topicclass on tb_tk_topic.tp_classid=tb_tk_topicclass.tpclass_id where tp_state='$ck'",$conn);
		   }
		   while($info=mysqli_fetch_array($sql)){
			   ?>
           <div class="tprecord">
               <div class="user"><?php echo $info['tp_uid'];?></div><div class="top"><?php echo $info['tp_top'];?></div><div class="con"><?php echo $info['tp_content'];?></div><div class="tpclass"><?php echo $info['tpclass_con'];?></div><div class="time"><?php echo $info['tp_time'];?></div><div class="detail"><a href="topic_gttopic_detail.php?id=<?php echo $info['tp_id'];?>">查看详情</a></div>
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