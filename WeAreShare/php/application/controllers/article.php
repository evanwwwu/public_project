<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		// $this->load->model('member_model');
		// $this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		// $this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		// $this->data['member_data'] = array();
		// if (isset($_SESSION['user_login_id'])){
		// 	$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		// }
	}

	public function index(){
		$this->data = $this->global_model->site_init(1,$this->data);
		$this->data['menu_selected'] = "article";

		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array('article');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['cover_img'] = 'FB.jpg';

		$this->load->model('posts_model');
		$this->data['article'] = $this->posts_model->rs();
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0){
			$offset = rand(2,5);
			array_splice($this->data['article']['data'],$offset,0, array($list_banner));

		}
		$this->load->view('article_list_view',$this->data);
	}

	public function tag($title=''){
		if ($title=='') show_404();
		$this->load->model("posts_model");
		$this->data = $this->global_model->site_init();
		$tag_id = $this->posts_model->get_term_id($title);
		$this->data["tag_id"] = $tag_id;
		$this->data['menu_selected'] = $title;
		$this->data['page_type'] = "list";
		$meta = $this->global_model->meta_array(urldecode($title));
		$this->data['meta']['title'] = @$meta[0];
		$this->data['meta']['brief'] = @$meta[1];
		$this->data['meta']['keyword'] = @$meta[2];
		$this->data['article'] = $this->posts_model->rs(0,$tag_id,0,12);

		$this->data["side_ad"] = $this->global_model->get_banner_rs(5,1);

		$this->data['popular'] = $this->posts_model->most_popular();
		$this->data["page_view"] = $this->load->view("article/list_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}

	public function posts($title=''){
		if ($title=='') show_404();
		$this->load->model('posts_model');
		$this->data = $this->global_model->site_init();
		$this->data['data'] = $this->posts_model->row($title);
		$this->data["banner"] =$this->global_model->get_banners(4,1);
		$this->data["page_type"] = "article";
		$this->data['menu_selected'] = $this->data["data"]["type"]["slug"];
		$this->global_model->add_post_view($this->data['data']['ID']);
		$this->data["recommend"] = $this->recommend($this->data['data']['ID']);
		$this->data["rec_video"] = $this->posts_model->get_recommend($this->data['data']['ID'],10,"video");
		$this->data['meta']['brief'] = mb_substr(strip_tags($this->data['data']['post_content']),0,50,'UTF-8');
		$this->data['meta']['keyword']  = "";
		foreach($this->data['data']['tags'] as $tag){
			$this->data['meta']['keyword'] .= $tag['name'].',';
		}
		$this->data['meta']['author'] = @$this->data['data']['author']['display_name'];
		$this->data['meta']['title'] = $this->data['data']['post_title'].' | '.$this->global_model->menu_title('article');
		$this->data['meta']['cover_img'] = $this->data['data']['cover_img'];

		$this->data["page_view"] = $this->load->view("article/detail_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}
	public function video($id=0){
		if ($title=='') show_404();
		$this->load->model('posts_model');
		$this->data = $this->global_model->site_init();
		$this->data['data'] = $this->posts_model->get_video($id);
		$this->data["page_type"] = "video";
		$this->data['menu_selected'] = $this->data["data"]["type"]["slug"];
		$this->global_model->add_post_view($this->data['data']['ID']);
		$this->data['meta']['author'] = $this->data['data']['author']['display_name'];
		$this->data['meta']['title'] = $this->data['data']['post_title'].' | '.$this->global_model->menu_title('video');
		$this->data['meta']['cover_img'] = $this->data['data']['cover_img'];

		$this->data["page_view"] = $this->load->view("video_view",$this->data,true);
		$this->load->view("master_view",$this->data);

	}
	public function recommend($id=''){
		$this->load->model('posts_model');
		$data = $this->posts_model->get_recommend($id,9,"post");
		$result = array();
		foreach($data as $row){
			$item = array();
			$item['url'] = SITE_URL . 'article/' . $row['post_name'];
			$item['img'] = IMG_URL . 'upload/' . $row['cover_img'];
			$item['date'] = $row['display_date'];
			$item['title'] = $row['post_title'];
			$item["author"] = $row["author"];
			array_push($result,$item);
		}
		return $result;
		// echo count($result)==0?"":json_encode($result);
	}
	
	public function about($type=1){
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init();
		switch ($type) {
			 case 1:
				$this->data['menu_selected'] = "about";
				$this->data["page_type"] = "about";
				$this->data['meta'] = $this->global_model->meta_array('about');
				$this->data["page_view"] = $this->load->view("about_view",$this->data,true);
			break;
			case 2:
				$this->data['menu_selected'] = "cooperation";
				$this->data["page_type"] = "cooperation";
				$this->data['meta'] = $this->global_model->meta_array('cooperation');
				$this->data["page_view"] = $this->load->view("cooperation_view",$this->data,true);
			break;
			case 3:
				$this->data['menu_selected'] = "privacy";
				$this->data["page_type"] = "privacy";
				$this->data['meta'] = $this->global_model->meta_array('privacy');
				$this->data["page_view"] = $this->load->view("privacy_view",$this->data,true);
			break;
		}
		$this->load->view("master_view",$this->data);
	}
}