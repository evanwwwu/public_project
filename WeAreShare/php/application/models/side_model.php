<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Side_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
    }
	public function side_rs(){
		$sql = "SELECT * FROM  `sidebar`  ORDER BY sort ASC, id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function side_publish(){
		$sql = "update sidebar SET `publish` =  '{$this->post['publish']}' 
				WHERE  id = '{$this->post['id']}';";
		$this->db->query($sql);
	}
	public function side_sort(){
		$ids = $this->post['id'];
		$i = 1;
		foreach ($ids as $id){
			$sql = "update sidebar set sort='{$i}' where id='{$id}'";
			$this->db->query($sql);
			$i++;
		}

	}
}
?>    