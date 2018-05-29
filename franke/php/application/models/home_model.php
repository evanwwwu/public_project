<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {
	var $admin_model = false;
	var $url = "";
	public function __construct(){
		parent::__construct();
		// $this->index_main = $this->get_main_id();
	}

	public function get_banner_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "where publish = '1'";
		}
		$sql = "SELECT {$col} FROM index_banner {$where} ORDER BY sort asc,id desc";
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
		$sql = "SELECT {$col} FROM index_banner where id = '{$id}' {$where}  ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;
	}

	public function get_product()
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
		$sql = "SELECT {$col} FROM index_product {$where} ORDER BY id asc limit 0,3";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_feature_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = " where publish = '1'";
		}
		$sql = "SELECT {$col} FROM index_feature {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_feature_row($id=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM index_feature where id = '{$id}' {$where}  ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;

	}
	public function get_appliance_rs(){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "where publish='1'";
		}
		$sql = "SELECT {$col} FROM index_appliance {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
	public function get_appliance_row($id=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM index_appliance where id = '{$id}' {$where}  ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result;

	}


	public function get_ad_rs(){
		$result = array();

		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM index_submenu where type='AD' {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;

	}

	public function get_ad($id=0){
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT {$col} FROM index_submenu where id = '{$id}' and type='AD' {$where} ORDER BY id desc";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
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
		$sql = "select {$col} from index where id = '{$id}' {$where}";
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
		$sql = "SELECT {$col} FROM index_type {$where} ORDER BY sort ASC,id DESC";
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
		$sql = "SELECT {$col} FROM index_type where id = '{$id}' {$where} ORDER BY sort ASC";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
}
?>