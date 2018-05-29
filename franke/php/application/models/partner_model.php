<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Partner_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}

	public function get_area($area=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM store_type where url='{$area}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;
	}
	public function get_area_url($id=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM store_type where id='{$id}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;
	}
	public function get_partner_rs($type=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT {$col} FROM store where type_id='{$type}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_partner_row($id=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "SELECT {$col} FROM store where id='{$id}' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;

	}

	public function get_area_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM store_type {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_product_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM products ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
/////
}
?>