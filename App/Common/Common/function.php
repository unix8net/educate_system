<?php
header("Content-type:text/html;charset=utf-8");

/**
 * 检测验证码
 * @param  [type] $code [description]
 * @return [type]       [description]
 */
function check_verify($code)
{
	$verify=new \Think\Verify();
	return $verify->check($code,'');
}


function show_verify()
{
    $config = array(
     'fontSize' => 30, //  验证码字体大小
     'length' => 4, //  验证码位数
     'useNoise' => false, //  关闭验证码杂点
     );
    $Verify = new \Think\Verify($config);
    $Verify->entry();
}


?>