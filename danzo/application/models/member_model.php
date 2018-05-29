<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {
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
		}
		else{
			$for_website = true;
			$c = $this->main_model->get_col();
			$col = $c["name"]." as name, office,cover_img,id";
			$where = "where publish = '1'";
		}
		if($for_website){

			$sql = "SELECT {$col} FROM members {$where} and office = '1' ORDER BY office asc,sort asc,id desc";
			$query = $this->db->query($sql);
			$result["product"] = $query->result_array();

			$sql = "SELECT {$col} FROM members {$where} and office = '2' ORDER BY office asc,sort asc,id desc";
			$query = $this->db->query($sql);
			$result["graphic"]= $query->result_array();			

			$sql = "SELECT {$col} FROM members {$where} and office = '3' ORDER BY office asc,sort asc,id desc";
			$query = $this->db->query($sql);
			$result["sales"]= $query->result_array();
		}
		else{
			$sql = "SELECT {$col} FROM members {$where} ORDER BY office asc,sort asc,id desc";
			$query = $this->db->query($sql);
			$result = $query->result_array();
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
			$c = $this->main_model->get_col();
			$col = $c["name"]." as name, office, cover_img, ".$c["document"]." as document, ".$c["education"]." as education,".$c["awards"]." as awards,".$c["exhibition"]." as exhibition,".$c["press"]." as press,email, id";
			$where = "and publish = '1'";
		}
		$sql = "select {$col} from members where id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
}
?>