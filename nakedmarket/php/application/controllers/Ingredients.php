<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data["page_addr"] = "products";
		$this->load->model("ingredients_model");
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["sub"] = true;
	}

	public function type($type_id=0)
	{
		$this->data["type_id"] = $type_id;
		$this->data["filters"] = $this->ingredients_model->get_filters_rs($type_id);
		$this->data["rs"] = $this->ingredients_model->get_rs($type_id);
		$this->data['page_view'] = $this->load->view('ingredients_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function detail($id=0){
		$this->data["row"] = $this->ingredients_model->get_row($id);
		$this->data["type_id"] = $this->data["row"]["type_id"];
		echo $this->load->view('ingredients_detail',$this->data,true);
	}
}
