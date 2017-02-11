<?php
namespace Admin\Controller;
class StudentsController extends BaseController{

	public function addStudent()
	{
		$this->isLogin();
		$this->addDate(D('Students'));
	}

	public function searchStudent()
	{
		$this->isLogin();
		$Student=D('Students');
		$thead= '<thead><tr><th>姓名</th><th>学号</th><th>班级</th><th>注册时间</th> <th>删除</th><th>修改</th> </tr></thead>';
  		$field='stu_name,stu_idnum,stu_class,stu_enrol';
  		$order='stu_enrol';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Student,$field,$order,$thead,$condition);
	}

	public function deleteStudent()
	{
		$this->isLogin();
		$this->delete(D('Students'));
	}

	public function alterStudent()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Students'));
		}
		else
		{
			
			$who['stu_idnum']=I('stu_idnum');
			$result=D('Students')->where($who)->field('stu_name,stu_idnum,stu_class,stu_idcard,stu_password')->find();
			$this->assign('result',$result);
			$this->display();
		}
		
	}

}

?>