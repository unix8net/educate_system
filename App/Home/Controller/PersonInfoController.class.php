<?php
namespace  Home\Controller;
class PersonInfoController extends BaseController
{

	//显示课表
	public function showCurriculum()
	{
		$this->is_stu_login();
		$table='tsel_record';
		$join=array('left join tcou_information ON tsel_record.cou_number = tcou_information.cou_number',
			'left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
				'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=array('in','2,3,4,5');
		$condition['stu_idnum']=session('stu_name');
		$condition['cou_term']=$_POST['cou_term'];

		$field="cou_name,tsel_record.cou_number,tea_name,cou_place,cou_interval";
		$thead="<thead><tr><tr><th>课程名</th><th>老师姓名</th><th>上课地点</th><th>上课周</th><th>查看考试</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();

        $this->assign('cou_term',$_POST['cou_term']);
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}

	//显示成绩
	public function showScore()
	{
		$this->is_stu_login();
		$table="tcou_score";
		$join=array('left join tcou_information ON tcou_score.cou_number = tcou_information.cou_number',
					'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$field="cou_name,tcou_score.cou_number,cou_normal,cou_midterm,cou_end,tcou_score.cou_total,cou_final,cou_point";
		$thead="<thead><tr><th>课程名</th><th>课程编号</th><th>平时成绩</th><th>期中成绩</th>
						<th>期末成绩</th><th>总评成绩</th><th>最终成绩</th><th>绩点</th></tr></thead>";
		$order="cou_name";

		$condition['cou_flag']=array('in','4,5');
		$condition['stu_idnum']=session('stu_name');
		$condition['cou_term']=$_POST['cou_term'];

		$this->assign('cou_term',$_POST['cou_term']);

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->select();
		foreach ($list as $key => $value) {
			if($list[$key]['cou_point']<1)
			{
				$list[$key]['cou_point']="不及格";
			}	
		}
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}

	//查看考试
	public function showExam()
	{
		$this->is_stu_login();
		$table='tsel_record';
		$join=array('left join tcou_information ON tsel_record.cou_number = tcou_information.cou_number',
			'left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
				'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=array('in','3');
		$condition['stu_idnum']=session('stu_name');


		$field="cou_name,tea_name,cou_place,cou_interval";
		$thead="<thead><tr><tr><th>课程名</th><th>监考教师</th><th>考试地点</th><th>考试时间</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();

        $this->assign('cou_term',$_POST['cou_term']);
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}
	//显示个人信息
	public function showPerson()
	{
		$this->is_stu_login();
		$table="tstu_information";
		$join=array('left join tstu_detail ON tstu_information.stu_idnum = tstu_detail.stu_idnum',
					'left join tcla_code ON tcla_code.cla_code = tstu_information.stu_class');

		$condition['tstu_information.stu_idnum']=session('stu_name');

		$field="tstu_information.stu_idnum,stu_qq,stu_idcard,stu_name,cla_name,stu_enrol,stu_sex,stu_native,
				stu_nation,stu_party,stu_birth,stu_address,stu_contact";

		$list=M()->table($table)->join($join)->where($condition)->field($field)->select();
		$this->assign('list',$list);
		$this->display();
	}

	//更新个人信息
	public function updateinfo()
	{
		$this->is_stu_login();
		if(M()->table("tstu_detail")->data($_POST)->where("stu_idnum=".session('stu_name'))->save())
		{
			$this->success("修改成功");
		}
		else
		{
			$this->error("修改失败");
		}

	}


	//修改密码
	public function alterPassword()
	{
		$this->is_stu_login();
		if(IS_POST)
		{
			if($_POST['new_password']==$_POST['repassword']&&$_POST['new_password']!='')
			{
				M()->table("tstu_information")->where("stu_idnum=".session('stu_name'))->field("stu_password")->data("stu_password=".$_POST['new_password'])->save();
				$this->success("修改成功",U('Home/PersonInfo/alterPassword'));
			}
		}
		else
		{
			$password=M()->table("tstu_information")->where("stu_idnum=".session('stu_name'))->field("stu_password")->find();
			$this->assign('password',$password['stu_password']);	
			$this->display();		
		}
	}
}
