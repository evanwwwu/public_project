<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"]  = "shop";
		$this->load->model("shop_model");
	}

	public function index()
	{
		$this->data["rs"] = $this->shop_model->get_rs();
		$this->data['page_view'] = $this->load->view('shop_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}