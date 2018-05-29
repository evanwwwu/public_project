<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model {
	var $admin_model = false;
	var $url = "";
	public function __construct(){
		parent::__construct();
		// $this->product_main = $this->get_main_id();
	}

	public function get_main_id(){
		$sql = "SELECT id FROM product_main WHERE url = '{$this->url}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result["id"];
	}

	public function get_banner_rs(){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT {$col} FROM product_banner where main_id = '{$main_id}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}

	public function get_banner_row($id=0)
	{
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM product_banner where id = '{$id}' {$where}  ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;
	}

	public function get_menu($type="")
	{
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		switch($type){
			case "submenu":
			$limit = 2;
			break;
			case "feature":
			$limit = 3;
			break;
		}
		$sql = "SELECT {$col} FROM product_submenu where main_id = '{$main_id}' and type='{$type}' {$where} ORDER BY sort asc,id desc limit 0,{$limit}";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_filters(){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM product_filter where main_id = '{$main_id}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		foreach($result as $key=> $filter){
			$sql = "SELECT * FROM filter_option WHERE filter_id = '{$filter["id"]}' order by sort asc,id desc";
			$query = $this->db->query($sql);
			$result[$key]["options"] = $query->result_array();
		}
		return @$result;
	}

	public function get_part_rs($ids=0){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			if(count(json_decode(@$ids))>0){
				$ids = implode(",",json_decode(@$ids));
			}
			else{
				$ids = "0";
			}
			$ids = ($ids=="")?0:$ids;
			$where = "and id IN (".$ids.")";
		}
		$sql = "SELECT {$col} FROM product_parts where main_id = '{$main_id}' {$where} ORDER BY id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}

	public function get_part($id=0){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM product_parts where main_id = '{$main_id}' and id = '{$id}' {$where} ORDER BY id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_ad_rs(){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish='1'";
		}
		$sql = "SELECT {$col} FROM product_submenu where main_id = '{$main_id}' and type='AD' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}

	public function get_ad($id=0){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM product_submenu where main_id = '{$main_id}' and id = '{$id}' and type='AD' {$where} ORDER BY id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_product_rs($is_select=false){
		$result = array();
		$main_id = $this->get_main_id();
		$main_where = "where main_id = '".$main_id."'";
		if($this->admin_model){
			$col = "*";
			$where = "";
			if($is_select){
				$main_where ="";
			}
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT {$col} FROM products {$main_where} {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(!$this->admin_model){
			foreach($result as $key=>$row){
				$sql = "SELECT GROUP_CONCAT(filter_id) as ids FROM product_filter_relationship WHERE product_id = '{$row['id']}' AND main_id = '{$main_id}' GROUP BY product_id ";
				$query2 = $this->db->query($sql);
				$ids = $query2->row_array();
				$result[$key]["filters"] = @$ids["ids"];
			}
		}
		return @$result;
	}
	public function get_product($id=0){
		$result = array();
		$main_id = $this->get_main_id();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish='1'";
		}
		$sql = "SELECT {$col} FROM products where main_id = '{$main_id}' and id='{$id}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		if($this->admin_model){
			$sql = "SELECT GROUP_CONCAT(filter_id) as ids FROM product_filter_relationship WHERE product_id = '".@$result['id']."' AND main_id = '{$main_id}' GROUP BY product_id ";
			$query2 = $this->db->query($sql);
			$ids = $query2->row_array();
			$result["filters"] = ($query2->num_rows()>0)?explode(",",$ids["ids"]):array();
		}
		return @$result;
	}
/////
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
		$sql = "select {$col} from product where id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_type_rs()
	{
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "where publish = '1'";
		}
		$sql = "SELECT {$col} FROM product_type {$where} ORDER BY sort ASC,id DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
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
		$sql = "SELECT {$col} FROM product_type where id = '{$id}' {$where} ORDER BY sort ASC";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	public function get_part_rec($ids=array("0")){
		$json = array();
		if(gettype($ids)=="array"){
			$ids = implode(",",@$ids);
		}
		$ids = ($ids=="" || $ids=="[]")?"0":$ids;
		$sql = "SELECT * FROM product_parts WHERE id IN ({$ids}) ORDER BY FIELD(id,{$ids})";
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
	public function get_product_rec($ids=array("0")){
		$json = array();
		if(gettype($ids)!="string"){
			$ids = implode(",",$ids);
		}
		$ids = ($ids=="")?"0":$ids;

		if($this->admin_model){
			$where = "";
		}
		else{
			$where = "and publish='1'";
		}
		$sql = "SELECT * FROM products WHERE id IN ({$ids}) {$where} ORDER BY FIELD(id,{$ids})";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if($this->admin_model){
			foreach($result as $k => $row){
				$new = array();
				$new["id"] = $row["id"];
				$new["showname"] = $row["title"];
				array_push($json,$new);
			}
		}
		else{
			$json = $result;
		}
		return $json;
	}

}
?>