<style type="text/css">
.logCom{width:1160px;}

.logCom .command{}
.logCom .command .text{display:inline-block;vertical-align:top;margin-left:300px;}
.logCom .command .com{display:inline-block;vertical-align:top;margin-left:50px;margin-top:10px;}
input[type="submit"] {background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}

.logCom{width:1160px;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;}
.logCom .com-record{padding-left:10px;padding-right:10px;border-bottom:2px #999 solid;padding-top:10px;padding-bottom:10px;}
.logCom .com-record .log-left{display:inline-block;vertical-align:top;margin-right:10px;}
.logCom .com-record .log-right{display:inline-block;vertical-align:top;}
.logCom .com-record .log-right .com-top{}
.logCom .com-record .log-right .com-top .com-top-name{font-size:20px;font-weight:600px;display:inline-block;margin-right:20px;}
.logCom .com-record .log-right .com-top .com-top-name a{text-decoration:none;color:#000;}
.logCom .com-record .log-right .com-top .com-top-time{color:#999;display:inline-block;}
.logCom .com-record .log-right .com-bottom{}
.logCom .com-record .log-right .com-bottom .com-bottom-con{margin-top:10px;margin-left:100px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcom{width:1050px;text-align:center;padding-top:10px;padding-bottom:10px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcom .adcom-text{display:inline-block;vertical-align:top;margin-right:20px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcom .adcom-com{display:inline-block;vertical-align:top;margin-top:10px;}

.logCom .com-record .log-right .com-bottom .com-bottom-adcommand{width:1050px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcommand .com-bottom-adcommand-con{border-bottom:1px rgba(204,204,204,0.4) solid;width:1050px;padding-left:10px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcommand .com-bottom-adcommand-con .adcommand-con-top{}
.logCom .com-record .log-right .com-bottom .com-bottom-adcommand .com-bottom-adcommand-con .adcommand-con-top .adcommand-con-name{font-size:20px;font-weight:600px;display:inline-block;margin-right:20px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcommand .com-bottom-adcommand-con .adcommand-con-top .adcommand-con-name span{color:#999;display:inline-block;font-size:18px;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcommand .com-bottom-adcommand-con .adcommand-con-top .adcommand-con-time{color:#999;display:inline-block;}
.logCom .com-record .log-right .com-bottom .com-bottom-adcommand .com-bottom-adcommand-con .adcommand-con-bottom{margin-left:20px;margin-top:5px;}
</style>

<div class="logCom">
	<div class="command">
    <?php $log_id=$_GET['id']; if(!session_id()){session_start();} include("conn.php");?>
    <form action="check_logCom.php?id=<?php echo $log_id;?>&state=1" method="post">
    	<div class="text"><textarea name="com_content" id="com_content" rows="3" cols="80" onpropertychange="if(this.scrollHeight>80) this.style.posHeight=this.scrollHeight+5" style="background:transparent;border:2px solid #c5464a;"></textarea></div>
        <div class="com"><input type="submit" value="评论" onclick="<?php if(!isset($_SESSION['uid'])){ ?> javascript:window.location='user_login.php';return false; <?php }?>"></div>
    </form>
    </div>
    
    <?php
	$sql=mysqli_query($conn,"select * from tb_tk_comment join tb_tk_user on tb_tk_user.user_uid = tb_tk_comment.comt_uid where comt_logid='$log_id' and comt_logord=1 order by comt_time desc");
	while($info=mysqli_fetch_array($sql)){
		?>
    <div class="com-record">
    	<div class="log-left"><img src="upimages/1.jpg" width="50" alt=""></div>
        <div class="log-right">
        	<div class="com-top">
            	<div class="com-top-name"><a href="personal.php?state=1&uid=<?php echo $info['user_uid'];?>"><?php echo $info['user_uname'];?></a></div>
                <div class="com-top-time"><?php echo $info['comt_time'];?></div>
            </div>
            <div class="com-bottom">
            	<div class="com-bottom-con"><?php echo $info['comt_content'];?></div>
                <div class="com-bottom-adcom">
                <?php
				$comt=$info['comt_id'];$uid=$info['comt_uid'];$uname=$info['user_uname'];
				?>
                <form action="check_logAdCom.php?comt=<?php echo $comt;?>&uid=<?php echo $info['comt_uid'];?>&id=<?php echo $log_id;?>&state=1" method="post">
                	<div class="adcom-text"><textarea name="adcom_content" id="adcom_content" rows="3" cols="80" onpropertychange="if(this.scrollHeight>80) this.style.posHeight=this.scrollHeight+5" style="background:transparent;border:2px solid #c5464a;"></textarea></div>
                    <div class="adcom-com"><input type="submit" value="追论" onclick="<?php if(!isset($_SESSION['uid'])){ ?> javascript:window.location='user_login.php';return false; <?php }?>"></div>
                    </form>
                </div>
                <div class="com-bottom-adcommand">
                <?php
				$sql2=mysqli_query($conn,"select * from tb_tk_comtadd join tb_tk_user on tb_tk_comtadd.add_uid2 = tb_tk_user.user_uid where add_comtid='$comt' and add_uid='$uid' order by add_time desc");
				while($info2=mysqli_fetch_array($sql2)){
					?>
                	<div class="com-bottom-adcommand-con">
                    	<div class="adcommand-con-top">
                        	<div class="adcommand-con-name"><?php echo $info2['user_uname'];?>&nbsp;<span>回复</span>&nbsp;<?php echo $uname;?></div>
                            <div class="adcommand-con-time"><?php echo $info2['add_time'];?></div>
                        </div>
                        <div class="adcommand-con-bottom"><?php echo $info2['add_content'];?></div>
                    </div>
                    <?php
				}
				?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    }
    ?>
    
</div>