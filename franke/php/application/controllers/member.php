<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->data["controller_addr"] = "member";
		$this->load->model("member_model");
		$this->data["menus"] = $this->main_model->get_menu();
	}

	public function index(){
		$this->my_log->user_write_log("info","登入畫面");
		$this->data['page_view'] = $this->load->view('member/member_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function register()
	{
		$this->my_log->user_write_log("info","會員註冊");
		$this->data['page_view'] = $this->load->view('member/register_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function check_member($id=0){
		$this->my_log->user_write_log("info","註冊表單送出");
		if($id=="0"&&$this->post['mail']!=""){
			$check = $this->member_model->check_email($this->post['mail']);
		}
		else{
			$check = true;
		}
		if($check&&$this->post['mail']!=""&&$this->post["username"]){
			$where = " id = '".$id."'";
			$table=array(
				"PK"=>"id",
				"email"=>$this->post["mail"],
				"name" =>$this->post["username"],
				"phone" =>$this->post["phone"],
				"status" =>$this->post["identity"],
				"active" =>"1"
				);
			if($this->post["pass1"]!="")
			{
				array_push($table,array("password"=>$this->post["pass1"]));
			}
			$mid = $this->global_model->sql_save("member",$table,$where);
			if($id=="0"){
				$this->my_log->user_write_log("info","mail: ".$this->post["mail"]." 註冊成功! 內容:".json_encode($this->post));
				echo "alert('感謝你的註冊。');";
				echo "location='".SITE_URL."member';";
			}
			else{
				$this->my_log->user_write_log("info","mail: ".$this->post["mail"]." 修改會員資料 內容:".json_encode($this->post));
				$_SESSION[USER_ID]=$this->member_model->get_row($id);
				echo "alert('修改完成!');";
				echo "location=location;";
			}
		}
	}

	public function login(){
		$this->member_model->login();
	}
	public function logout(){
		unset($_SESSION[USER_ID]);
		$this->my_log->user_write_log("info","mail: ".$this->post["mail"]." 會員登出!");
		header('location:'.SITE_URL.'');
	}

	public function modify(){
		$this->data['page_view'] = $this->load->view('member/modify_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function forget(){
		$this->data['page_view'] = $this->load->view('member/forget_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function forget_mail(){
		$this->member_model->get_password($this->post["mail"]);
	}
}
