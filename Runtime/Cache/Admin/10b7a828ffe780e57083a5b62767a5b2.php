<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style type="text/css">
	input{
		width: 80px;
	}
	.info span{
	padding: 0px 10px 0px 10px;
	}
	#export{
		float: right;
	}
	#export a{
		padding: 10px;
	}
	#data{
		color: red;
		float: right;
	}
</style>
</head>
<body>
	<div   class="content">	
		<div class="info">学号：<span id="stu_idnum"><?php echo ($stu_idnum); ?></span>姓名：<span><?php echo ($stu_name); ?></span> <span id="data"></span></div>

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
					<td><?php echo ($vo["cou_name"]); ?></td>
					<td class="cou_number"><?php echo ($vo["cou_number"]); ?></td>
					<td ><span class="hide"><?php echo ($vo["cou_normal"]); ?></span><input type="text" name="cou_normal" value="<?php echo ($vo["cou_normal"]); ?>"></td>
					<td ><span class="hide"><?php echo ($vo["cou_midterm"]); ?></span><input type="text" name="cou_midterm" value="<?php echo ($vo["cou_midterm"]); ?>"></td>
					<td ><span class="hide"><?php echo ($vo["cou_end"]); ?></span><input type="text" name="cou_end" value="<?php echo ($vo["cou_end"]); ?>"></td>
					<td ><span class="hide"><?php echo ($vo["cou_total"]); ?></span><input type="text" name="cou_total" value="<?php echo ($vo["cou_total"]); ?>"></td>
					<td class="submit"><button>提交</button><span></span></td>
				</tr><?php endforeach; endif; ?>
		  </tbody>
		</table>


	</div>
	
	<script src="/educate/Public/home/js/Blob.js"></script>
	<script src="/educate/Public/home/js/FileSaver.js"></script>
	<script src="/educate/Public/home/js/tableExport.js"></script>
	<script>
	var $exportLink = document.getElementById('export');

	$exportLink.addEventListener('click', function(e){

		e.preventDefault();
		var text=$("#cou_name").text();
		if(e.target.nodeName === "A"){

			tableExport('table2', text, e.target.getAttribute('data-type'));

		}

	}, false);

	$("#hide").hide();
	$(".submit").click(function(){
		$.post("<?php echo U('admin/Students/do_alter');?>",
	    {
	    	cou_number:$(this).siblings().filter(".cou_number").text(),
	    	stu_idnum:$("#stu_idnum").text(),//获取第一个值
			cou_normal:$(this).siblings().children().filter("input[name='cou_normal']").val(),
			cou_midterm:$(this).siblings().children().filter("input[name='cou_midterm']").val(),
			cou_end:$(this).siblings().children().filter("input[name='cou_end']").val(),
			cou_total:$(this).siblings().children().filter("input[name='cou_total']").val()
	    },
	    function(data,status){
	        if(status=="success")
	        {
	        	$("#data").show();
	        	$("#data").text(data);
	        	setTimeout(function(){
	   	        	$("#data").fadeOut();
					$("#data").fadeOut(1000);     		
				},500);
	        }
	    });

	});


	</script>
</body>
</html>