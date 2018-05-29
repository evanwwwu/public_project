<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->chech_active(array(1));
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "accounts";
		$this->load->model("account_model");
	}
	public function index()
	{
		$this->data["rs"] = $this->account_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/accounts/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function edit($id='')
	{
		$this->data['row'] = $this->account_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/accounts/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function save($id=0)
	{
		$this->account_model->save($id);
	}
	public function del()
	{
		$this->account_model->del();
	}
	public function ckupload($file='upload',$id=0)
	{
		// $this->load->library("MY_Log");
		// $this->log->isa_write_log("INFO","CKedit照片上傳");
		$this->load->model("upload_model");
		$this->upload_model->ckupload($file,$id);
	}

	public function product_register(){
		$where = "url = '".$this->get["url"]."'";
		$table = array(
			"PK"=>"id",
			"url"=>$this->get["url"],
			"title"=>urldecode($this->get["title"]),
			"type" =>$this->get["type"]
			);
		$bid = $this->global_model->sql_save("product_main",$table,$where);
		header("location:".ADMIN_URL.$this->get["url"]."/banner");exit;
	}
	// public function cktool()
	// {
	// 	echo '<script type="text/javascript">
 //            window.parent.CKEDITOR.tools.callFunction( '.$_GET['CKEditorFuncNum'].', "'.$_GET["ImageUrl"].'" );
 //            </script>';
	// }
}