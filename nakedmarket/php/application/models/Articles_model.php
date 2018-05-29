<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}

	public function get_rs($type_id=0)
	{
		$result = array();
		if($this->admin_model){
			$col = "A.*,B.product_no,B.unit_text,B.unit,B.price,B.count,B.id as pid";
			$where = "";
		}
		else{
			$col = "A.*,B.product_no,B.unit_text,B.unit,B.price,B.count,B.id as pid";
			$where = "where publish = '1' and type_id ='".$type_id."' ";
		}
		$sql = "SELECT {$col} FROM articles A LEFT JOIN products B on A.product_id = B.id AND B.product_type = 'articles' {$where} ORDER BY sort asc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}

	public function get_row($id=0)
	{
		if($this->admin_model){
			$col = "A.*,B.product_no,B.unit_text,B.unit,B.price,B.count,B.id as pid,B.ship_type";
			$where = "";
		}
		else{
			$col = "A.*,B.product_no,B.unit_text,B.unit,B.price,B.count,B.id as pid,B.ship_type";
			$where = "";
		}
		$sql = "SELECT {$col} FROM articles A LEFT JOIN products B ON A.product_id = B.id where A.id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		$result["count"] = $this->main_model->update_product($result["product_no"]);
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
		$sql = "SELECT * FROM sub_type WHERE main_type='articles' and level = '0' ORDER BY sort asc";
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
		$sql = "SELECT * FROM sub_type WHERE relation_id = '{$parent_id}' and main_type='articles' and level = '1' ORDER BY sort asc";
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
		$sql = "SELECT * FROM sub_type WHERE main_type='articles' and level = '{$active}' and relation_id = '{$parent}' {$where} ORDER BY sort ASC, id DESC";
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