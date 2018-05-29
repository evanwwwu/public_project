<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome2 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->load->model('member_model');
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		$this->data['member_data'] = array();
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
	}

	public function index(){
		$this->load->view('comingsoon_view',$this->data);
	}

	public function home(){
		$this->data['meta_title'] = "";
		$this->data['menu_selected'] = "";
		$this->data = $this->global_model->site_init(0,$this->data);
		$this->load->view('index_view',$this->data);
	}
}