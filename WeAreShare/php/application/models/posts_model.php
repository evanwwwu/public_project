<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function rs_topic($author_id=0,$tag_id=0,$start=0,$pagesize=6){
		$result = array();
		$sql = "select term_id from terms where name in('食','衣','住','行')";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$rs = $query->result_array();
			$tag_id_group = array();
			foreach($rs as $row){
				array_push($tag_id_group,$row['term_id']);
			}
			$tag_id_group = implode(',', $tag_id_group);
		}
		else{
			$tag_id_group = '0';
		}
		$sql = "select ID from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id in({$tag_id_group}) and post_type='post' and post_status='publish' and post_date<='".date('Y-m-d H:i:s')."' order by post_date desc";
		$query = $this->db->query($sql);
		$result['total_posts'] = $query->num_rows;
		$data = array();
		$sql = "select * from posts a,term_relationships b where a.ID=b.object_id and b.term_taxonomy_id in({$tag_id_group}) and post_type='post' and post_status='publish' and post_date<='".date('Y-m-d H:i:s')."' order by post_date desc limit {$start},{$pagesize}";
		$query = $this->db->query($sql);

		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);

			$date = strtotime($row['post_date']);
			$row['display_date'] = date('Y.m.d',$date);

			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,100,'UTF-8');
			$row['brief'] = $content . '...';
			$row['display_title'] = $row['post_title'];
			if (mb_strlen($row['display_title'])>30){
				$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,30,'UTF-8') . "...";
			}

			$row['cover_img'] = $this->get_cover_img($row['ID']);
			array_push($data,$row);
		}

		$result['data'] = $data;
		return $result;
	}

	public function rs_column($start=0,$pagesize=6){
		$author_id = $this->get_author_by_group('作者群');
		$author_id = (count($author_id)>0)?implode(',',$author_id):0;
		$result = array();

		$sql = "select ID from posts  where post_author in ({$author_id}) and post_type='post' and post_date<='".date('Y-m-d H:i:s')."' and post_status='publish' order by post_date desc,ID desc";
		$query = $this->db->query($sql);
		$result['total_posts'] = $query->num_rows;
		$data = array();
		$sql = "select * from posts  where post_author in ({$author_id}) and post_type='post' and post_date<='".date('Y-m-d H:i:s')."' and post_status='publish' order by post_date desc,ID desc limit {$start},{$pagesize}";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);

			$date = strtotime($row['post_date']);
			$row['display_date'] = date('F d, Y',$date);

			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,100,'UTF-8');
			$row['brief'] = $content . '...';
			$row['display_title'] = $row['post_title'];
			if (mb_strlen($row['display_title'])>30){
				$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,30,'UTF-8') . "...";
			}

			$row['cover_img'] = $this->get_cover_img($row['ID']);
			array_push($data,$row);
		}

		$result['data'] = $data;
		return $result;
	}
	
	public function get_slider_banner(){		
		$row= array();
	 	$sql = "SELECT B.* FROM banner A LEFT JOIN posts B ON A.description = B.ID WHERE A.type = '999' AND B.post_status='publish' LIMIT 0,1";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
		$row = $query->row_array();
			$row['tags'] = $this->get_terms_name($row['ID']);
			$row["type"] = $this->get_menu_type($row["ID"]);
			$date = strtotime($row['post_date']);
			$row['display_date'] = date('Y.m.d',$date);
			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,100,'UTF-8');
			$row['brief'] = $content . '...';
			$row['display_title'] = $row['post_title'];

			if (mb_strlen($row['display_title'])>24){
				$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,24,'UTF-8') . "...";
			}

			$row['cover_img'] = $this->get_cover_img($row['ID']);
			}
		return $row;
	}
	public function rs($author_id=0,$tag_id=0,$start=0,$pagesize=6,$except="0"){
		$result = array();
		if ($author_id==0){
			if ($tag_id==0){
				$sql = "SELECT ID FROM posts WHERE post_type='post' AND post_status='publish' AND ID NOT IN ({$except}) AND post_date<='".date('Y-m-d H:i:s')."' ORDER BY post_date DESC";
				$query = $this->db->query($sql);
				$result['total_posts'] = $query->num_rows;
				$data = array();
				$sql = "SELECT * FROM posts WHERE post_type='post' AND post_status='publish' AND ID NOT IN ({$except}) AND post_date<='".date('Y-m-d H:i:s')."' ORDER BY post_date DESC LIMIT {$start},{$pagesize}";
				$query = $this->db->query($sql);
			}
			else{
				$sql = "SELECT ID FROM posts a,term_relationships b WHERE a.ID=b.object_id AND a.ID NOT IN ({$except})  AND b.term_taxonomy_id='{$tag_id}' AND post_type='post' AND post_status='publish' AND post_date<='".date('Y-m-d H:i:s')."' ORDER BY post_date DESC";
				$query = $this->db->query($sql);
				$result['total_posts'] = $query->num_rows;
				$data = array();
				$sql = "SELECT * FROM posts a,term_relationships b WHERE a.ID=b.object_id AND a.ID NOT IN ({$except})  AND b.term_taxonomy_id='{$tag_id}' AND post_type='post' AND post_status='publish' AND post_date<='".date('Y-m-d H:i:s')."' ORDER BY post_date DESC LIMIT {$start},{$pagesize}";
				$query = $this->db->query($sql);
			}
		}
		else{
			$limit = "LIMIT ".$start.",".$pagesize;
			if($pagesize == 0){
				$limit = "";
			}
			$sql = "SELECT ID FROM posts  WHERE post_author= {$author_id} AND ID NOT IN ({$except}) AND post_type='post' AND post_date<='".date('Y-m-d H:i:s')."' AND post_status='publish' ORDER BY post_date DESC,ID DESC";
			$query = $this->db->query($sql);
			$result['total_posts'] = $query->num_rows;
			$data = array();
			$sql = "SELECT * FROM posts  WHERE post_author= {$author_id} AND ID NOT IN ({$except}) AND post_type='post' AND post_date<='".date('Y-m-d H:i:s')."' AND post_status='publish' ORDER BY post_date DESC,ID DESC {$limit}";
			$query = $this->db->query($sql);
		}
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);
			$row["type"] = $this->get_menu_type($row["ID"]);
			$date = strtotime($row['post_date']);
			$row['display_date'] = date('Y.m.d',$date);
			$row['author'] = $this->get_author($row['post_author']);

			$content = $row['post_content'];
			$content = mb_substr(strip_tags($content),0,100,'UTF-8');
			$row['brief'] = $content . '...';
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

	public function most_popular(){
			$result = array();
			$ids = array();
			$sql = "SELECT * FROM posts WHERE post_type = 'post' AND hot_flag <> 0 AND post_status='publish' ORDER BY hot_flag ASC LIMIT 0,5";
			$query = $this->db->query($sql);
			$flag_count = $query->num_rows();
			$result = $query->result_array();
			$sql = "SELECT B.* FROM posts_view A LEFT JOIN posts B ON A.post_id = B.id WHERE A.view_time>DATE_SUB(CURDATE(), INTERVAL 1 WEEK) and B.post_type='post' GROUP BY A.post_id ORDER BY  COUNT(A.post_id) DESC LIMIT 0,".(5 - $flag_count);
			$query = $this->db->query($sql);
			$views = $query->result_array();
			$result = array_merge($result,$views);
			$data = array();
			foreach ($result as $row){
				$row['tags'] = $this->get_terms_name($row['ID']);
				$row['type'] = $this->get_menu_type($row['ID']);
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);

				$row['author'] = $this->get_author($row['post_author']);

				$content = $row['post_content'];
				$content = mb_substr(strip_tags($content),0,100,'UTF-8');
				$row['brief'] = $content . '...';
				$row['display_title'] = $row['post_title'];

				// if (mb_strlen($row['display_title'])>24){
				// 	$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,24,'UTF-8') . "...";
				// }

				$row['cover_img'] = $this->get_cover_img($row['ID']);
				array_push($data,$row);
			}
			return $data;
	}
	public function most_popular_video(){
			$result = array();
			$ids = array();
			$sql = "SELECT * FROM posts WHERE post_type='video' AND post_status='publish' AND post_date<=NOW() ORDER BY post_date DESC LIMIT 0,4";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			$data = array();
			foreach ($result as $row){
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);
				$row['cover_img'] = $this->get_cover_img($row['ID']);
				array_push($data,$row);
			}
			return $data;
	}

	public function row($title){
		$title = urldecode($title);
		$title = addslashes($title);
		$get = $this->input->get();
		if (isset($get['preview']) and $get['preview']=1){
			$search_status = '';
		}
		else{
			$search_status = "AND post_status='publish'";
		}
		$sql = "SELECT * FROM posts WHERE post_name='{$title}' {$search_status} AND post_type='post'";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$result = $query->row_array();
			$result['terms'] = $this->get_terms_name($result['ID']);
			$result['tags'] = $this->get_term_relationships_tags($result['ID']);
			
			$result["type"] = $this->get_menu_type($result["ID"]);
			$result['cover_img'] = $this->get_cover_img($result['ID']);
			$result['gallery'] = $this->get_gallery($result['ID']);

			$date = strtotime($result['post_date']);
			$result['display_date'] = date('Y.m.d',$date);
			$result['author'] = $this->get_author($result['post_author']);

			$result['prev_title'] = $this->get_prev_post($result['post_date']);
			$result['next_title'] = $this->get_next_post($result['post_date']);
			// $result['recommend'] = $this->get_recommend($result['ID']);
			$result['cover_img'] = $this->get_cover_img($result['ID']);
			$content = $result['post_content'];
			$content = mb_substr(strip_tags($content),0,100,'UTF-8');
			$result['brief'] = $content . '...';
			$arr1 = array("/<!--slideshow-->/i","/<!--\/slideshow-->/i");
			$arr2 = array('<div class="fotorama" data-nav="thumbs" data-allow-full-screen="true" data-width="100%" data-maxwidth="600" data-height="500" data-fit="contain">','</div>');
			$result['post_content'] = preg_replace($arr1,$arr2,$result['post_content']);
			return $result;
		}
		else{
			show_404();
		}
	}

	public function get_video_rs(){
		$result = array();
		$sql = "SELECT * FROM posts WHERE post_status='publish' AND post_type='video' ORDER BY menu_order ASC";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);
				$row['cover_img'] = $this->get_cover_img($row['ID']);
				$row["title"] = $row["post_title"];
				$row["content"] = $row["post_excerpt"];
				$row["ID"] = $row["ID"];
				array_push($result,$row);
			}			
		}
		return $result;
	}
	public function get_video($id=0){
		$result = array();
		$get = $this->input->get();
		if (isset($get['preview']) and $get['preview']=1){
			$search_status = '';
		}
		else{
			$search_status = "AND post_status='publish'";
		}
		$sql = "SELECT * FROM posts WHERE ID='{$id}' {$search_status} AND post_type='video'";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$result = $query->row_array();
			$date = strtotime($result['post_date']);
			$result['display_date'] = date('Y.m.d',$date);
			$result['cover_img'] = $this->get_cover_img($result['ID']);
		}
		return $result;
	}

	public function get_all_tag(){
		$result = array();
		$sql = "select * from terms where term_group=1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_recommend($id,$count=9,$type="post"){
		$result = array();
		$custom_rec_id = array();
		$sql = "SELECT ID FROM posts a,postmeta b WHERE a.ID=b.meta_value AND b.post_id='{$id}' AND b.meta_key='recommend' AND a.post_type='{$type}' LIMIT 0,{$count}";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			array_push($custom_rec_id,$row['ID']);
			//array_push($result,$row['ID']);
		}

		//custom_rec_id已在推薦名單內ID
		$random_count = $count - count($custom_rec_id);
		$str_custom_rec_id = $random_count==$count?"":implode(',',$custom_rec_id);
		$search_str = $str_custom_rec_id==""?"":" and object_id not in({$str_custom_rec_id})";

		$random = array();

		$sql = "SELECT object_id FROM term_relationships WHERE term_taxonomy_id IN(SELECT term_taxonomy_id FROM term_relationships WHERE object_id='{$id}') AND object_id<>'{$id}' {$search_str} ORDER BY RAND() LIMIT 0,{$random_count}";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			array_push($random,$row['object_id']);
		}
		//random 同類別的隨機ID	
		$search_str = implode(',',$custom_rec_id);
		$result = array();
		if (strlen($search_str) > 0){
			$sql = "SELECT * FROM posts WHERE ID IN({$search_str}) AND post_status='publish' AND post_type='{$type}'";
			$query = $this->db->query($sql);

			foreach($query->result_array() as $row){
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);
				$row['cover_img'] = $this->get_cover_img($row['ID']);
				$row['author'] = $this->get_author($row['post_author']);
				array_push($result,$row);
			}
		}
		
		$search_str = implode(',',$random);
		if (strlen($search_str) > 0){
			$sql = "SELECT * FROM posts WHERE ID IN({$search_str}) AND post_status='publish' AND post_type='{$type}' ORDER BY RAND()";
			$query = $this->db->query($sql);

			foreach($query->result_array() as $row){
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);
				$row['cover_img'] = $this->get_cover_img($row['ID']);
				$row['author'] = $this->get_author($row['post_author']);
				array_push($result,$row);
			}
		}
		if($type=="video"){
			$all_id = array_merge($random,$custom_rec_id);
			$all_count = $count - count($result);
			$all_set = $all_count==0?"":implode(',',$all_id);
			$sql = "SELECT * FROM posts WHERE ID not IN({$all_set}) AND ID <> '{$id}' AND post_status='publish' AND post_type='{$type}' ORDER BY RAND() limit 0,{$all_count}";
			$query = $this->db->query($sql);
			foreach($query->result_array() as $row){
				$date = strtotime($row['post_date']);
				$row['display_date'] = date('Y.m.d',$date);
				$row['cover_img'] = $this->get_cover_img($row['ID']);
				$row['author'] = $this->get_author($row['post_author']);
				array_push($result,$row);
			}
		}
		return $result;
	}

	private function get_prev_post($date){
		if ($_SESSION['tag_from'] == ''){
			$sql = "select post_title,post_name from posts where post_status='publish' and post_type='post' and post_date>'{$date}' order by post_date limit 0,1";
		}
		else{
			$sql = "select post_title,post_name from posts a,term_relationships b 
					where a.ID=b.object_id 
					and b.term_taxonomy_id='{$_SESSION['tag_from']}' 
					and post_status='publish' 
					and post_type='post' 
					and post_date>'{$date}' 
					order by post_date limit 0,1";
		}
		$query = $this->db->query($sql);
		$prev_title = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
			$row['display_title'] = $row['post_title'];
			if (mb_strlen($row['display_title'])>30){
				$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,30,'UTF-8') . "...";
			}
			$prev_title = $row;
		}
		return $prev_title;
	}

	private function get_next_post($date){
		if ($_SESSION['tag_from'] == ''){
			$sql = "select post_title,post_name from posts where post_status='publish' and post_type='post' and post_date<'{$date}' order by post_date desc limit 0,1";
		}
		else{
			$sql = "select post_title,post_name from posts a,term_relationships b 
					where a.ID=b.object_id 
					and b.term_taxonomy_id='{$_SESSION['tag_from']}' 
					and post_status='publish' 
					and post_type='post' 
					and post_date<'{$date}' 
					order by post_date desc limit 0,1";
		}
		
		$query = $this->db->query($sql);
		$next_title = '';
		if ($query->num_rows>0){
			$row = $query->row_array();
			$row['display_title'] = $row['post_title'];
			if (mb_strlen($row['display_title'])>30){
				$row['display_title'] = mb_substr(strip_tags($row['display_title']),0,30,'UTF-8') . "...";
			}
			$next_title = $row;
		}
		return $next_title;
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

	private function get_term_relationships($id){
		$sql = "select a.term_taxonomy_id from term_relationships a,terms b where a.term_taxonomy_id=b.term_id and b.term_group=0 and object_id='{$id}' order by term_order asc";
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
		$sql = "SELECT term_id FROM terms WHERE slug='" . urldecode($name) . "' AND term_group='0'";
		$query = $this->db->query($sql);
		$term_id = -1;

		if ($query->num_rows>0){
			$row = $query->row_array();
			$term_id = $row['term_id'];
		}
		return $term_id;
	}

	//for 食衣住行
	public function get_term_id2($name=''){
		$name = addslashes($name);
		$sql = "select term_id from terms where slug='" . urldecode($name) . "' AND term_group='1'";
		$query = $this->db->query($sql);
		$term_id = -1;

		if ($query->num_rows>0){
			$row = $query->row_array();
			$term_id = $row['term_id'];
		}
		return $term_id;
	}

	public function get_menu_type($id){
		$sql = "SELECT a.en_name as name,a.slug FROM terms a,term_relationships b WHERE a.term_id=b.term_taxonomy_id AND b.object_id='{$id}' AND a.term_group=0 ORDER BY a.term_id;";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function get_terms_name($id){
		$sql = "SELECT a.name FROM terms a,term_relationships b WHERE a.term_id=b.term_taxonomy_id AND b.object_id='{$id}' ORDER BY a.term_id;";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(',',$result);
	}

	public function get_tags(){
		$terms = $_GET['term'];
		$terms = addslashes($terms);
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
			// $this->global_model->check_img_exist($row['post_title']);
			$result = $row['post_title'];
		}
		return $result;
	}

	private function get_gallery($id){
		$sql = "SELECT ID,post_title FROM posts WHERE post_parent='{$id}' AND post_type='gallery-img' ORDER BY menu_order,ID DESC";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			$row['caption'] = $this->get_img_content($row['ID']);
			array_push($result,$row);
		}
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

	public function author_search($author_name='',$start=0,$pagesize=6){
		$author_name = addslashes($author_name);
		$sql = "SELECT id FROM admin_user WHERE display_name = '{$author_name}'";
		$query = $this->db->query($sql);
		$result=array();
		if($query->num_rows > 0){
			$row = $query->row_array();
			$result = $this->rs($row['id'],0,$start,$pagesize);
			return $result;
		}
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
}
?>