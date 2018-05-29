<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {
	public $admin_model = false;
	public function __construct(){
		parent::__construct();
		
	}

	public function get_rs(){
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT * FROM member order by email asc, active desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function get_row($id=0){
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "where active = '1'";
		}
		$sql = "SELECT * FROM member WHERE id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function check_email($mail=""){
		$sql = "SELECT * FROM member WHERE email = '{$mail}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		if($query->num_rows()>0){
			echo "alert('此電子信箱已是會員了!');";
			$this->my_log->user_write_log("info",$mail.": 此電子信箱已是會員了");
			return false;
		}
		return true;
	}
	public function check_save(){
		$sql = "SELECT * FROM member WHERE email = '{$this->post['email']}' and id <> '{$this->post['mid']}'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
		 	$data = array("error"=>true);
		}
		else{
		 	$data = array("error"=>false);
		}
		echo json_encode($data);
	}
	public function login(){
		$sql = "SELECT * FROM member WHERE email = '{$this->post['mail']}' AND `password` = '{$this->post['pass']}' AND active='1'";
		$query = $this->db->query($sql);
		if($query->num_rows() >0){
			$result = $query->row_array();
			$_SESSION[USER_ID] = $result;
			$this->my_log->user_write_log("info",$this->post["mail"].": 登入成功!");
			echo "location='".SITE_URL."';";
		}else{
			$this->my_log->user_write_log("info","mail:".$this->post["mail"]." password:".$this->post["pass"]."-> 登入失敗");
			echo "alert('請確認電子信箱與密碼正確!');";
		}
	}
	public function get_password($mail=""){
		$sql = "SELECT * FROM member WHERE email = '{$mail}' AND active = '1'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$result = $query->row_array();
			$msg = $result["name"]." 您好，"." <span style='color:red;'>".$result["password"]."</span> 這是您的密碼，請務必妥善保管";
			$status = $this->main_model->send_mail($mail,"FRANKE 密碼遺失函",$msg);
			if($status["status"]){
				$this->my_log->user_write_log("info","mail:".$mail." 密碼遺失函送出!");
				echo "alert('已將您的密碼重新寄送至電子信箱中，請收信確認。');location='".SITE_URL."/member';";
			}
			else{
				$this->my_log->user_write_log("info","mail:".$mail." 密碼遺失函送出失敗!");
				echo "alert('error');console.log('".$status["error"]."');";
			}
		}
		else{
			$this->my_log->user_write_log("info","mail:".$mail." 你尚未註冊!");
			echo "alert('你尚未註冊!');location='".SITE_URL."member/register';";
		}
	}
	public function get_history($id=0){
		$sql = "SELECT * FROM member_history A LEFT JOIN products B ON A.product_id = B.id where A.member_id = '{$id}' order by create_date desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
}
?>