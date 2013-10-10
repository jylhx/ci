<?php
class Test extends  CI_Controller{
	function index(){
		
	}
	
	/**
	 * 讲一下CI里面的装载器loader
	 *   访问的url：http://ci.me/index.php/test/load
	 */
	function load(){
		var_dump($this->load); //结果是object(CI_Loader)
		//说明 超级控制器CI_Controller 里面的load属性存放的是 CI_Loader类的一个实例
		// CI_Loader类的定义 在 system/core/Loader.php  
		// 该类里里面又有 view，vars，database，model等方法
		//所以才有连贯操作 $this->load->view(),$this->load->model()
	}
	
	/**
	 * 讲一下CI里面的装载器URI
	 * CI支持pathinfo，并且用的是短的pathinfo
	 * 例如：传统：   入口文件/控制器/动作/参数1/值1/参数二/值2
	 * 		 CI：	入口文件/控制器/动作/值1/值2  （注意顺序）
	 */
	function uri(){
		var_dump($this->uri); //结果是 object(CI_URI)
		//说明 超级控制器CI_Controller 里面的uri属性存放的是 CI_URI类的一个实例
		// CI_Loader类的定义 在 system/core/URI.php
		// 该类里里面又有segment等方法
		//所以才有连贯操作 $this->uri->segment()
		// $this->uri->segment(n)表示取得url中的第n段（控制器名在第1段，动作名在第2段）
		
		//假设访问的url为 http://ci.me/index.php/test/uri/2/name
		echo $this->uri->segment(1); //结果输出test
		echo $this->uri->segment(2); //结果输出uri
		echo $this->uri->segment(3);  //结果输出2
		echo $this->uri->segment(4);  //结果输出name
	}
	
	/**
	 * 使用参数列表去接收url传过来的值（不用$this->uri->segment(n)那么麻烦了），但是要注意顺序，同时支持默认参数
	 */
	function uri2($id,$name='JACK'){
		
		//假设url：  http://ci.me/index.php/test/uri2/24/lingege244
		echo $id.'-----'.$name.'<br>';//输出  24-----lingege244
		
		
		//假设url：  http://ci.me/index.php/test/uri2/24
		echo $id.'-----'.$name.'<br>'; //输出  24-----JACK
		
	}
	
	/**
	 * 		CI控制器基类的input属性，存放的是CI_Input类实例化出来的对象
	 * 作用：
	 */
	function input(){
		
		var_dump($this->input); //  object(CI_Input
	}
	
}