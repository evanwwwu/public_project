<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('member_model','model');
		$this->post = $this->input->post(NULL,TRUE);
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
		$data['page_title'] = '會員 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'member';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '使用者';
		$data['data'] = $this->model->rs();
		$this->load->view('member_view',$data);
	}

	public function edit($id=0){
		$this->check_login();
		$data['page_title'] = '會員 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'member';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '會員編輯';
		$data['data'] = $this->model->row($id);
		if($id==0)
			$data['data'] =0;
		$this->load->view('member_edit_view',$data);
	}

	public function save($odd=0){
	$this->check_login(1);
	$id = $this->model->save($odd);
		//echo $id; 
	}

	public function publish(){
		$this->check_login(1);
		$this->model->publish();
	}

	public function del(){
		$this->check_login(1);
		$this->model->del();
		echo '$(".row_'.$this->post['id'].'").remove();';
	}


}