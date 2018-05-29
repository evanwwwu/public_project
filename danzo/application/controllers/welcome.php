<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"] = "index";
    }

	public function index()
	{
		$this->data['page_view'] = $this->load->view('index_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}
