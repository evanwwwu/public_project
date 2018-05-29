<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags_gallery_model extends CI_Model {
    public function __construct(){
        parent::__construct();
   //     $this->load->helper('url');
    }
	
	public function rs($tag_id=0){
		$result = array();
		$sql = "SELECT * FROM terms WHERE term_group='4' ORDER BY sort ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function rs_all($tag_id=0){
		$result = array();
		$sql = "SELECT * FROM terms WHERE term_group in(0,1) ORDER BY term_group,sort ASC,name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function rs_tag($tag_id=0){
		$result = array();
		$sql = "SELECT * FROM terms WHERE term_group= '1' ORDER BY term_group,sort ASC,name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}	


	public function sort(){
		$ids = $this->post['id'];
		$i = 1;
		foreach ($ids as $id){
			$sql = "UPDATE terms SET sort='{$i}' WHERE term_id='{$id}'";
			$this->db->query($sql);
			$i++;
		}
	}
	public function del(){
		$sql = "delete from terms where term_id='{$this->post['id']}'";
		$this->db->query($sql);
		$sql = "delete from term_relationships where term_taxonomy_id='{$this->post['id']}'";
		$this->db->query($sql);

	}
	public function save($id=0){
			$term = ($id==0)?$this->post['new_term']:$this->post['edit_term'];
			$search = ($id==0)?"":"and term_id <>".$id;
			$sql = "select * from terms where LOWER(name)='" .addslashes(strtolower($term))."' and term_group=4 {$search}";
			$query = $this->db->query($sql);
			if ($query->num_rows()>0){
				echo "";
			}
			else{
				if($id==0){
					$sql = "insert into terms values(NULL,'".addslashes($term)."','".addslashes(str_replace(' ', '-', $term))."',4,0)";
					$this->db->query($sql);
					echo "true";
				}
				else{
					$sql = "UPDATE terms SET `name` = '".addslashes($term)."', `slug`='".addslashes(str_replace(' ', '-', $term))."' WHERE term_id ='{$id}'";
					$this->db->query($sql);
					echo addslashes($this->post['edit_term']);	
				}	
			}
	}	

}	
