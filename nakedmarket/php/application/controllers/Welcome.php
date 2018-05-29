<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data["page_addr"] = "index";
		$this->load->model("ingredients_model");
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
	}

	public function index()
	{
		$this->data["products"] = $this->ingredients_model->get_index();
		$this->data['page_view'] = $this->load->view('index_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}
