<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adclick extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->add_click_count($_GET['ad']);
		header('location:' . $_GET['url']);
		exit;
	}
}