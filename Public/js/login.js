$(document).ready(function(){
	$("#reset").click(function(){
		$(input).text("");
	});
	$("button").mouseenter(function(){
		$(this).addClass("btn-success");
		$(this).removeClass("btn-default");
	});
	$("button").mouseleave(function(){
		$(this).removeClass("btn-success");
		$(this).addClass("btn-default");	
	});
});