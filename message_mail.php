<style type="text/css">
.message_mail_title{padding-top:10px;padding-bottom:10px;padding-left:10px;font-size:18px;font-family:"黑体";margin-bottom:10px;}
.message_mail_con{}

.message_mail_con .mail_left{width:240px;height:400px;display:inline-block;vertical-align:top;}
.message_mail_con .mail_left .mail_left_title{height:40px;line-height:40px;text-align:center;font-size:18px;border-bottom:1px #ccc solid;margin-bottom:10px;}
.message_mail_con .mail_left .mail_left_person{margin-bottom:10px;background-color:rgba(204,204,204,0.3);}
.message_mail_con .mail_left .mail_left_person:hover{cursor:pointer;}
.message_mail_con .mail_left .mail_left_person .person_img{display:inline-block;vertical-align:top;margin-right:10px;width:50px;}
.message_mail_con .mail_left .mail_left_person .person_con{display:inline-block;vertical-align:top;width:170px;}
.message_mail_con .mail_left .mail_left_person .person_con .person_con_name{margin-bottom:5px;}
.message_mail_con .mail_left .mail_left_person .person_con .person_con_dia{height:20px;overflow:hidden;}

#mail_right{background-color:rgba(255,255,255,0.2);border-radius:20px;width:750px;height:400px;display:inline-block;vertical-align:top;}
#mail_right .mail_right_title{height:40px;border-bottom:1px #ccc solid;margin-bottom:5px;line-height:40px;text-align:center;font-size:18px;}
#mail_right .mail_right_title a{text-decoration:none;color:#000;}

#mail_right .mail_right_dialog{height:300px;overflow-y:auto;}

/*左侧聊天框*/
#mail_right .mail_right_dialog .dialog_left{width:720px;display:flex;padding-left:10px;padding-bottom:10px;padding-top:5px;}
#mail_right .mail_right_dialog .dialog_left .left_u_pic{display:inline-block;vertical-align:top;align-self:center;margin-right:10px;}
#mail_right .mail_right_dialog .dialog_left .left_u_mess{display:inline-block;vertical-align:top;width:660px;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;align-self:center;border-radius:5px;border:1px #ccc solid;}

/*右侧聊天框*/
#mail_right .mail_right_dialog .dialog_right{width:720px;float:right;display:flex;padding-right:10px;padding-top:5px;padding-bottom:10px;}
#mail_right .mail_right_dialog .dialog_right .right_u_pic{display:inline-block;vertical-align:top;align-self:center;margin-left:10px;}
#mail_right .mail_right_dialog .dialog_right .right_u_mess{display:inline-block;vertical-align:top;width:660px;border:1px #ccc solid;padding-left:10px;padding-right:10px;padding-top:5px;padding-bottom:5px;align-self:center;border-radius:5px;}

/*发送框*/
#mail_right .mail_right_send{}
#mail_right .mail_right_send .mail_right_input_box .textarea{resize: none;overflow-x: hidden;overflow-y: auto;height: 160px;width: 100%;border-radius: 4px;padding: 0 0 14px;-webkit-transition: 200ms;transition: 200ms;font-size: 12px;color: #333;font-size: 14px;background-color:rgba(0,0,0,0);}
#mail_right .mail_right_send .mail_right_send_button{text-align:right;padding-right:10px;}
#mail_right .mail_right_send .mail_right_send_button input[type="submit"]{background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
</style>

<?php include("conn.php"); if(!session_id()){session_start();} $uid=$_SESSION['uid'];?>

<div class="message_mail_title">私信</div>
<div class="message_mail_con">

	<div class="mail_left">
    	<div class="mail_left_title">近期消息</div>
        <?php
		if(isset($_GET['uid'])){
			$t_uid=$_GET['uid'];
			?>
            <?php
			$sql2=mysqli_query($conn,"select * from tb_tk_user where user_uid='$t_uid'");
			$info2=mysqli_fetch_array($sql2);
			$sql3=mysqli_query($conn,"select * from tb_tk_usertalk where (utalk_uid1='$uid' and utalk_uid2='$t_uid') or (utalk_uid2='$uid' and utalk_uid1='$t_uid') order by utalk_time desc limit 1");
			$info3=mysqli_fetch_array($sql3);
			?>
		<div class="mail_left_person" onclick="javascript:showLog1(<?php echo $_GET['uid']; ?>);">
        	<div class="person_img"><img src="<?php echo $info2['user_upic'];?>" width="50" alt=""></div>
            <div class="person_con">
            	<div class="person_con_name"><?php echo $info2['user_uname'];?></div>
                <div class="person_con_dia"><?php echo $info3['utalk_con'];?></div>
            </div>
        </div>
        <?php
		}
		?>
        
        <?php
			$sql=mysqli_query($conn,"select utalk_id,uid1,uid2 from (select utalk_id,utalk_uid1 as uid1,utalk_uid2 as uid2 from tb_tk_usertalk where utalk_uid1='$uid' group by utalk_uid2 union all select utalk_id,utalk_uid2 as uid1,utalk_uid1 as uid2 from tb_tk_usertalk where utalk_uid2='$uid' group by utalk_uid1) as c group by uid2");
			$info=mysqli_fetch_array($sql);
			$f_uid=$info['uid2'];
			while($info){
				$t_uid=$info['uid2'];
				if(!isset($_GET['uid']) || ($t_uid!=$_GET['uid'])){
				$sql1=mysqli_query($conn,"select * from tb_tk_usertalk join tb_tk_user on '$t_uid'=tb_tk_user.user_uid where (utalk_uid1='$uid' and utalk_uid2='$t_uid') or (utalk_uid2='$uid' and utalk_uid1='$t_uid') order by utalk_time desc limit 1");
				$info1=mysqli_fetch_array($sql1);
			?>
            
        <div class="mail_left_person" onclick="javascript:showLog1(<?php echo $t_uid; ?>);">
        	<div class="person_img"><img src="<?php echo $info1['user_upic'];?>" width="50" alt=""></div>
            <div class="person_con">
            	<div class="person_con_name"><?php echo $info1['user_uname'];?></div>
                <div class="person_con_dia"><?php echo $info1['utalk_con'];?></div>
            </div>
        </div>
        
        <?php
				}
				$info=mysqli_fetch_array($sql);
			}
			?>
            
    </div>
    
    <div id="mail_right">
    	<?php if(isset($_GET['uid'])){ $_GET['uid']=$_GET['uid']; include("message_mail_dialog.php"); }
		      else{ $_GET['uid']=$f_uid; include("message_mail_dialog.php"); }
		
		 ?>
    </div>
    
</div>
<?php mysqli_close($conn);?>