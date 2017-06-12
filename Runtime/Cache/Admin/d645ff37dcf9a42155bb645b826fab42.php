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

	<form action="<?php echo U('Admin/Profess/searchProfess');?>" method="post" class="form-search">

		<select class="form-control" name='type'> 
			<option value="pro_code">专业代码</option> 
			<option value="pro_name">专业名称</option> 
		</select>
 		<input style="margin-left: 100px" type="text" name="name" class="input-medium search-query" value="<?php echo ($value); ?>">
 		<button type="submit" class="btn">Search</button>

	</form>

	
	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["pro_code"]); ?></td>
				<td><?php echo ($vo["pro_name"]); ?></td>
				<td><?php echo ($vo["pro_academy"]); ?></td>
				<td><?php echo ($vo["pro_level"]); ?></td>
				<td><?php echo ($vo["pro_year"]); ?></td>
				<td><?php echo ($vo["pro_type"]); ?></td>
				<td><a href="<?php echo U('Admin/Class/manageClass');?>?pro_code=<?php echo ($vo["pro_code"]); ?>">班级管理</a></td>
				<td><a href="<?php echo U('Admin/Profess/deleteProfess');?>?pro_code=<?php echo ($vo["pro_code"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Admin/Profess/alterProfess');?>?pro_code=<?php echo ($vo["pro_code"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<?php echo ($page); ?>
	
</body>
</html>