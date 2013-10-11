<?php
class Database extends CI_Controller{
	/**
	 * 获取多条数据，以数组形式返回
	 */
	function index(){
		$this->load->database(); //装载数据库操作类
		
		//var_dump($this->db);   //装载成功后将其实例出来的对象存到$this->db属性中去
		//  object(CI_DB_mysql_driver)	  该对象的类定义在 system/database/drivers/mysql/mysql_driver.php
		
		$sql='select * from ci_brand';
		$re=$this->db->query($sql);  //返回的是一个结果对象
		//var_dump($re);  //object(CI_DB_mysql_result)
		
		//$data['brand']=$re->result(); //返回的是一个数组，该数组里面存的是一个个对象
		//不推荐使用$re->result();
		//var_dump($data['brand']);
		
		/**
		 * 推荐使用$re->result_array()
		 */
		
		$data['brand']=$re->result_array();
				
		$this->load->view('database/show',$data);
	}
	
	/**
	 * 获取单条数据
	 */
	function index1(){
		$this->load->database();
		$sql='select * from ci_brand';
		$res=$this->db->query($sql);
		if($res->num_rows()>0){ //有结果，行数大于0
			$data['list']=$res->row_array();  //获取一条记录
			
/* 			echo '<pre>';
			print_r($data['list']);   //结果是一维数组
			echo '</pre>';exit;
			
			Array
			(
					[brand_id] => 1
					[brand_name] => 诺基亚
					[brand_logo] => 1240803062307572427.gif
					[brand_desc] => 公司网站：http://www.nokia.com.cn/
			
					客服电话：400-880-0123
					[site_url] => http://www.nokia.com.cn/
					[sort_order] => 50
					[is_show] => 1
			) */
			
			$this->load->view('database/list.html',$data);
			
		}
	}
	
	/**
	 * 执行插入操作
	 */
	function add(){
		$this->load->database();
		$sql="insert into ci_brand (brand_name,brand_desc) values ('自有品牌','自有品牌')"; //insert into ci_brand (brand_name,brand_desc)中的数据库字段名不用加引号
		$bool=$this->db->query($sql); //返回 bool值
		if ($bool){
			echo $this->db->affected_rows().'<br>';  //受影响行数
			echo $this->db->insert_id(); //返回最近一次插入操作所得到的自增id
		}else{
			die('fail');
		}
		
	}
	/**推荐
	 * 不想每次都进行$this->load->database();，
	 * 可以使用配置文件autoload.php的配置项$autoload['libraries']进行自动加载
	 * 执行绑定预编译变量预处理方式
	 */
	function update(){
		
		$data['name']='预编译';
		$data['desc']='预编译';  //注意要放到$data数组里面去
		
		$sql="insert into ci_brand (brand_name,brand_desc) values (?,?)"; //使用预编译绑定变量
		$bool=$this->db->query($sql,$data); //传入data数组
		if ($bool){
			echo $this->db->affected_rows().'<br>';  //受影响行数
			echo $this->db->insert_id(); //返回最近一次插入操作所得到的自增id
		}else{
			die('fail');
		}
		
	}
	
	/**
	 * CI的AR操作，get方法（对应thinkphp的select方法）
	 */
	function select(){
		
		$res=$this->db->get('brand');  //get方法是AR操作里面的，传入的表名不用加表前缀
		$data['brand']=$res->result_array();
		$this->load->view('database/show',$data);
		
	}
	
	/**
	 * CI的AR操作，insert方法
	 */
	function ar_add(){  //   url：http://ci.me/index.php/database/ar_add
		
		$data=array(
				'brand_name'=>'add',
				'brand_desc'=>'insert()'
				);
		$bool=$this->db->insert('brand',$data);  //insert方法是AR操作里面的，传入的表名不用加表前缀
		if ($bool){
			$this->select(); //前去查看插入结果
		}else{
			echo '插入失败';
		}
	
	}
	
	
	/**
	 * CI的AR操作，update方法
	 */
	function mod(){  //   url：http://ci.me/index.php/database/ar_add
	
		$data=array(
				'brand_name'=>'add',
				'brand_desc'=>'insert()--》mod'
		);
		$bool=$this->db->update('brand',$data,array('brand_id'=>14));  //update方法传入3个参数，表名，修改的数组，条件
		if ($bool){
			$this->select(); //前去查看插入结果
		}else{
			echo '修改失败';
		}
	
	}
	
	/**
	 * CI的AR操作，delete方法
	 */
	function del(){  //http://ci.me/index.php/database/del
		$bool=$this->db->delete('brand',array('brand_id'=>14));  
		if ($bool){
			echo '删除成功<br>';
			echo '受影响的行数:'.$this->db->affected_rows();
			$this->select(); //前去查看插入结果
		}else{
			echo '删除失败';
		}
	}
}