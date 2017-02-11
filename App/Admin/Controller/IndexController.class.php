<?php
namespace  Admin\Controller;

class IndexController extends BaseController
{
	//后台首页
	public function index()
	{
		if(session('login')=='is_login')
		{
			$this->display();
		}
		else
		{
			$this->success('请登录 ',U('Admin/Login/login'));
		}
	}
}

?>