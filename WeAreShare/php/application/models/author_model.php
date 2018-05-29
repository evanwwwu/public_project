<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function get_author_by_group($str_author_type){
		$result = array();
		$sql = "select post_parent from posts,postmeta where posts.ID=postmeta.post_id 
		and postmeta.meta_key='author_type' 
		and postmeta.meta_value='{$str_author_type}' 
		and posts.post_type='author' 
		and posts.post_status='publish'";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			array_push($result,$row['post_parent']);
		}
		return $result;
	}
	
	public function rs($start=0,$pagesize=6,$str_author_type){
		$result = array();
		$author_id = $this->get_author_by_group($str_author_type);
		$author_id = (count($author_id)>0)?implode(',',$author_id):0;

		$sql = "select * from posts a,admin_user b where a.post_parent=b.id 
		and a.post_type='author'
		and b.id in({$author_id}) 
		and a.post_status='publish' order by b.sort,b.username,b.id";

		$query = $this->db->query($sql);
		$result['total_posts'] = $query->num_rows;
		$data = array();
		$sql .= " limit {$start},{$pagesize}";
		$query = $this->db->query($sql);

		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);

			$date = strtotime($row['post_date']);
			$row['display_date'] = date('F d, Y',$date);

			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,60,'UTF-8');
			$row['brief'] = $content . '...';

			$row['cover_img'] = $this->get_cover_img($row['ID']);
			array_push($data,$row);
		}

		$result['data'] = $data;
		return $result;
	}

	public function row($title){
		$title = urldecode($title);
		$title = addslashes($title);
		
		$sql = "select * from posts a,admin_user b where a.post_parent=b.id 
		and a.post_type='author'
		and b.display_name='{$title}' 
		and a.post_status='publish' order by b.sort,b.username,b.id";

		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$result = $query->row_array();
			$result['terms'] = $this->get_terms_name($result['ID']);
			$result['tags'] = $this->get_term_relationships_tags($result['ID']);
			$result['cover_img'] = $this->get_cover_img($result['ID']);
			$result['gallery'] = $this->get_gallery($result['ID']);

			$date = strtotime($result['post_date']);
			$result['display_date'] = date('F d, Y',$date);
			$result['author'] = $this->get_author($result['post_author']);
			$result['location'] = $this->get_location($result['ID']);
			$result['prev_title'] = $this->get_prev_post($result['post_date'],$result['ID']);
			$result['next_title'] = $this->get_next_post($result['post_date'],$result['ID']);
			$result['recommend'] = $this->get_recommend($result['ID']);
			$result['related_article'] = $this->get_related_article($result['ID']);
			$result['related_event'] = $this->get_related_event($result['ID']);
			$result['related_img'] = $this->get_related_img($result['ID']);
			$content = $result['post_content'];
			$content = mb_substr(strip_tags($content),0,150,'UTF-8');
			$result['brief'] = $content . '...';
			$this->load->model('posts_model');
			$result['article'] = $this->posts_model->rs($result['post_parent'],0,0,4);
			return $result;
		}
		else{
			show_404();
		}
	}
	
	public function rs_letter($chr='',$start=0,$pagesize=6){
		$result = array();
		$search_chr = $chr==''?"":" and b.meta_value='{$chr}'";
		$sql = "select a.* from posts a,postmeta b where a.ID=b.post_id and post_type='brand'{$search_chr} and b.meta_key='letter' and post_status='publish' order by post_title";
		$query = $this->db->query($sql);
		$result['total_posts'] = $query->num_rows;
		$data = array();
		$sql .= " limit {$start},{$pagesize}";
		$query = $this->db->query($sql);

		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);

			$date = strtotime($row['post_date']);
			$row['display_date'] = date('F d, Y',$date);

			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,150,'UTF-8');
			$row['brief'] = $content . '...';

			$row['cover_img'] = $this->get_cover_img($row['ID']);
			array_push($data,$row);
		}

		$result['data'] = $data;
		return $result;
	}

	public function tags($tag_id,$start=0,$pagesize=6){
		$sql = "select ID from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id='{$tag_id}' and post_type='brand' and post_date<='".date('Y-m-d H:i:s')."' and post_status='publish' order by post_date desc,ID desc";
		$query = $this->db->query($sql);
		$result['total_posts'] = $query->num_rows;
		$data = array();
		$sql = "select * from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id='{$tag_id}' and post_type='brand' and post_date<='".date('Y-m-d H:i:s')."' and post_status='publish' order by post_date desc,ID desc limit {$start},{$pagesize}";
		$query = $this->db->query($sql);
		
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);

			$date = strtotime($row['post_date']);
			$row['display_date'] = date('F d, Y',$date);

			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,210,'UTF-8');
			$row['brief'] = $content . '...';

			$row['cover_img'] = $this->get_cover_img($row['ID']);
			array_push($data,$row);
		}

		$result['data'] = $data;
		return $result;
	}	

	private function get_img_content($id){
		$sql = "select * from postmeta where post_id='{$id}' and meta_key='img-content'";
		$query = $this->db->query($sql);
		$content = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
			$content = $row['meta_value'];
		}
		return $content;
	}

	private function get_related_img($id){
		$tags = $this->get_term_relationships($id);
		$result = array();
		if (count($tags)>0){
			$search_str = implode(',',$tags);
			$sql = "select a.* from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id in({$search_str}) and a.ID<>{$id} and a.post_type like '%img%'";
			$query = $this->db->query($sql);
			if ($query->num_rows>0){
				foreach($query->result_array() as $row){
					$row['caption'] = $this->get_img_content($row['ID']);
					array_push($result,$row);
				}
			}
		}
		return $result;
	}

	private function get_related_article($id){
		$tags = $this->get_term_relationships($id);
		$result = array();
		if (count($tags)>0){
			$search_str = implode(',',$tags);
			$sql = "select a.* from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id in({$search_str}) and a.ID<>{$id} and a.post_type='post' and post_status='publish'";
			$query = $this->db->query($sql);
			if ($query->num_rows>0){
				foreach($query->result_array() as $row){
					$row['tags'] = $this->get_terms_name($row['ID']);

					$date = strtotime($row['post_date']);
					$row['display_date'] = date('F d, Y',$date);

					$row['author'] = $this->get_author($row['post_author']);

					$content = $row['post_content'];
					$content = mb_substr(strip_tags($content),0,125,'UTF-8');
					$row['brief'] = $content . '...';

					$row['cover_img'] = $this->get_cover_img($row['ID']);
					array_push($result,$row);
				}
			}
		}
		return $result;
	}

	private function get_related_event($id){
		$tags = $this->get_term_relationships($id);
		$result = array();
		if (count($tags)>0){
			$search_str = implode(',',$tags);
			$sql = "select a.* from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id in({$search_str}) and a.ID<>{$id} and a.post_type='event' and post_status='publish'";
			$query = $this->db->query($sql);
			if ($query->num_rows>0){
				foreach($query->result_array() as $row){
					$row['tags'] = $this->get_terms_name($row['ID']);

					$date = strtotime($row['post_date']);
					$row['display_date'] = date('F d, Y',$date);

					$row['author'] = $this->get_author($row['post_author']);

					$content = $row['post_content'];
					$content = mb_substr(strip_tags($content),0,125,'UTF-8');
					$row['brief'] = $content . '...';

					$row['cover_img'] = $this->get_cover_img($row['ID']);
					array_push($result,$row);
				}
			}
		}
		return $result;
	}

	public function get_brand_az_menu($char=''){
		$result = array();
		for($i=65;$i<=90;$i++){
			$sql = "SELECT COUNT(*) as records FROM posts a,postmeta b WHERE a.ID=b.post_id and b.meta_value='".chr($i)."' and post_type='brand' and post_status='publish'";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			array_push($result,array('chr'=>chr($i),'records'=>$row['records']));
		}
		return $result;
	}

	// public function get_recommend($id){
	// 	$result = array();
	// 	$custom_rec_id = array();
	// 	$sql = "SELECT meta_value FROM postmeta WHERE post_id = '{$id}}' AND meta_key='recommend'limit 0,12";
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row){
	// 		$sql = "SELECT * FROM post WHERE post_parent= '{$row['meta_value']}' "
	// 		array_push($custom_rec_id,$row['meta_value']);
	// 		//array_push($result,$row['ID']);
	// 	}
	
	// 	$random_count = 12 - count($custom_rec_id);
	// 	$str_custom_rec_id = $random_count==12?"":implode(',',$custom_rec_id);
	// 	$search_str = $str_custom_rec_id==""?"":" and object_id not in({$str_custom_rec_id})";
	// 	$random = array();
	// 	$sql = "select object_id from term_relationships where term_taxonomy_id in(select term_taxonomy_id from term_relationships where object_id='{$id}') and object_id<>'{$id}' {$search_str} order by rand() limit 0,{$random_count}";
	// 	$query = $this->db->query($sql);
	// 	foreach($query->result_array() as $row){
	// 		array_push($random,$row['object_id']);
	// 	}

	// 	$search_str = implode(',',$custom_rec_id);
	// 	$result = array();
	// 	if (strlen($search_str) > 0){
	// 		$sql = "select * from posts where ID in({$search_str}) and post_status='publish' and post_type='brand'";
	// 		$query = $this->db->query($sql);

	// 		foreach($query->result_array() as $row){
	// 			$date = strtotime($row['post_date']);
	// 			$row['display_date'] = date('F d, Y');
	// 			$row['cover_img'] = $this->get_cover_img($row['ID']);
	// 			array_push($result,$row);
	// 		}
	// 	}
	// 	$search_str = implode(',',$random);
	// 	if (strlen($search_str) > 0){
	// 		$sql = "select * from posts where ID in({$search_str}) and post_status='publish' and post_type='brand' order by rand()";
	// 		$query = $this->db->query($sql);

	// 		foreach($query->result_array() as $row){
	// 			$date = strtotime($row['post_date']);
	// 			$row['display_date'] = date('F d, Y');
	// 			$row['cover_img'] = $this->get_cover_img($row['ID']);
	// 			array_push($result,$row);
	// 		}
	// 	}
	// 	return $result;
	// }

	public function get_recommend($id){
		$result = array();
		$custom_rec_id = array();
		$sql = "SELECT meta_value FROM postmeta WHERE post_id = '{$id}' AND meta_key='recommend' limit 0,12";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			array_push($custom_rec_id,$row['meta_value']);
			//array_push($result,$row['ID']);
		}
		$random_count = 12 - count($custom_rec_id);
		$str_custom_rec_id = $random_count==12?"":implode(',',$custom_rec_id);
		$search_str = $str_custom_rec_id==""?"":" and object_id not in({$str_custom_rec_id})";
		$random = array();
		$sql = "select object_id from term_relationships where term_taxonomy_id in(select term_taxonomy_id from term_relationships where object_id='{$id}') and object_id<>'{$id}' {$search_str} order by rand() limit 0,{$random_count}";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			array_push($random,$row['object_id']);
		}
		$search_str = implode(',',$custom_rec_id);
		$result = array();
		if (strlen($search_str) > 0){

			$sql = "SELECT * FROM admin_user WHERE id IN({$search_str}) ";
			$query = $this->db->query($sql);	
			foreach($query->result_array() as $row){
				$sql = "select * from posts where post_parent = '{$row['id']}' and post_type = 'author' and post_status='publish'";
				$query = $this->db->query($sql);
				if($query->num_rows>0){
					$post_data = $query->row_array();
					$post_data['post_title']  = $row['display_name'];
					$date = strtotime($post_data['post_date']);
					$post_data['display_date'] = date('F d, Y',$date);
					$post_data['cover_img'] = $this->get_cover_img($post_data['ID']);
					array_push($result,$post_data);
				}
			}
		}
		$search_str = implode(',',$random);
		if (strlen($search_str) > 0){

			$sql = "SELECT post_parent FROM posts WHERE id IN ({$search_str}) ";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			$admin_id = array();
			foreach($query as $row){
				array_push($admin_id,$row['post_parent']);
			}
			$admin_id = implode(',',$admin_id);
			if (strlen($admin_id) > 0){
				$sql = "SELECT * FROM admin_user WHERE id IN({$admin_id}) ";
				$query = $this->db->query($sql);
				foreach($query->result_array() as $row){
					$sql = "select * from posts where post_parent = '{$row['id']}' and post_type = 'author' and post_status='publish'";
					$query = $this->db->query($sql);
					if($query->num_rows>0){
						$post_data = $query->row_array();
						$post_data['post_title']  = $row['display_name'];
						$date = strtotime($post_data['post_date']);
						$post_data['display_date'] = date('F d, Y',$date);
						$post_data['cover_img'] = $this->get_cover_img($post_data['ID']);
						array_push($result,$post_data);
					}
				}
			}
		}
		return $result;
	}
	private function get_prev_post($date,$id){
		if ($_SESSION['tag_from'] == ''){
			$sql = "select post_title from posts where post_status='publish' and post_type='people' and post_date>'{$date}' and ID<>{$id} order by post_date limit 0,1";
			$query = $this->db->query($sql);
			if ($query->num_rows==0){
				$sql = "select post_title from posts where post_status='publish' and post_type='people' and post_date='{$date}' and ID<>{$id} order by post_date limit 0,1";
				$query = $this->db->query($sql);
				if ($query->num_rows>0){
					$sql = "select post_title from posts where post_status='publish' and post_type='people' and ID>{$id} order by ID limit 0,1";
				}
			}
		}
		else{
			$sql = "select post_title from posts a,term_relationships b 
			where a.ID=b.object_id 
			and b.term_taxonomy_id='{$_SESSION['tag_from']}' 
			and post_status='publish' 
			and post_type='people' 
			and post_date>'{$date}' 
			order by post_date limit 0,1";
		}
		$sql;
		$query = $this->db->query($sql);
		$prev_title = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
			$prev_title = $row['post_title'];
		}
		return $prev_title;
	}

	private function get_next_post($date,$id){
		if ($_SESSION['tag_from'] == ''){
			$sql = "select post_title from posts where post_status='publish' and post_type='people' and post_date<'{$date}' and ID<>{$id} order by post_date desc limit 0,1";
			$query = $this->db->query($sql);
			if ($query->num_rows==0){
				$sql = "select post_title from posts where post_status='publish' and post_type='people' and post_date='{$date}' and ID<>{$id} order by post_date desc limit 0,1";
				$query = $this->db->query($sql);
				if ($query->num_rows>0){
					$sql = "select post_title from posts where post_status='publish' and post_type='people' and ID<{$id} order by ID desc limit 0,1";
				}
			}
		}
		else{
			$sql = "select post_title from posts a,term_relationships b 
			where a.ID=b.object_id 
			and b.term_taxonomy_id='{$_SESSION['tag_from']}' 
			and post_status='publish' 
			and post_type='people' 
			and post_date<'{$date}' 
			order by post_date desc limit 0,1";
		}
		
		$query = $this->db->query($sql);
		$next_title = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
			$next_title = $row['post_title'];
		}
		return $next_title;
	}
	private function get_author($id){
		$display_name = '';
		$sql = "select display_name from admin_user where id='{$id}'";
		$query = $this->db->query($sql);
		if ($query->num_rows>0){
			$row = $query->row_array();
			$display_name = $row['display_name'];
		}
		return $display_name;
	}
	private function get_term_relationships($id){
		$sql = "select a.term_taxonomy_id from term_relationships a,terms b where a.term_taxonomy_id=b.term_id and b.term_group=1 and object_id='{$id}' order by term_order asc";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['term_taxonomy_id']);
		}
		return $result;
	}
	
	private function get_term_relationships_tags($id){
		$sql = "select b.name,b.slug from term_relationships a,terms b where a.term_taxonomy_id=b.term_id and b.term_group=1 and object_id='{$id}' order by term_order asc";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row);
		}
		return $result;
	}

	public function get_terms(){
		$sql = "select * from terms where term_group=0 order by sort";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_term_id($name=''){
		$name = addslashes($name);
		$sql = "select term_id from terms where slug='" . urldecode($name) . "'";
		$query = $this->db->query($sql);
		$term_id = 0;
		if ($query->num_rows>0){
			$row = $query->row_array();
			$term_id = $row['term_id'];
		}
		return $term_id;
	}

	public function get_terms_name($id){
		$sql = "select a.name from terms a,term_relationships b where a.term_id=b.term_taxonomy_id and b.object_id='{$id}' and a.term_group in(0,1) order by a.term_id";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(',',$result);
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

	public function get_tags(){
		$terms = $_GET['term'];
		$search = " and name like '%{$terms}%'";
		$sql = "select term_id as id,name as label,name as value from terms where term_group=1 ".$search." order by name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	private function get_cover_img($id){
		$sql = "select post_title from posts where post_parent='{$id}' and post_type='cover-img' order by post_date desc";
		$query = $this->db->query($sql);
		$result = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
			$result = $row['post_title'];
		}
		return $result;
	}

	private function get_gallery($id){
		$sql = "select post_title from posts where post_parent='{$id}' and post_type='gallery-img' order by menu_order,ID desc";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['post_title']);
		}
		return $result;

	}
	public function get_post($title=''){
		$sql = "select id from admin_user where display_name = '".urldecode($title)."'";
		$query = $this->db->query($sql);
		$id = $query->row_array();
		$id = $id['id'];
		$sql = "select ID from posts where post_parent = {$id} and post_type = 'author'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['ID'];

	}
}
?>