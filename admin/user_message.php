<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>私信用户</title>
<link rel="stylesheet" href="css/frame.css">
<style>
	#send{border:2px #999 dashed;text-align:center;margin:0 auto;border-radius:15px;margin-bottom:15px;padding:10px;}
	#send .send_content{margin-top:10px;}
	#send .send_button{margin-top:10px;}
	#send input[type="text"]{padding:6px;border-radius:5px;background-color:rgba(0,0,0,0);-webkit-transition: 200ms;transition: 200ms;resize: none;overflow-x: hidden;overflow-y: auto;border:1px #999 solid;width:30%;}
	#send .send_button input[type="submit"], #send .send_button input[type="reset"]{background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
	#send .textarea{resize: none;overflow-x: hidden;overflow-y: auto;height: 160px;width: 100%;border-radius: 4px;padding: 0 0 14px;-webkit-transition: 200ms;transition: 200ms;font-size: 12px;color: #333;font-size: 14px;background-color:rgba(0,0,0,0);}
	#mes_record .mes_record_title{margin:0 auto;padding-left:20px;margin-bottom:10px;}
	#mes_record .mes_record_con{border:2px #999 dashed;padding:10px;margin:0 auto;border-radius:15px;margin-left:20px;margin-right:20px;margin-top:10px;}
	
	#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
<script>
	function check_message(){
		if(document.getElementById("user_id").value==""){
			alert("用户id不能为空！");
			document.getElementById("user_id").focus();
			return false;
		}
		if(document.getElementById("mail_con").value==""){
			alert("私信用户内容不能为空！");
			document.getElementById("mail_con").focus();
			return false;
		}
		return true;
	}
</script>
</head>

<body>
<div id="banner">
	<?php include("top.php"); include("conn.php"); if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];} if(!session_id()){session_start();} $admin_id = $_SESSION['adminid'];?>
</div>
<div id="content">
	<div id="send">
		<form action="check_umessage.php" method="post">
			<div>私信用户id：<input type="text" placeholder="用户id" id="user_id" name="user_id" autofocus></div>
			<div class="send_content">私信用户内容：<textarea data-v-11ea0b1a="" name="mail_con" id="mail_con" placeholder="私信用户(100字以内)" maxlength="500" class="textarea" style="height: 60px;"></textarea></div>
			<div class="send_button"><input type="submit" value="私信" onclick="return check_message();"><input type="reset" value="重置"></div>
		</form>
	</div>
	<div id="mes_record">
		<div class="mes_record_title">> 私信记录</div>
		<?php 
		$sql = mysqli_query("select * from tb_tk_adtalkuser join tb_tk_user on tb_tk_user.user_uid = tb_tk_adtalkuser.adtalk_uid where adtalk_aid = '$admin_id' order by adtalk_time desc",$conn);
		while($info = mysqli_fetch_array($sql)){
		?>
		<div class="mes_record_con">
			<div>
				<?php echo $info['user_uid'];?> &nbsp;&nbsp;
				<img src="<?php echo '../'.$info['user_upic'];?>" width=50 alt="">&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo $info['user_uname'];?>
			</div>
			<div>发送时间：<?php echo $info['adtalk_time'];?></div>
			<div>发送内容：<?php echo $info['adtalk_con'];?></div>
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