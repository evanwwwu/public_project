<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->model('members_model');
		$this->data['controller_addr'] = "members";
	}
	public function index(){
		$this->data['members'] = $this->members_model->rs(0,8);
		$this->data['content_view'] = $this->load->view("members_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}

	public function loadmore($page){
		$pagesize = 8;
		$current_posts = ($page-1) * $pagesize;
		$this->data['members'] = $this->members_model->rs($current_posts,$pagesize);
		$this->load->view('more_members_view',$this->data);
	}

}

