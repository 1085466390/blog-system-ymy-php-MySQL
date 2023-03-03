<style type="text/css">
._hotlog{margin:0 auto;border-bottom:1px #ccc solid;width:1160px;margin-bottom:20px;padding-left:20px;padding-top:10px;}
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

._hotlog .hotlog-top .right .trans_con{background-color:rgba(204,204,204,0.2);border-radius:5px;margin-top:10px;padding-left:10px;padding-right:10px;padding-top:10px;padding-bottom:10px;}
._hotlog .hotlog-top .right .trans_con .trans_left{display:inline-block;vertical-align:top;margin-right:15px;}
._hotlog .hotlog-top .right .trans_con .trans_right{display:inline-block;vertical-align:top;}
._hotlog .hotlog-top .right .trans_con .trans_right .title span{color:#999;}
._hotlog .hotlog-top .right .trans_con .trans_right .content{}
._hotlog .hotlog-top .right .trans_con .trans_right .pic{margin-top:10px;}
._hotlog .hotlog-top .right .trans_con .trans_right .pic img{margin-right:10px;}
._hotlog .hotlog-top .right .trans_con .trans_right .topic{color:#36C;margin-top:5px;}
._hotlog .hotlog-top .right .trans_con .trans_right .topic a{text-decoration:none;color:#36C;}
</style>

	
        
    <div id="personlog">

<?php
	include("conn.php");
    if(!session_id()){session_start();}
	if(isset($_SESSION['uid'])){$t_uid=$_SESSION['uid'];}
	$uid=$_GET['uid'];
	
	$sql_t=mysqli_query($conn,"select * from (select log_id as id,log_uid as uid,log_time as time,'1' as state from tb_tk_log union all select trans_id as id,trans_uid as uid,trans_time as time, '2' as state from tb_tk_logtrans) as c where uid='$uid' order by time desc");
	while($info_t=mysqli_fetch_array($sql_t)){
		if($info_t['state']==1){

	$log_id=$info_t['id'];
	$sql=mysqli_query($conn,"select * from tb_tk_log join tb_tk_user on tb_tk_user.user_uid=tb_tk_log.log_uid where log_id='$log_id'");
	$info=mysqli_fetch_array($sql);
?>
<div class="_hotlog">
	<div class="hotlog-top">
    	<div class="left">
            <img src="<?php echo $info['user_upic'];?>" width="80px" alt="">
        </div>
        <div class="right">
        	<div class="title">
          	    <div><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
                <span><?php echo $info['log_time'];?> &nbsp;&nbsp; <?php echo $info['log_store'];?>&nbsp;收藏</span>
				<?php 
				if(isset($_SESSION['uid']) && $t_uid==$uid){
					?>
                    <div class="collect"><a href="check_dellog.php?id=<?php echo $info['log_id'];?>&state=1">删除</a></div>
                    <?php
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
	}else if($info_t['state']==2){
		$trans_id=$info_t['id'];

		$sql=mysqli_query($conn,"select tb_tk_logtrans.*,tb_tk_user.user_uname,tb_tk_user.user_upic from tb_tk_logtrans join tb_tk_user on tb_tk_logtrans.trans_uid=tb_tk_user.user_uid where trans_id='$trans_id'");
		$info=mysqli_fetch_array($sql);
		?>
        
        


<div class="_hotlog">
	<div class="hotlog-top">
    	<div class="left">
            <img src="<?php echo $info['user_upic'];?>" width="80px" alt="">
        </div>
        <div class="right">
        	<div class="title">
          	    <div><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a>&nbsp;&nbsp;<span><?php echo $info['trans_time'];?></span></div>
				<?php 
				if(isset($_SESSION['uid']) && $t_uid==$uid){
					?>
                    <div class="collect"><a href="check_dellog.php?id=<?php echo $info['trans_id'];?>&state=2">删除</a></div>
                    <?php
				}
				?>
            </div>
            <div class="content" onclick="javascript:window.location='trans_con_detail.php?id=<?php echo $trans_id;?>';"><?php if($info['trans_content']!=""){echo $info['trans_content'];}else{echo "转发博文";}?></div>
            <div class="trans_con">
            	<?php
				$trans_logid=$info['trans_logid'];
				$sql2=mysqli_query("select * from tb_tk_log join tb_tk_user on tb_tk_user.user_uid=tb_tk_log.log_uid where log_id='$trans_logid'",$conn);
				$info2=mysqli_fetch_array($sql2);
				if($info2){
					?>
                    <div class="trans_left">
                    	<img src="<?php echo $info2['user_upic'];?>" width="50" alt="">
                    </div>
                    <div class="trans_right">
                    	<div class="title">
                        	<div><a href="personal.php?state=1&uid=<?php echo $info2['user_uid'];?>"><?php echo $info2['user_uname'];?></a></div>
                            <span><?php echo $info2['log_time'];?> &nbsp;&nbsp; <?php echo $info2['log_store'];?>&nbsp;收藏</span>
                        </div>
                        <div class="content" onclick="javascript:window.location='log_con_detail.php?id=<?php echo $trans_logid;?>';"><?php echo $info2['log_content'];?></div>
                        <div class="pic">
                        	<img src="<?php echo $info2['log_pic1'];?>" alt="" width="80px"><img src="<?php echo $info2['log_pic2'];?>" alt="" width="80px"><img src="<?php echo $info2['log_pic3'];?>" alt="" width="80px">
                        </div>
                        <div class="topic">
                        	<?php
							$tpid=$info2['log_topid'];
							$sql3=mysqli_query("select * from tb_tk_topic where tp_id='$tpid'",$conn);
							$info3=mysqli_fetch_array($sql3);
							?>
                            <?php if($info3){?> <a href="topic_con_detail.php?id=<?php echo $tpid; ?>"> <?php echo "#".$info3['tp_top']."#"; ?> </a><?php } ?>
                        </div>
                    </div>
                    <?php
				}else{
					echo "转发博文已被删除";
				}
				?>
            </div>
        </div>
    </div>    
   
    <div class="hotlog-bottom">
        <div class="func" style="width:47%;"><a href="trans_con_detail.php?id=<?php echo $info['trans_id'];?>&state=1">评论</a><span>&nbsp;&nbsp;<?php echo $info['trans_com'];?></span></div>&nbsp;|
        <div class="func" style="width:47%;"><a href="trans_con_detail.php?id=<?php echo $info['trans_id'];?>&state=2">点赞</a><span>&nbsp;&nbsp;<?php echo $info['trans_tag'];?></span></div>
    </div>
</div>



        
        <?php
		
	}
	}
	?>
    
    </div>