<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->load->model('contact_model');
		$this->data['controller_addr'] = "contact";
	}

	public function index($id="1"){
		$this->data['contact'] = $this->contact_model->row();
		$this->data['content_view'] = $this->load->view("contact_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}
}
