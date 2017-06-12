<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/educate/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/educate/Public/js/jquery-3.1.1.min.js"></script>
	<style type="text/css">
		body{
			width: 80%;
			margin: auto;
			padding-top: 30px;
		}
		textarea{
			width: 100%;
		}
		span{
			padding-right: 50px;
		}
		.check{
			padding-bottom: 30px;
		}

	</style>
</head>
<body>

	<div id="form">
		<textarea type="text" id="title"  placeholder="题目"></textarea><br> 
		<input type="text"  id="answera" class="notnone" placeholder="选项A"><br>
		<input type="text"  id="answerb" class="notnone" placeholder="选项B"><br>
		<input type="text"  id="answerc" class="notnone" placeholder="选项C"><br>
		<input type="text"  id="answerd" class="notnone" placeholder="选项D"><br>
		<select class="notnone" id="answer">
			<option>A</option>
			<option>B</option>
			<option>C</option>
			<option>D</option>
		</select>
		<button id="submit">添加题目</button>
		<button id="reset" type="reset">重置</button>
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
			title=global.toString()+"、"+title;
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
		}
	});


	function clear()
	{
		$("#title").val("");
		$("#answera").val("");
		$("#answerb").val("");
		$("#answerc").val("");
		$("#answerd").val("");
	}
</script>
</body>
</html>