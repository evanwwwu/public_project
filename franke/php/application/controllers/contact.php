<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->data["controller_addr"] = "member";
		$this->load->model("member_model");
		$this->data["menus"] = $this->main_model->get_menu();
	}

	public function index(){
		$this->data['page_view'] = $this->load->view('contact_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function send(){
		if($this->post["mail"]!=""&&$this->post["username"]!=""&&$this->post["phone"]!=""&&$_POST["content"]!=""){
			$msg = "電子信箱: ".$this->post["mail"]."<br>";
			$msg .= "姓名: ".$this->post["username"]."<br>";
			$msg .= "連絡電話: ".$this->post["phone"]."<br>";
			$msg .= "你的身分: ".$this->post["identity"]."<br>";
			$msg .= "內容: ".addslashes(@$_POST["content"]);
			$status =$this->main_model->send_mail("franketw@gmail.com","站內信通知",$msg);
			if($status["status"]){
				echo "alert('感謝您的來信！我們將儘快與您聯繫。')";
			}
			else{
				$this->my_log->user_write_log("info","站內信送出! 內容:".json_encode($this->post));
				echo "alert('error');console.log('".$status["error"]."')";
			}
		}
		else{
			header("location:".SITE_URL);exit;
		}
	}

}
