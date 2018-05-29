<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
	}
	public function shopping(){
		$this->data["page_addr"]  = "note";
		$this->data['page_view'] = $this->load->view('shopping_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function privacy(){
		$this->data["page_addr"]  = "note";
		$this->data['page_view'] = $this->load->view('privacy_view',$this->data,true);
		$this->load->view('master_view',$this->data);		
	}

}