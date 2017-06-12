<?php
namespace Home\Controller;
use Think\Controller;
class ExamController extends BaseController {

    public function exam()
    {
        $this->is_stu_login();
        $check=M()->table('exam')->where($_GET)->select();
        $count=count($check);

        $this->assign('check',$check);
        $this->assign('get',$_GET);
        $this->assign('count',$count);
        $this->display();
    }

    //处理提交
    public function do_submit()
    {
        $this->success("提交成功",U('Home/personinfo/showCurriculum'));
    }

    public function addexam()
    {
    	$this->is_tea_login();
    	$check=M()->table('exam')->where($_GET)->select();

    	$this->assign('check',$check);
    	$this->assign('get',$_GET);
    	$this->display();
    }
    public function del()
    {
    	if(M()->table('exam')->where($_GET)->delete())
    	{
    		$this->redirect('exam/addexam',array('cou_number'=>$_GET[cou_number]));
    	}

    }
    public function add_one()
    {

    	if(M()->table('exam')->data($_POST)->add())
    		echo "添加成功";
    	else
    		echo "添加失败";
    }
}