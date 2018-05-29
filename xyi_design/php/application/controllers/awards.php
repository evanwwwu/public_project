<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awards extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->model('awards_model');
		$this->data['controller_addr'] = "awards";
	}
	public function index(){
		$this->data['over'] = 0;
		$this->data['pre'] = true;
		$count = 0;
		$year = array();
		$this->data['years'] = $this->awards_model->get_year(0,2);
		foreach ($this->data['years'] as $y) {
			array_push($year,$y['year']);
		}
		$year = implode(",", $year);
		$this->data['datas'] = $this->awards_model->rs($year);
		// print_r($this->data['datas']);exit;
		if(count($this->data['datas'])<=4){
			$year = array();
			$this->data['over'] = 1;
			$this->data['years'] = $this->awards_model->get_year(0,3);
			foreach ($this->data['years'] as $y) {
				array_push($year,$y['year']);
			}
			$year = implode(",", $year);
			$this->awards_model->wids = 0;
			$this->data['datas'] = $this->awards_model->rs($year);

		}
		// print_r($this->data['years']);exit;
		$this->data['wids'] = $this->awards_model->wids;
		$this->data['content_view'] = $this->load->view("awards_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}

	public function loadyear($page=0,$over=0){
		$pagesize = 1;
		$current_posts = (($page-1) * $pagesize)+1+$over;
		// print_r($current_posts);exit;
		$year = array();
		$this->data['years'] = $this->awards_model->get_year($current_posts,$pagesize);
		foreach ($this->data['years'] as $y) {
			array_push($year,$y['year']);
		}
		$year = implode(",", $year);
		$this->data['datas'] = $this->awards_model->rs($year);
		$this->data['wids'] = $this->awards_model->wids;
		// print_r($this->data['datas']);
		$this->load->view('more_awards_view',$this->data);

	}
}

