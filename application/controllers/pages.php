<?php
/**
 * ������һ��������  ����Ŀ¼ applica/controllers/
 * @author Lingege
 *
 */
class Pages extends CI_Controller{ //ע��  ������ͷҪ��д   �����ļ����ļ�����ȫ��Сд
								//��������������λ�� ��system/core/Controller.php
	 
	/**
	 * ���ʵ�url��http://ci.me/index.php/pages/view
	 * ���� index.phpΪ����ļ�
	 * 		pagesΪ����������
	 * 		viewΪ��Ӧ�ķ�����
	 * 		
	 * http://ci.me/index.php/pages/view/about  
	 * ���е�aboutΪ���뵽����$page��ֵ
	 * @param unknown_type $page
	 */
	 function view($page='home'){  //Ĭ�ϲ���
		$data['title']=ucfirst($page); //ע�⣬��Ҫ���䵽ģ�����еı������ŵ�data��������ȥ��data����ļ�������ģ���еı�����
		
		//��˳�������ʾģ�����ݣ�ע���з��������ģ����������δ���
		$this->load->view('templates/header',$data); //�����������ȥ
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer'); //Ĭ�ϵ�ģ�嶼����viewsĿ¼�£�����ģ�岻�ü��Ϻ�׺��
		
	}
	
	function show404(){
		show_404();  //show_404() ��CodeIgniter�еĺ�������������404����ҳ��
	}
}