<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户信息详情</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
#content .bg{margin:0 auto;border:1px #000 dashed;padding-left:50px;padding-right:50px;margin-left:20px;margin-right:20px;padding-top:20px;padding-bottom:20px;border-radius:20px;background-color:rgba(255,255,255,0.3);}
#content .back{margin-bottom:20px;margin-left:20px;}
#content .back a{text-decoration:none;color:#C63;font-size:18px;}
#content .button{margin:0 auto;width:300px;margin-top:20px;}
input[type="submit"] {background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}

#content .bg .bg_left{display:inline-block;vertical-align: top;}
#content .bg .bg_right{display:inline-block;vertical-align:top;margin-left:400px;}

.black_overlay{display:none;position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:#FFFFFF;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);}
.white_content{display:none;position:absolute;top:25%;left:25%;width:50%;padding:16px;border:4px dashed #999;border-radius:20px;margin:-32px;background-color:white;z-index:1002;overflow:auto;}
#light .button{width:100%;text-align:center;margin-top:20px;}
#light .button a{text-decoration:none;color:#000;background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;margin-right:50px;}

#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>
</head>

<body>
<div id="banner"><?php include("top.php"); include("conn.php"); $uid=$_GET['id'];?></div>
<div id="content" style="padding-bottom:20px;padding-top:20px;">
<div class="back"><a href="javascript:history.back();">返回</a></div>
	<div class="bg">
    	<?php
		 $sql=mysqli_query("select * from tb_tk_user where user_uid='$uid'",$conn);
		 $info = mysqli_fetch_array($sql);
		?>
        <div class="bg_left">
			<div>用户id：<?php echo $info['user_uid'];?></div>
			<div>用户名：<?php echo $info['user_uname'];?></div>
			<div>用户头像：<img src="<?php echo '../'.$info['user_upic'];?>" width=50 alt=""></div>
			<div>注册时间：<?php echo $info['user_bgtime'];?></div>
			<div>用户简介：<?php echo $info['user_uword'];?></div>
			<div>用户身份证号：<?php echo $info['user_ucard'];?></div>
			<div>用户密码：<?php echo $info['user_pwd'];?></div>
			<div>真实姓名：<?php echo $info['user_tname'];?></div>
			<div>联系电话：<?php echo $info['user_phone'];?></div>
			<div id="locate">所在地：</div>
		</div>
        
			<script type="text/javascript">
			var provinceList = [
			{name:'北京'},
			{name:'上海'},
			{name:'天津'},
			{name:'重庆'},
			{name:'四川'},
			{name:'贵州'},
			{name:'云南'},
			{name:'西藏'},
			{name:'河南'},
			{name:'湖北'},
			{name:'湖南'},
			{name:'广东'},
			{name:'广西'},
			{name:'陕西'},
			{name:'甘肃'},
			{name:'青海'},
			{name:'宁夏'},
			{name:'新疆'},
			{name:'河北'},
			{name:'山西'},
			{name:'内蒙古'},
			{name:'江苏'},
			{name:'浙江'},
			{name:'安徽'},
			{name:'福建'},
			{name:'江西'},
			{name:'山东'},
			{name:'辽宁'},
			{name:'吉林'},
			{name:'黑龙江'},
			{name:'海南'},
			{name:'台湾'},
			{name:'香港'},
			{name:'澳门'},
			{name:'海外'}
			];
			province=provinceList[<?php echo $info['user_locate'];?>].name;
			document.getElementById("locate").innerHTML+=province;
			</script>
		
        <div class="bg_right">
			<div>用户性别：<?php echo $info['user_sex'];?></div>
			<div>用户密保问题：<?php echo $info['user_pwq'];?></div>
			<div>用户密保答案：<?php echo $info['user_pwa'];?></div>
			<div>用户关注：<?php echo $info['user_follow'];?></div>
			<div>用户粉丝：<?php echo $info['user_follower'];?></div>
			<div>用户好友：<?php echo $info['user_friend'];?></div>
			<div>用户博文：<?php echo $info['user_blog'];?></div>
		</div>
    </div>	
    <div class="button">
        <input type="submit" id="admit" name="admit" value="激活" style="margin-right:50px;" onclick="javascript:window.location='check_user_mguser_wake.php?id=<?php echo $info['user_uid'];?>';">
        <input type="submit" id="disadmit" name="disadmit" value="冻结" onclick="dakai(<?php echo $info['user_uid'];?>)">
    </div>
</div>


<div id="light" class="white_content">
    <div id="light_user">用户：</div>
    <div>
    	<form action="check_user_mguser_lock.php" method="post">
        <input type="hidden" value="" id="form_user" name="form_user">
        请选择冻结时间：
        <label><input name="Time" type="radio" value="1" />一天</label> 
        <label><input name="Time" type="radio" value="7" />七天</label> 
        <label><input name="Time" type="radio" value="30" />半个月 </label> 
        <label><input name="Time" type="radio" value="183" />半年</label> 
        <label><input name="Time" type="radio" value="365" />一年</label>
        <label><input name="Time" type="radio" value="1095" />三年</label>
        <label><input name="Time" type="radio" value="2555" />七年</label>
        <label><input name="Time" type="radio" value="10950" />永久</label>
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
	var inputs = document.getElementsByName("Time");
	var t=0;
    for (var i = 0; i < inputs .length; i++) {
        if (inputs [i].checked) {
			t=1
        }
	}
	if(!t){
		alert("请选择冻结时间！");
		return false;
	}
	return true;
}

function dakai(name){
document.getElementById('light').style.display='block';
document.getElementById('fade').style.display='block';
document.getElementById('light_user').innerHTML='用户：'+name;
document.getElementById('form_user').value=name;
}

function guanbi(){
document.getElementById('light').style.display='none';
document.getElementById('fade').style.display='none'
}
</script>

<?php mysqli_close($conn); ?>
<div id="bottom">重庆师范大学计算机与信息科学学院 2019计科 袁鸣禹 制作，版权所有。<br>联系电话：15179581889 QQ号：1085466390 微信号：ymyymyi</div>
</body>
</html>