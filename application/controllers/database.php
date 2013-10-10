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
}