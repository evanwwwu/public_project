<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {
	var $admin_model = false;
	public function __construct(){
		parent::__construct();
	}
	public function get_rs($type="news")
	{
		$result = array();
		if($this->admin_model){
			$col = "*";
			$where = "";
		}
		else{
			$c = $this->main_model->get_col();
			$col = $c["title"]." as title,".$c["sub_title"]." as sub_title, ".$c["related"]." as related,cover_img, create_date,id";
			$where = "and publish = '1' and NOW() > create_date";
		}
		$sql = "SELECT {$col} FROM news where type_name='{$type}' {$where} ORDER BY create_date desc,id desc";
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
			$col = $c["name"]." as name,".$c["document"]." as document,".$c["education"]." as education, ".$c["awards"]." as awards,".$c["exhibition"]." as exhibition,".$c["press"]." as press, id";
			$where = "and publish = '1' and NOW() > create_date";
		}
		$sql = "select {$col} from news where id = '{$id}' {$where}";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
}
?>