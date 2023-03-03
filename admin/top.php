<style type="text/css">
#top{width:1160px;background-color:rgba(204,204,204,0.3);}
#link{width:1000px;height:50px;padding-left:80px;padding-right:80px;}
#link .dropdown{position: relative;display:inline-block;width:200px;height:50px;text-align:center;line-height:50px;margin-right:40px;}
#link .dropdown:hover{cursor:pointer;}
#link .dropdown a{text-decoration:none;color:#000;}
.dropdown-content{display: none; position: absolute;min-width: 200px;box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);background-color:rgb(248,244,221);z-index: 1;}
.dropdown-content a {color: #000;text-decoration: none;display: block;z-index: 1;}
.dropdown-content a:hover{background-color: rgba(204,102,102,0.6);}
.dropdown:hover .dropdown-content{display: block;}

#top .top_tittle{width:1160px;line-height:80px;text-align:center;font-family:'黑体';font-size:20px;font-weight:600;margin-bottom:10px;}
#top .top_login{float:right;display:inline-block;vertical-align: top;margin-right:10px;}
#top .top_login a{text-decoration:none;color:#000;}
#top .top_login a:hover{color: #0066CC;}
</style>

<?php
if(!session_id()){session_start();} 
if(!isset($_SESSION['adminid'])) echo "<script>window.location='index.php';</script>";
?>

<div id="top">
	<div class="top_login">
		您好，<?php echo $_SESSION['adminname'];?>&nbsp;&nbsp;管理员&nbsp;&nbsp;<a href="logout.php">点击注销</a>
	</div><br>
	<div class="top_tittle">长岗北路talk后台管理系统</div>
</div>
<div id="link">
	<div class="dropdown" id="admin_user"><a href="">管理用户</a>
    	<div class="dropdown-content">
        	<a href="user_lookinfo.php?ck=1">用户信息查看</a>
            <a href="user_mguser.php">用户管理</a>
            <a href="user_message.php">私信用户</a>
            <a href="user_ucom.php">用户举报管理</a>
            <a href="user_appeal.php">用户申诉受理</a>
        </div>
    </div>
    <div class="dropdown" id="admin_log"><a href="">管理博文</a>
    	<div class="dropdown-content">
        	<a href="log_lookinfo.php?ck=1">博文查看</a>
            <a href="log_gtlog.php?ck=1">博文管理</a>
        </div>
    </div>
    <div class="dropdown" id="admin_topic"><a href="">管理话题</a>
    	<div class="dropdown-content">
        	<a href="topic_lookinfo.php?ck=1">话题查看</a>
            <a href="topic_gttopic.php">话题审核</a>
        </div>
    </div>
    <div class="dropdown" id="admin_admin"><a href="">管理员管理</a>
    	<div class="dropdown-content">
        	<a href="admin_info.php">信息查看</a>
        </div>
    </div>
</div>