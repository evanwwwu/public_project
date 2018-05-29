<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->load->model("about_model");
		$this->data['controller_addr'] = "about";
	}

	public function index($id="1"){
		$this->data['about'] = $this->about_model->row();
		$this->data['content_view'] = $this->load->view("about_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);

	}
}
