<?php
/**
 * 创建第一个控制器  所属目录 applica/controllers/
 * @author Lingege
 *
 */
class Pages extends CI_Controller{ //注意  类名开头要大写   该类文件的文件名就全部小写
								//控制器基类所在位置 ：system/core/Controller.php
	 
	/**
	 * 访问的url：http://ci.me/index.php/pages/view
	 * 其中 index.php为入口文件
	 * 		pages为控制器名称
	 * 		view为对应的方法名
	 * 		
	 * http://ci.me/index.php/pages/view/about  
	 * 其中的about为传入到参数$page的值
	 * @param unknown_type $page
	 */
	 function view($page='home'){  //默认参数
		$data['title']=ucfirst($page); //注意，将要分配到模板中行的变量都放到data数组里面去，data数组的键名就是模板中的变量名
		
		//按顺序加载显示模板内容，注意有分配变量到模板的情况该如何处理
		$this->load->view('templates/header',$data); //将变量分配过去
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer'); //默认的模板都放在views目录下，加载模板不用加上后缀名
		
	}
	
	function show404(){
		show_404();  //show_404() 是CodeIgniter中的函数，用来调用404错误页面
	}
}