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
		#time{
			height: 50px;
			position:fixed;
			right: 50px;
			top:80px;
		}
	</style>

</head>
<body>
	<div class="bar">
		
	</div>

	<div id="time">倒计时开始</div>

	<h3 style="text-align: center;">课程名：<?php echo ($get["cou_name"]); ?> 课程编号：<?php echo ($get["cou_number"]); ?></h3>
	<h3>选择题</h3>
	<form action="<?php echo U('exam/do_submit');?>">
		<?php if(is_array($check)): foreach($check as $key=>$vo): ?><div class="check">
				<div class="title"><h4><?php echo ($vo["title"]); ?></h4></div>
				<span><input class="check_item" name="<?php echo ($vo["id"]); ?>" type="radio" value="A" />&nbspA、<?php echo ($vo["answera"]); ?></span> 
				<span><input class="check_item" name="<?php echo ($vo["id"]); ?>" type="radio" value="B" />&nbspB、<?php echo ($vo["answerb"]); ?></span> 
				<span><input class="check_item" name="<?php echo ($vo["id"]); ?>" type="radio" value="C" />&nbspC、<?php echo ($vo["answerc"]); ?> </span> 
				<span><input class="check_item" name="<?php echo ($vo["id"]); ?>" type="radio" value="D" />&nbspD、<?php echo ($vo["answerd"]); ?> </span> 
			</div><?php endforeach; endif; ?>
		

		<input type="submit">
	</form>
	<script type="text/javascript">
	var global1=0;
	var global2=0;
	var total=<?php echo ($count); ?>;

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

	var times = 45*60;//剩余时间,单位秒
	var timeObj = null;
	function timer(){
	     if(times == 0){
	         //倒计时结束，提交表单
	         $("form").submit();
	         window.clearInterval(timeObj);
	         return;
	     }
	     var t = Math.floor(times/60) +"分"+times%60+"秒"
	      $("#time").html(t);
	     times--;
	 }
	 timeObj = window.setInterval(timer,1000);

	</script>
</body>
</html>