<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->model('service_model');
		$this->data['controller_addr'] = "service";
	}

	public function index($id="1"){
		$this->data['service'] = $this->service_model->row();
		$this->data['content_view'] = $this->load->view("service_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);

	}
}
