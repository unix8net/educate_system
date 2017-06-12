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
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["cla_code"]); ?></td>
				<td><?php echo ($vo["cla_name"]); ?></td>
				<td><?php echo ($vo["pro_code"]); ?></td>

				<td><a href="<?php echo U('Admin/Class/deleteClass');?>?cla_code=<?php echo ($vo["cla_code"]); ?>">删除</a></td>
				<td><a href="<?php echo U('Admin/Class/alterClass');?>?cla_code=<?php echo ($vo["cla_code"]); ?>">修改</a></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<?php echo ($page); ?>
</body>
</html>