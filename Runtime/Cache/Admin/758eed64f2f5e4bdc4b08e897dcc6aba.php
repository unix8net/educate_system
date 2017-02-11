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
			width:60%;
		}
		select{
			position: absolute;
			width:80px;
		}
  	</style>
</head>
<body>

	<form action="<?php echo U('Admin/Adm/searchUser');?>" method="post" class="form-search">

		<select class="form-control" name='type'> 
			<option value="adm_name">姓名</option> 
			<option value="adm_permission">权限</option> 
		</select>
  		<input style="margin-left: 100px" type="text" name="name" class="input-medium search-query">
  		<button type="submit" class="btn">Search</button>
	</form>

	
	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["adm_name"]); ?></td>
				<td><?php echo ($vo["adm_contact"]); ?></td>
				<td><?php echo ($vo["adm_permission"]); ?></td>
				<td><a href="<?php echo U('Admin/Adm/deleteUser');?>?adm_name=<?php echo ($vo["adm_name"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Admin/Adm/showUserInfo');?>?adm_name=<?php echo ($vo["adm_name"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>

	  </tbody>
	</table>
	<?php echo ($page); ?>
	
</body>
</html>