<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_product extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init(); 
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "index_product";
		$this->databace = "ingredients";
		$this->load->model("ingredients_model");
		$this->ingredients_model->admin_model = true;
	}
//一般
	public function index()
	{ 
		$this->data["h2"] = "首頁食材 編輯";
		$this->data["select_rs"] = $this->ingredients_model->get_index();
		$this->data["rs"] = $this->ingredients_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/index_edit.php',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save(){
		$this->ingredients_model->reset_index();
		foreach ($this->post["select_index"] as $key => $value) {
			if($value!=0){
				$where = " id = '".$value."'";
				$table = array(
					"PK"=>"id",
					"index_sort"=>($key+1)
					);
				$this->global_model->sql_save($this->databace,$table,$where);
			}
		}
		echo "alert('儲存完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."';";
	}
}