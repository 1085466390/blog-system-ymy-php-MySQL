<style type="text/css">
.personTopic{border:1px #000 dashed;width:1160px;height:500px;}
._ban{width:1160px;text-align:center;height:40px;line-height:40px;border:1px #000 dashed;}
._ban a{text-decoration:none;color:#000;padding-left:20px;padding-right:20px;}
._ban a:hover{padding-bottom:3px;border-bottom:2px #ff9406 solid;transition: 0.5s all;}
</style>

<div class="personTopic">
	<div class="_ban">
    	<a href="#">我关注的话题</a><a href="#">我发布的话题</a><a href="#">我讨论过的话题</a>
    </div>
    <div><?php include("topic_con.php");?></div>
</div>