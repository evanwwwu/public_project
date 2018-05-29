<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(count($_POST)>0)
		{
			$this->login();
			exit;
		}
	}

	public function index(){
		$this->load->view('admin/login_view');
	}
	public function login()
	{
		$this->load->model("login_model");
		$this->load->model("admin/login_model");
	}
}

