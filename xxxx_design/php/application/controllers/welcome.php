<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->data['controller_addr'] = "";
	}
	public function index(){
		$this->load->model("works_model");
		$this->data['work'] = $this->works_model->index_works();
		$this->data['ishome'] = true;
		$this->data['content_view'] = $this->load->view("index_view",$this->data,TRUE);
		$this->load->view("master_view",$this->data);
	}

}

