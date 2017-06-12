<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

	public function tea_login()
    {
        if(session('tea_login')=='is_teacher')$this->success('你已登录',U('Home/Index/tea_index'));
        else if(IS_POST)
        {
            $count=M()->table('ttea_information')->where(array('tea_idnum'=>$_POST['name']))->count();
            if($count)
            {
                $result=M()->table('ttea_information')->where(array('tea_idnum'=>$_POST['name']))->field('tea_password')->find();
                if($result['tea_password']==$_POST['password'])
                {
                    session('tea_name',$_POST['name']);
                    //session(array('login'=>'is_teacher','expire'=>1800));
                    session('tea_login','is_teacher');
                    $this->success('登录成功',U('Home/Index/tea_index'));
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
    public function tea_login_out()
    {
        session('tea_name',null);
        session('tea_login',null);
        $this->success('退出成功',U('Home/index/tea_login'));
    }


	public function login()
	{
		if(session('stu_login')=='is_student')$this->success('你已登录',U('Home/Index/index'));
		else if(IS_POST)
		{
            $count=M()->table('tstu_information')->where(array('stu_idnum'=>$_POST['name']))->count();
            if($count)
            {
            	$result=M()->table('tstu_information')->where(array('stu_idnum'=>$_POST['name']))->field('stu_password')->find();
            	if($result['stu_password']==$_POST['password'])
            	{
            		session('stu_name',$_POST['name']);
                    //session(array('login'=>'is_student','expire'=>1800));
                    session('stu_login','is_student');
            		$this->success('登录成功',U('Home/Index/index'));
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
    public function login_out()
    {
        session('stu_name',null);
        session('stu_login',null);
        $this->success('退出成功',U('Home/index/login'));
    }

    public function index()
    {
        $this->is_stu_login();
        $this->display();
    }

    public function tea_index()
    {
        $this->is_tea_login();
        $this->display();
    }
    
    public function welcome()
    {
       //  $a="<a href='".U('Home/Index/tea_login')."'>老师登录</a><br>"
       //  ."<a href='".U('Home/Index/login')."'>学生登录</a><br>".
       // "<a href='".U('admin/login/login')."'>管理员登录</a><br>";
       $this->assign('login',$a);
       $this->display();
    }




}