<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}
	public function get_rs($type=0)
	{
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$c = $this->main_model->get_col();
			$col = $c["title"]." as title,cover_img, sort,id";
			$where = "where publish = '1' and type_id = '".$type."'";
		}
		$sql = "SELECT {$col} FROM project {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
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
			$col = $c["title"]." as title, ".$c["content"]." as content, ".$c["formats"]." as formats, gallery_img,sort,id";
			$where = "and publish = '1'";
		}
		$sql = "select {$col} from project where id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_type()
	{
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$c = $this->main_model->get_col();
			$col = $c["title"]." as title, sort,id";
			$where = "where publish = '1'";
		}
		$sql = "SELECT {$col} FROM project_type {$where} ORDER BY sort asc,id desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return @$result;
	}
}
?>