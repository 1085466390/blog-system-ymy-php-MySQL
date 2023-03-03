<style type="text/css">
._hotlog{margin:0 auto;border:1px #693 dashed;width:1160px;margin-bottom:20px;padding-left:20px;padding-top:10px;}
._hotlog .hotlog-top .left{width:90px;display:inline-block;vertical-align:top;margin-right:20px;}
._hotlog .hotlog-top .right{width:1000px;display:inline-block;vertical-align:top;}
._hotlog .hotlog-top .right .collect{display:inline-block;float:right;text-align:center;height:30px;margin-right:20px;}
._hotlog .hotlog-top .right .collect a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
._hotlog .hotlog-top .right .content{margin-top:10px;}
._hotlog .hotlog-top .right .content:hover{cursor:pointer;}
._hotlog .hotlog-top .right .hotlog-img{margin-top:10px;}
._hotlog .hotlog-top .right .hotlog-img img{margin-right:10px;}
._hotlog .hotlog-topic{width:1160px;text-align:center;color:#36C;}
._hotlog .hotlog-topic a{text-decoration:none;color:#36C;}
._hotlog .hotlog-bottom{width:1160px;margin-top:10px;}
._hotlog .hotlog-bottom .func{display:inline-block;width:31%;text-align:center;}
._hotlog .hotlog-bottom .func a, ._hotlog .hotlog-top .right a{text-decoration:none;color:#000;}
._hotlog span{color:#999;}
</style>

<?php
	include("conn.php");
    if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$sql=mysqli_query($conn,"select * from tb_tk_log join tb_tk_user on tb_tk_user.user_uid=tb_tk_log.log_uid where log_uid='$uid' order by log_time desc");
	while($info=mysqli_fetch_array($sql)){
?>
<div class="_hotlog">
	<div class="hotlog-top">
    	<div class="left">
            <img src="<?php echo $info['user_upic'];?>" width="80px" alt="">
        </div>
        <div class="right">
        	<div class="title">
          	    <div><a href=""><?php echo $info['user_uname'];?></a></div>
                <span><?php echo $info['log_time'];?> &nbsp;&nbsp; <?php echo $info['log_store'];?>&nbsp;收藏</span>
                <?php
				if(!session_id()){session_start();}
				if(isset($_SESSION['uid'])){
					if($_SESSION['uid']!=$info['log_uid']){
						$uid=$_SESSION['uid'];$log_id=$info['log_id'];
						$sql4=mysqli_query($conn,"select * from tb_tk_logstore where store_logid='$log_id' and store_uid='$uid'");
						if(!$info4=mysqli_fetch_array($sql4)){
				?>
				<div class="collect"><a href="store_log.php?id=<?php echo $info['log_id'];?>">收藏</a></div>
                <?php
						}else{
							?>
                            <div class="collect"><a href="delstore_log.php?id=<?php echo $info['log_id'];?>">取消收藏</a></div>
                            <?php
						}
					}
				}
				?>
            </div>
            <div class="content" onclick="javascript:window.location='log_con_detail.php?id=<?php echo $log_id;?>';"><?php echo $info['log_content'];?></div>
            <div class="hotlog-img">
    	        <img src="<?php echo $info['log_pic1'];?>" alt="" width="80px"><img src="<?php echo $info['log_pic2'];?>" alt="" width="80px"><img src="<?php echo $info['log_pic3'];?>" alt="" width="80px">
            </div>
        </div>
    </div>    
    <?php 
	$tp_id=$info['log_topid'];
	$sql2=mysqli_query($conn,"select * from tb_tk_topic where tp_id='$tp_id'");
	$info2=mysqli_fetch_array($sql2);
	?>
    <div class="hotlog-topic"><a href=""><?php if($info2){}?></a></div>
    <div class="hotlog-topic"><?php if($info2){?> <a href="topic_con_detail.php?id=<?php echo $tp_id; ?>"> <?php echo "#".$info2['tp_top']."#"; ?> </a><?php } ?></div>
    <div class="hotlog-bottom">
        <div class="func" style="margin-left:10px;"><a href="log_con_detail.php?id=<?php echo $info['log_id'];?>&state=1">转发</a><span>&nbsp;&nbsp;<?php echo $info['log_trans'];?></span></div>&nbsp;|
        <div class="func"><a href="log_con_detail.php?id=<?php echo $info['log_id'];?>&state=2">评论</a><span>&nbsp;&nbsp;<?php echo $info['log_com'];?></span></div>&nbsp;|
        <div class="func"><a href="log_con_detail.php?id=<?php echo $info['log_id'];?>&state=3">点赞</a><span>&nbsp;&nbsp;<?php echo $info['log_tag'];?></span></div>
    </div>
</div>
<?php
	}
	?>