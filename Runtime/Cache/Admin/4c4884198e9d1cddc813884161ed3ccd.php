<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="/educate/Public/css/bootstrap.min.css" rel="stylesheet">
  	<link href="/educate/Public/css/bootstrap-responsive.min.css" rel="stylesheet">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

  	<style type="text/css">
  		
		body{  
			margin-left:auto;
			margin-right:auto;
			width:90%;
		}

  	</style>
</head>
<body>

	<table class="table table-hover table-bordered">
	 <?php echo ($thead1); ?>
	  <tbody>
		<?php if(is_array($list1)): foreach($list1 as $key=>$vo): ?><tr>
				<td><?php echo ($vo["cou_code"]); ?></td>
				<td><?php echo ($vo["cou_name"]); ?></td>
				<td><?php echo ($vo["pro_academy"]); ?></td>
				<td><?php echo ($vo["cou_credit"]); ?></td>
				<td><?php echo ($vo["cou_type"]); ?></td>
				<td><a href="<?php echo U('Admin/Course/deleteCourse');?>?cou_code=<?php echo ($vo["cou_code"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Admin/Course/alterCourse');?>?cou_code=<?php echo ($vo["cou_code"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<h3>子课程列表</h3>
	<table class="table table-hover table-bordered">
	 <?php echo ($thead2); ?>
	  <tbody>
		<?php if(is_array($list2)): foreach($list2 as $key=>$vo): ?><tr>
				<td><?php echo ($vo["cou_number"]); ?></td>
				<td><?php echo ($vo["cou_term"]); ?></td>
				<td><?php echo ($vo["cou_interval"]); ?></td>
				<td><?php echo ($vo["cou_place"]); ?></td>
				<td><?php echo ($vo["cou_total"]); ?></td>
				<td><?php echo ($vo["cou_remainder"]); ?></td>
				<td><?php echo ($vo["cou_time"]); ?></td>
				<td><a href="<?php echo U('Admin/Courseson/deleteCourseson');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Admin/Courseson/alterCourseson');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	
</body>
</html>