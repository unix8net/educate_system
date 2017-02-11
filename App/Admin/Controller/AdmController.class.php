<?php
namespace  Admin\Controller;
class AdmController extends BaseController
{

	/**
	 * 增加用户
	 */
	public function addUser()
	{
		$this->isLogin();
		$Admin=D("Adm");
		if($Admin->checkPermission())		
		{
			echo "权限不够";
			return ;
		}
		$this->addDate($Admin);
	}

	/**
	 * 删除用户
	 * ??？为什么不能直接调用另一个方法
	 * @return no 
	 */
	function deleteUser()
	{
		$this->isLogin();
		if(D('Adm')->checkPermission())		
		{
			echo "权限不够";
			return ;
		}
		$this->delete(D('Adm'));
	}


	/**
	 * 查找用户
	 * @return no 
	 */
	public function searchUser()
	{
		$this->isLogin();
		$Admin=D("Adm");
		if($Admin->checkPermission())		
		{
			//echo "权限不够";
			return ;
		}
		$thead='<thead><tr><th>姓名</th><th>联系方式</th><th>权限</th><th>删除</th><th>修改</th></tr></thead>';
        $order='adm_name';
        $field='adm_name,adm_permission,adm_contact';
 		if(IS_POST)$condition[$_POST["type"]]=$_POST['name'];
        $this->search($Admin,$field,$order,$thead,$condition);
	}


	/**
	 * 分页显示所有信息
	 * @return no
	 */
	public function showAll()
	{
		$this->isLogin();
		$table = D('Adm'); 
		$field='adm_name,adm_idcard,adm_contact,adm_permission';
		$order='adm_name';
		$this->search($table,$field,$order);
	}
	
	/**
	 * 显示个人信息
	 * @return no 
	 */
	public function showPersonInfo($name='')//必须要有默认值
	{
		$this->isLogin();
		$result=$this->showInfo($name);
		if($result)
		{
			$this->assign('result',$result);
			$this->display();		
		}
	}

	/**
	 * 显示某个管理员的信息
	 * @param  string $name 管理员姓名
	 * @return no       [description]
	 */
	public function showUserInfo()
	{
		$this->isLogin();

		if(D("Adm")->checkPermission())		
		{
			//echo "权限不够";
			return ;
		}
		$result=$this->showInfo(I('adm_name'));
		if($result)
		{
			$this->assign('result',$result);
			$this->display();		
		}
	}
	
	/**
	 * 修改个人信息
	 * @return no 
	 */
	public function changePersonInfo()
	{
		$this->changeInfo();
	}

	public function changeUserInfo()
	{
		if(D("Adm")->checkPermission())		
		{
			echo "权限不够";
			return ;
		}
		$this->changeInfo();		
	}


	protected function showInfo($name='')
	{
		if($name!='')
		{
			$condition['adm_name']=$name;
		}
		else
		{
			$condition['adm_name']=$_SESSION['name'];
		}
		return D("Adm")->where($condition)->find();
	}

	protected function changeInfo()
	{
		$this->isLogin();
		if(IS_POST)
		{
		    $Admin= D("Adm");
		    // 更新的条件
		    $condition['adm_name'] = $_POST['adm_name'];
		 
		    $data=$_POST;
		    $result = $Admin->where($condition)->field('adm_password,adm_idcard,adm_contact,adm_permission')->save($data);
		    //或者：$resul t= $Dao->where($condition)->data($data)->save();
		    if($result !== false){
		        $this->success("修改成功");
		    }else{
		        $this->error("修改失败");
		    }
		}		
	}









}