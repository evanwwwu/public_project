<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}
	public function get_rs()
	{
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$where = "where publish = '1'";
			$col = "*";
		}
		$sql = "SELECT {$col} FROM sample {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}

	public function get_row($id=0)
	{
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "select {$col} from sample where id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}


	public function get_type_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT * FROM sample_type WHERE active = '0' ORDER BY sort ASC, id DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		foreach($result as $lv => $row){
			$result[$lv]["sub"] = $this->get_child($row["id"],1);
			foreach($result[$lv]["sub"] as $lv2 => $sub_active){
				$result[$lv]["sub"][$lv2]["sub"] = $this->get_child($sub_active["id"],2);
			}
		}
		return @$result;
	}

	public function get_child($parent=0,$active=0){
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT * FROM sample_type WHERE active = '{$active}' and parent_id = '{$parent}' {$where} ORDER BY sort ASC, id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_type_row($id=0){
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM sample_type where id = '{$id}' {$where} ORDER BY sort ASC";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	public function get_relation_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "publish = '1'";
		}
		$sql = "SELECT {$col} FROM relation_part {$where} ORDER BY id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;

	}
	public function get_part_rec($ids=array("0")){
		$json = array();
		if(gettype($ids)=="array"){
			$ids = implode(",",@$ids);
		}
		$ids = ($ids=="" || $ids=="[]")?"0":$ids;
		$sql = "SELECT * FROM relation_part WHERE id IN ({$ids}) ORDER BY FIELD(id,{$ids})";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		foreach($result as $k => $row){
			$new = array();
			$new["id"] = $row["id"];
			$new["showname"] = $row["title"];
			array_push($json,$new);
		}
		return $json;
	}
}
?>