<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
	public $admin_model = false;
	public function __construct(){
		parent::__construct();
		
	}
	public function get_rs(){
		if($this->admin_model){
			$col = "*";
			$where = "where status<>'人工刪單'";
			$date="";
			if(@$this->get["start_date"]!=""&&@$this->get["end_date"]!="")
			{
				$date = " and `createtime` between '".$this->get["start_date"]."' and '".$this->get["end_date"]."'";
			}
			if($date=="")
			{
				if(@$this->get["start_date"]!="")
				{
					$date = " and `createtime` > '".$this->get["start_date"]."'";
				}
				if(@$this->get["end_date"]!="")
				{
					$date = " and `createtime` < '".$this->get["end_date"]."'";
				}
			}
			if(@$this->get["order_no"]!="")
			{
				$where .= " and order_no='".$this->get["order_no"]."'";
			}
			if(@$this->get["status"]!="")
			{
				$where .= " and status ='".$this->get["status"]."'";
			}
			$where .= " ".$date;

		}
		else{
			$col = "*";
			$where = "";
		}
		$sql = "SELECT * FROM `orders` {$where} order by createtime desc, status desc";
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
		$sql = "SELECT * FROM orders WHERE id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_order_no(){
		$sql = "SELECT COUNT(*) as cou FROM orders WHERE order_no LIKE '".date("ymd")."%' ORDER BY order_no DESC";
		$query = $this->db->query($sql);
		$no = $query->row_array();
		return (int)$no["cou"] + 1;
	}
	public function product_main($mid=0){
		$sql = "SELECT * FROM product_main WHERE id = '{$mid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result["title"];
	}
	public function get_url($mid=0){
		$sql = "SELECT * FROM product_main WHERE id = '{$mid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result["url"];

	}
}
?>