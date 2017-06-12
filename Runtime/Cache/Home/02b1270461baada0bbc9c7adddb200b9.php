<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/index.css">
<script type="text/javascript" src="/educate/Public/home/js/index.js"></script>	


</head>

<body>
	<div class="content">
		<div id="welcome">
		  <ul class="nav nav_right navbar-nav">
		      <li><a href="/educate/index.php/Home/PersonInfo/showPerson.html"  id="welcome">欢迎你：<?php echo session('stu_name');?></a></li>
		      <li><a href="/educate/index.php/Home/Index/login_out.html" >注销</a></li>
		  </ul>
		</div>

		
		<h3>已选教材</h3>
		<table class="table table-hover table-bordered">
		 <?php echo ($thead1); ?>
		  <tbody>
			<?php if(is_array($list1)): foreach($list1 as $key=>$vo): ?><tr>
					<td><?php echo ($vo["edu_name"]); ?></td>
					<td><?php echo ($vo["edu_author"]); ?></td>
					<td><?php echo ($vo["edu_pubishing"]); ?></td>
					<td><?php echo ($vo["edu_price"]); ?></td>
					<td><?php echo ($vo["edu_remark"]); ?></td>
					<td><a href="<?php echo U('Home/ManageCourse/Unsubscribe_book');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">退订</a></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>

		<h3>教材预定</h3>
		<table class="table table-hover table-bordered">
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td><?php echo ($vo["edu_name"]); ?></td>
					<td><?php echo ($vo["edu_author"]); ?></td>
					<td><?php echo ($vo["edu_pubishing"]); ?></td>
					<td><?php echo ($vo["edu_price"]); ?></td>
					<td><?php echo ($vo["edu_remark"]); ?></td>
					<td><a href="<?php echo U('Home/ManageCourse/Booked_book');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">订购</a></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>
		<?php echo ($page); ?>
	</div>	
</body>
</html>