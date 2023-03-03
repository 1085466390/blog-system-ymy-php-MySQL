 <div class="intro_con">
 <?php
    include("conn.php");
 	if(!session_id()){session_start();}
	$uid=$_SESSION['uid'];
	$sql=mysqli_query($conn,"select * from tb_tk_user where user_uid='$uid'");
	$info=mysqli_fetch_array($sql);
 ?>
        	<div class="intro_con_left">
				<div>用户名：<?php echo $info['user_uname'];?></div>
				<div>头像：<img src="<?php echo $info['user_upic'];?>" width=50 alt=""></div>
				<div>用户简介：<?php echo $info['user_uword'];?></div>
				<div>性别：<?php echo $info['user_sex'];?></div>
				<div>电话号码：<?php echo $info['user_phone'];?></div>
				<div>个人状态：<?php if($info['user_ustate']){ echo "激活";}else{ echo "冻结"; }?></div>
				<div>冻结期限：</div>
			</div>
            <div class="intro_con_right">
				<div>身份证：<?php echo $info['user_ucard'];?></div>
				<div>真实姓名：<?php echo $info['user_tname'];?></div>
				<div id="locate">所在地：</div>
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
				<div>密保问题：<?php echo $info['user_pwq'];?></div>
				<div>密保答案：<?php echo $info['user_pwa'];?></div>
				<div>注册时间：<?php echo $info['user_bgtime'];?></div>
			</div><br>
            <div class="intro_form"><a href="personIntro_chemes.php?uid=<?php echo $uid;?>">修改</a></div>
    </div>
	
	<script type="text/javascript">
	function check_modifypwd(){
		if(document.getElementById("pw_old").value==""){
			alert("请输入原密码！");
			document.getElementById("pw_old").focus();
			return false;
		}
		if(document.getElementById("pw_new").value==""){
			alert("请输入最新密码！");
			document.getElementById("pw_new").focus();
			return false;
		}
		if(document.getElementById("pw_new2").value==""){
			alert("请输入最新确认密码！");
			document.getElementById("pw_new2").focus();
			return false;
		}
		if(document.getElementById("pw_new").value!=document.getElementById("pw_new2").value){
			alert("新密码与原密码不一致！");
			document.getElementById("pw_new").focus();
			return false;
		}
		return true;
	}
	</script>