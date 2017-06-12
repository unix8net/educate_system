<?php
namespace  Admin\Controller;
use Think\Controller;
class BaseController extends Controller{


	/**
	 * 检测是否登录
	 * @return no
	 */
    protected function isLogin()
	{
    	$s = session('login');
        if($s!='is_login'){
    		$this->redirect("Login/login");
    	}
    }

    /**
     * 插入一条记录
     * @param table $model 数据表的实例化模型类指针
     */
    protected function addDate($model)
    {
        if(IS_POST)
        {
            if($model->create())
            {
                $result = $model->add();
                if($result) {
                    $this->success('数据添加成功！');
                }else{
                    $this->error('数据添加错误！');
                }
            }else{
                $this->error($model->getError());
            }
        }
        else
        {
            $this->display();
        }
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
    protected function search($_table,$field,$order,$thead='',$condition='',$join='')
    {

       if(IS_GET)$condition=$_GET;

        foreach($condition as $key=>$val) {
            if($key=='p')continue;
            $_map[$key]=array('like','%'.$val.'%');
            $this->assign('value',$val);
        }
        $count = $_table->where($_map)->join($join)->count();// 查询满足要求的总记录数
        
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
  
        $list = $_table->where($_map)->field($field)->join($join)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('thead',$thead);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    /**
     * 修改表
     * @param  table $Model 数据表对应的模型实例化
     * @return no    
     */
    protected function alterDate($Model)
    {
        if(IS_POST)
        {
            $Model->alterMember()?$this->error('修改失败'):$this->success('修改成功');
        }
    }

    /**
     * 删除一条记录
     * @param  table $Model 数据表模型类的实例化
     * @return no        
     */
    protected function delete($Model)
    {   
        $Model->deleteMember()?$this->error('删除失败'):$this->success('删除成功');
    }
}
?>