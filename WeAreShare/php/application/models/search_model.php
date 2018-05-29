<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


	public function rs($type){
			$key = $_GET['key'];
			$key = addslashes($key);
			$result = array();
			if($type=='post'){
   		   	$sql ="SELECT a.*
					FROM posts a
					WHERE post_type='post' 
					AND post_status='publish'
					AND ID NOT IN (SELECT A.object_id FROM term_relationships A LEFT JOIN terms B ON A.term_taxonomy_id = B.term_id WHERE slug = '派對')
					AND (a.post_title LIKE '%{$key}%' OR a.post_author IN (SELECT id FROM admin_user WHERE display_name LIKE '%{$key}%' ) OR ID IN (SELECT object_id FROM term_relationships WHERE term_taxonomy_id IN (SELECT term_id FROM terms WHERE name LIKE '%{$key}%' AND term_group='2' )) OR a.post_content LIKE '%{$key}%' OR ID IN (SELECT term_relationships.object_id 
						FROM term_relationships,terms 
						WHERE term_relationships.term_taxonomy_id=terms.term_id and terms.name LIKE '%{$key}%'))";
			}
			if($type=='event'){
   		   	$sql ="SELECT a.*
					FROM (SELECT * FROM posts WHERE ID IN (SELECT A.object_id FROM term_relationships A LEFT JOIN terms B ON A.term_taxonomy_id = B.term_id WHERE slug = '派對')) a 
					WHERE (post_type='post' or post_type = 'calendar') 
					AND post_status='publish'
					AND (a.post_title LIKE '%{$key}%' OR a.post_author IN (SELECT id FROM admin_user WHERE display_name LIKE '%{$key}%' ) OR ID IN (SELECT object_id FROM term_relationships WHERE term_taxonomy_id IN (SELECT term_id FROM terms WHERE name LIKE '%{$key}%' AND term_group='2' )) OR a.post_content LIKE '%{$key}%' OR ID IN (SELECT term_relationships.object_id 
						FROM term_relationships,terms 
						WHERE term_relationships.term_taxonomy_id=terms.term_id and terms.name LIKE '%{$key}%'))";
			}
			if($type=='video'){
   		   	$sql ="SELECT a.*
					FROM posts a
					WHERE post_type='video' 
					AND post_status='publish'
					AND (a.post_title LIKE '%{$key}%' OR a.post_author IN (SELECT id FROM admin_user WHERE display_name LIKE '%{$key}%' ) OR ID IN (SELECT object_id FROM term_relationships WHERE term_taxonomy_id IN (SELECT term_id FROM terms WHERE name LIKE '%{$key}%' AND term_group='2' )) OR a.post_content LIKE '%{$key}%' OR ID IN (SELECT term_relationships.object_id 
						FROM term_relationships,terms 
						WHERE term_relationships.term_taxonomy_id=terms.term_id and terms.name LIKE '%{$key}%'))";
			}
		
			// echo $sql;exit;
    	   $query = $this->db->query($sql); 
    	   $result['search_total'] = $query->num_rows;
    	   $data = array();

			foreach($query->result_array() as $row){
				$row['tags'] = $this->get_terms_name($row['ID']);
				$row["type"] = $this->get_menu_type($row["ID"]);
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);
				$row['author'] = $this->get_author($row['post_author']);
				if($type != "video"){
					$content = $row['post_content'];
					$content = mb_substr(strip_tags($content),0,100,'UTF-8');
					$row['brief'] = $content . '...';
				}
				else{
					$row["brief"] = $row["post_excerpt"];
				}
				$row['display_title'] = $row['post_title'];

				// if (mb_strlen($row['display_title'])>24){
				// 	$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,24,'UTF-8') . "...";
				// }

				$row['cover_img'] = $this->get_cover_img($row['ID']);
				array_push($data,$row);
		}
		$result['data'] = $data;

		return $result;
    }

	public function get_menu_type($id){
		$sql = "SELECT a.en_name as name,a.slug FROM terms a,term_relationships b WHERE a.term_id=b.term_taxonomy_id AND b.object_id='{$id}' AND a.term_group=0 ORDER BY a.term_id;";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

    public function search_img(){
    	$key = $_GET['key'];
		$key = addslashes($key);
		$img_id = array();

		$sql = "SELECT id 
				FROM 
				(SELECT term_relationships.object_id AS id,GROUP_CONCAT(terms.name) AS tags 
				FROM term_relationships,terms 
				WHERE term_relationships.term_taxonomy_id=terms.term_id
				GROUP BY term_relationships.object_id) a WHERE a.tags LIKE '%{$key}%'";
		$query = $this->db->query($sql);
		$id_push = $query->result_array();
		foreach($id_push as $row){
			array_push($img_id,$row['id']);
		}
		$sql = "SELECT post_id AS id FROM postmeta WHERE meta_key='img-content' AND meta_value LIKE '%{$key}%' GROUP BY post_id";
		$query = $this->db->query($sql);
	
		$id_push = $query->result_array();
		foreach($id_push as $row){
			array_push($img_id,$row['id']);
		}
		$id_string = implode (",", $img_id);
		$id_string = ($id_string=="")?"0":$id_string;
		$sql ="SELECT post_title,(SELECT meta_value FROM postmeta WHERE post_id=ID) as meta_value FROM posts WHERE ID IN ({$id_string}) AND post_type LIKE '%-img'";
		$query = $this->db->query($sql);
		$result['data'] = $query->result_array();		
    foreach($result['data'] as $row){
			// $this->global_model->check_img_exist($row['post_title']);
		}
		$result['search_total'] = $query->num_rows;
		return 	$result;
	}

	public function search_video(){

	}
	public function get_terms_name($id){
		$sql = "select a.name from terms a,term_relationships b where a.term_id=b.term_taxonomy_id and b.object_id='{$id}' and a.term_group=0 order by a.sort";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(',',$result);
	}
	private function get_author($id){
		$row = array();
		$sql = "SELECT a.display_name,b.* FROM admin_user a LEFT JOIN posts b ON a.id = b.post_parent AND b.post_type = 'author' WHERE a.id='{$id}'";
		$query = $this->db->query($sql);
		if ($query->num_rows>0){
			$row = $query->row_array();
			$sql = "SELECT post_title FROM posts WHERE post_parent='{$row["ID"]}' AND post_type='cover-img' ORDER BY post_date DESC";
			$query = $this->db->query($sql);
			$cover = $query->row_array();
			$row["cover_img"] = @$cover["post_title"];
		}
		return $row;
	}

	public function get_location($id){
		$sql = "select a.name from terms a,term_relationships b where a.term_id=b.term_taxonomy_id and b.object_id='{$id}' and a.term_group=2 order by a.term_id";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(',',$result);
	}

	private function get_cover_img($id){
		$sql = "select post_title from posts where post_parent='{$id}' and post_type='cover-img' order by post_date desc";
		$query = $this->db->query($sql);
		$result = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
      // $this->global_model->check_img_exist($row['post_title']);
			$result = $row['post_title'];
		}
		return $result;
	}   
}
?>