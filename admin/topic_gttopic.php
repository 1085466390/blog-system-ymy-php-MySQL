<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>话题审核</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#content .bg{width:1140px;margin:0 auto;}
.gttopic{width:800px;border:1px #999 dashed;border-radius:20px;padding:10px;margin:0 auto;margin-bottom:10px;}
.gttopic a{text-decoration: none;color:#000;}
.gttopic a:hover{color:royalblue;}

.gttopic .gttopic_left{display:inline-block;width:700px;vertical-align: top;}
.gttopic .gttopic_right{display: inline-block;vertical-align: top;margin-top:2%;}

#admin_topic{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}

#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #ff9406;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#ff9406;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}
</style>
</head>

<body>
<div id="banner"><?php include("top.php"); include("conn.php");?></div>
<div id="content" style="padding-bottom:20px;padding-top:20px;">
	
	<div id="search" class="bar">
		<form action="topic_gttopic.php" method="get">
	    	<input type="text" placeholder="搜索用户id/话题id" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
	        <button type="submit"></button>
	    </form>
	</div>
	
	<div class="bg">
        <?php 
	       if(isset($_GET['user']) && $_GET['user']!=''){
			   $user = $_GET['user'];
			   $sql=mysqli_query("select * from tb_tk_topic join tb_tk_topicclass on tb_tk_topic.tp_classid=tb_tk_topicclass.tpclass_id where tp_state=0 and (tp_id='$user' or tp_uid='$user')",$conn);
		   }else{
			   $sql=mysqli_query("select * from tb_tk_topic join tb_tk_topicclass on tb_tk_topic.tp_classid=tb_tk_topicclass.tpclass_id where tp_state=0",$conn);
		   }
		   while($info=mysqli_fetch_array($sql)){
			   ?>
				<div class="gttopic">
					<div class="gttopic_left">
						<div>话题id：<?php echo $info['tp_id'];?></div>
						<div>用户id：<?php echo $info['tp_uid'];?></div>
						<div>话题名：<?php echo $info['tp_top'];?></div>
						<div>话题导语：<?php echo $info['tp_content'];?></div>
						<div>话题分类：<?php echo $info['tpclass_con'];?></div>
						<div>发布时间：<?php echo $info['tp_time'];?></div>
					</div>
					<div class="gttopic_right">
						<div style="margin-bottom:10px;"><a href="check_topic.php?ck=1&id=<?php echo $info['tp_id'];?>">通过</a></div>
						<div style="margin-bottom:10px;"><a href="check_topic.php?ck=2&id=<?php echo $info['tp_id'];?>">不通过</a></div>
						<div><a href="topic_gttopic_detail.php?id=<?php echo $info['tp_id'];?>">查看详情</a></div>
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