<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init(); 
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "orders";
		$this->databace = "orders";
		$this->load->model("order_model");
		$this->order_model->admin_model = true;
		$this->data["pay_type"] = array("Credit"=>"信用卡","WebATM"=>"線上ATM","CVS"=>"超商取號");
	}

	public function index()
	{
		$this->data["states"] = array("尚未付款","取號完成","付款失敗","付款完成","出貨中","訂單取消");
		$this->data["rs"] = $this->order_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/order/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["states"] = array("尚未付款","取號完成","付款失敗","付款完成","出貨中","訂單取消");
		$this->data["row"] = $this->order_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/order/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	

	public function save($id=0)
	{
		$where = "id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"PK_val"=>$id,
			"state" => $this->post["order_type"]
			);
		$bid = $this->global_model->sql_save("orders",$table,$where);	
		echo "alert('儲存完成!');";
		echo "location='".ADMIN_URL."orders/edit/".$bid."';";
	}

	public function del()
	{
		$where = "id='".$this->post["id"]."'";
		$table = array("PK"=>"id","del"=>"1");
		$this->global_model->sql_save("orders",$table,$where);
		echo "$('#row_".$this->post['id']."').remove();";
	}

	public function dowload_excel(){
		$this->data["states"] = array("未處理","取號完成","付款失敗","付款完成","出貨中","訂單取消");
		$this->log->ec_write_log("INFO","管理者 ".$_SESSION[ADMIN_SESSION]." ".$_SESSION[ADMIN_NAME] ."下載訂單");
		$filename="裸市集一般訂單_".date("Y-m-d").".xls";
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:filename=$filename");
		$this->data["rs"] = $this->order_model->get_rs();
		$this->load->view('admin/order/excel_view',$this->data);

	}

}