<style type="text/css">
.personIntro{width:1160px;}
._ban{width:1160px;text-align:center;height:40px;line-height:40px;border-top:1px #999 solid;margin-top:10px;}
._ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;}
._ban a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}

.intro_con{border:2px #999 dashed;padding:20px;width:800px;border-radius:20px;margin:0 auto;margin-top:10px;}
.intro_con div{margin-top:10px;}
.intro_con .intro_con_left, .intro_con .intro_con_right{display:inline-block;vertical-align: top;}
.intro_con .intro_con_right{margin-left:150px;}
.intro_con .intro_con_left{margin-left:80px;}

.intro_con .intro_form{width:800px;text-align:center;}
.intro_con .intro_form a{text-decoration:none;text-align:center;background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}

.intro_con1{border:2px #999 dashed;padding:20px;width:800px;border-radius:20px;margin:0 auto;margin-top:10px;}

.intro_con1 .intro_con1_top{margin-left:230px;}
.intro_con1 .intro_con1_top div{margin-top:10px;}
.intro_con1 .intro_con1_top input[type="password"]{border:1px #999 solid;width:200px;border-radius:5px;padding:5px;background-color:rgba(255,255,255,0);}
.intro_con1 .intro_con1_bottom{width:800px;margin:0 auto;margin-top:20px;text-align:center;}
.intro_con1 .intro_con1_bottom input[type="reset"], .intro_con1 .intro_con1_bottom input[type="submit"]{text-align:center;background: #ff9406;color: #FFF;font-size: 15px;font-weight: 400;padding: 8px 7px;width:70px;display: inline-block;cursor: pointer;border-radius: 6px;margin: 0px 5px 0px 1px;outline: none;border: none;}
</style>
<script type="text/javascript">
function showLog3(s){
	var xmlhttp;    
    if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("intro_con").innerHTML=xmlhttp.responseText;
			document.getElementsByClassName("_ban")[0].childNodes[1].style="text-decoration:none;color:#000;padding-left:20px;padding-right:20px;";
			document.getElementsByClassName("_ban")[0].childNodes[2].style="text-decoration:none;color:#000;padding-left:20px;padding-right:20px;";
			document.getElementsByClassName("_ban")[0].childNodes[s].style+="padding-bottom:3px;border-bottom:2px #ff9406 solid;";
        }
     }
    if(s==1) xmlhttp.open("GET","personIntro_mes.php",true);
	else if(s==2) xmlhttp.open("GET","personIntro_pwd.php",true);
    xmlhttp.send();
}
</script> 
<div class="personIntro">
	<div class="_ban">
    	<a href="javascript:showLog3(1);" style="padding-bottom:3px;border-bottom:2px #ff9406 solid;">个人信息管理</a><a href="javascript:showLog3(2);">密码修改</a>
    </div>
    
    <div id="intro_con">
    <?php include("personIntro_mes.php"); ?>
    </div>
</div>
