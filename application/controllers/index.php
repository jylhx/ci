<?php
class Index extends CI_Controller{
	
	/**
	 *  url: http://ci.me/index.php/index
	 *  结果：调用了两次index方法
	 */
	function index(){  
		echo 'index<br>';
	}
	
	//注意 ，由于index与控制器类名相同，所以会被当做构造函数而进行一次自动调用
	//默认的方法是index，所以虽然url中没有指明index方法，但index方法还是会被调用
	
	//所以，CI中不建议创建index控制器  ，默认的控制器可以在 config/routes.php中进行配置  route['default_controller'] = '你所指定的控制器名'
}