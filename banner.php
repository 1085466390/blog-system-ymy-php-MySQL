<?php if(!session_id()){session_start();} if(isset($_SESSION['uid'])){$uid=$_SESSION['uid'];}?>
<style type="text/css">
#banner1{width:1160px;height:50px;text-align:right;line-height:50px;}
#banner1 a{text-decoration:none;color:#000;font-size:20px;margin-right:20px;}
#banner1 a:hover{color:#507884;}

.black_overlay1{display:none;position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:#FFFFFF;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);}
.white_content1{display:none;position:absolute;top:25%;left:25%;width:50%;padding:16px;border:4px dashed #999;border-radius:20px;margin:-32px;background-color:white;z-index:1002;overflow:auto;}

#light1 .button{width:100%;text-align:center;margin-top:20px;}
#light1 .button a{text-decoration:none;color:#000;background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;margin-right:50px;}
input[type="submit"] {background: #ff9406;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}
input[type="text"] {width:600px;padding-left:10px;padding-right:10px;}

#light1 .appl_rea{margin-top:10px;}
</style>
<div id="banner">
	<div id="banner1">
    	<?php
		if(isset($_SESSION['uid'])){
			?>
        <a href="message.php?st=1">我的私信</a><a href="user_bin.php">草稿箱</a><a href="#" onclick="dakai1();">个人申诉</a><a href="system_message.php">系统消息</a>
        <?php
		}
		?>
    </div>
    <div id="banner2">
    
        <div class="left">
	        <a href="index.php" class="left_index">首页</a>
            <a href="topic.php" class="left_topic">话题</a>
            <a href="log.php" class="left_log">博文</a>
            <a href="<?php if(isset($_SESSION['uid'])){?> personal.php?state=1&uid=<?php echo $uid; }else{ ?> user_login.php <?php } ?>" class="left_personal">个人主页</a>
        </div>
        <div class="right">
        <?php
		if(!isset($_SESSION['uid'])){
			?>
            <a href="user_login.php">登录</a>&nbsp;|&nbsp;
            <a href="register.php">注册</a>
            <?php
		}else{
			?>
            <a href="logout.php">注销</a>
            <?php
		}
		?>
        </div>
    </div>
</div>

<div id="light1" class="white_content1">
	<form action="check_userappeal.php?" method="post">
    请选择申诉类别： <br>
    <?php
	include("conn.php");
	$sql=mysqli_query($conn,"select * from tb_tk_applclass");
	while($info=mysqli_fetch_array($sql)){
	?>
    <label><input name="reason1" type="radio" value="<?php echo $info['appclass_id']; ?>" /><?php echo $info['appclass_con'];?></label><br>
    <?php
	}
    ?>
	<div class="appl_rea">
		申诉说明：<input type="text" placeholder="申诉理由" id="appl_reason" name="appl_reason">
	</div>
	<input type="hidden" name="user_uid" id="user_uid" value="<?php echo $uid;?>">
    <div class="button">
        <a href="javascript:void(0)" onclick="guanbi1()">取消</a>
        <input type="submit" value="确定" onclick="return check1()">
    </div>
    </form>
</div>
<div id="fade1" class="black_overlay1"></div>

<script type="text/javascript">
function check1(){
	var inputs = document.getElementsByName("reason1");
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
	
	if(document.getElementById("appl_reason").value==""){
		alert("请输入申诉理由！");
		document.getElementById("appl_reason").focus();
		return false;
	}
	return true;
}
function dakai1(){
document.getElementById('light1').style.display='block';
document.getElementById('fade1').style.display='block';
}

function guanbi1(){
document.getElementById('light1').style.display='none';
document.getElementById('fade1').style.display='none'
}
</script>