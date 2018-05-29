<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"]  = "contact";
	}

	public function index()
	{
		$this->data['page_view'] = $this->load->view('contact_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}