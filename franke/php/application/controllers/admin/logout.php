<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$_SESSION[ADMIN_SESSION] = 0;
		$_SESSION[ADMIN_NAME] = "";
		$_SESSION[ADMIN_ACTIVE] = 0;

		header('location:'.ADMIN_URL.'');
	}
}