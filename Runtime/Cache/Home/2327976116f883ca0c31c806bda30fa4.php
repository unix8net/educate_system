<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/tea_index.css">
	
<script type="text/javascript" src="/educate/Public/home/js/tea_index.js"></script>
<style type="text/css">
	#export{
		float: right;
	}
	#export a{
		padding: 10px;
	}
</style>

</head>
<body>
	<div id="welcome">
	  <ul class="nav nav_right navbar-nav">
	      <li><a href="/educate/index.php/Home/teaInfo/showPerson.html"  id="welcome">欢迎你：<?php echo ($name); ?></a></li>
	      <li><a href="/educate/index.php/Home/Index/tea_login_out.html" >注销</a></li>
	  </ul>
	</div>
    
	<div   class="content">

		<h3>课程名：<?php echo ($cou_name); ?></h3>

		<span id="export">
			<a data-type="txt" href="javascript:;">导出txt</a>
			<a data-type="csv" href="javascript:;">导出excel</a>
			<a data-type="xls" href="javascript:;">导出csv</a>
			<a data-type="doc" href="javascript:;">导出word</a>
		</span>

		<table class="table table-hover table-bordered" id="table2">
		 <?php echo ($thead); ?>
		  <tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td ><?php echo ($vo["stu_name"]); ?></td>
					<td ><?php echo ($vo["stu_idnum"]); ?></td>
					<td><?php echo ($vo["cla_name"]); ?></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>

		</table>
		<?php echo ($page); ?>
	</div>
	<script src="/educate/Public/home/js/Blob.js"></script>
	<script src="/educate/Public/home/js/FileSaver.js"></script>
	<script src="/educate/Public/home/js/tableExport.js"></script>
	<script>
	var $exportLink = document.getElementById('export');

	$exportLink.addEventListener('click', function(e){

		e.preventDefault();
		var text=$("h3").text();
		if(e.target.nodeName === "A"){

			tableExport('table2', text, e.target.getAttribute('data-type'));

		}
	}, false);

	</script>
</body>
</html>