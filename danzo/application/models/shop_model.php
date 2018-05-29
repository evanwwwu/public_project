<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}
	public function get_rs()
	{
		$for_website = false;
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
			$col2 = "*";
			$where2 = "";
		}
		else{
			$for_website = true; 
			$c = $this->main_model->get_col();
			$col = $c["title"]." as title, link, ".$c["address"]." as address, phone,link";
			$where = "and publish = '1'";
			$col2 = $c["name"]." as name, id";
			$where2 = "";
		}
		$sql = "SELECT {$col2} FROM shop_country {$where2} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$country = $query->result_array();
		$taiwan = array("id"=>0,"name_tw"=>"臺灣","name_en"=>"Taiwan");
		array_unshift($country,$taiwan);
		foreach($country as $key => $cou){
			if($for_website)
			{
				$sql = "SELECT {$col} FROM shop where country_id = '".@$cou['id']."' and type_id = '0' {$where} ORDER BY type_id asc, sort asc,id desc";
				$query = $this->db->query($sql);
				$online = $query->result_array();
				$sql = "SELECT {$col} FROM shop where country_id = '".@$cou['id']."' and type_id = '1' {$where} ORDER BY type_id asc, sort asc,id desc";
				$query = $this->db->query($sql);
				$local = $query->result_array();
				$cou["stores"]["online"] = $online;
				$cou["stores"]["local"] = $local;
			}
			else{
				$sql = "SELECT {$col} FROM shop where country_id = '".@$cou['id']."' {$where} ORDER BY type_id asc, sort asc,id desc";
				$query = $this->db->query($sql);
				$store = $query->result_array();
				$cou["stores"] = $store;
			}
			array_push($result,$cou);
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
			$col = "*";
			$where = "and publish = '1'";
		}
		$sql = "select {$col} from shop where id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_country()
	{
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$col = "*";
			$where = "where publish = '1'";
		}
		$sql = "SELECT {$col} FROM shop_country {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
}
?>