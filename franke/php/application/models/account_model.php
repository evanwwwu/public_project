<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_rs()
	{
		$result = array();
		$sql = "SELECT * FROM admin_user ORDER BY id";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_row($id=0)
	{
		$sql = "select * from admin_user where id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function save($id=0)
	{
		$pw = "";
		if($this->post["password"]!="")
		{
			$pw = ",password = '".$this->post["password"]."'";
		}
		if($this->post["id"]=="0")
		{
			$sql = "INSERT INTO admin_user values ('','{$this->post['username']}','{$this->post['password']}','{$this->post['active']}')";
			$query = $this->db->query($sql);
			$aid = $this->db->insert_id();
		}
		else
		{
			$sql = "update admin_user set active='{$this->post['active']}' {$pw} where id = '{$this->post["id"]}'";
			$query = $this->db->query($sql);
			$aid = $this->post["id"];
		}
		echo "location='".ADMIN_URL."accounts/edit/".$aid."';";
	}
	public function del()
	{
		$sql = "delete from admin_user where id = '{$this->post['id']}'";
		$this->db->query($sql);
		echo "$('#row_".$this->post['id']."').remove();";
	}
}
?>