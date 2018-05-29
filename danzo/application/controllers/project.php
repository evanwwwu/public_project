<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->main_model->init();
		$this->data["page_addr"]  = "project";
		$this->load->model("project_model");
	}

	public function index()
	{
		$this->data["type"] = $this->project_model->get_type();
		foreach($this->data["type"] as $key=>$type){
			$this->data["type"][$key]["rs"] = $this->project_model->get_rs($type["id"]);
		}
		$this->data['page_view'] = $this->load->view('project_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function detail($id=0){
		$this->data["type"] = $this->project_model->get_type();
		foreach($this->data["type"] as $key=>$type){
			$this->data["type"][$key]["rs"] = $this->project_model->get_rs($type["id"]);
		}
		$this->data["row"] = $this->project_model->get_row($id);
		$this->data['page_view'] = $this->load->view("project_detail",$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}

