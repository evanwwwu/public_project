<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}

	public function get_rs(){
		$filter='';
		if(@$this->get["active"]!="")
		{
			$filter = "and `active` = '".$this->get["active"]."'";
		}
		if(@$this->get["email"]!="")
		{
			$filter = "and `email` like '%".$this->get["email"]."%'";
		}
		$sql = "SELECT * FROM members where 0=0 {$filter} ORDER BY id DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	public function get_row($id=0){
		$result = "";
		$sql = "SELECT * FROM members WHERE id = '{$id}'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$result = $query->row_array();
			return $result;
		}
		else{
			show_404();
		}
	}

	public function check_member($email=""){
		$where = "";
		if(@$_SESSION["member_id"]!=""){
			$wehre = "and id <> '".$_SESSION["member_id"]."'";
		}
		$sql = "SELECT * FROM members WHERE email = '{$email}' {$where}";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	public function fb_login($fb_id=0){
		$sql = "SELECT * FROM members WHERE fb_id = ? AND active <> '0'";
		$query = $this->db->query($sql,array($fb_id));
		if($query->num_rows()>0){
			$row = $query->row_array();
			$_SESSION["member_id"] = $row["id"];
			$_SESSION["member_data"] = $row;
			return true;
		}
		else{
			return false;
		}
	}
	public function login(){
		$sql = "SELECT * FROM members WHERE email=? AND password=? AND active <> '0'";
		$query = $this->db->query($sql,array($this->post["email"],$this->post["password"]));
		if($query->num_rows()>0){
			$row = $query->row_array();
			$_SESSION["member_id"] = $row["id"];
			$_SESSION["member_data"] = $row;
			return true;
		}
		else{
			return false;
		}
	}

	public function get_data($email=""){
		$result = array();
		$sql = "SELECT * FROM members WHERE email = '{$email}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
}
?>