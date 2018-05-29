<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->model('works_model');
		$this->data['controller_addr'] = "work";
	}
	public function index(){
		$this->data['iswork'] =true;
		$this->data['works'] = $this->works_model->rs(0,10);
		$this->data['content_view'] = $this->load->view("works_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}
	public function post($title=""){
		$this->data['isin'] = true;
		$this->data['data'] = $this->works_model->row($title);
		$work_tag = $this->works_model->get_typeid2($this->data['data']['typeid']);
		$this->data['work_tag'] = $work_tag['url'];
		$this->data['meta'] = array('title'=>$this->data['data']['title'],'brief' => mb_substr(strip_tags($this->data['data']['note']),0,150,'UTF-8'),'cover_img'=>$this->data['data']['cover_img']);
		$this->data['content_view'] = $this->load->view("work_post_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}

	public function tag($title){
		$this->data['iswork'] =true;
		$work_tag = $this->works_model->get_typeid($title);
		$this->data['work_tag'] = $work_tag['url'];
		$this->data['works'] = $this->works_model->rs(0,12,$work_tag['typeid']);
		$this->data['content_view'] = $this->load->view("works_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}

	public function loadmore($page=0,$title=''){
		$pagesize = 8;
		if($title==""){
			$current_posts = (($page-1) * $pagesize)+2;
		}
		else{
			$current_posts = (($page-1) * $pagesize)+4;
		}
		$work_tag = $this->works_model->get_typeid($title);
		$this->data['works'] = $this->works_model->rs($current_posts,$pagesize,@$work_tag['typeid']);
		$this->load->view('more_work_view',$this->data);
	}



}

