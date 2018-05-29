<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}

	public function get_designer($method="data"){
		$sql = "SELECT cover_img FROM designer ORDER BY sort ASC,id DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		switch($method){
			case "data":
			return $result;
			break;
			case "total":
			return count($result);
			break;
			default:
			return $result;
			break;
		}
	}

	public function get_product($method="data"){
		$sql = "SELECT cover_img FROM product_type ORDER BY sort ASC,id DESC";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		switch($method){
			case "data":
			return $result;
			break;
			case "total":
			return count($result);
			break;
			default:
			return $result;
			break;
		}
	}

	public function get_news(){
		$col = $this->main_model->get_columns();

		$sql = "SELECT {$col[title]} as title FROM news {$where} ORDER BY type,is_top desc,create_date asc,id desc limit 0,2";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

}
?>