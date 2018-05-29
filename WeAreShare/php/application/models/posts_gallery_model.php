<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts_gallery_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function rs($tag_id=0){
		$result = array();
		if($_SESSION[ADMIN_ACTIVE]=='1'){
			$sql = "select * from posts where post_type='post_gallery' and (post_status='publish' or post_status='unpublish') order by post_date desc";
		}
		else{
			$sql = "select * from posts where post_type='post_gallery' and post_author='{$_SESSION[ADMIN_SESSION]}' and (post_status='publish' or post_status='unpublish') order by post_date desc";
		}
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);
			$row['terms'] = $this->get_term_relationships_tags($row['ID']);
			$row['users'] = $this->get_author($row['post_author']);
			array_push($result,$row);
		}
		return $result;
	}
	
	public function rs02($current=1,$pagesize=20){
		$result = array();

		$search = '';
		$search_url = '';
		if (isset($this->get['author']) and is_numeric($this->get['author']) and $this->get['author']>0){
			$search .= " and post_author='{$this->get['author']}'";
			$search_url .= '&author='.$this->get['author'];
		}
		if (isset($this->get['tag']) and is_numeric($this->get['tag']) and $this->get['tag']>0){
			$search .= " and ID in(select object_id from term_relationships where term_taxonomy_id='{$this->get['tag']}')";
			$search_url .= '&tag='.$this->get['tag'];
		}
		if (isset($this->get['term']) and is_numeric($this->get['term']) and $this->get['term']>0){
			$search .= " and ID in(select object_id from term_relationships where term_taxonomy_id='{$this->get['term']}')";
			$search_url .= '&term='.$this->get['term'];
		}
		if (isset($this->get['search_date']) and $this->get['search_date']!=''){
			$search .= " and post_date like '{$this->get['search_date']}%'";
			$search_url .= '&search_date='.$this->get['search_date'];
		}
		if (isset($this->get['search_key']) and $this->get['search_key']!=''){
			$search .= " and (post_title like '%{$this->get['search_key']}%' or post_content like '%{$this->get['search_key']}%')";
			$search_url .= '&search_key='.$this->get['search_key'];
		}

		if($_SESSION[ADMIN_ACTIVE]=='1'){
			$sql = "select * from posts where post_type='post_gallery' and (post_status='publish' or post_status='unpublish') {$search} order by post_date desc";
		}
		else{
			$sql = "select * from posts where post_type='post_gallery' and post_author='{$_SESSION[ADMIN_SESSION]}' and (post_status='publish' or post_status='unpublish') {$search} order by post_date desc";
		}
		$query = $this->db->query($sql);

		$current = (isset($this->get['page']) and is_numeric($this->get['page']))?$this->get['page']:$current;
		$start = ($current-1)*$pagesize;

		$result['total'] = $query->num_rows();
		$result['pages'] = ceil($result['total'] / $pagesize);
		$result['current'] = $current;
		$result['authors'] = $this->users_model->rs();
		$result['tags'] = $this->tags_gallery_model->rs_tag();
		$result['terms'] = $this->tags_gallery_model->rs();
		$result['search_url'] = $search_url;

		$sql .= " limit {$start},{$pagesize}";
		$query = $this->db->query($sql);

		$result['rs'] = array();
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name_view($row['ID']);
			$row['terms'] = $this->get_term_relationships_tags_view($row['ID']);
			$row['users'] = $this->get_author($row['post_author']);
			array_push($result['rs'],$row);
		}
		return $result;
	}

	public function row($id){
		if ($id == 0){
			$id = $this->new_post();
		}
		$sql = "select * from posts where id='{$id}'";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$result = $query->row_array();
		}
		$result['terms'] = $this->get_term_relationships($result['ID']);
		$result['tags'] = $this->get_term_relationships_tags($result['ID']);
		$result['cover_img'] = $this->get_cover_img($result['ID']);
		$result['gallery'] = $this->get_gallery($result['ID']);
		$result['recommend'] = $this->get_recommend($result['ID']);
		return $result;
	}

	private function get_term_relationships($id){
		$sql = "select a.term_taxonomy_id from term_relationships a,terms b where a.term_taxonomy_id=b.term_id and b.term_group=4 and object_id='{$id}' order by term_taxonomy_id";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['term_taxonomy_id']);
		}
		return $result;
	}

	private function get_term_relationships_tags($id){
		$sql = "select b.name from term_relationships a,terms b where a.term_taxonomy_id=b.term_id and b.term_group=1 and object_id='{$id}' order by term_order,term_taxonomy_id";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(",",$result);
	}

	private function get_term_relationships_tags_view($id){
		$sql = "select b.name from term_relationships a,terms b where a.term_taxonomy_id=b.term_id and b.term_group=1 and object_id='{$id}' order by term_order,term_taxonomy_id";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return $result;
	}

	public function get_terms(){
		$sql = "select * from terms where term_group=4 order by sort asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_terms_name($id){
		$sql = "select a.name from terms a,term_relationships b where a.term_id=b.term_taxonomy_id and b.object_id='{$id}' and a.term_group=4 order by a.sort ASC";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(',',$result);
	}

	public function get_terms_name_view($id){
		$sql = "select a.name from terms a,term_relationships b where a.term_id=b.term_taxonomy_id and b.object_id='{$id}' and a.term_group=4 order by a.sort ASC";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return $result;
	}

	public function get_tags(){
		$terms = $_GET['term'];
		$search = " and name like '%{$terms}%'";
		$sql = "select term_id as id,name as label,name as value from terms where term_group=1 ".$search." order by name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_posts($id){
		$terms = $_GET['term'];
		$search = " and post_title like '%{$terms}%' and ID<>'{$id}' and ID not in(select meta_value from postmeta where meta_key='recommend')";
		$sql = "select ID as id,post_title as label,post_title as value from posts where post_type='post_gallery' ".$search." order by post_title";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_recommend($id){
		$sql = "select a.*,b.post_title as title from postmeta a,posts b where a.meta_value=b.ID and a.post_id='{$id}' and meta_key='recommend' and (b.post_status='publish' or b.post_status='unpublish') order by meta_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_images($id){
		$result = array();
		$sql = "select * from posts where post_parent='{$id}' order by post_date desc";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_term_relationships_tags($row['ID']);
			$row['content'] = $this->get_img_content($row['ID']);
			array_push($result,$row);
		}
		return $result;
	}

	private function get_img_content($id){
		$sql = "select * from postmeta where post_id='{$id}' and meta_key='img-content'";
		$query = $this->db->query($sql);
		$content = '';
		if ($query->num_rows()>0){
			$row = $query->row_array();
			$content = $row['meta_value'];
		}
		return $content;
	}

	public function add2rec($id,$id2){
		$sql = "select * from postmeta where post_id='{$id}' and meta_key='recommend' and meta_value='{$id2}'";
		$query = $this->db->query($sql);
		if ($query->num_rows()==0){
			$sql = "insert into postmeta values(null,'{$id}','recommend','{$id2}')";
			$this->db->query($sql);
			return $this->db->insert_id();
		}
	}

	private function get_cover_img($id){
		$sql = "select post_title from posts where post_parent='{$id}' and post_type='cover-img' order by post_date desc";
		$query = $this->db->query($sql);
		$result = '';
		if ($query->num_rows()>0){
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

	public function get_author($author){
		$sql = "SELECT display_name FROM admin_user WHERE id = '{$author}'";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['display_name']);
		}
		return $result;

	}


	public function save(){
		$id = $this->save_content();
		$this->save_term($id);
		$this->save_tag($id);
		return $id;
	}

	private function save_content(){
		$sql = "select post_status from posts where id='{$this->post['id']}'";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$row = $query->row_array();
			if ($row['post_status']=='auto-draft'){
				$update_time = 'post_date';
				echo 'location="'.ADMIN_URL.'posts_gallery/edit/'.$this->post['id'].'"';
			}
			else{
				$update_time = 'post_modified';
				echo 'location.reload();';
			}
		}
		$post_name = str_replace(' ', '-', $this->post['post_title']);
		$sql = "update posts set 
				post_date='{$this->post['post_date']}',
				post_author='".addslashes($this->post['post_author'])."',
				post_status='{$this->post['post_status']}',
				post_title='".addslashes($this->post['post_title'])."',
				post_name='".addslashes($post_name)."',
				post_content='".addslashes($_POST['post_content'])."' 
				where ID='{$this->post['id']}'";
		$this->db->query($sql);
		return $this->post['id'];
	}

	private function save_term($id){
		//unactive all
		$sql = "delete from term_relationships where object_id='{$id}'";
		$this->db->query($sql);
		//tag selected
		if (isset($_POST['term'])){
			foreach($_POST['term'] as $term){
				$sql = "select * from term_relationships where object_id='{$id}' and term_taxonomy_id='{$term}'";
				$query = $this->db->query($sql);
				if ($query->num_rows()==0){ //沒資料
					$sql = "insert into term_relationships values('{$id}','{$term}',0)";
					$this->db->query($sql);
				}
				else{ //有資料 不動

				}
			}
		}

		if ($this->post['new_term'] != ''){
			$sql = "select * from terms where LOWER(name)='" . addslashes(strtolower($this->post['new_term']))."' and term_group=4";
			$query = $this->db->query($sql);
			if ($query->num_rows()>0){
				$row = $query->row_array();
				$term_id = $row['term_id'];
			}
			else{
				$sql = "insert into terms values(NULL,'".addslashes($this->post['new_term'])."','".addslashes(str_replace(' ', '-', $this->post['new_term']))."',0,0)";
				$this->db->query($sql);
				$term_id = $this->db->insert_id();
			}
			$sql = "insert into term_relationships values('{$id}','{$term_id}',0)";
			$this->db->query($sql);
		}
	}

	private function save_tag($id){
		$tags = explode(',',$this->post['tags']);
		$i=0;
		foreach($tags as $tag){
			$tag = trim($tag);
			if ($tag != ''){
				$sql = "select term_id from terms where LOWER(name)='" . addslashes(strtolower($tag))."' and term_group=1";
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
				$sql = "select object_id from term_relationships where object_id = {$id} and term_taxonomy_id = {$term_id}";
				$query = $this->db->query($sql);
				if ($query->num_rows()==0){
					$sql = "insert into term_relationships values('{$id}','{$term_id}','{$i}')";
					$this->db->query($sql);
				}
				else{
					$sql = "update term_relationships set term_order='{$i}' where object_id='{$id}' and term_taxonomy_id='{$term_id}'";
					$this->db->query($sql);
				}
			}
			$i++;
		}

	}

	public function publish(){
		$sql = "update posts SET `post_status` =  '{$this->post['publish']}' 
				WHERE  ID = '{$this->post['id']}';";
		$this->db->query($sql);
	}

	public function del(){
		$sql = "update posts set post_status='deleted' where ID='{$this->post['id']}';";
		$this->db->query($sql);
	}

	public function sort(){
		$ids = $this->post['id'];
		$i = 0;
		foreach ($ids as $id){
			$sql = "update products set sort='{$i}' where id='{$id}'";
			//$sql = "update prod_tags_assoc set sort='{$i}' where prod_id='{$id}' and tag_id='{$this->post['tag_id']}'";
			$this->db->query($sql);
			$i++;
		}
	}

	public function gallery_sort(){
		$i = 0;
		foreach($this->post['gallery'] as $filename){
			$sql = "update posts set menu_order='{$i}' where post_title='{$filename}'";
			$this->db->query($sql);
			$i++;
		}
	}

	public function delete_cover(){
		$sql = "delete from posts where post_parent='{$this->post['id']}' and post_type='cover-img'";
		$this->db->query($sql);
	}

	public function delete_gallery(){
		$sql = "delete from posts where post_parent='{$this->post['id']}' and post_type='gallery-img' and post_title='{$this->post['filename']}'";
		$this->db->query($sql);
	}

	public function delete_recommend(){
		$sql = "delete from postmeta where meta_id='{$this->post['id']}'";
		$this->db->query($sql);
	}

	public function delete_tag(){
		$sql = "delete from terms where term_id='{$this->post['id']}'";
		$this->db->query($sql);
		$sql = "delete from term_relationships where term_taxonomy_id='{$this->post['id']}'";
		$this->db->query($sql);
	}

	private function new_post(){
		$sql = "INSERT INTO `posts` (
			`ID` ,
			`post_author` ,
			`post_date` ,
			`post_date_gmt` ,
			`post_content` ,
			`post_title` ,
			`post_excerpt` ,
			`post_status` ,
			`comment_status` ,
			`ping_status` ,
			`post_password` ,
			`post_name` ,
			`to_ping` ,
			`pinged` ,
			`post_modified` ,
			`post_modified_gmt` ,
			`post_content_filtered` ,
			`post_parent` ,
			`guid` ,
			`menu_order` ,
			`post_type` ,
			`post_mime_type` ,
			`comment_count`
			)
			VALUES (
			NULL ,  {$_SESSION[ADMIN_SESSION]},  '".date('Y-m-d H:i:s')."',  '0000-00-00 00:00:00',  '',  '',  '',  'auto-draft',  'open',  'open',  '',  '',  '',  '',  '0000-00-00 00:00:00',  '0000-00-00 00:00:00',  '',  '0',  '',  '0',  'post_gallery',  '',  '0'
			)";
		$this->db->query($sql);
		return $this->db->insert_id();
	}
}
?>