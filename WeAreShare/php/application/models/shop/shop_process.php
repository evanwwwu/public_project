<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shop_process extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this -> load -> database();
        $this -> load -> library('pagination');
    }
    
	public function ProductList($page = 0){
		$this->db->select("	Product_Id,
							Product_Picture,
							Product_Name,
							Product_SubName,
							Product_EnName,
							Product_Price
					");
		$this->db->from("product");
		$this->db->where("(select sum(Specification_Inventory) from specification where Specification_ProductId = Product_Id) >","0");
		$this->db->where("Product_Status","1");
		
		$this->db->where("Product_Del","0");
		
		$this->db->order_by("Product_AddTime");
		
		$this->db->limit("12",$page);
		$query = $this->db->get();
		$data = $query->result();
		unset($query);
		return $data;
	}
	public function ProductDetial($Id){
		$this->db->select("	Product_Id,
							Product_TypeId,
							Product_Sequence,
							Product_Status,
							Product_Name,	
							Product_Summary,
							Product_Detial,
							Product_Picture,
							Product_Price");
		$this->db->from("product");
		$this->db->where("Product_Status","1");
		$this->db->where("Product_Id",$Id);
		$query = $this->db->get();
		$data = $query->row();
		unset($query);
		
		
		$this->db->select("Specification_Id,Specification_Name,Specification_Inventory");
		$this->db->from("specification");
		$this->db->where("Specification_ProductId",$data->Product_Id);
		$this->db->where("Specification_Status","1");
		$this->db->where("Specification_Del","0");
		$this->db->order_by("Specification_Sequence","DESC");
		$query = $this->db->get();
		$spec = $query->result();
		unset($query);
		$data->Product_Spec = $spec;
		
		return $data;
	}
}
?>