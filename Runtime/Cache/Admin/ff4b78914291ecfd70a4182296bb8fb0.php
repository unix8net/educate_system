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

	<form action="<?php echo U('Admin/Students/alter_score');?>" method="post" class="form-search">

		<select class="form-control" name='type'> 
			<option value="stu_idnum">学号</option> 
		</select>
 		<input style="margin-left: 100px" type="text" name="name" class="input-medium search-query">
 		<button type="submit" class="btn">Search</button>

	</form>

	
	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["stu_name"]); ?></td>
				<td><?php echo ($vo["stu_idnum"]); ?></td>
				<td><?php echo ($vo["cla_name"]); ?></td>
				<td><a href="<?php echo U('Admin/Students/do_alter_score');?>?stu_idnum=<?php echo ($vo["stu_idnum"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>

	  </tbody>
	</table>
	<?php echo ($page); ?>
	
</body>
</html>