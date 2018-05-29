<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recommend_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

	public function rs02($current=1,$pagesize=20,$type="post",$id){
		$result = array();
		$search = '';
		$search_url = '';
		if (isset($this->get['author']) and is_numeric($this->get['author']) and $this->get['author']>0){
			$search .= " and post_author='{$this->get['author']}'";
			$search_url .= '&author='.$this->get['author'];
		}
		if (isset($this->get['a_z']) and $this->get['a_z']!='0'){
			$search .= " and ID in (SELECT post_id FROM postmeta WHERE meta_value='{$this->get['a_z']}' AND meta_key='letter')";
			$search_url .= '&a_z='.$this->get['a_z'];
		}
		if (isset($this->get['west']) and $this->get['west']!='0'){
			$search .= " and ID in (SELECT post_id FROM postmeta WHERE meta_value='{$this->get['west']}' AND meta_key='locale')";
			$search_url .= '&west='.$this->get['west'];
		}
		if (isset($this->get['tag']) and is_numeric($this->get['tag']) and $this->get['tag']>0){
			$search .= " and ID in(select object_id from term_relationships where term_taxonomy_id='{$this->get['tag']}')";
			$search_url .= '&tag='.$this->get['tag'];
		}
		if (isset($this->get['search_date']) and $this->get['search_date']!=''){
			$search .= " and post_date like '{$this->get['search_date']}%'";
			$search_url .= '&search_date='.$this->get['search_date'];
		}
		if (isset($this->get['search_key']) and $this->get['search_key']!=''){
			$search .= " and (post_title like '%{$this->get['search_key']}%' or post_content like '%{$this->get['search_key']}%')";
			$search_url .= '&search_key='.$this->get['search_key'];
		}
		$sql = "select * from posts where ID <> '{$id}' AND post_type='{$type}' and (post_status='publish' or post_status='unpublish') {$search} order by post_date desc";
		
		$query = $this->db->query($sql);

		$current = (isset($this->get['page']) and is_numeric($this->get['page']))?$this->get['page']:$current;
		$start = ($current-1)*$pagesize;

		$result['total'] = $query->num_rows();
		$result['pages'] = ceil($result['total'] / $pagesize);
		$result['current'] = $current;
		$result['authors'] = $this->users_model->rs();
		$result['tags'] = $this->tags_model->rs_all();
		$result['search_url'] = $search_url;

		$sql .= " limit {$start},{$pagesize}";
		$query = $this->db->query($sql);

		$result['rs'] = array();
		foreach($query->result_array() as $row){
			$row['tags'] = $this->get_terms_name($row['ID']);
			$row['terms'] = $this->get_term_relationships_tags($row['ID']);
			$row['users'] = $this->get_author($row['post_author']);
			$row['locale'] = $this->get_locale($row['ID']);
			$row['letter'] = $this->get_letter($row['ID']);
			array_push($result['rs'],$row);
		}
		return $result;
	}
	public function user_rs(){
		$this->load->model('people_model');
		$result = array();	
		$search = '';
		$search_url = '';
		if (isset($this->get['search_key']) and $this->get['search_key']!=''){
			$search .= " and (display_name like '%{$this->get['search_key']}%' OR username like '%{$this->get['search_key']}%')";
			$search_url .= '&search_key='.$this->get['search_key'];
		}
		if (isset($this->get['active']) and $this->get['active']!=''){
			$search .= " and (active like '%{$this->get['active']}%')";
			$search_url .= '&active='.$this->get['active'];
		}
		if (isset($this->get['group']) and $this->get['group']!=''){
			$search .= " and (id IN (SELECT post_parent FROM posts WHERE ID IN (SELECT post_id FROM postmeta WHERE meta_value like '%{$this->get['group']}%')))";
			$search_url .= '&search_key='.$this->get['search_key'];
		}
		$sql = "SELECT * FROM admin_user where id>'0' {$search} ORDER BY sort asc ,username ASC ";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		foreach($data as $row){
			$post_data = $this->people_model->row_author($row['id']);
			$row['post_status'] = $post_data['post_status'];
			$row['users'] = $post_data['author_type'];
			array_push($result, $row);
		}
		return $result;
	}


	public function get_terms_name($id){
		$sql = "select a.name from terms a,term_relationships b where a.term_id=b.term_taxonomy_id and b.object_id='{$id}' and a.term_group=0 order by a.sort ASC";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['name']);
		}
		return implode(',',$result);
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

	public function get_author($author){
		$sql = "SELECT display_name FROM admin_user WHERE id = '{$author}'";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['display_name']);
		}
		return $result;

	}

	private function get_locale($id){
		$sql = "select a.meta_value from postmeta a,posts b where a.post_id=b.ID and b.ID='{$id}' AND a.meta_key='locale'";
		$query = $this->db->query($sql);
		$result = array();
		$locale = 'east';
		if ($query->num_rows()>0){
			$row = $query->row_array();
			$locale = $row['meta_value'];
		}
		return $locale;
	}
	
	private function get_letter($id){
		$sql = "select a.meta_value from postmeta a,posts b where a.post_id=b.ID and b.ID='{$id}' AND a.meta_key='letter'";
		$query = $this->db->query($sql);
		$result = array();
		$letter ='A';
		if ($query->num_rows()>0){
			$row = $query->row_array();
			$letter = $row['meta_value'];
		}
		return $letter;
	}	
	public function recs_id($id){
		$sql = "select meta_value as rec_id from postmeta where post_id='{$id}' and meta_key='recommend'";
		$query = $this->db->query($sql);
			return $query->result_array();
	}
	public function user_post($id){
		$sql = "select ID from posts where post_type='author' and post_parent='{$id}'";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			$row = $query->row_array();
			return $row['ID'];	
		}else{
			return 0;
		}
	}

	public function addrec($id,$id2,$action){
		if($action=="1"){
			$sql = "select * from postmeta where post_id='{$id}' and meta_key='recommend' and meta_value='{$id2}'";
			$query = $this->db->query($sql);
			if ($query->num_rows()==0){
				$sql = "insert into postmeta values(null,'{$id}','recommend','{$id2}')";
				$this->db->query($sql);
				return $this->db->insert_id();
			}
		}
		else{
			$sql = "DELETE FROM postmeta WHERE post_id='{$id}' and meta_key='recommend' and meta_value='{$id2}'";
			$this->db->query($sql);
		}	
		
	}

}	