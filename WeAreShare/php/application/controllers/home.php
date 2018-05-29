<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->load->model('posts_model');
		$this->load->model('gallery_model');
		$this->load->model('schedule_model');
		$this->load->model('society_model');
		$this->data['main_banner'] = $this->global_model->get_main_banner();
		$this->data['index_banner'] = $this->global_model->get_index_banner();
		$this->data['side_banner'] = $this->global_model->get_side_banner();
		$this->data['first_banner'] = $this->global_model->get_first_banner();
		$this->load->model('member_model');
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		$this->data['member_data'] = array();
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
	}

	public function index(){
		$this->data['latest'] = array();
		$this->data['latest'][0] = $this->posts_model->rs(0,0,0,1);
		$this->data['latest'][1] = $this->posts_model->rs_topic(0,0,0,1);
		$this->data['latest'][2] = $this->posts_model->rs_column(0,1);
		$this->data['latest'][3] = $this->gallery_model->rs(0,0,0,1);
		$this->data['latest'][4] = $this->schedule_model->rs(0,0,0,1);
		$this->data['latest'][5] = $this->society_model->rs(0,1);
		$this->data['meta_title'] = "";
		$this->data['menu_selected'] = "";
		$this->data = $this->global_model->site_init(0,$this->data);
		$this->data['popular'] = $this->global_model->most_popular();
		$this->load->view('index_view',$this->data);
	}
}