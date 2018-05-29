<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recommend extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('posts_model');
		$this->load->model('recommend_model','model');
		$this->load->model('users_model');
		$this->load->model('tags_model');
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);

	}
	public function index(){
	 $this->post();
	}

	public function post($id=0){		
		$data['data'] = $this->model->rs02(1,20,"post",$id);
		$data['recs_id'] = $this->model->recs_id($id);
		$data['us_id'] = $id;
		$data['type'] = 'post';
		$this->load->view('recommend_view',$data);
	}

	public function event($id=0){
		$data['data'] = $this->model->rs02(1,20,"event",$id);
		$data['recs_id'] = $this->model->recs_id($id);
		$data['us_id'] = $id;
		$data['type'] = 'event';
		$this->load->view('recommend_view',$data);
	}
	public function people($id=0){
		$data['data'] = $this->model->rs02(1,20,"people",$id);
		$data['recs_id'] = $this->model->recs_id($id);
		$data['us_id'] = $id;
		$data['type'] = 'people';
		$data['a_z'] =array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$this->load->view('recommend_view',$data);
	}
	public function brand($id=0){
		$data['data'] = $this->model->rs02(1,20,"brand",$id);
		$data['recs_id'] = $this->model->recs_id($id);
		$data['us_id'] = $id;
		$data['type'] = 'brand';
		$data['a_z2'] =array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$this->load->view('recommend_view',$data);
	}
	public function user($id=0){
		$data['data'] = $this->model->user_rs();
		$post_id = $this->model->user_post($id);
		$data['recs_id'] = $this->model->recs_id($post_id);
		$data['type'] = 'user';
		$this->load->view('recommend_user_view',$data);

	}
	public function calendar($id=0){
		$data['data'] = $this->model->rs02(1,20,"calendar",$id);
		$data['recs_id'] = $this->model->recs_id($id);
		$data['us_id'] = $id;
		$data['type'] = 'calendar';
		$this->load->view('recommend_view',$data);
	}
	
	public function addrec($id,$r_id,$action){
		$this->model->addrec($id,$r_id,$action);
	}
}	