<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"]  = "member";
		$this->load->model("member_model");
	}

	public function detail($id=0){
		$this->data["row"] = $this->member_model->get_row($id);
		$html = $this->load->view("member_view",$this->data,true);
		echo $html;
	}
}