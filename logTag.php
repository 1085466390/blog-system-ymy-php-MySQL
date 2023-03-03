<style type="text/css">
.logTag{width:1160px;}

.logTag .tag{width:1160px;display:inline-block;text-align:center;height:30px;padding-top:10px;padding-bottom:10px;}
.logTag .tag a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}

.logTag .tagrecord{padding-left:20px;padding-top:10px;padding-bottom:10px;padding-right:20px;}
.logTag .tagrecord .tag1{border-bottom:2px #999 solid;padding-bottom:10px;padding-top:10px;}
.logTag .tagrecord .tag1 .img{display:inline-block;vertical-align:top;margin-right:10px;}
.logTag .tagrecord .tag1 .con{display:inline-block;vertical-align:top;}
.logTag .tagrecord .tag1 .tg_top_pic{}
.logTag .tagrecord .tag1 .tg_top_name{font-size:20px;font-weight:600px;margin-right:20px;}
.logTag .tagrecord .tag1 .tg_top_name a{text-decoration:none;color:#000;}
.logTag .tagrecord .tag1 .tg_top_time{color:#999;}
</style>

<div class="logTag">
<?php $log_id=$_GET['id']; if(!session_id()){session_start();} include("conn.php");?>
	<div class="tag">
    <?php 
	if(isset($_SESSION['uid'])){
		$uid=$_SESSION['uid'];
		$sql=mysqli_query($conn,"select * from tb_tk_tag where tag_logord=1 and tag_logid='$log_id' and tag_uid='$uid'");
		if($info=mysqli_fetch_array($sql)){
	?>
    	<a href="check_dellogTag.php?id=<?php echo $log_id;?>&state=1">取消点赞</a>
    <?php
		}else{
	?>
    	<a href="check_logTag.php?id=<?php echo $log_id;?>&state=1">点赞</a>
    <?php 
		}
	}else{
		?>
        <a href="user_login.php">点赞</a>
        <?php
	}
	?>
    </div>
    <div class="tagrecord">
    	<?php
		$sql=mysqli_query($conn,"select * from tb_tk_tag join tb_tk_user on tb_tk_tag.tag_uid=tb_tk_user.user_uid where tag_logid='$log_id' and tag_logord=1 order by tag_time desc");
		while($info=mysqli_fetch_array($sql)){
		?>
        	<div class="tag1">
            	<div class="img"><div class="tg_top_pic"><img src="<?php echo $info['user_upic'];?>" width="50" alt=""></div></div>
                <div class="con">
            	<div class="tg_top_name"><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
                <div class="tg_top_time"><?php echo $info['tag_time'];?></div>
                </div>
            </div>
        <?php
		}
		?>
    </div>
</div>