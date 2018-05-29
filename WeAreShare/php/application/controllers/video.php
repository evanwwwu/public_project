<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('member_model');
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
	}

	public function index(){
		$this->load->model("posts_model");
		$this->data = $this->global_model->site_init();
		$this->data['menu_selected'] = "video";
		$this->data["page_type"] = "video";
		$this->data['meta'] = $this->global_model->meta_array('video');
		$this->data["rs"] = $this->posts_model->get_video_rs();
		$this->data['meta']['cover_img'] = 'FB.jpg';
		$this->data["page_view"] = $this->load->view('video/list_view',$this->data,true);
		$this->load->view("master_view",$this->data);

	}
	public function play($id=0){
		$this->load->model('posts_model');
		$this->data = $this->global_model->site_init();
		$this->data['data'] = $this->posts_model->get_video($id);
		$this->data["page_type"] = "video";
		$this->data['menu_selected'] = "video";
		$this->global_model->add_post_view($this->data['data']['ID']);
		$this->data['meta']['title'] = $this->data['data']['post_title'].' | '.$this->global_model->menu_title('video');
		$this->data['meta']['cover_img'] = $this->data['data']['cover_img'];

		$this->data["page_view"] = $this->load->view("video/detail_view",$this->data,true);
		$this->load->view("master_view",$this->data);

	}
	public function ajax_video(){
	
		$this->data['VideoList'] = $this->video_process->VideoList($_POST['page'],$_POST['video_type']);
	
		$data = $this->load->view('video/template/video_list',$this->data,true);
	
		echo json_encode(array("count"=>count($this->data['VideoList']),"data"=>$data));
	}
	public function video_detial($Id){
		$this->data['menu_selected'] = "video";
		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array('video');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL.'video';
		$this->data['meta']['cover_img'] = 'FB.jpg';
	
		//獨立區塊start
		$this->data['VideoDetial'] = $this->video_process->VideoDetial($Id);
		$this->data['VideoList'] = $this->video_process->VideoListPOP($this->data['VideoDetial']->Video_VideoTypeId);
		//獨立區塊end
	
		$this->data = $this->global_model->site_init(1,$this->data);
		$this->load->view('video/video_detial',$this->data);
	}
}