<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Press extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"]  = "press";
		$this->load->model("news_model");
	}

	public function index()
	{
		$this->data["rs"] = $this->news_model->get_rs("press");
		$this->data['page_view'] = $this->load->view('news_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function detail($id=0){
		$this->data['row'] = $this->news_model->get_row($id);
		$html = $this->load->view("news_detail",$this->data,true);
		echo $html;
	}
}