<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{

	protected function is_stu_login()
	{
    	$s = session('stu_login');
        if($s!='is_student'){
    		$this->redirect("Index/login");
    	}
	}
    protected function is_tea_login()
    {
        if(session('tea_login')!="is_teacher")
        {
            $this->redirect("Index/tea_login");
        }
        $this->assign('name',session('tea_name'));
    }
    /**
     * 查找
     * @param  table $_table     数据表的实例化模型
     * @param  string $field     要查询的字段
     * @param  string $order     排序规则
     * @param  string $thead     表头
     * @param  string $condition 查询条件
     * @return no             
     */
    protected function search($_table,$field,$order,$join,$thead='',$condition='')
    {
        foreach($condition as $key=>$val) {
            $_map[$key]=array('like','%'.$val.'%');
        }
        $count = M()->table($_table)->join($join)->where($_map)->count();// 查询满足要求的总记录数

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
  
        $list =  M()->table($_table)->join($join)->where($_map)->field($field)->order($reder)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    protected function All_Course()
    {
        //显示所有可选课程
        $table="tcou_information";
        $field="tcou_information.cou_number,tcou_information.cou_code,cou_name,cou_total,cou_remainder,cou_interval,
                cou_place,tea_name,pro_academy,cou_type,cou_credit";
        $order="cou_number";

        $thead="<thead><tr><th>课程编号</th><th>课程代码</th><th>课程名称</th>
        <th>教学周区间</th><th>教室</th><th>总数</th><th>老师</th><th>开课院系</th><th>课程类别</th><th>课程学分</th></tr></thead>";
        $join=array('left join tcou_classification ON tcou_information.cou_code = tcou_classification.cou_code ',
                'left join ttea_information on tcou_information.tea_idnum=ttea_information.tea_idnum');

            if($_POST['cou_code'])$condition['tcou_information.cou_code']=$_POST['cou_code'];
            $this->if_post(array("cou_term","cou_type","tea_name","cou_name"),$condition);
            
            if($_GET['cou_code'])$condition['tcou_information.cou_code']=$_GET['cou_code'];
            $this->if_get(array("cou_term","cou_type","tea_name","cou_name"),$condition);

        if(IS_POST)
            $this->assign('get',$_POST);
        else 
            $this->assign('get',$_GET);
        
        $this->search($table,$field,$order,$join,$thead,$condition);
    }
    protected function Class_Info()
    {
        $thead="<thead><tr><th>班级代码</th><th>班级名称</th><th>专业代码</th><th>专业名称</th><th>查看学生</th></tr></thead>";
        $table="tcla_code";
        $join=array("left join tpro_classification ON tcla_code.pro_code = tpro_classification.pro_code");
        $field="pro_name,tcla_code.pro_code,cla_name,cla_code";
        $order="cla_name";

        if($_POST['pro_code'])$condition['tcla_code.pro_code']=$_POST['pro_code'];
        $this->if_post(array("cla_code","cla_name","pro_name"),$condition);
        
        if($_GET['pro_code'])$condition['tcla_code.pro_code']=$_GET['pro_code'];
        $this->if_get(array("cla_code","cla_name","pro_name"),$condition);

        if(IS_POST)
            $this->assign('get',$_POST);
        else 
            $this->assign('get',$_GET);

        $this->search($table,$field,$order,$join,$thead,$condition);
    }
    protected function show_stu()
    {
        $this->assign('cla_name',$_GET['cla_name']);
        $thead="<thead><tr><th>学号</th><th>姓名</th></tr></thead>";
        $table="tstu_information";
        $field="stu_idnum,stu_name";
        $condition['stu_class']=$_GET['cla_code'];
        
        $list=M()->table($table)->field($field)->where($condition)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);
        $this->display();
    }
    protected function if_post($arr,&$condition)
    {
        foreach ($arr as $key => $value) {
           if($_POST[$value])$condition[$value]=$_POST[$value]; 
        }
    }
    protected function if_get($arr,&$condition)
    {
        foreach ($arr as $key => $value) {
           if($_GET[$value])$condition[$value]=$_GET[$value]; 
        }
    }
}