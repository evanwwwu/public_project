<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Press extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data = $this->global_model->controller_init();
		$this->load->model("press_model");
		$this->data['controller_addr'] = "press";
	}

	public function index($id="1"){
		$year = array();
		$this->data['over'] = 0;
		$this->data['years'] = $this->press_model->get_year(0,1);
		foreach ($this->data['years'] as $y) {
			array_push($year,$y['year']);
		}
		$year = implode(",", $year);
		$this->data['press'] = $this->press_model->rs($year);

		if(count($this->data['press'])<=8){
			$year = array();
			$this->data['over'] = 1;
			$this->data['years'] = $this->press_model->get_year(0,2);
			foreach ($this->data['years'] as $y) {
				array_push($year,$y['year']);
			}
			$year = implode(",", $year);
			$this->data['press'] = $this->press_model->rs($year);

		}

		$this->data['content_view'] = $this->load->view("press_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);
	}

	public function post($url){
		$this->data['isin'] = true;
		$this->data['data'] = $this->press_model->row($url);
		$this->data['content_view'] = $this->load->view("press_post_view",$this->data,TRUE);
		$this->load->view('master_view',$this->data);

	}

	public function loadyear($page=0,$over=0){
		$pagesize = 1;
		$current_posts = (($page-1) * $pagesize)+$over;
		$year = array();
		$this->data['years'] = $this->press_model->get_year($current_posts,$pagesize);
		foreach ($this->data['years'] as $y) {
			array_push($year,$y['year']);
		}
		$year = implode(",", $year);
		$this->data['press'] = $this->press_model->rs($year);
		$this->load->view('more_press_view',$this->data);

	}
}
