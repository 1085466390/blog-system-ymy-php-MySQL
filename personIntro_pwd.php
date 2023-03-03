<?php
header('Content-Type:text/html;charset=utf-8');
?>
<div class="intro_con1">
	<form action="modify_pwd.php" method="post" name="modify_form" id="modify_form">
		<div class="intro_con1_top">
    	<div>原始密码输入：<input type="password" name="pw_old" id="pw_old"></div>
        <div>最新密码输入：<input type="password" name="pw_new" id="pw_new"></div>
        <div>最新密码确认：<input type="password" name="pw_new2" id="pw_new2"></div>
		</div>
		<div class="intro_con1_bottom">
        <input type="submit" value="提交" name="modify_submit" id="modify_submit" onclick="javascript:return check_modifypwd();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重置">
		</div>
	</form>
</div>