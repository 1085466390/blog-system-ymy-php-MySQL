    <?php
	include("conn.php");
	if(isset($_GET['st'])){
    	$st=$_GET['st'];
	}else{
		$st=1;
	}
	if(!session_id()){session_start();}
	if(isset($_SESSION['uid'])){$t_uid=$_SESSION['uid'];}
	$uid=$_GET['uid'];
	if($st==1){
	$sql=mysqli_query($conn,"select * from tb_tk_topicfocus join tb_tk_topic on tb_tk_topicfocus.tpfc_tpid=tb_tk_topic.tp_id where tpfc_uid='$uid'");
	}else if($st==2){
		$sql=mysqli_query($conn,"select * from tb_tk_topic where tp_uid='$uid'");
	}else if($st==3){
		$sql=mysqli_query($conn,"select distinct log_uid,tp_id,tp_uid,tp_top,tp_content,tp_classid,tp_time,tp_state,tp_aid,tp_adtime,tp_follow,tp_log from tb_tk_log join tb_tk_topic on tb_tk_topic.tp_id=tb_tk_log.log_topid where log_uid='$uid'");
	}
	
	while($info=mysqli_fetch_array($sql)){
	?>
    
<div class="topic_con">
	            <div class="title"><a href="topic_con_detail.php?id=<?php echo $info['tp_id'];?>"><?php echo $info['tp_top'];?></a></div>
                <div class="time"><?php echo $info['tp_adtime'];?>&nbsp;&nbsp;关注量 <?php echo $info['tp_follow'];?> 讨论数 <?php echo $info['tp_log'];?>
                    <?php
					if(isset($_SESSION['uid']) && $t_uid==$uid){
					if($st==1){
						?>
                        <div class="flw"><a href="topic_delfocus.php?id=<?php echo $info['tp_id'];?>">取消关注</a></div>
                        <?php
					}else if($st==2){
						?>
                        <div class="flw"><a href="check_deltopic.php?id=<?php echo $info['tp_id'];?>">删除</a></div>
                        <?php
					}
					}
					?>
                </div>
                <?php 
				$uid2=$info['tp_uid'];
				$sql2=mysqli_query($conn,"select * from tb_tk_user where user_uid='$uid2'");
				$info2=mysqli_fetch_array($sql2);
				?>
                <div class="author">发布者：<a href="personal.php?state=1&uid=<?php echo $info2['user_uid'];?>"><?php echo $info2['user_uname'];?></a></div>
                <div class="tutor">话题导语：<?php echo $info['tp_content'];?></div>
             </div>
</div>

	<?php 
	}
	?>