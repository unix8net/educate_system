<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/<?php echo ($out); ?>index.css">
<script type="text/javascript" src="/educate/Public/home/js/<?php echo ($out); ?>index.js"></script>	


</head>
<body>

	<div class="content">
		<div id="welcome">
		  <ul class="nav nav_right navbar-nav">
		      <li><a href="/educate/index.php/Home/PersonInfo/showPerson.html"  id="welcome">欢迎你：<?php echo ($name); ?></a></li>
		      <li><a href="/educate/index.php/Home/Index/<?php echo ($out); ?>login_out.html" >注销</a></li>
		  </ul>
		</div>


		<form class="search" action="<?php echo U('home/PublicInquire/ClassInfo');?>?who=<?php echo ($out); ?>" method="post">
	    	<span>班级代码</span>
	    	<input type="" name="cla_code" value="<?php echo ($get["cla_code"]); ?>">
	    	<span>班级名称</span>
	    	<input type="" name="cla_name" value="<?php echo ($get["cla_name"]); ?>">
	    	<span>专业代码</span>
	    	<input type="" name="pro_code" value="<?php echo ($get["pro_code"]); ?>">
	    	<span>专业名称</span>
	    	<input type="" name="pro_name" value="<?php echo ($get["pro_name"]); ?>">
	    	<button type="submit">查询</button>
		</form>


		<table class="table table-hover table-bordered">
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td ><?php echo ($vo["cla_code"]); ?></td>
					<td ><?php echo ($vo["cla_name"]); ?></td>
					<td ><?php echo ($vo["pro_code"]); ?></td>
					<td ><?php echo ($vo["pro_name"]); ?></td>
					<td><a href="<?php echo U('Home/PublicInquire/show_class_stu');?>?cla_code=<?php echo ($vo["cla_code"]); ?>&cla_name=<?php echo ($vo["cla_name"]); ?>&who=<?php echo ($out); ?>">查看</a></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>

		</table>
		<?php echo ($page); ?>
	</div>

</body>
</html>