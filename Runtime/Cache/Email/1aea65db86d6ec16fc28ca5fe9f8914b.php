<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/educate/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/educate/Public/js/jquery-3.1.1.min.js"></script>
	<style type="text/css">
		body{
			width: 70%;
			margin: auto;
			padding-top: 30px;
		}
		span{
			padding-right: 50px;
		}
		.check{
			padding-bottom: 30px;
			padding-left: 30px;
		}
		.fill{
			padding-bottom: 30px;
			padding-left: 50px;
		}
		.t_input{
			width:60px; border:0; border-bottom:1px solid #000; text-align:center;
		}
		.bar{
			    position: fixed;
			    top: 0;
			    left: 0;
			    z-index: 40;
			    width: 0%;
				height: 5px;
				background-color: green;
			    transition: width 0.3s linear 0.3s;
		}

	</style>

</head>
<body>
	<div class="bar">
		
	</div>
	<h3>选择题</h3>
	<form>
		<div class="check">
			<div class="title"><h4>您最喜欢水果？</h4></div>
			<span><input class="check_item" name="Fruit" type="radio" value="A" />&nbspA、苹果 </span> 
			<span><input class="check_item" name="Fruit" type="radio" value="B" />&nbspB、桃子 </span> 
			<span><input class="check_item" name="Fruit" type="radio" value="C" />&nbspC、香蕉 </span> 
			<span><input class="check_item" name="Fruit" type="radio" value="D" />&nbspD、梨 </span> 
		</div>
		<div class="check">
			<div class="title"><h4>您最喜欢水果？</h4></div>
			<span><input class="check_item" name="Frui" type="radio" value="A" />&nbspA、苹果9 </span> 
			<span><input class="check_item" name="Frui" type="radio" value="B" />&nbspB、桃子 </span> 
			<span><input class="check_item" name="Frui" type="radio" value="C" />&nbspC、香蕉 </span> 
			<span><input class="check_item" name="Frui" type="radio" value="D" />&nbspD、梨 </span> 
		</div>
		<div class="check">
			<div class="title"><h4>您最喜欢水果？</h4></div>
			<span><input class="check_item" name="Frui1" type="radio" value="A" />&nbspA、苹果 </span> 
			<span><input class="check_item" name="Frui1" type="radio" value="B" />&nbspB、桃子 </span> 
			<span><input class="check_item" name="Frui1" type="radio" value="C" />&nbspC、香蕉 </span> 
			<span><input class="check_item" name="Frui1" type="radio" value="D" />&nbspD、梨 </span> 
		</div>
		<div class="check">
			<div class="title"><h4>您最喜欢水果？</h4></div>
			<span><input class="check_item" name="Frui2" type="radio" value="A" />&nbspA、苹果9 </span> 
			<span><input class="check_item" name="Frui2" type="radio" value="B" />&nbspB、桃子 </span> 
			<span><input class="check_item" name="Frui2" type="radio" value="C" />&nbspC、香蕉 </span> 
			<span><input class="check_item" name="Frui2" type="radio" value="D" />&nbspD、梨 </span> 
		</div>
		<div class="check">
			<div class="title"><h4>您最喜欢水果？</h4></div>
			<span><input class="check_item" name="Frui3" type="radio" value="A" />&nbspA、苹果 </span> 
			<span><input class="check_item" name="Frui3" type="radio" value="B" />&nbspB、桃子 </span> 
			<span><input class="check_item" name="Frui3" type="radio" value="C" />&nbspC、香蕉 </span> 
			<span><input class="check_item" name="Frui3" type="radio" value="D" />&nbspD、梨 </span> 
		</div>
		<div class="check">
			<div class="title"><h4>您最喜欢水果？</h4></div>
			<span><input class="check_item" name="Frui4" type="radio" value="A" />&nbspA、苹果9 </span> 
			<span><input class="check_item" name="Frui4" type="radio" value="B" />&nbspB、桃子 </span> 
			<span><input class="check_item" name="Frui4" type="radio" value="C" />&nbspC、香蕉 </span> 
			<span><input class="check_item" name="Frui4" type="radio" value="D" />&nbspD、梨 </span> 
		</div>
		<h3>填空题</h3>
		<div class="fill">Pattern <input type="text1" class="t_input"></div>

		<input type="submit">
	</form>
	<script type="text/javascript">
	var global1=0;
	var global2=0;
	var total=7;

	$(".check").click(function(){
		check();
	});
	$(".fill input").blur(function(){
		var count=0;
		$(".fill input").each(function(){
			if($(this).val()!=""){
		        count++;
		    }
		});
		global1=count;
		add();
	});

	function check()
	{
		var count=0;
		var obj = document.getElementsByTagName("input");
		    for(var i=0; i<obj.length; i ++){
		        if(obj[i].checked){
		            count++;
		        }
		    }
		global2=count;
		add();
	}
	function add()
	{
		var per=(global2+global1)*100/total;
		$(".bar").width(per+"%");

	}
	</script>
</body>
</html>