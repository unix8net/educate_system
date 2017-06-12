<?php
namespace Home\Controller;
use Think\Controller;
class teaCourseController extends BaseController
{
	//对老师的最终评教
	public function finalJudge()
	{
		$this->is_tea_login();
		$table='tcou_information';
		$join=array('left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
			'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=array('in','4,5');
		$condition['tcou_information.tea_idnum']=session('tea_name');
		$condition['cou_term']=$_POST['cou_term'];

		$field="cou_name,cou_term,tea_name,cou_number";
		$thead="<thead><tr><th>学年学期</th><th>课程名</th><th>老师姓名</th><th>评分</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();

        foreach ($list as $key => $value) {
			$join=array('left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
			'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code',
			'left join tsel_record on tsel_record.cou_number=tcou_information.cou_number');

			$cond['cou_flag']=array('in','4,5');
			$cond['tcou_information.tea_idnum']=session('tea_name');
			$cond['tcou_information.cou_number']=$list[$key]['cou_number'];

	        $score=M()->table("tcou_information")->join($join)->where($cond)->field("score")->avg('score');


        	$list[$key]['score']=floor($score*100)/100;
        }

        $this->assign('thead',$thead);
        $this->assign('cou_term',$_POST['cou_term']);
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
	}

	//上成绩
	public function registerScore()
	{
		$this->is_tea_login();
		$table='tcou_information';
		$join=array('left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
			'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=3;
		$condition['tcou_information.tea_idnum']=session('tea_name');
		$field="cou_name,tea_name,cou_number";
		$thead="<thead><tr><tr><th>课程名</th><th>老师姓名</th><th>录入成绩</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
	}

	//老师查看课表
	public function showCurriculum()
	{
		$this->is_tea_login();
		$table='tcou_information';
		$join=array('left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
			'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=array('in','2,3,4,5');
		$condition['tcou_information.tea_idnum']=session('tea_name');
		$condition['cou_term']=$_POST['cou_term'];


		$field="cou_name,tea_name,cou_place,cou_interval,cou_number";
		$thead="<thead><tr><tr><th>课程名</th><th>老师姓名</th><th>上课地点</th><th>上课周</th><th>查看学生</th><th>添加考试</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();
        $this->assign('cou_term',$_POST['cou_term']);
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
	}

	//查看某门课有哪些学生选
	public function class_stu()
	{
		$this->is_tea_login();
		$cou_number=$_GET['cou_number'];
		$table='tsel_record';
		$join=array('left join tstu_information ON tstu_information.stu_idnum = tsel_record.stu_idnum',
			'left join tcla_code ON tcla_code.cla_code = tstu_information.stu_class',
			'left join tcou_information ON tcou_information.cou_number = tsel_record.cou_number',
			'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=array('in','2,3,4,5');
		$condition['tsel_record.cou_number']=$cou_number;
		$field="stu_name,tsel_record.stu_idnum,cou_name,cla_name";
		$thead="<thead><tr><tr><th>姓名</th><th>学号</th><th>班级</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('cou_name',$list[0]['cou_name']);
        $this->display(); // 输出模板
	}

	//查看监考信息
	public function showExam()
	{
		$this->is_tea_login();
		$table='tcou_information';
		$join=array('left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
			'left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=3;
		$condition['tcou_information.tea_idnum']=session('tea_name');
		$field="cou_name,tea_name,cou_place,cou_interval,cou_number";
		$thead="<thead><tr><tr><th>课程名</th><th>监考老师</th><th>考试地点</th><th>时间</th><th>查看学生</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
	}

	//从上成绩的角度 查看某门课有哪些学生选
	public function stu_score()
	{
		$this->is_tea_login();
		$cou_number=$_GET['cou_number'];
		$table='tsel_record';
		$join=array(
			' left join tcou_score ON tsel_record.cou_number = tcou_score.cou_number and tsel_record.stu_idnum = tcou_score.stu_idnum',
			' left join tstu_information ON tstu_information.stu_idnum = tcou_score.stu_idnum',
			' left join tcla_code ON tcla_code.cla_code = tstu_information.stu_class',
			' left join tcou_information ON tcou_information.cou_number = tsel_record.cou_number',
			' left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code');
		$condition['cou_flag']=array('in','2,3,4,5');
		$condition['tsel_record.cou_number']=$cou_number;

		$field="stu_name,tsel_record.stu_idnum,cou_name,cla_name,cou_normal,
				cou_midterm,cou_end,tcou_score.cou_total,cou_final";
		$thead="<thead><tr><tr><th>学号</th><th>姓名</th><th>班级</th><th>平时成绩</th>
				<th>期中成绩</th><th>期末成绩</th><th>总评成绩</th><th>提交</th></tr></thead>";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('cou_name',$list[0]['cou_name']);
        $this->assign('cou_number',$cou_number);

        $this->display(); // 输出模板
	}
	public function do_stu_score()
	{
		$this->is_tea_login();
		if(IS_POST)
		{
			$table="tcou_score";
			$field="cou_normal,cou_midterm,cou_end,cou_total";
			$condition['stu_idnum']=$_POST[stu_idnum];
			$condition['cou_number']=$_POST['cou_number'];
			$_POST['cou_final']=$_POST[cou_total];
			if($_POST[cou_total]<60)
			{
				$_POST['cou_point']=0;
			}
			{
				$_POST['cou_point']=$_POST[cou_total]/10-5;
			}
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
}
?>