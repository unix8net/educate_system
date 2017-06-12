<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="initial-scale=1,width=device-width,user-scalable=no"/>
 
<link rel="shortcut icon" href="image/login.ico">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/educate/Public/home/css/tea_index.css">
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">	
<script type="text/javascript" src="/educate/Public/home/js/tea_index.js"></script>
	<style type="text/css">
		textarea{
			width: 100%;
		}
		span{
			padding-right: 50px;
		}
		.check{
			padding-bottom: 30px;
		}
		#data{
			color: red;
			position: fixed;
			right: 0px;
		}
		.content{
			padding-bottom: 50px;
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
	<div class="content">
	<span id="data"></span>
		<h3 style="text-align:center;">课程名：<?php echo ($get["cou_name"]); ?> 课程编号：<?php echo ($get["cou_number"]); ?></h3>
		<a href="<?php echo U('exam/del');?>?cou_number=<?php echo ($get["cou_number"]); ?>">删除所有</a>

		<?php if(is_array($check)): foreach($check as $key=>$vo): ?><div class="check">
				<div class="title"><h4><?php echo ($vo["title"]); ?></h4></div>
				<span><input class="check_item" name="Frui" type="radio" value="A" />&nbspA、<?php echo ($vo["answera"]); ?></span> 
				<span><input class="check_item" name="Frui" type="radio" value="B" />&nbspB、<?php echo ($vo["answerb"]); ?> </span> 
				<span><input class="check_item" name="Frui" type="radio" value="C" />&nbspC、<?php echo ($vo["answerc"]); ?> </span> 
				<span><input class="check_item" name="Frui" type="radio" value="D" />&nbspD、<?php echo ($vo["answerd"]); ?> </span> 
				<span>答案：<?php echo ($vo["answer"]); ?> </span> 
			</div><?php endforeach; endif; ?>
		<h4>新添加的题目</h4>
		<div id="form">
			<textarea type="text" id="title"  placeholder="题目"></textarea><br> 
			<input type="text"  id="answera" class="notnone" placeholder="选项A">
			<input type="text"  id="answerb" class="notnone" placeholder="选项B">
			<input type="text"  id="answerc" class="notnone" placeholder="选项C">
			<input type="text"  id="answerd" class="notnone" placeholder="选项D">
			<select class="notnone" id="answer" >
				<option>A</option>
				<option>B</option>
				<option>C</option>
				<option>D</option>
			</select>
			<button id="submit">添加题目</button>
			<button id="reset" type="reset">重置</button>
		</div>
	</div>
<script type="text/javascript">
	var global=1;
	$("#reset").click(function(){
		clear();
	});

	$("#submit").click(function(){
		var title=$("#title").val();
		var answera=$("#answera").val();
		var answerb=$("#answerb").val();
		var answerc=$("#answerc").val();
		var answerd=$("#answerd").val();
		var answer=$("#answer").val();
		if(title=="")
		{	
			$("#title").focus();
			$("#title").attr('placeholder','此项不能为空');
		}
		else if(answera=="")
		{
			$("#answera").focus();
			$("#answera").attr('placeholder','此项不能为空');
		}
		else if(answerb=="")
		{
			$("#answerb").focus();
			$("#answerb").attr('placeholder','此项不能为空');
		}
		else if(answerc=="")
		{
			$("#answerc").focus();
			$("#answerc").attr('placeholder','此项不能为空');
		}
		else if(answerd=="")
		{
			$("#answerd").focus();
			$("#answerd").attr('placeholder','此项不能为空');
		}
		else
		{
			var name="item"+global.toString();
			global++;

			var all=	
				'<div class="check">'+
				'	<div class="title"><h4>'+title+'</h4></div>'+
				'	<span><input class="check_item" name="'+name+'" type="radio" value="A" />&nbspA、'+answera+' </span> '+
				'	<span><input class="check_item" name="'+name+'" type="radio" value="B" />&nbspB、'+answerb+' </span> '+
				'	<span><input class="check_item" name="'+name+'" type="radio" value="C" />&nbspC、'+answerc+' </span> '+
				'	<span><input class="check_item" name="'+name+'" type="radio" value="D" />&nbspD、'+answerd+' </span> '+
				'	<span>答案：'+answer+'</span>'+
				'</div>';
			$("#form").before(all);
			clear(); 
			$.post("<?php echo U('exam/add_one');?>", 
			{
				title,
				answera,
				answerb,
				answerc,
				answerd,
				answer,
				cou_number:'<?php echo ($get["cou_number"]); ?>'
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
		}
	});

	function clear()
	{
		$("#title").val("").attr('placeholder','题目');
		$("#answera").val("").attr('placeholder','答案A');
		$("#answerb").val("").attr('placeholder','答案B');
		$("#answerc").val("").attr('placeholder','答案C');
		$("#answerd").val("").attr('placeholder','答案D');

	}
</script>
</body>
</html>