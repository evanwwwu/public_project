<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->post = $this->input->post();
	}
	
	public function rs(){
		$this->load->model('people_model');
		$result = array();	
		$search = '';
		$search_url = '';
		if (isset($this->get['a_z']) and $this->get['a_z']!='0'){
			$search .= " and display_name like '%{$this->get['a_z']}%' OR username like '%{$this->get['a_z']}%'";
			$search_url .= '&a_z='.$this->get['a_z'];
		}
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

	public function row($id){
		$sql = "SELECT * FROM admin_user WHERE id = {$id}";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function save($odd){			
		$us = addslashes($this->post['username']);
		$pw = addslashes($this->post['userpwd']);
		$na = addslashes($this->post['display_name']);
		$ac = addslashes($this->post['active']);
		$update_pwd = ($pw=='')?"":",userpwd='{$pw}'";

		$sql = "SELECT *FROM admin_user WHERE display_name = '{$na}' AND id <> '{$odd}'";
		$query = $this->db->query($sql);
		if($query->num_rows() ==0){
			$sql = "SELECT * FROM admin_user Where username='{$us}' AND id <> '{$odd}'";
			$query = $this->db->query($sql);
			if($query->num_rows()== 0){

				if($odd==0){
					$sql = "INSERT INTO admin_user (`username` ,`userpwd`,`display_name`, `active`) VALUES ('{$us}','{$pw}','{$na}','{$ac}')";
					$query = $this->db->query($sql);
					$id = $this->db->insert_id();
					$post_id = $this->save_people($id);
				}
				else{
					$sql = "UPDATE admin_user SET username = '{$us}' {$update_pwd}, display_name = '{$na}', active = '{$ac}' WHERE id = '{$odd}'";
					$query = $this->db->query($sql);
					$post_id = $this->save_people($odd);
				}
				$this->save_rec($post_id);
				echo "alert('完成'); location=location; ";
			}
			else {
				echo "alert('帳號重複')";
			}
		}
		else{
			echo "alert('名稱已有人使用')";
		}
	}

	public function publish(){
		$sql = "update posts SET `post_status` =  '{$this->post['publish']}' 
		WHERE  post_parent = '{$this->post['id']}';";
		$this->db->query($sql);
	}

	public function del(){

		$id = addslashes($this->post['id']);
		$sql = "DELETE FROM admin_user WHERE id='{$id}'" ;
		$query = $this->db->query($sql);
		return $query;
	}
	public function sort(){
		$ids = $this->post['id'];
		$i = 1;
		foreach ($ids as $id){
			$sql = "UPDATE admin_user SET sort='{$i}' WHERE id='{$id}'";
			$this->db->query($sql);
			$i++;
		}
	}
	private function save_rec($id){
		$sql = "select * from postmeta where post_id = '{$id}' and meta_key='recommend'";
		$query = $this->db->query($sql);
		if($query->num_rows>0){
			$sql = "delete from postmeta where post_id='{$id}' and meta_key='recommend'";
			$query = $this->db->query($sql);
		}
		if(isset($this->post['rec'])){
		foreach($this->post['rec'] as $rec){
			$sql = "insert into `postmeta` (`meta_id`,`post_id`,`meta_key`,`meta_value`) values (NULL,'{$id}','recommend','{$rec}')";
			$query = $this->db->query($sql);
		}
		}
	}
	private function save_people($id){
		$sql = "select * from posts where post_parent='{$id}' and post_type='author'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		if($query->num_rows==0){			
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
	NULL ,  {$_SESSION[ADMIN_SESSION]},  '".date('Y-m-d H:i:s')."',  '0000-00-00 00:00:00',  '',  '',  '',  'auto-draft',  'open'
	,  'open',  '',  '',  '',  '',  '0000-00-00 00:00:00',  '0000-00-00 00:00:00',  '',  '{$id}',  '',  '0',  'author',  '',  '0'
	)";
$this->db->query($sql);
$row['ID'] = $this->db->insert_id();
}

$post_id = $row['ID'];
$this->save_content($row['ID']);
$this->save_tag($row['ID']);
$this->save_author_type($row['ID']);
return $row['ID'];
}

private function save_content($id){
	$sql = "select post_status from posts where id='{$id}'";
	$query = $this->db->query($sql);
	if ($query->num_rows()>0){
		$row = $query->row_array();
		if ($row['post_status']=='auto-draft'){
			$update_time = 'post_date';
				//echo 'location="'.ADMIN_URL.'people/edit/'.$id.'"';
		}
		else{
			$update_time = 'post_modified';
				//echo 'location.reload();';
		}
	}
	$sql = "update posts set 
	post_date='',
	post_status='{$this->post['post_status']}',
	post_content='".addslashes($_POST['post_content'])."' 
	where ID='{$id}'";
	$this->db->query($sql);
		//return $this->post['id'];
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

private function save_author_type($id){
	$sql = "delete from postmeta where meta_key='author_type' and post_id='{$id}'";
	$this->db->query($sql);

	if (isset($_POST['author_type'])){
		$sql = "insert into postmeta values(null,'{$id}','author_type','{$_POST['author_type']}')";
		$this->db->query($sql);
	}
}

public function getdata($id){
	$sql ="select * from admin_user where id = '{$id}'";
	$query = $this->db->query($sql);
	return $query->row_array();
}

public function get_recommend($id){
	$result = array();
	$sql = "select meta_value from postmeta where post_id = '{$id}' and meta_key= 'recommend'";
	$query = $this->db->query($sql);
	$ids = $query->result_array();		
	foreach($ids as $id){
		$sql = "select * from admin_user where id = '{$id['meta_value']}'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		array_push($result,$row);
	}
	return $result;
}



}

?>