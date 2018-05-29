<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if(@$_GET["key"] ==""){
			header("Location:".SITE_URL);
			exit;
		}
		$this->load->model("posts_model");
		$this->load->model("search_model");
		$this->data = $this->global_model->site_init();
		$this->data['data'] = array();
		$this->data['menu_selected'] = '';
		$this->data['page_type'] = "list search__result";
		$this->data['post'] = $this->search_model->rs("post");
		$this->data['event'] = $this->search_model->rs("event");
		$this->data['video'] = $this->search_model->rs("video");
		$this->data['img'] = $this->search_model->search_img();
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data["side_ad"] = $this->global_model->get_banner_rs(5,1);
		$this->data['popular'] = $this->posts_model->most_popular();
		$this->data["page_view"] = $this->load->view('search_view',$this->data,true);
		$this->load->view("master_view",$this->data);

	}

	
}