<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>所有管理员</title>
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body{
      width:90%;
      margin:auto;
    }
  </style>
</head>
<body>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>姓名</th>
      <th>身份证</th>
      <th>联系方式</th>
      <th>权限</th>
    </tr>
  </thead>
  <tbody>
	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
			<td><?php echo ($vo["adm_name"]); ?></td>
			<td><?php echo ($vo["adm_idcard"]); ?></td>
			<td><?php echo ($vo["adm_contact"]); ?></td>
      <td><?php echo ($vo["adm_permission"]); ?></td>
		</tr><?php endforeach; endif; ?>
    </tr>
  </tbody>
</table>
<?php echo ($page); ?>
</body>
</html>