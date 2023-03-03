<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>审核申诉</title>
<link rel="stylesheet" href="css/frame.css">
<style>
.appl_con{width:800px;margin:0 auto;border:2px #999 dashed;padding:10px;border-radius:15px;padding-left:30px;margin-top:10px;}
.check_button{text-align:center;margin-top:10px;margin-bottom:10px;}
.check_button a{text-decoration:none;background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
.check_button input[type="reset"]{background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
	#send{text-align:center;margin:0 auto;border-radius:15px;margin-bottom:15px;padding:10px;margin-top:20px;}
	#send .send_content{margin-top:10px;}
	#send .send_button{margin-top:10px;}
	#send input[type="text"]{padding:6px;border-radius:5px;background-color:rgba(0,0,0,0);-webkit-transition: 200ms;transition: 200ms;resize: none;overflow-x: hidden;overflow-y: auto;border:1px #999 solid;width:30%;}
	.check_button input[type="submit"], #send .send_button input[type="reset"]{background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
	#send .textarea{resize: none;overflow-x: hidden;overflow-y: auto;height: 160px;width: 80%;border-radius: 4px;padding: 0 0 14px;-webkit-transition: 200ms;transition: 200ms;font-size: 12px;color: #333;font-size: 14px;background-color:rgba(0,0,0,0);}
	
	#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
<script>
	function check_aufit(){
		if(document.getElementById("mail_con").value==""){
			alert("请输入审核用户内容！");
			document.getElementById("mail_con").focus();
			return false;
		}
		var inputs = document.getElementsByName("choice");
		var t=0;
		for (var i = 0; i < inputs .length; i++) {
		    if (inputs[i].checked) {
				if(i!=inputs.length-1){
				    t=1;
				}else{
					t=2;
				}
		    }
		}
		if(!t){
			alert("请选择是否通过！");
			return false;
		}
		return true;
	}
</script>
</head>

<body>
	
<div id="banner">
	<?php include("top.php"); include("conn.php"); if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];}?>
</div>
<div class="content">
	<?php
	$applid=$_GET['applid'];
	$sql = mysqli_query("select * from tb_tk_userappl join tb_tk_applclass on tb_tk_applclass.appclass_id = tb_tk_userappl.appl_classid where appl_id='$applid'",$conn);
	$info = mysqli_fetch_array($sql);
	?>
	<div class="appl_con">
		<div>用户id：<?php echo $info['appl_uid'];?></div>
		<div>申诉类别：<?php echo $info['appclass_con'];?></div>
		<div>申诉内容：<?php echo $info['appl_con'];?></div>
		<div>申诉时间：<?php echo $info['appl_time'];?></div>
	</div>
	<div id="send">
		<form action="check_aufitappl.php" method="post">
			<div class="send_content">审核用户内容：管理员已审核您的申诉，申诉未通过/申诉已通过，理由：<br><br><textarea data-v-11ea0b1a="" name="mail_con" id="mail_con" placeholder="私信用户(50字以内)" maxlength="500" class="textarea" style="height: 60px;"></textarea></div>
			<input type="hidden" id="applid" name="applid" value="<?php echo $applid;?>">
			<input type="hidden" id="appluid" name="appluid" value="<?php echo $info['appl_uid'];?>">
			<div class="aufit_choice">
				<input type="radio" name="choice" id="choice" value="1"><label for="1">通过</label>&nbsp;&nbsp;&nbsp;&nbsp;	
				<input type="radio" name="choice" id="choice" value="0"><label for="0">不通过</label>
			</div>
	</div>
	<div class="check_button">
		<input type="submit" value="确认审核" id="aufit_submit" name="aufit_submit" onclick="return check_aufit();">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置">
	</div>
	</form>
</div>


<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>