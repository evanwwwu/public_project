<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->load->model('author_model');
		$this->data['main_banner'] = $this->global_model->get_main_banner();
		$this->load->model('member_model');
		$this->load->model('member_model');
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		$this->data['member_data'] = array();
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
	}

	public function celebrity(){
		$this->data['menu_selected'] = "column";
		$meat = $this->global_model->meta_array('作者群');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL . 'author/celebrity';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init(1,$this->data);

		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";

		$this->load->model('posts_model');
		$this->data['class'] = "作者群";
		$this->data['data'] = $this->author_model->rs(0,6,'作者群');
		$this->load->view('author_list_view',$this->data);
	}

	public function contributor(){
		$this->data['menu_selected'] = "column";
		$meat = $this->global_model->meta_array('視覺團隊');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL . 'author/contributor';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init(1,$this->data);

		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";

		$this->load->model('posts_model');
		$this->data['class'] = "視覺團隊";
		$this->data['data'] = $this->author_model->rs(0,6,'視覺團隊');
		$this->load->view('author_list_view',$this->data);
	}

	public function team(){
		$this->data['menu_selected'] = "column";
		$meat = $this->global_model->meta_array('東西團隊');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL . 'author/team';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init(1,$this->data);

		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";

		$this->load->model('posts_model');
		$this->data['class'] = "東西團隊";
		$this->data['data'] = $this->author_model->rs(0,6,'東西團隊');
		$this->load->view('author_list_view',$this->data);
	}

	public function posts($title=''){
		$this->data['menu_selected'] = "column";

		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";

		$this->load->model('posts_model');
		$this->data['data'] = $this->author_model->row($title);
		$this->global_model->add_post_view($this->data['data']['ID']);
		$this->data['meta']['brief'] = mb_substr(strip_tags($this->data['data']['post_content']),0,50,'UTF-8');
		$this->data['meta']['keyword']='';
		foreach($this->data['data']['tags'] as $tag){
			$this->data['meta']['keyword'] .= $tag['name'].',';
		}
		$this->data['meta']['author'] = $this->data['data']['display_name'];
		$this->data['meta']['title'] = $this->data['data']['display_name'] .' | '.$this->global_model->menu_title('column');
		$this->data['meta']['url'] = SITE_URL . 'author/' .$this->data['data']['post_name'];
		$this->data['meta']['cover_img'] = $this->data['data']['cover_img'];
		$this->data = $this->global_model->site_init(1,$this->data);
		$this->load->view('author_detail_view',$this->data);
	}

	public function recommend($title=''){
		$post_id = $this->author_model->get_post($title);
		// $data = $this->people_model->row($title);
		$data = $this->author_model->get_recommend($post_id);
		$result = array();
		foreach($data as $row){
			$item = array();
			$item['url'] = SITE_URL . 'author/' . $row['post_title'];
			$item['img'] = IMG_URL . 'upload/' . $row['cover_img'];
			$item['date'] = "";
			$item['title'] = $row['post_title'];
			array_push($result,$item);
		}
		echo count($result)==0?"":json_encode($result);
	}
}
