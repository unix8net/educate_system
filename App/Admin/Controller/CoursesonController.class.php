<?php
namespace Admin\Controller;
class CoursesonController extends BaseController{
	public function addCourseson()
	{
		$this->isLogin();
		$this->assign('cou_code',$_GET['cou_code']);
        if(IS_POST)
        {
            if(D('Courseson')->create())
            {
                $result = D('Courseson')->add();
                if($result) {
    				$data['cou_number']=$_POST['cou_number'];
					$data['tea_idnum']=$_POST['tea_idnum'];

					D('TeacherJudge')->data($data)->add();
                    $this->success('数据添加成功！');
                }else{
                    $this->error('数据添加错误！');
                }
            }else{
                $this->error(D('Courseson')->getError());
            }
        }
        else
        {
            $this->display();
        }

	}
	public function deleteCourseson()
	{
		$this->isLogin();
		$this->delete(D('TeacherJudge'));
		$this->delete(D('Courseson'));
	}
	public function alterCourseson()
	{
		$this->isLogin();
		if(IS_POST)
		{
			$this->alterDate(D('Courseson'));
			$this->alterDate(D('TeacherJudge'));
		}
		else
		{
			$who['cou_number']=I('cou_number');
			$result=D('Courseson')->where($who)->find();
			$this->assign('result',$result);
			$this->display();
		}
		
	}
	public function showAll()
	{
		$this->isLogin();
		$thead= '<thead><tr><th>课程序号</th><th>学年学期</th>
				<th>教学地点</th><th>总人数</th><th>开课状态</th><th>老师</th><th>删除</th><th>修改</th></tr></thead>';
  		$field='cou_number,cou_term,cou_place,cou_total,cou_flag,tea_name';
  		$join='left join ttea_information ON ttea_information.tea_idnum = tcou_information.tea_idnum';

  		$order='cou_number';
 		if($_POST['value']!='')$condition[$_POST["type"]]=$_POST['value'];

	    if(IS_GET)$condition=$_GET;

        foreach($condition as $key=>$val) {
            if($key=='p')continue;
            $_map[$key]=array('like','%'.$val.'%');
            $this->assign('value',$val);
        }
        $_map['cou_flag']=array('in','1,2,3,4');
        $count = D('Courseson')->where($_map)->join($join)->count();// 查询满足要求的总记录数
        
        $Page  = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $Page->rollPage=5;
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig("first","首页...");
        $Page->setConfig("last","...尾页");
        $Page->lastSuffix=false;

        foreach($condition as $key=>$val) {
        //echo $key.$val;
        $Page->parameter[$key]=$val;
        }

        $show = $Page->show();// 分页显示输出

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
  
        $list = D('Courseson')->where($_map)->field($field)->join($join)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
	}	
} 
?>




























