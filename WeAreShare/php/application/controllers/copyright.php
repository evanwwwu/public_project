<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Copyright extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(null,true);
	}

	public function index(){
		$this->load->view('copyright_view');
	}
}