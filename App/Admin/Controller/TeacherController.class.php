<?php
namespace Admin\Controller;
class TeacherController extends BaseController{
	public function addTeacher(){
		$this->isLogin();
		$this->addDate(D('Teacher'));
	}
	public function searchTeacher()
	{
		$this->isLogin();
		$Teacher=D('Teacher');
		$thead= '<thead><tr><th>姓名</th><th>编号</th><th>专业</th><th>注册时间</th> <th>删除</th><th>修改</th> </tr></thead>';
  		$field='tea_name,tea_idnum,pro_code,tea_enrol';
  		$order='tea_enrol';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Teacher,$field,$order,$thead,$condition);
	}

	public function deleteTeacher()
	{
		$this->isLogin();
		$this->delete(D('Teacher'));
	}		

	public function alterTeacher()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Teacher'));
		}
		else
		{
			$who=I('tea_idnum');
			$result=D('Teacher')->where($who)->field('tea_name,tea_idnum,pro_code,tea_idcard,tea_password')->find();
			$this->assign('result',$result);
			$this->display();
		}
		
	}
}