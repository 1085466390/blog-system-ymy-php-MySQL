<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>用户管理</title>
<link rel="stylesheet" href="css/frame.css">
<style type="text/css">
.ban{width:1160px;height:40px;text-align:center;line-height:40px;}
.ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;margin-right:20px;}
.ban a:hover{padding-bottom:3px;border-bottom:2px #c5464a solid;transition: 0.5s all;}
.search{width:1160px;height:40px;text-align:center;}

.u{width:1130px;margin:0 auto;padding-left:30px;}
.u .urecord1 div, .u .urecord div{display:inline-block;vertical-align:top;border-bottom:1px #999 solid;padding-bottom:3px;padding-left:10px;padding-right:10px;text-align:center;}
.u .urecord1 .user, .u .urecord .user{width:50px;}
.u .urecord1 .uname, .u .urecord .uname{width:100px;}
.u .urecord1 .upic, .u .urecord .upic{width:100px;}
.u .urecord1 .time, .u .urecord .time{width:200px;}
.u .urecord1 .adtime, .u .urecord .adtime{width:200px;}
.u .urecord1 .uword, .u .urecord .uword{width:240px;}
.u .urecord1 .detail, .u .urecord .detail{width:100px;}
.u .urecord1 .ck1, .u .urecord .ck1{width:80px;}
.u .urecord1 .ck2, .u .urecord .ck2{width:80px;}
.u .urecord .upic img{margin-top:15px;}
.u .urecord .user, .u .urecord .uname, .u .urecord .upic, .u .urecord .time, .u .urecord .uword, .u .urecord .detail,.u .urecord .ck1, .u .urecord .ck2, .u .urecord .adtime{height:80px;line-height:80px;}
.u .urecord .detail a, .u .urecord .ck1 a{text-decoration:none;color:#000;}
.u .urecord .ck2:hover{cursor:pointer;}

.black_overlay{display:none;position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:#FFFFFF;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);}
.white_content{display:none;position:absolute;top:25%;left:25%;width:50%;padding:16px;border:4px dashed #999;border-radius:20px;margin:-32px;background-color:white;z-index:1002;overflow:auto;}

#light .button{width:100%;text-align:center;margin-top:20px;}
#light .button a{text-decoration:none;color:#000;background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;margin-right:50px;}

input[type="submit"] {background: #c5464a;color: #FFF;font-size: 17px;font-weight: 400;padding: 8px 7px;width:80px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 7px 0px 3px;outline: none;border: none;}

#search{width:1160px;padding:10px 0;}
#search form{position:relative;width:400px;margin:0 auto;}
.bar input{border:none;outline:none;top:0;right:0;width:383px;height:37px;padding-left:13px;border:2px solid #c5464a;border-radius:5px;background:transparent;}
.bar button{border:none;outline:none;position:absolute;height:42px;cursor:pointer;background:#c5464a;border-radius:0 5px 5px 0;width:80px;top:0;right:0;}
.bar button:before{content:"搜索";font-size:13px;color:#F9F0DA;}

#admin_user{background-color:rgb(204,102,102);border-radius:15px 15px 0px 0px;}
</style>

</head>

<body>
<div id="banner">
	<?php ob_start();include("top.php"); include("conn.php"); if(isset($_GET['user']) && $_GET['user']!=''){$s_user=$_GET['user'];}?>
</div>
<div id="content">
    <div id="search" class="bar">
    	<form action="user_mguser.php" method="get">
        	<input type="text" placeholder="搜索用户id/用户昵称" name="user" value="<?php if(isset($_GET['user']) && $_GET['user']!='') echo $_GET['user'];?>">
            <button type="submit"></button>
        </form>
    </div>
    
    <div class="u">
    	<div class="urecord1">
        	<div class="user">用户id</div><div class="uname">用户名</div><div class="upic">用户头像</div><div class="time">注册时间</div><div class="adtime">冻结时间至</div><div class="detail">查看详情</div><div class="ck1">激活</div><div class="ck2">冻结</div>
        </div>
        <div class="urecord">
        	<?php
			if(isset($s_user)){$sql=mysqli_query("select * from tb_tk_user where user_uid='$s_user' or user_uname='$s_user'",$conn);}
			else{$sql = mysqli_query("select * from tb_tk_user",$conn);}
			
			while($info=mysqli_fetch_array($sql)){
			?>
            <div class="user"><?php echo $info['user_uid'];?></div><div class="uname"><?php echo $info['user_uname'];?></div><div class="upic"><img src="<?php echo '../'.$info['user_upic'];?>" width=50 height=50 alt=""></div><div class="time"><?php echo $info['user_bgtime'];?></div><div class="adtime"><?php if($info['user_ustate']==0){echo $info['user_utime'];}?></div><div class="detail"><a href="user_lookinfo_detail.php?id=<?php echo $info['user_uid'];?>">查看详情</a></div><div class="ck1"><a href="check_user_mguser_wake.php?id=<?php echo $info['user_uid'];?>&form_user_name=<?php echo $info['user_uname'];?>">激活</a></div><div class="ck2" onclick="dakai('<?php echo $info['user_uid'];?>','<?php echo $info['user_uname'];?>')">冻结</div>
            <?php
			}
			?>
        </div>
    </div>
    
</div>

<div id="light" class="white_content">
    <div id="light_user">用户：</div>
	<div id="light_user_name">用户名：</div>
    <div>
    	<form action="check_user_mguser_lock.php" method="post">
        <input type="hidden" value="" id="form_user" name="form_user">
		<input type="hidden" value="" id="form_user_name" name="form_user_name">
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

function dakai(name,uname){
document.getElementById('light').style.display='block';
document.getElementById('fade').style.display='block';
document.getElementById('light_user').innerHTML='用户：'+name;
document.getElementById('light_user_name').innerHTML='用户名：'+uname;
document.getElementById('form_user').value=name;
document.getElementById('form_user_name').value=uname;
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