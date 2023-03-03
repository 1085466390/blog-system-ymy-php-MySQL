<style type="text/css">
.black_overlay{display:none;position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:#FFFFFF;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);}
.white_content{display:none;position:absolute;top:25%;left:25%;width:50%;padding:16px;border:4px dashed #999;border-radius:20px;margin:-32px;background-color:white;z-index:1002;overflow:auto;}

#light .button{width:100%;text-align:center;margin-top:20px;}
#light .button a{text-decoration:none;color:#000;background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;margin-right:50px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
</style>

<?php
	include("conn.php");
    if(!session_id()){session_start();}
	if(isset($_SESSION['uid'])){$t_uid=$_SESSION['uid'];}
	$uid=$_GET['uid'];
	$sql=mysqli_query($conn,"select * from tb_tk_user where user_uid='$uid'");
	$info=mysqli_fetch_array($sql);
?>

<div id="pintro">
    	<div><img src="<?php echo $info['user_upic'];?>" width=100 alt=""></div>
        <div><?php echo $info['user_uname'];?></div>
        <div><?php echo $info['user_uword'];?></div>
        <div class="focus"><a href="user_friend.php?st=1&uid=<?php echo $uid;?>">关注</a> <?php echo $info['user_follow'];?> | <a href="user_friend.php?st=2&uid=<?php echo $uid;?>">粉丝</a> <?php echo $info['user_follower'];?> | <a href="user_friend.php?st=3&uid=<?php echo $uid;?>">互相关注</a> <?php echo $info['user_friend'];?></div>
        <?php 
		if(isset($_SESSION['uid']) && $t_uid!=$uid){
		?>
        <div class="pintro_a">
        <?php
		$sql=mysqli_query($conn,"select * from tb_tk_userfl where (ufl_uid1='$t_uid' and ufl_uid2='$uid') or (ufl_uid1='$uid' and ufl_uid2='$t_uid')");
		$info=mysqli_fetch_array($sql);
		if(!$info){
		?>
        	<a href="check_userfl.php?tuid=<?php echo $t_uid; ?>&uid=<?php echo $uid;?>">关注</a>
            <?php
		}else if(($info['ufl_uid2']==$t_uid && $info['ufl_state']==1) || ($info['ufl_uid1']==$t_uid && $info['ufl_state']==2)){
			?>
            <a href="check_userfl.php?tuid=<?php echo $t_uid; ?>&uid=<?php echo $uid;?>&flid=<?php echo $info['ufl_id'];?>">关注</a>
            <?php
		}else{
			?>
            <a href="check_deluserfl.php?flid=<?php echo $info['ufl_id']; ?>&st=<?php echo $info['ufl_state'];?>&tuid=<?php echo $t_uid;?>&uid1=<?php echo $info['ufl_uid1'];?>&uid=<?php echo $uid;?>">取消关注</a>
            <?php
		}
		?>
            <a href="message.php?st=1&uid=<?php echo $uid; ?>">私信</a>
            <a href="#" onClick="dakai();">举报</a>
        </div>
        <?php
		}
		?>
    </div>
   
   
   <div id="light" class="white_content">
    <div>
    	<form action="check_usercom.php?tuid=<?php echo $t_uid; ?>&uid=<?php echo $uid; ?>" method="post">
        请选择举报理由：<br>
        <?php
		$sql5=mysqli_query($conn,"select * from tb_tk_usercomclass");
		while($info5=mysqli_fetch_array($sql5)){
		?>
        <label><input name="reason" type="radio" value="<?php echo $info5['ucomcl_id']; ?>" /><?php echo $info5['ucomcl_con'];?></label><br>
        <?php
		}
		?>
        <div style="margin-top:10px;margin-left:20px;">其他理由：<input type="text" name="reason1" id="reason1" size="20"></div>
    </div>
    <div class="button">
        <a href="javascript:void(0)" onclick="guanbi()">取消</a>
        <input type="submit" value="确定" onclick="return check()">
    </div>
    </form>
</div>
<div id="fade" class="black_overlay"></div>

<script type="text/javascript">
function check(){
	var inputs = document.getElementsByName("reason");
	var t=0;
    for (var i = 0; i < inputs .length; i++) {
        if (inputs [i].checked) {
			if(i!=inputs.length-1){
			    t=1;
			}else{
				t=2;
			}
        }
	}
	if(!t){
		alert("请选择举报理由！");
		return false;
	}else if(t==2){
		if(document.getElementById('reason1').value==''){
			alert("请填写其他原因！");
			return false;
		}
	}
	return true;
}

function dakai(){
document.getElementById('light').style.display='block';
document.getElementById('fade').style.display='block';
}

function guanbi(){
document.getElementById('light').style.display='none';
document.getElementById('fade').style.display='none'
}
</script>