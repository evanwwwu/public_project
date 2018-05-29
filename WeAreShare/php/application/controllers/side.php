<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Side extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('side_model','model');
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
		$this->check_login(1);
		$data['page_title'] = '廣告 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'side';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['data'] = $this->model->side_rs();
		$data['h2'] = '廣告 - 側欄模組';
		$this->load->view('side_view',$data);
	}

	public function publish(){
		$this->check_login(1);
		$this->model->side_publish();
	}

	public function sort(){
		$this->model->side_sort();
	}	
}
?>	