<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes_model extends CI_Model {
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
			$col = "*,SUM(B.now_people) AS now_people,SUM(B.people_limit) AS people_limit";
			$where = "where publish = '1'";
		}
		$sql = "SELECT {$col} FROM classes A LEFT JOIN classes_date B ON A.id = B.classes_id  {$where} GROUP BY A.id ORDER BY month asc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if (!$this->admin_model) {
			foreach ($result as $key => $row) {
				$date_sql = "SELECT * FROM classes_date WHERE classes_id = '{$row["id"]}' ORDER BY classes_date ASC";
				$query = $this->db->query($date_sql);
				$result[$key]["dates"] = $query->result_array();
			}
		}
		return @$result;
	}

	public function get_row($id=0)
	{
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*,SUM(B.now_people) AS now_people,SUM(B.people_limit) AS people_limit";
			$where = "";
		}
		$sql = "SELECT {$col} FROM classes A LEFT JOIN classes_date B on A.id = B.classes_id  where A.id = '{$id}' {$where} GROUP BY A.id";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		$sql = "SELECT * FROM classes_date WHERE classes_id = '{$result["id"]}' ORDER BY classes_date ASC";
		$query = $this->db->query($sql);
		$result["dates"] = $query->result_array();
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
		$sql = "SELECT * FROM sub_type WHERE main_type='classes' and level = '0' ORDER BY id DESC";
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

	public function get_filters_rs($parent_id = "0"){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT * FROM sub_type WHERE relation_id = '{$parent_id}' and main_type='classes' and level = '1' ORDER BY id DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
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
		$sql = "SELECT * FROM sub_type WHERE main_type='classes' and level = '{$active}' and relation_id = '{$parent}' {$where} ORDER BY sort ASC, id DESC";
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
		$sql = "SELECT {$col} FROM sub_type where id = '{$id}' {$where} ORDER BY sort ASC";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_classes_data($id=0){
		$result = array();
		$sql = "SELECT * FROM classes_date A LEFT JOIN classes B ON A.classes_id = B.id WHERE date_id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_order($date_id){
		$result = array();
		$sql = "SELECT * FROM classes_order WHERE date_id = '{$date_id}' and state='付款完成' ORDER BY create_date asc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function get_c_date($id=0){
		$result = array();
		$sql = "SELECT A.*,B.* FROM classes_date A LEFT JOIN classes B ON A.classes_id = B.id WHERE A.date_id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function update_del_order($id){
		$sql = "SELECT * FROM classes_order WHERE id = '{$id}'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$sql = "UPDATE classes_date SET `now_people` = `now_people`-1 WHERE date_id = '{$row["date_id"]}'";
		$query = $this->db->query($sql);
	}
}
?>