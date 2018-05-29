<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data["page_addr"]  = "about";
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
	}
	public function index(){
		$this->data['page_view'] = $this->load->view('about_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

}