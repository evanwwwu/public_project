<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->data['main_banner'] = $this->global_model->get_main_banner();
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
		$this->data['menu_selected'] = "topic";
		$meat = $this->global_model->meta_array('topic');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL . 'topic';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init(1,$this->data);

		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";

		$this->load->model('posts_model');
		$this->data['article'] = $this->posts_model->rs_topic();
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0){
			$offset = rand(2,5);
			array_splice($this->data['article']['data'],$offset,0, array($list_banner));

		}
		$this->load->view('article_list_view',$this->data);
	}
}