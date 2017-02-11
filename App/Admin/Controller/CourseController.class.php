<?php
namespace Admin\Controller;
class CourseController extends BaseController{
	public function addCourse()
	{
		$this->isLogin();
		$this->addDate(D('Course'));
	}
	public function searchCourse()
	{
		$this->isLogin();
		$Teacher=D('Course');
		$thead= '<thead><tr><th>课程代码</th><th>课程名称</th><th>开课院系</th><th>学分</th><th>类别</th> <th>删除</th><th>更多</th></tr></thead>';
  		$field='cou_code,cou_name,pro_academy,cou_credit,cou_type';
  		$order='cou_code';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Teacher,$field,$order,$thead,$condition);
	}
	public function deleteCourse()
	{
		$this->isLogin();
		$this->delete(D('Course'));
	}
	public function alterCourse()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Course'));
		}
		else
		{
			$who['cou_code']=I('cou_code');
			$result=D('Course')->where($who)->find();
			$this->assign('result',$result);
			$this->display();
		}
	}

	/**
	 * 显示一个课程和这个课程对应的子课程
	 * @return no 
	 */
	public function showAll()
	{
		$this->isLogin();
		$couCode=I('cou_code');
		if($couCode)
		{
			$thead1= '<thead><tr><th>课程代码</th><th>课程名称</th><th>开课院系</th><th>学分</th><th>类别</th> <th>删除</th><th>修改</th></tr></thead>';
	  		$field1='cou_code,cou_name,pro_academy,cou_credit,cou_type';
	  		$order1='cou_code';
	  		$condition['cou_code']=$couCode;
	  		$list1 = D('Course')->where($condition)->order($order1)->select();	
	  		$this->assign('thead1',$thead1);
	  		$this->assign('list1',$list1);

	 		$list2=D('Courseson')->where($condition)->order('cou_number')->select();
			$thead2= '<thead><tr><th>课程序号</th><th>学年学期</th><th>教学周</th><th>教学地点</th><th>总人数</th> <th>剩余人数</th> <th>添加时间</th><th>删除</th><th>修改</th></tr></thead>';
			$this->assign('thead2',$thead2);
			$this->assign('list2',$list2);
			$this->display();	 		
		}
		else
		{
			echo "打开方式不对";
		}
	
	}
} 
?>