<link type="text/css" rel="styleSheet"  href="CSS/login.css" />
<script type="text/javascript">
function checkinput(){
	if(document.getElementById("username").value=="用户名"){
		alert("请输入用户名！");
		document.getElementById("username").focus();
		return false;
	}
	if(document.getElementById("pwd").value=="password"){
		alert("请输入密码！");
		document.getElementById("pwd").focus();
		return false;
	}
	return true;
}
</script>
<div class="login">
	<div class="login-top">
		<h2>用户登录</h2>
        <form action="check_login.php" method="post" name="form_log">
			<input type="text" value="用户名" name="username" id="username" onfocus="if(this.value=='用户名'){this.value='';}" onblur="if (this.value == '') {this.value = '用户名';}">
			<input type="password" name="pwd" id="pwd" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}">
	    <div class="forgot">
	    	<a href="#">忘记密码</a>
	    	<input type="submit" value="登录" name="submit" onClick="return checkinput();">
            </form>
	    </div>
	</div>
	<div class="login-bottom">
		<h3>新用户&nbsp;&nbsp;<a href="register.php">注册</a></h3>
	</div>
</div>	