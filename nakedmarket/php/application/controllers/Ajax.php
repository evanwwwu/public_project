<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
	}

	public function fb_login(){
		$this->load->model("member_model");
		$member = json_decode($this->post["member"]);
		if($this->member_model->fb_login($member->id)){
			if (isset($_SESSION["history_url"])) {
				$url = $_SESSION["history_url"];
				unset($_SESSION["history_url"]);
			}
			else{
				$url = SITE_URL."member/detail";
			}
			echo "location = '".$url."';";	
		}
		else{
			if(isset($member->email)){
				if($this->member_model->check_member($member->email)){
					$where = "email = '".$member->email."'";
					$table= array(
						"PK"=>"id",
						"fb_id"=>$member->id			
						);
					$pid = $this->global_model->sql_save("members",$table,$where);
					if($this->member_model->fb_login($member->id)){
						echo "location = '".SITE_URL."member/detail';";
					}
				}
				else{
					$where = "fb_id = '".$member->id."'";
					$table= array(
						"PK"=>"id",
						"fb_id"=>$member->id,
						"email"=>$member->email,
						"username"=>$member->name,
						"active"=>"1",
						"create_date"=>date("Y/m/d H:i:s")					
						);				
					$pid = $this->global_model->sql_save("members",$table,$where);
					if($this->member_model->fb_login($member->id)){
						echo "location = '".SITE_URL."member/detail';";
					}			
				}
			}
			else{
				$where = "fb_id = '".$member->id."'";
				$table= array(
					"PK"=>"id",
					"fb_id"=>$member->id,
					"username"=>$member->name,
					"active"=>"1",
					"create_date"=>date("Y/m/d H:i:s")					
					);				
				$pid = $this->global_model->sql_save("members",$table,$where);
				if($this->member_model->fb_login($member->id)){
					echo "location = '".SITE_URL."member/detail';";
				}
			}
		}
	}

	public function member_getpass(){
		$this->load->model("member_model");
		if($this->member_model->check_member($this->post["email"])){
			$this->data["member"] = $this->member_model->get_data($this->post["email"]);
			$msg = $this->load->view("member/getpass_mail",$this->data,true);
			$status = $this->main_model->send_email($this->post["email"],"Naked Market 密碼通知信",$msg);
			if($status["status"]){			
				echo "$('input[name=".$this->security->get_csrf_token_name()."]').val('".$this->security->get_csrf_hash()."');";
				echo "alert('已發送密碼通知信!');";
			}
			else{			
				echo "$('input[name=".$this->security->get_csrf_token_name()."]').val('".$this->security->get_csrf_hash()."');";
				echo 'console.log("'.$status['error'].'")';
				echo "alert('error!');";
			}
		}
		else{			
			echo "$('input[name=".$this->security->get_csrf_token_name()."]').val('".$this->security->get_csrf_hash()."');";
			echo "alert('查無此信箱!');";
		}
	}
	public function test(){
		$mssb = $this->load->database("mssql",true);
		$query = $mssb->query("select convert(text,INVN005) as Content from WD4INVNA where INVN002 = '11009'");
	}

}