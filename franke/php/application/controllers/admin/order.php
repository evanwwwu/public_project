<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->chech_active(array(1));
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"] = "order";
		$this->load->model("order_model");
		$this->order_model->admin_model = true;
		$this->data["menus"] = $this->main_model->get_menu();
	}

	public function index(){
		$this->data["rs"] = $this->order_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/order/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0){
		$this->data["id"] = $id;
		$this->data['row'] = $this->order_model->get_row($id);
		$this->my_log->admin_write_log("info","編輯 訂單編號:".$this->data["row"]["order_no"]);
		$this->data['content_view'] = $this->load->view('admin/order/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"status"=>$this->post["status"],
			"comment" =>@$this->post["comment"]
			);
		$mid = $this->global_model->sql_save("orders",$table,$where);
		$this->my_log->admin_write_log("info","修改 訂單編號:".$this->post["order_no"]." 內容:".json_encode($this->post));
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL."order/edit/".$mid."';";
	}
	public function del(){
		$where = "id = '".$this->post["id"]."'";
		$table=array(
			"PK"=>"id",
			"status"=>"人工刪單"
			);
		$this->global_model->sql_save("orders",$table,$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}

}
