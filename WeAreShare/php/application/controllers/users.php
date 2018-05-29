<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model','model');
		$this->load->model('people_model');
		$this->load->model('tags_model');
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
		$data['page_title'] = '使用者 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'users';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '使用者';
		$data['a_z'] =array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$data['data'] = $this->model->rs();
		$this->load->view('users_view',$data);
	}

	public function edit($id=0){
		$this->check_login();
		$data['page_title'] = '使用者 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'users';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '使用者編輯';
		$data['user_data'] = $this->model->row($id);
		$data['data'] = $this->people_model->row_author($id);
		$this->load->model('global_model');
		$data['hot_tag'] = $this->global_model->tag_count();
		$data['recommends'] =$this->model->get_recommend($data['data']['ID']);
		if($id==0) $data['user_data'] =0;
		$data['us_id'] = $id;
		$this->load->view('users_edit_view',$data);
	}

	public function edit_self($id=0){
		$this->check_login();
		$data['page_title'] = '使用者 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'edit';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '使用者編輯';
		$data['user_data'] = $this->model->row($id);
		$data['data'] = $this->people_model->row_author($id);
		$this->load->model('global_model');
		$data['hot_tag'] = $this->global_model->tag_count();
		$data['recommends'] =$this->model->get_recommend($data['data']['ID']);
		if($id==0) $data['user_data'] =0;
		$data['us_id'] = $id;
		$this->load->view('users_edit_view',$data);
	}

	public function save($odd=0){
	$this->check_login(1);
		$id = $this->model->save($odd);
		//echo $id; 
	}

	public function sort(){
		$this->model->sort();
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

	public function getrec($id=0){
		$this->check_login(1);
		$data = $this->model->getdata($id);
		$data = json_encode($data);
		echo $data;
	}

}