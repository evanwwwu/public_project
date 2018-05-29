<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function save(){
    	$id = $this->post["post_id"];
    	$ar_tags = $this->post["tags"];
    	$content = $this->post["content"];
    	for($i=0;$i<count($id);$i++){

				$tags = explode(',',$ar_tags[$i]);
				$sql = "delete from term_relationships where object_id='{$id[$i]}'";
				$this->db->query($sql);

				foreach($tags as $tag){
					$tag = trim($tag);
					if ($tag != ''){
						$sql = "select term_id from terms where LOWER(name)='" .addslashes(strtolower($tag))."' and term_group=1";
						$query = $this->db->query($sql);
						if ($query->num_rows()>0){
							$row = $query->row_array();
							$term_id = $row['term_id'];
						}
						else{
							$sql = "insert into terms values(NULL,'".addslashes($tag)."','".addslashes(str_replace(' ', '-', $tag))."',1,0)";
							$this->db->query($sql);
							$term_id = $this->db->insert_id();
						}

						$sql = "select * from term_relationships where object_id='{$id[$i]}' and term_taxonomy_id='{$term_id}'";
						$query = $this->db->query($sql);
						if ($query->num_rows()==0){
							$sql = "insert into term_relationships values('{$id[$i]}','{$term_id}',0)";
							$this->db->query($sql);
						}
					}
				}
				if (trim($content[$i])!=''){
					$sql = "select * from postmeta where post_id='{$id[$i]}' and meta_key='img-content'";
					$query = $this->db->query($sql);
					if ($query->num_rows()>0){
						$sql = "update postmeta set meta_value='".addslashes($content[$i])."' where post_id='{$id[$i]}' and meta_key='img-content'";
					}
					else{
						$sql = "insert into postmeta values(NULL,'{$id[$i]}','img-content','".addslashes($content[$i])."')";

					}
					$this->db->query($sql);
				}
				else{
					$sql = "select * from postmeta where post_id='{$id[$i]}' and meta_key='img-content'";
					$query = $this->db->query($sql);
					if ($query->num_rows()>0){
						$sql = "delete from postmeta where post_id='{$id[$i]}' and meta_key='img-content'";
						$this->db->query($sql);
					}
				}	
		}
		echo "location=location;";
    }
}
?>