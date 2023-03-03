
<?php 
	include("conn.php"); 
	
	if(!session_id()){session_start();} $uid1=$_SESSION['uid'];
	$uid2=$_GET['uid'];
	
	$sql=mysqli_query($conn,"select user_uname,user_upic from tb_tk_user where user_uid='$uid1'");
	$sql_1=mysqli_query($conn,"select user_uname,user_upic from tb_tk_user where user_uid='$uid2'");
	$info=mysqli_fetch_array($sql); $upic1=$info['user_upic']; $uname1=$info['user_uname'];
	$info_1=mysqli_fetch_array($sql_1); $upic2=$info_1['user_upic']; $uname2=$info_1['user_uname'];
?>

<div class="mail_right_title"><a href="personal.php?state=1&uid=<?php echo $uid2;?>"><?php echo $uname2; ?></a></div>
<div class="mail_right_dialog" id="message_box">
<?php
    $sql1=mysqli_query($conn,"select * from tb_tk_usertalk where (utalk_uid1='$uid1' and utalk_uid2='$uid2') or (utalk_uid1='$uid2' and utalk_uid2='$uid1') order by utalk_time");
	while($info1=mysqli_fetch_array($sql1)){
		if($info1['utalk_uid1']==$uid2){
?>
        
        	 <div style="text-align:center;"><?php echo $info1['utalk_time'];?></div>
            <div class="dialog_left">
            	<div class="left_u_pic"><img src="<?php echo $upic2;?>" width="50" alt=""></div>
                <div class="left_u_mess"><?php echo $info1['utalk_con']; ?></div>
            </div>	
            
            <?php
		}else{
		?>
            <div style="text-align:center;"><?php echo $info1['utalk_time'];?></div>
            <div class="dialog_right">
                <div class="right_u_mess"><?php echo $info1['utalk_con'];?></div>
                <div class="right_u_pic"><img src="<?php echo $upic1; ?>" width="50" alt=""></div>
            </div>
        
        <?php
		}
	}
		?>
        
        </div>
        <div class="mail_right_send">
        <form action="check_sdmail.php?uid1=<?php echo $uid1;?>&uid2=<?php echo $uid2;?>" method="post">
        	<div class="mail_right_input_box">
            	<textarea data-v-11ea0b1a="" name="mail_con" id="mail_con" placeholder="回复一下吧~" maxlength="500" autofocus class="textarea" style="height: 60px;"></textarea>
            </div>
            <div class="mail_right_send_button">
            	<input type="submit" value="发送">
        </form>
            </div>
        </div>



           