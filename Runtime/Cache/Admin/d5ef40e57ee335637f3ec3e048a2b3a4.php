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
		form
		{
			margin-left:auto;
			margin-right:auto;
			width:70%;
		}
		select{
			position: absolute;
			width:80px;
		}
  	</style>
</head>
<body>

	<form action="<?php echo U('Admin/Courseson/showAll');?>" method="post" class="form-search">

		<select class="form-control" name='type' > 
			<option value="cou_number">课程序号</option> 
		</select>
 		<input style="margin-left: 100px" type="text" name="value" class="input-medium search-query" value="<?php echo ($value); ?>">
 		<button type="submit" class="btn">Search</button>
	</form>

	<h3>子课程列表</h3>
	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["cou_number"]); ?></td>
				<td><?php echo ($vo["cou_term"]); ?></td>
				<td><?php echo ($vo["cou_place"]); ?></td>
				<td><?php echo ($vo["cou_total"]); ?></td>
				<td><?php echo ($vo["cou_flag"]); ?></td>
				<td><?php echo ($vo["tea_name"]); ?></td>
				<td><a href="<?php echo U('Admin/Courseson/deleteCourseson');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Admin/Courseson/alterCourseson');?>?cou_number=<?php echo ($vo["cou_number"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<?php echo ($page); ?>
</body>
</html>