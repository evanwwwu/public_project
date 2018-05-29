<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"]  = "about";
	}

	public function index()
	{
		$this->data["members"] = $this->get_member();
		$this->data['page_view'] = $this->load->view('about_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function get_member(){
		$this->load->model("member_model");
		$members = $this->member_model->get_rs();
		return $members;
	}

}