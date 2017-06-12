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
	#data{
		color: red;
		float: right;
	}
	span{
		padding:10px;
	}
  	</style>
</head>
<body>
	<div id="data"></div>

	<form action="<?php echo U('Admin/system/set_course');?>" method="post" class="form-search">

		<select class="form-control" name='type' > 
			<option value="cou_number">课程序号</option> 
			<option value="cou_term">学年学期</option>
		</select>
 		<input style="margin-left: 100px" type="text" name="value" class="input-medium search-query" value="<?php echo ($value); ?>">
 		<button type="submit" class="btn">Search</button>
	</form>

	<table class="table table-hover table-bordered">
	 <?php echo ($thead); ?>
	  <tbody>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td class="cou_number"><?php echo ($vo["cou_number"]); ?></td>
				<td><?php echo ($vo["cou_name"]); ?></td>
				<td><?php echo ($vo["cou_term"]); ?></td>
				<td><?php echo ($vo["cou_time"]); ?></td>
				<td><?php echo ($vo["tea_name"]); ?></td>
				<td class="cou_flag"><?php echo ($vo["cou_flag"]); ?></td>
				<td class="dec"><button>向前</button></td>
				<td class="inc"><button>向后</button></td>
			</tr><?php endforeach; endif; ?>
	  </tbody>
	</table>
	<?php echo ($page); ?>
	<span>1：选课阶段</span><span>2：上课阶段</span><span>3：考试阶段</span>4：修改成绩、评教<span>5：完成阶段</span>
<script type="text/javascript">
	var global;
	$(".inc").click(function(){
		global=$(this);
		$.get("<?php echo U('Admin/System/inc_flag');?>",
	    {
	    	cou_number:$(this).siblings().filter(".cou_number").text(),
	    	cou_flag:$(this).siblings().filter(".cou_flag").text()
	    },
	    function(data,status){
	        if(status=="success")
	        {
	        	$("#data").show();
	        	$("#data").text(data);
	        	if(data=="改变成功")
        		{
        			var flag=parseInt(global.siblings().filter(".cou_flag").text())+1;
        			global.siblings().filter(".cou_flag").text(flag);
        		}
	        	setTimeout(function(){
	   	        	$("#data").fadeOut();
					$("#data").fadeOut(1000);     		
				},500);
	        }
	    });
	});
	$(".dec").click(function(){
		global=$(this);
		$.get("<?php echo U('Admin/System/dec_flag');?>",
	    {
	    	cou_number:$(this).siblings().filter(".cou_number").text(),
	    	cou_flag:$(this).siblings().filter(".cou_flag").text()
	    },
	    function(data,status){
	        if(status=="success")
	        {
	        	$("#data").show();
	        	$("#data").text(data);
	        	if(data=="改变成功")
        		{
        			var flag=parseInt(global.siblings().filter(".cou_flag").text())-1;
        			global.siblings().filter(".cou_flag").text(flag);
        		}
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