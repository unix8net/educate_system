<?php
namespace Admin\Controller;
class StudentsController extends BaseController{

	public function addStudent()
	{
		$this->isLogin();
        if(IS_POST)
        {
            if(D('Students')->create())
            {
                $result = D('Students')->add();
                if($result) {
    				$result=M()->table('tstu_information')->where("stu_idcard={$_POST['stu_idcard']}")->field("stu_idnum")->find();
					M()->table('tstu_detail')->data("stu_idnum={$result['stu_idnum']}")->add();
                    $this->success('数据添加成功！');
                }else{
                    $this->error('数据添加错误！');
                }
            }else{
                $this->error(D('Students')->getError());
            }
        }
        else
        {
        	$this->all_class();
            $this->display();
        }
	}

	public function searchStudent()
	{
		$this->isLogin();
		$Student=D('Students');
		$thead= '<thead><tr><th>姓名</th><th>学号</th><th>班级</th><th>注册时间</th> <th>删除</th><th>修改</th> </tr></thead>';
  		$field='stu_name,stu_idnum,cla_name,stu_enrol';
  		$join='left join tcla_code ON tstu_information.stu_class = tcla_code.cla_code';
  		$order='stu_enrol';
 		if($_POST['name']!='')$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Student,$field,$order,$thead,$condition,$join);
	}

	public function deleteStudent()
	{
		$this->isLogin();
        if(D('Students')->deleteMember())
    	{
    		M()->table('tstu_detail')->where("stu_idnum={$_GET['stu_idnum']}")->delete();
    		$this->error('修改失败');
    	}
    	else $this->success('修改成功');
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
			$result=D('Students')->where($who)->field('stu_name,cla_name,stu_idnum,stu_class,stu_idcard,stu_password')
			->join("left join tcla_code ON tstu_information.stu_class = tcla_code.cla_code")->find();

			$this->assign('result',$result);
			$this->all_class();
			$this->display();
		}
		
	}

	//修改成绩
	public function alter_score()
	{
		$this->isLogin();
		$Student=D('Students');
		$thead= '<thead><tr><th>姓名</th><th>学号</th><th>班级</th><th>修改成绩</th> </tr></thead>';
		$join=array("left join tcla_code ON tstu_information.stu_class = tcla_code.cla_code");
  		$field='stu_name,stu_idnum,cla_name';
  		$order='stu_idnum';
 		if($_POST['name']!='')$condition[$_POST["type"]]=$_POST['name'];
  		$this->search($Student,$field,$order,$thead,$condition,$join);
	}

	public function do_alter_score()
	{
		$this->isLogin();
		if($_GET[stu_idnum])
		{
			$table='tsel_record';
			$join=array(
				' left join tcou_score ON tsel_record.cou_number = tcou_score.cou_number and tsel_record.stu_idnum = tcou_score.stu_idnum',
				' left join tstu_information ON tstu_information.stu_idnum = tcou_score.stu_idnum',
				' left join tcla_code ON tcla_code.cla_code = tstu_information.stu_class',
				' left join tcou_information ON tcou_information.cou_number = tsel_record.cou_number',
				' left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
			$condition['cou_flag']=array('in','4,5');
			$condition['tsel_record.stu_idnum']=$_GET[stu_idnum];

			$field="stu_name,tsel_record.stu_idnum,tsel_record.cou_number,cou_name,cla_name,cou_normal,
					cou_midterm,cou_end,tcou_score.cou_total,cou_final";
			$thead="<thead><th>课程名</th><th>课程编号</th><th>平时成绩</th>
					<th>期中成绩</th><th>期末成绩</th><th>总评成绩</th><th>提交</th></tr></thead>";

	        $list =  M()->table($table)->join($join)->where($condition)->field($field)->select();
	        $this->assign('stu_idnum',$list[0][stu_idnum]);
	        $this->assign('stu_name',$list[0][stu_name]);
	        $this->assign('thead',$thead);
	        $this->assign('list',$list);// 赋值数据集

	        $this->display(); // 输出模板
		}	
	}
	public function do_alter()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$table="tcou_score";
			$field="cou_normal,cou_midterm,cou_end,cou_total";
			$condition['stu_idnum']=$_POST[stu_idnum];
			$condition['cou_number']=$_POST['cou_number'];

			if(M()->table($table)->data($_POST)->where($condition)->save())
			{
				echo "数据上传成功";
			}
			else
			{
				echo "数据上传失败";
			}
		}
	}

	protected function all_class()
	{
    	$_class=M()->table("tcla_code")->field("cla_code,cla_name")->select();
    	$this->assign('_class',$_class);
	}
	

}

?>