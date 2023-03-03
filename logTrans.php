<style type="text/css">
.logTrans{width:1160px;}
.logTrans .sdTrans{width:1160px;padding-top:10px;padding-bottom:20px;}
.logTrans .sdTrans .text{display:inline-block;vertical-align:top;margin-left:300px;}
.logTrans .sdTrans .trans{display:inline-block;vertical-align:top;margin-left:50px;margin-top:10px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}

.Translog{padding-left:20px;padding-top:10px;padding-bottom:10px;padding-right:20px;}
.Translog .translog{border-bottom:2px #999 solid;padding-bottom:10px;padding-top:10px;}
.Translog .translog .log_left{display:inline-block;vertical-align:top;margin-right:10px;}
.Translog .translog .log_right{display:inline-block;vertical-align:top;}
.Translog .translog .tl_top{}
.Translog .translog .tl_top .tl_top_name{font-size:20px;font-weight:600px;display:inline-block;margin-right:20px;}
.Translog .translog .tl_top .tl_top_name a{text-decoration:none;color:#000;}
.Translog .translog .tl_top .tl_top_time{color:#999;display:inline-block;}
.Translog .translog .tl_bottom{margin-top:10px;margin-left:100px;}
.Translog .translog .tl_bottom:hover{cursor:pointer;}

.translog .collect{display:inline-block;float:right;text-align:center;height:30px;margin-right:20px;}
.translog .collect a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
</style>

<div class="logTrans">
	<div class="sdTrans">
    <?php $log_id=$_GET['id']; if(!session_id()){session_start();} include("conn.php");?>
    <form action="check_logTrans.php?id=<?php echo $log_id;?>" method="post">
    	<div class="text"><textarea name="trans_content" id="trans_content" rows="3" cols="80" onpropertychange="if(this.scrollHeight>80) this.style.posHeight=this.scrollHeight+5" style="background:transparent;border:2px solid #ff9406;"></textarea></div>
        <div class="trans"><input type="submit" value="转发" onclick="<?php if(!isset($_SESSION['uid'])){ ?> javascript:window.location='user_login.php';return false; <?php }?>"></div>
    </form>
    </div>
    <div class="Translog">
    <?php
        $sql=mysqli_query($conn,"select * from tb_tk_logtrans join tb_tk_user on tb_tk_logtrans.trans_uid=tb_tk_user.user_uid where trans_logid='$log_id' order by trans_time desc");
		while($info=mysqli_fetch_array($sql)){
	?>
    	<div class="translog">
        <div class="log_left"><img src="<?php echo $info['user_upic'];?>" width="50" alt=""></div>
        <div class="log_right">
        	<div class="tl_top">
            	<div class="tl_top_name"><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
                <div class="tl_top_time"><?php echo $info['trans_time'];?>&nbsp;&nbsp;点赞数&nbsp;<?php echo $info['trans_tag'];?>&nbsp;&nbsp;评论数&nbsp;<?php echo $info['trans_com'];?></div>
            </div>
            <div class="tl_bottom" onClick="javascript:window.location='trans_con_detail.php?id=<?php echo $info['trans_id'];?>';"><?php echo $info['trans_content'];?></div>
        </div>
        <?php
		if($info['trans_uid']==$_SESSION['uid']){
		?>
        <div class="collect"><a href="check_dellog.php?id=<?php echo $info['trans_id'];?>&state=2">删除</a></div>
        <?php
		}
		?>
        </div>
    <?php
		}
	?>
    </div>
</div>