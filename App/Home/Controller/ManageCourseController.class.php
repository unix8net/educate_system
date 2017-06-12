<?php
namespace  Home\Controller;
class ManageCourseController extends BaseController
{
	//选课
	public function pri_election()
	{
		$this->is_stu_login();
		//显示所有可选课程
		$table="tcou_information";
		$field="tcou_information.cou_number,cou_name,cou_total,cou_remainder,cou_interval,cou_place,tea_name";
		$order="cou_number";
		$join=array('left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code ',
				'left join ttea_information on tcou_information.tea_idnum=ttea_information.tea_idnum',
				'left join tsel_record on tcou_information.cou_number=tsel_record.cou_number');

		$thead="<thead><tr><th>课程编号</th><th>课程名称</th>
		<th>教学周区间</th><th>教室</th><th>总数</th>
		<th>剩余人数</th><th>老师</th>
		<th>退课</th></tr></thead>";
		$condition1['cou_flag']='1';
		$condition1['stu_idnum']=session('stu_name');
		//显示所有已选课程	
		$this->assign('thead1',$thead);
        $result=M()->table($table)->join($join)->where($condition1)->field($field)->select();
        $this->assign('list1',$result);

		$thead="<thead><tr><th>课程编号</th><th>课程名称</th>
		<th>教学周区间</th><th>教室</th><th>总数</th>
		<th>剩余人数</th><th>老师</th>
		<th>选课</th></tr></thead>";
		$condition['cou_flag']='1';
		$join=array('left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code ',
				'left join ttea_information on tcou_information.tea_idnum=ttea_information.tea_idnum');
		$this->search($table,$field,$order,$join,$thead,$condition);
	}


	/**
	 * 在学生选课的时候还要创建一条成绩记录,选课记录,改变课程的剩余人数
	 * @Author:刘平 @email:692603114@qq.com 2017-05-17
	 * @return
	 */
	public function join()
	{
		$this->is_stu_login();
		$condition['cou_number']=$_GET['cou_number'];
		$condition['stu_idnum']=session('stu_name');
		$count= M()->table("tsel_record")->where($condition)->count();
		if($count)
		{
			$this->error("已经选过了");
		}
		else
		{
			$con['cou_number']=$_GET['cou_number'];

			$cou_remainder=M()->table('tcou_information')->where($con)->field('cou_remainder')->find();
			$cou_remainder[cou_remainder]=$cou_remainder[cou_remainder]-1;
			
			if($cou_remainder[cou_remainder]<0)$this->error("已满");
			else
			{
				M()->table('tcou_information')->where($con)->data($cou_remainder)->save();

				//插入选课记录
				M()->table('tsel_record')->data($condition)->add();

				//插入成绩记录
				M()->table('tcou_score')->data($condition)->add();

				$this->success("选课成功");
			}
		}
	}


	public function unjoin()
	{
		$this->is_stu_login();
		$condition['cou_number']=$_GET['cou_number'];
		$condition['stu_idnum']=session('stu_name');
		$count= M()->table("tsel_record")->where($condition)->count();
		if($count)
		{
			//退课
			M()->table("tsel_record")->where($condition)->delete();

			//删除成绩记录
			M()->table('tcou_score')->where($condition)->delete();

			$con['cou_number']=$_GET['cou_number'];

			$cou_remainder=M()->table('tcou_information')->where($con)->field('cou_remainder')->find();
			$cou_remainder[cou_remainder]=$cou_remainder[cou_remainder]+1;
			M()->table('tcou_information')->where($con)->data($cou_remainder)->save();

			$this->success("退课成功");
		}
		else
		{
			$this->error("你还没有选过这个课");
		}
	}



	//教材选购
	public function selectBook()
	{
		$this->is_stu_login();
		$thead="<thead><tr><th>书名</th><th>作者</th>
		<th>出版社</th><th>价格</th><th>备注</th>
		<th>退订</th></tr></thead>";		
		$this->assign('thead1',$thead);

		$table="tsel_record";
		$field="tsel_record.cou_number,edu_name,edu_author,edu_pubishing,edu_price,edu_remark";
		$join=array('left join tcou_information ON tsel_record.cou_number = tcou_information.cou_number ',
				'left join tedu_textbook on tcou_information.cou_code=tedu_textbook.cou_code');
		$order="edu_price";
		$con1['stu_idnum']=session('stu_name');
		$con1['sel_flag']='2';
		$con1['cou_flag']='1';
		$list1=M()->table($table)->where($con1)->field($field)->join($join)->select();
		$this->assign('list1',$list1);

		$thead="<thead><tr><th>书名</th><th>作者</th>
		<th>出版社</th><th>价格</th><th>备注</th>
		<th>订购</th></tr></thead>";
		$con['stu_idnum']=session('stu_name');
		$con['sel_flag']='1';
		$con['cou_flag']='1';
		$this->search($table,$field,$order,$join,$thead,$con);
	}

	//预定
	public function Booked_book()
	{
		$this->is_stu_login();
		$condition['cou_number']=$_GET['cou_number'];
		$condition['stu_idnum']=session('stu_name');
		$value=M()->table('tsel_record')->where($condition)->field('sel_flag')->find();

		if($value['sel_flag']=='1')
		{	
			$value['sel_flag']='2';
			M()->table('tsel_record')->where($condition)->data($value)->save();
			$this->success("订购成功");	
		}
		else
		{
			$this->error("你已经订购");
		}
	}
	//退订
	public function Unsubscribe_book()
	{
		$this->is_stu_login();
		$condition['cou_number']=$_GET['cou_number'];
		$condition['stu_idnum']=session('stu_name');
		$value=M()->table('tsel_record')->where($condition)->field('sel_flag')->select();

		if($value['sel_flag']==1)
		{
			$this->error("你没有购买过");
		}
		else
		{
			$value['sel_flag']=1;
			M()->table('tsel_record')->where($condition)->data($value)->save();
			$this->success("退订成功");
		}
	}
	//期末评教
	public function judge_edu()
	{
		$this->is_stu_login();
		$condition['stu_idnum']=session('stu_name');
		$condition['cou_flag']=4;
		$thead="<thead><th>课程名</th><th>教师</th><th>打分</th></tr></thead>";	
		$table="tsel_record";
		$field="cou_name,tea_name,score,tsel_record.cou_number";
		$join=array('left join tcou_information ON tsel_record.cou_number = tcou_information.cou_number',
				'left join ttea_information ON tcou_information.tea_idnum = ttea_information.tea_idnum',
				'left join tcou_classification ON tcou_classification.cou_code = tcou_information.cou_code');	
		$order="tea_name";

        $list =  M()->table($table)->join($join)->where($condition)->field($field)->order($reder)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
	}

	public function judge()
	{
		$this->is_stu_login();
        foreach($_POST as $key=>$val) 
        {
        	$in=str_replace("_",".",$key);
        	$condition['stu_idnum']=session('stu_name');
        	$condition['cou_number']=$in;
			M()->table('tsel_record')->data("score={$val}")->where($condition)->save();
        }

        $this->success("评教成功");
	}
}



















