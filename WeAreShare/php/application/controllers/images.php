<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('posts_model','model');
		$this->post = $this->input->post(NULL,TRUE);
	}

	private function check_login($ajax=0){
		if ($_SESSION[ADMIN_SESSION] == 0){
			if ($ajax==0){
				header('location:'.ADMIN_URL);exit;
			}
			else{
				echo 'location="'.ADMIN_URL.'"';exit;
			}
		}
	}

	public function index(){
		$this->load->model('images_model');
		$this->images_model->save();
		
	}

}