<style type="text/css">
.personTopic{width:1160px;border-top:1px #999 solid;margin-top:10px;}
._ban{width:1160px;text-align:center;height:40px;line-height:40px;}
._ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;}
._ban a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}

.topic_con{margin:0 auto;width:1160px;border-bottom:1px #ccc solid;font-family:"黑体";padding-left:20px;padding-right:20px;padding-top:10px;padding-bottom:10px;}
.topic_con .title a{text-decoration:none;color:#000;font-size:20px;font-weight:600;}
.topic_con .time .flw{display:inline-block;float:right;text-align:center;height:30px;}
.topic_con .time .flw a{display:inline-block;width:70px;height:30px;line-height:30px;text-decoration:none;background-color:#C66;color:#fff;border-radius:5px;}
.topic_con .time{color:#999;font-size:16px;}
.topic_con .author{margin-top:10px;}
.topic_con .author a{text-decoration:none;color:#000;}
</style>
<?php $uid=$_GET['uid']; ?>
<script type="text/javascript">
function showLog2(s){
	var xmlhttp;    
    if (window.XMLHttpRequest) xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("topic_con").innerHTML=xmlhttp.responseText;
			document.getElementsByClassName("_ban")[0].childNodes[1].style="text-decoration:none;color:#000;padding-left:20px;padding-right:20px;";
			document.getElementsByClassName("_ban")[0].childNodes[2].style="text-decoration:none;color:#000;padding-left:20px;padding-right:20px;";
			document.getElementsByClassName("_ban")[0].childNodes[3].style="text-decoration:none;color:#000;padding-left:20px;padding-right:20px;";
			document.getElementsByClassName("_ban")[0].childNodes[s].style+="padding-bottom:3px;border-bottom:2px #ff9406 solid;";
        }
     }
    if(s==1) xmlhttp.open("GET","person_topic_detail.php?st=1&uid=<?php echo $uid;?>",true);
	else if(s==2) xmlhttp.open("GET","person_topic_detail.php?st=2&uid=<?php echo $uid;?>",true);
	else if(s==3) xmlhttp.open("GET","person_topic_detail.php?st=3&uid=<?php echo $uid;?>",true);
    xmlhttp.send();
}
</script>

<div class="personTopic">
	<div class="_ban">
    	<a href="javascript:showLog2(1);" style="padding-bottom:3px;border-bottom:2px #ff9406 solid;">关注的话题</a><a href="javascript:showLog2(2);">发布的话题</a><a href="javascript:showLog2(3);">讨论过的话题</a>
    </div>
    <div id="topic_con">
    <?php
	include("person_topic_detail.php");
	?>
    </div>
</div>