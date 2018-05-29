<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
	}
	public function ckupload($file='upload',$id=0)
	{
		// $this->load->library("MY_Log");
		// $this->log->isa_write_log("INFO","CKedit照片上傳");
		$this->load->model("upload_model");
		$this->upload_model->ckupload($file,$id);
	}

}