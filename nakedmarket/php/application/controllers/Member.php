<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data["page_addr"]  = "member";
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->model("member_model");
	}

	public function index(){
		if(@$_SESSION["member_id"]!="")
		{
			header("location:".SITE_URL."member/detail/");exit;
		}
		$this->data["page_addr"] = "member_login";
		$this->data['page_view'] = $this->load->view('member/login_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function detail(){
		if(@$_SESSION["member_id"]=="")
		{
			header("location:".SITE_URL."member/");exit;
		}
		$this->load->model("order_model");
		$this->data["state_class"] = array("尚未付款"=>"notpay","取號完成"=>"out","付款失敗"=>"notpay","付款完成"=>"end","出貨中"=>"out","訂單取消"=>"notpay");
		$this->data["page_addr"] = "member_edit";
		$this->data["member"] = $this->member_model->get_data($_SESSION['member_data']['email']);
		$this->data["orders"] = $this->order_model->get_orders();
		$this->data["c_orders"] = $this->order_model->get_class_orders();
		$this->data['page_view'] = $this->load->view('member/detail_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function getpass(){
		if(@$_SESSION["member_id"]!="")
		{
			header("location:".SITE_URL."member/detail/");exit;
		}
		$this->data["page_addr"] = "member_getpass";
		$this->data['page_view'] = $this->load->view('member/getpass_view',$this->data,true);
		$this->load->view('master_view',$this->data);		
	}
	
	public function login(){
		$this->member_model->login();
		if (isset($_SESSION["history_url"])) {
			$url = $_SESSION["history_url"];
			unset($_SESSION["history_url"]);
		}
		else{
			$url = SITE_URL."member/detail";
		}
		echo "location = '".$url."';";		
	}
	public function signup(){
		if(@$_SESSION["member_id"]!="")
		{
			header("location:".SITE_URL."member/detail/");exit;
		}
		$this->data["page_addr"] = "member_signup";
		$this->data['page_view'] = $this->load->view('member/signup_view',$this->data,true);
		$this->load->view('master_view',$this->data);		
	}

	public function signup_save(){
		if($this->member_model->check_member($this->post["email"])){			
			echo "$('input[name=".$this->security->get_csrf_token_name()."]').val('".$this->security->get_csrf_hash()."');";
			echo "alert('此電子信箱已為會員!');";
		}
		else{
			$where = "email='".$this->post["email"]."'";
			$table = array(
				"PK"=>"id",
				"email"=>$this->post["email"],
				"password"=>$this->post["password"],
				"active"=>"1",
				"create_date"=>date("Y/m/d H:i:s")
				);
			$pid = $this->global_model->sql_save("members",$table,$where);
			$this->login();
		}
	}
	public function edit_save(){
		if($this->post["email"]==$_SESSION["member_data"]["email"]){
			$where = "id = '".$_SESSION["member_id"]."'";
			$table = array(
				"PK"=>"id",
				"username"=>@$this->post["username"],
				"phone"=>@$this->post["phone"],
				"mobile"=>@$this->post["mobile"],
				"address"=>@$this->post["address"],
				"password"=>@$this->post["password"]
				);
			$mid = $this->global_model->sql_save("members",$table,$where);
			$_SESSION["member_data"] = $this->post;
			echo "location = location";
		}
		else{
			if($this->member_model->check_member($this->post["email"])){			
				echo "$('input[name=".$this->security->get_csrf_token_name()."]').val('".$this->security->get_csrf_hash()."');";
				echo "alert('此電子信箱已為會員!');";
			}
			else{
				$where = "id = '".$_SESSION["member_id"]."'";
				$table = array(
					"PK"=>"id",
					"username"=>@$this->post["username"],
					"email"=>$this->post["email"],
					"phone"=>@$this->post["phone"],
					"mobile"=>@$this->post["mobile"],
					"address"=>@$this->post["address"],
					"password"=>@$this->post["password"]
					);
				$mid = $this->global_model->sql_save("members",$table,$where);
				$_SESSION["member_data"] = $this->post;
				echo "location = location";				
			}
		}
	}

	public function logout(){
		unset($_SESSION["member_id"]);
		unset($_SESSION["member_data"]);
		header('location:'.SITE_URL.'');
	}
}