<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Society extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('society_model');
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
		$this->data['menu_selected'] = "society";
		$meat = $this->global_model->meta_array('society');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL . 'society';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init(1,$this->data);

		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";

		$this->data['posts'] = $this->society_model->rs();
		$this->data['terms'] = $this->society_model->get_terms();
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));

		}
		$this->load->view('society_list_view',$this->data);
	}

	public function letter($chr){
		$this->data['chr'] = $chr;
		$this->data['letter_selected'] = $chr;
		$this->data['menu_selected'] = "society";
		$meat = $this->global_model->meta_array('society');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL . 'society/letter'.$chr;
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data = $this->global_model->site_init(1,$this->data);
		$this->data['tag_id'] = 0;
		$this->data['meta_title'] = "";
		$this->data['posts'] = $this->brand_model->rs_letter($chr);
		$this->data['terms'] = $this->brand_model->get_terms();
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));

		}
		$this->load->view('brand_list_view',$this->data);

	}

	public function posts($title=''){
		$this->data['menu_selected'] = "society";
		$this->data['tag_id'] = '';
		$this->data['meta_title'] = "";

		$this->data['data'] = $this->brand_model->row($title);
		$gallery_count = count($this->data['data']['gallery']);
		$this->data['slide_ad'] = $this->global_model->get_slideshow_banner($gallery_count);
		$this->global_model->add_post_view($this->data['data']['ID']);
		$this->data['meta']['brief'] = mb_substr(strip_tags($this->data['data']['post_content']),0,50,'UTF-8');
		$this->data['meta']['keyword']='';
		foreach($this->data['data']['tags'] as $tag){
			$this->data['meta']['keyword'] .= $tag['name'].',';
		}
		$this->data['meta']['author'] = $this->data['data']['author'];
		$this->data['meta']['title'] = $this->data['data']['post_title']." | ".$this->global_model->menu_title('society');
		$this->data['meta']['url'] = SITE_URL . 'society/' .$this->data['data']['post_name'];
		$this->data['meta']['cover_img'] = $this->data['data']['cover_img'];
		$this->data = $this->global_model->site_init(1,$this->data);
		$this->load->view('brand_detail_view',$this->data);
	}
	
	public function recommend($title=''){
		$data = $this->brand_model->row($title);
		$data = $this->brand_model->get_recommend($data['ID']);
		$result = array();
		foreach($data as $row){
			$item = array();
			$item['url'] = SITE_URL . 'people/' . $row['post_name'];
			$item['img'] = IMG_URL . 'upload/' . $row['cover_img'];
			$item['date'] = $row['display_date'];
			$item['title'] = $row['post_title'];
			array_push($result,$item);
		}
		echo count($result)==0?"":json_encode($result);
	}
}