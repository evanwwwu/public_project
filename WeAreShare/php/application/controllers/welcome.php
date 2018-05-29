<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->load->model("member_model");
		$this->data['member_data'] = array();
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
	}

	public function index(){
		$this->load->model('posts_model');
		$this->data = $this->global_model->site_init();
		$this->data["page_type"] = "index";
		$this->data['latest'] = array();
		$this->data["slide_banner"] = $this->posts_model->get_slider_banner();
		$sid = (@$this->data["slide_banner"]["ID"]!="")?$this->data["slide_banner"]["ID"]:0;
		$this->data['latest'][0] = $this->posts_model->rs(0,0,0,4,$sid);
		$this->data['latest'][1] = $this->posts_model->rs(0,0,4,6,$sid);
		$this->data['latest'][2] = $this->posts_model->rs(0,0,10,6,$sid);
		$this->data['latest'][3] = $this->posts_model->rs(0,0,16,9,$sid);
		$this->data['index_banner'] = $this->global_model->get_index_banner();
		$this->data["meta"] = $this->global_model->meta_array('welcome');
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data['popular'] = $this->posts_model->most_popular();
		$this->data["pop_video"] = $this->posts_model->most_popular_video();
		$this->data["page_view"] = $this->load->view("index_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}

}