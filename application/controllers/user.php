<?php
class User extends CI_Controller{ //控制器文件名小写， 类名首字母大写 
	
	function index(){  // url:http://ci.me/index.php/user/index  (最后的index可以省略)
		echo 'this is user control<br>';
		$this->_test();
	}
	
	/**
	 * 直接访问：http://ci.me/index.php/_test
	 * 报错：	404 Page Not Found
	 */
	public function _test(){  //虽然是public，但是以 下划线_开头的方法还是不能被外部访问（CI的规则）
		echo 'this is _test()';
	}
}