<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		// $this->mssb = $this->load->database("mssql",true);
	}

	public function init(){
		$result = array();
		$this->load->model("ingredients_model");
		$this->load->model("articles_model");
		$this->load->model("recipes_model");
		$result["ingredients_sub"] = $this->ingredients_model->get_type_rs();
		$result["articles_sub"] = $this->articles_model->get_type_rs();
		$result["recipe_sub"] =$this->recipes_model->get_type_rs();;
		return $result;
	}
		
	public function send_email($username="",$title="",$msg="")
	{
		$config['smtp_host'] = "";
		$config['smtp_port'] = '25';
		$config['charset'] = 'utf-8';
		$config['smtp_user'] = '';
		$config['smtp_pass'] = '';
		$config['newline'] = "\r\n";
		$config['mailtype'] = "html";
		$this->load->library('email',$config);
		$this->email->from('nakedmarket.tw@gmail.com', 'Naked Market');
		$this->email->to($username);
		$this->email->subject($title);
		$this->email->message($msg);
		if($this->email->send())
		{
			return array("status"=>true);
		}
		else
		{
			return array("status"=>false,"error"=>$this->email->print_debugger());
		}
	}

	public function update_product($pid=""){
		// $qty = 0;
		// //V_WD4INV1A_1002673 :分庫檔 , V_WD4INVNA_1002673 :庫存檔
		// //分庫檔 -> INV1002:庫存代號 (網路代號:net),INV1003:產品代號,INV1015:庫存量
		// //庫存檔 -> INVN002:產品代號,INVN045:庫存量
		// $sql = "select INV1015 as qty from V_WD4INV1A_1002673 where INV1003 = '{$pid}' and INV1002 = 'net'";
		// $query = $this->mssb ->query($sql);
		// if($query->num_rows()>0){
		// 	$row = $query->row_array();
		// 	$qty = $row["qty"];
		// 	$sql = "UPDATE products SET `count` = '{$qty}' WHERE product_no = '{$pid}' ";
		// 	$query = $this->db->query($sql);
		// }
		return $qty;
	}

}
?>