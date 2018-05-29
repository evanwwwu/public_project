<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags_all extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('tags_all_model','model');
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
	}

	private function check_login($ajax=0){
		if ($_SESSION[ADMIN_SESSION] == 0){
			if ($ajax==0){
				header('location:'.ADMIN_URL);exit;
			}
			else{
				echo 'location="'.ADMIN_URL.'"';exit;
			}
		}
	}

	public function index(){
		$this->check_login();
		$data['page_title'] = '標籤 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'tags_all';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '標籤';
		$data['data'] = $this->model->rs();
		$this->load->view('tags_all_view',$data);
	}
	public function del(){
		$this->model->del();
		echo '$("#row_'.$this->post['id'].'").remove();';	
	}
	public function save($id=0){
		$this->model->save($id);
	}		
}	