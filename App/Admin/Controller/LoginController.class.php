<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
 
	public function login()
	 {
        if(session('login')=='is_login')$this->success('你已登录',U('Admin/Index/index'));
	 	else if(IS_POST)
        {
            $data=$_POST;

            $count=D("Adm")->where(array('adm_name'=>$data['name']))->count();
            if($count)
            {
            	$result=D("Adm")->where(array('adm_name'=>$data['name']))->field('adm_password')->find();
            	if($result['adm_password']==$data['password'])
            	{
            		session('name',$data['name']);
                    //session(array('login'=>'is_login','expire'=>1800));
                    session('login','is_login');
            		$this->success('登录成功',U('Admin/Index/index'));
            	}
                else{
                	$this->error('密码错误');
                }
            }
            else
            {
                $this->error('用户名不存在');
            }
        }
        else
        {
            $this->display();
        }
	 }

	 /**
	  * 退出登录
	  * @return no 
	  */
	 public function logout()		
	 {
	 	session('name',null);
        session('login',null);
	 	$this->success('退出成功',U('Admin/Login/login'));
	 }
}
