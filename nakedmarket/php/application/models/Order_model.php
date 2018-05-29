<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
		$this->load->helper("allpay_sdk");
	}

	public function create_order(){
		$no = $this->get_order_no();
		$total_amt = ($this->cart->total()+$this->cart->ship);
		$state = ($this->post["pay_type"]=="CVS")?"取號失敗":"尚未付款";
		$this->db->trans_begin();
		$sql = "INSERT INTO orders (member_id,order_no,pay_type,state,ship,ship_type,total,consignee,create_date) 
		VALUES ('".$_SESSION["member_id"]."','net".date("Ymd").$no."','{$this->post["pay_type"]}','{$state}','{$this->cart->ship}','{$this->cart->ship_type}','{$total_amt}','{$this->post["order_data"]}','".date("Y-m-d H:i:s")."');";
		$query = $this->db->query($sql);
		$order_id = $this->db->insert_id();
		foreach($this->cart->contents() as $item){
			$pmid = explode("-",$item["id"]);  //$ {0=>主要ID,1=>產品ID}
			$sql = "SELECT * FROM products WHERE id = '{$pmid[0]}'";
			$query = $this->db->query($sql);
			$product = $query->row_array();
			if($product["count"]>=$item['qty']){
				$sql = "INSERT INTO order_product (order_id,product_id,main_id,category,product_name,price,unit_text,qty,total) 
				VALUES ('{$order_id}','{$pmid[0]}','{$pmid[1]}','{$item["options"]->type}','{$item['name']}','{$item['price']}','{$item["options"]->unit_text}','{$item['qty']}','{$item['subtotal']}');";
				$pro_query = $this->db->query($sql);				
				$sql = "UPDATE products SET `count` = `count`-{$item["qty"]} WHERE id = '{$pmid[0]}'";
				$query = $this->db->query($sql);
			}
			else{
				$this->db->trans_rollback();
				$this->cart->destroy();
				return array("status"=>false,"error"=>"商品: ".$item['name']." 庫存不足。");				
			}
		}

		$sql = "INSERT INTO order_product (order_id,category,product_name,price,qty,total) 
		VALUES ('{$order_id}','ship','{$this->cart->ship_type}','{$this->cart->ship}','1','{$this->cart->ship}');";
		$this->db->query($sql);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return array("status"=>false,"error"=>"建單錯誤。");
		}
		else
		{
			// 新增excel檔
			$this->cart->destroy();
			$this->db->trans_commit();
			return $order_id;
		}
	}

	public function create_c_order(){
		$no = $this->get_c_order_no();
		$this->db->trans_begin();
		$sql = "INSERT INTO classes_order (member_id,order_no,pay_type,state,date_id,classes_name,total,member_data,create_date) 
		VALUES ('".@$_SESSION["member_id"]."','C".date("Ymd").time()."','{$this->post["pay_type"]}','尚未付款','{$this->post["date_id"]}','{$this->post["classes_name"]}','{$this->post["price"]}','{$this->post["member_data"]}','".date("Y-m-d H:i:s")."');";
		$query = $this->db->query($sql);
		$order_id = $this->db->insert_id();
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $order_id;
		}		
	}
	private function get_c_order_no(){
		$sql = "SELECT COUNT(*) as cou FROM classes_order WHERE order_no LIKE 'C".date("Ymd")."%' ORDER BY order_no DESC";
		$query = $this->db->query($sql);
		$no = $query->row_array();
		return str_pad((int)$no["cou"] + 1,4,'0',STR_PAD_LEFT);
	}
	private function get_order_no(){
		$sql = "SELECT COUNT(*) as cou FROM orders WHERE order_no LIKE 'net".date("Ymd")."%' ORDER BY order_no DESC";
		$query = $this->db->query($sql);
		$no = $query->row_array();
		return str_pad((int)$no["cou"] + 1,4,'0',STR_PAD_LEFT);
	}

	public function get_row($id=0){
		$sql = "SELECT * FROM orders WHERE id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		$sql = "SELECT A.*,B.product_no FROM order_product A LEFT JOIN products B ON product_id = B.id WHERE order_id = '{$result["id"]}' AND category <>'ship' ORDER BY category DESC";
		$query = $this->db->query($sql);
		$result["products"] = $query->result_array();
		$sql ="SELECT * FROM order_product WHERE order_id = '{$result["id"]}' and category ='ship'";
		$query = $this->db->query($sql);
		$result["ship"] = $query->row_array();
		return $result; 
	}
	public function get_c_row($id = 0){
		$sql = "SELECT A.*,B.classes_date FROM classes_order A LEFT JOIN classes_date B on A.date_id = B.date_id WHERE A.id = '{$id}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result; 
	}

	public function get_orders(){
		$result = array();
		$sql = "SELECT * FROM orders WHERE member_id = '{$_SESSION["member_id"]}' ORDER BY create_date DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if($query->num_rows()>0){
			foreach($result as $key=>$row){
				$sql = "SELECT * FROM order_product WHERE order_id = '{$result[$key]["id"]}' and category <>'ship'  ORDER BY category DESC";
				$query = $this->db->query($sql);
				$result[$key]["products"] = $query->result_array();
				// $sql = "SELECT * FROM order_product WHERE order_id = '{$result[$key]["id"]}' and category ='ship'  ORDER BY category DESC";
				// $query = $this->db->query($sql);
				// $result[$key]["ship"] = $query->row_array();
			}
		}
		return $result;
	}

	public function get_class_orders(){
		$result = array();
		$sql = "SELECT * FROM classes_order WHERE member_id = '{$_SESSION["member_id"]}' ORDER BY create_date DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function get_rs(){
		$filter = "";
		$date="";
		if(@$this->get["start_date"]!=""&&@$this->get["end_date"]!="")
		{
			$date = "and `create_date` between '".$this->get["start_date"]."' and '".$this->get["end_date"]."'";
		}
		if($date=="")
		{
			if(@$this->get["start_date"]!="")
			{
				$date = "and `create_date` > '".$this->get["start_date"]."'";
			}
			if(@$this->get["end_date"]!="")
			{
				$date = "and `create_date` < '".$this->get["end_date"]."'";
			}
		}
		if(@$this->get["order_no"]!="")
		{
			$filter = "and order_no like '%".$this->get["order_no"]."%'";
		}
		if(@$this->get["order_type"]!="")
		{
			$filter .= " and state ='".$this->get["order_type"]."'";
		}
		if(@$this->get["pay_no"]!="")
		{
			$filter .= "and pay_type='".$this->get["pay_no"]."'";
		}
		$filter .= " ".$date;
		$sql = "SELECT * FROM orders WHERE del<>'1' {$filter} ORDER BY create_date DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function get_c_rs(){
		$filter = "";
		$date="";
		if(@$this->get["start_date"]!=""&&@$this->get["end_date"]!="")
		{
			$date = "and `create_date` between '".$this->get["start_date"]."' and '".$this->get["end_date"]."'";
		}
		if($date=="")
		{
			if(@$this->get["start_date"]!="")
			{
				$date = "and `create_date` > '".$this->get["start_date"]."'";
			}
			if(@$this->get["end_date"]!="")
			{
				$date = "and `create_date` < '".$this->get["end_date"]."'";
			}
		}
		if(@$this->get["order_no"]!="")
		{
			$filter = "and order_no like '%".$this->get["order_no"]."%'";
		}
		if(@$this->get["order_type"]!="")
		{
			$filter .= " and state ='".$this->get["order_type"]."'";
		}
		if(@$this->get["pay_no"]!="")
		{
			$filter .= "and pay_type='".$this->get["pay_no"]."'";
		}
		$filter .= " ".$date;
		$sql = "SELECT * FROM classes_order WHERE del<>'1' {$filter} ORDER BY create_date DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function add_product($order_no = ""){
		$sql = "SELECT * FROM orders WHERE order_no = '{$order_no}'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$sql = "SELECT * FROM order_product WHERE order_id = '{$row["id"]}'";
		$query = $this->db->query($sql);
		$products = $query->result_array();
		foreach($products as $p){
			$sql = "UPDATE products SET `count` = `count`+{$p["qty"]} WHERE id = '{$p["product_id"]}'";
			$query = $this->db->query($sql);
		}
	}
	public function update_classes($order_no=""){
		$sql = "SELECT * FROM classes_order WHERE order_no = '{$order_no}'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$sql = "UPDATE classes_date SET `now_people` = `now_people`+1 WHERE date_id = '{$row["date_id"]}'";
		$query = $this->db->query($sql);
	}

	public function check_order($order_no=""){
		try {
			$obj = new AllInOne();
			$obj->ServiceURL  = EC_ServiceURL;
			$obj->HashKey     = EC_HashKey;
			$obj->HashIV      = EC_HashIV;
			$obj->MerchantID  = EC_MerchantID;
			$obj->Send['MerchantTradeNo'] = $order_no;
			$arQueryFeedback = $obj ->QueryTradeInfo();
			if (sizeof($arQueryFeedback) > 0) {
				if(!$arQueryFeedback["TradeStatus"]){
					$where = "order_no = '".$arQueryFeedback["MerchantTradeNo"]."'";
					$table= array(
						"PK"=>"id",
						"state"=>"付款失敗"
						);
					$this->global_model->sql_save("orders",$table,$where);	
				}
				print '1|OK';
			}else {
				print '0|Fail';
			}
		} 
		catch (Exception $e) {
			echo $e->getMessage();
		}

	}
}
?>