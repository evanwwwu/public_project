<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_check extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->model("member_model");
		$row = $this->member_model->email_get_row(urldecode($this->get['email']));

		$check_code = md5($row['email'].$row['createtime']);
		$this->global_model->check_code(strnatcasecmp($this->get['code'],$check_code),$row['email'],$row['pwd']);
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
	}
}