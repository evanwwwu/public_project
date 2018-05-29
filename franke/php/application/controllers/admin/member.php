<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->chech_active(array(1));
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"] = "member";
		$this->load->model("member_model");
		$this->data["menus"] = $this->main_model->get_menu();
	}

	public function index(){
		$this->data["rs"] = $this->member_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/member/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0){
		$this->data["id"] = $id;
		$this->data['row'] = $this->member_model->get_row($id);
		$this->data["history"] = $this->member_model->get_history($id);
		$this->my_log->admin_write_log("info","編輯 ".$this->data["row"]["email"]." 會員");
		$this->data['content_view'] = $this->load->view('admin/member/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"email"=>$this->post["email"],
			"name" =>$this->post["name"],
			"phone" =>$this->post["phone"],
			"status" =>$this->post["identity"],
			"active" =>$this->post["active"]
			);
		if($this->post["password"]!="")
		{
			$table["password"] = $this->post["password"];
		}
		$mid = $this->global_model->sql_save("member",$table,$where);
		$this->my_log->admin_write_log("info","修改 ".$this->post["email"]." 會員 內容:".json_encode($this->post));
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL."member/edit/".$mid."';";
	}
	public function del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("member",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
	public function check_save(){
		$this->member_model->check_save();
	}

}
