$(document).ready(function(){
	//处理函数开始
	$(".navbar ul").children().eq(0).click(function(){
		$(".navbar ul li").removeClass("active");
		$(this).addClass("active");
		$(".leftnav ul").css({"display":"none"});
		var v=".nav"+1;
		//$(v).css({'display':'block'});
		$(v).fadeIn(1200);
		$(".leftnav ul li").removeClass("active");
		$(v).children().eq(0).addClass("active");

		var hf=$(v+" .a_first").attr("href");
		$("#content-iframe").attr("src",hf);
	});

	$(".navbar ul").children().eq(1).click(function(){
		$(".navbar ul li").removeClass("active");
		$(this).addClass("active");
		$(".leftnav ul").css({"display":"none"});
		var v=".nav"+2;
		//$(v).css({'display':'block'});
		$(v).fadeIn(1200);
		$(".leftnav ul li").removeClass("active");
		$(v).children().eq(0).addClass("active");

		var hf=$(v+" .a_first").attr("href");
		$("#content-iframe").attr("src",hf);
		
	});

	$(".navbar ul").children().eq(2).click(function(){
		$(".navbar ul li").removeClass("active");
		$(this).addClass("active");
		$(".leftnav ul").css({"display":"none"});
		var v=".nav"+3;
		//$(v).css({'display':'block'});
		$(v).fadeIn(1200);
		$(".leftnav ul li").removeClass("active");
		$(v).children().eq(0).addClass("active");

		var hf=$(v+" .a_first").attr("href");
		$("#content-iframe").attr("src",hf);

	});

		$(".navbar ul").children().eq(3).click(function(){
		$(".navbar ul li").removeClass("active");
		$(this).addClass("active");
		$(".leftnav ul").css({"display":"none"});
		var v=".nav"+4;
		//$(v).css({'display':'block'});
		$(v).fadeIn(1200);
		$(".leftnav ul li").removeClass("active");
		$(v).children().eq(0).addClass("active");

		var hf=$(v+" .a_first").attr("href");
		$("#content-iframe").attr("src",hf);

	});

		$(".navbar ul").children().eq(4).click(function(){
		$(".navbar ul li").removeClass("active");
		$(this).addClass("active");
		$(".leftnav ul").css({"display":"none"});
		var v=".nav"+5;
		//$(v).css({'display':'block'});
		$(v).fadeIn(1200);
		$(".leftnav ul li").removeClass("active");
		$(v).children().eq(0).addClass("active");

		var hf=$(v+" .a_first").attr("href");
		$("#content-iframe").attr("src",hf);

	});

		$(".navbar ul").children().eq(5).click(function(){
		$(".navbar ul li").removeClass("active");
		$(this).addClass("active");
		$(".leftnav ul").css({"display":"none"});
		var v=".nav"+6;
		//$(v).css({'display':'block'});
		$(v).fadeIn(1200);
		$(".leftnav ul li").removeClass("active");
		$(v).children().eq(0).addClass("active");

		var hf=$(v+" .a_first").attr("href");
		$("#content-iframe").attr("src",hf);

	});

	$(".leftnav ul li").click(function(){
		$(".leftnav ul li").removeClass("active");
		$(this).addClass("active");


	});


});
