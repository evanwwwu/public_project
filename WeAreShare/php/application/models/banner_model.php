<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
	
	public function rs02($current=1,$pagesize=20){
		$result = array();

		$search = '';
		$search_url = '';
		if (isset($this->get['type']) and $this->get['type']>0){
			$search .= " and type='{$this->get['type']}'";
			$search_url .= '&type='.$this->get['type'];
		}

		if (isset($this->get['search_start_date']) and $this->get['search_start_date']!=''){
			$search .= " and (date_start >= '{$this->get['search_start_date']}' OR date_end >= '{$this->get['search_start_date']}')";
			$search_url .= '&search_start_date='.$this->get['search_start_date'];
		}

		if (isset($this->get['search_end_date']) and $this->get['search_end_date']!=''){
			$search .= " and (date_end <= '{$this->get['search_end_date']}' OR date_start <= '{$this->get['search_end_date']}')";
			$search_url .= '&search_end_date='.$this->get['search_end_date'];
		}

		if (isset($this->get['search_key']) and $this->get['search_key']!=''){
			$search .= " and (banner_title like '%{$this->get['search_key']}%' or description like '%{$this->get['search_key']}%')";
			$search_url .= '&search_key='.$this->get['search_key'];
		}
			
		$sql = "select * from banner where  publish<>'2' and id>0 {$search} order by sort asc,date_start desc,id desc";

		$query = $this->db->query($sql);

		$current = (isset($this->get['page']) and is_numeric($this->get['page']))?$this->get['page']:$current;
		$start = ($current-1)*$pagesize;

		$result['total'] = $query->num_rows();
		$result['pages'] = ceil($result['total'] / $pagesize);
		$result['current'] = $current;
		$result['search_url'] = $search_url;

		$sql .= " limit {$start},{$pagesize}";
		$query = $this->db->query($sql);

		$result['rs'] = array();
		foreach($query->result_array() as $row){
			$type = $this->get_type($row['type']);
			$row['type_title'] = $type[0];
			$row['size'] = $type[1];
			array_push($result['rs'],$row);
		}
		return $result;
	}

	public function row($id){
		if ($id == 0){
			$result = array('id'=>'0', 'first'=>null, 'banner_title'=>null, 'img_title'=>null,  'multimedia'=>null, 'date_start'=>null, 'date_end'=>null, 'description'=>null, 'publish'=>null, 'type'=>"1",'link'=>'','sort'=>"0" );

		}
		$sql = "select * from banner where id='{$id}'";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
			$result = $query->row_array();
		}
			$type = $this->get_type($result['type']);
			$result['type_title'] = $type[0];
			$result['size'] = $type[1];
		return $result;
	}


	public function get_type($id){
		$sql = "SELECT * FROM banner_type WHERE id = '{$id}'";
		$query = $this->db->query($sql);
		$result = array();
		foreach($query->result_array() as $row){
			array_push($result,$row['type_title']);
			array_push($result,$row['size']);
		}
		return $result;
	}

	public function get_size(){
		$sql = "SELECT * FROM banner_type ORDER BY id";
		$query = $this->db->query($sql);
		return 	$query->result_array();
	}


	public function save(){
		$sql = "select * from banner where id='{$this->post['id']}'";
		$query = $this->db->query($sql);
		if ($query->num_rows()>0){
		$sql = "update banner set 
				first='{$this->post['first']}',
				banner_title='".addslashes($this->post['banner_title'])."',
				img_title='{$this->post['img_title']}',
				multimedia='".addslashes($_POST['multimedia'])."',
				date_start='{$this->post['date_start']}',
				date_end='{$this->post['date_end']}',
				description='".addslashes($this->post['description'])."',
				publish='{$this->post['banner_publish']}',
				type='{$this->post['type']}',
				link='".addslashes($this->post['link'])."'
				where id='{$this->post['id']}'";
		$this->db->query($sql);
		echo 'location=location;';
		}
		else{
			$sql = "INSERT INTO banner (`id`, `first`, `banner_title`, `img_title`, `multimedia`, `date_start`, `date_end`, `description`, `publish`, `type`, `link`, `sort`) 
					VALUES (NULL, '{$this->post['first']}', '".addslashes($this->post['banner_title'])."', '{$this->post['img_title']}', '".addslashes($_POST['multimedia'])."', '{$this->post['date_start']}', '{$this->post['date_end']}', '".addslashes($this->post['description'])."', '{$this->post['banner_publish']}', '{$this->post['type']}', '{$this->post['link']}', 0)";

			$this->db->query($sql);
			echo 'location="'.ADMIN_URL.'banner/edit/'.$this->post['type'].'/'.$this->db->insert_id().'"';
		}
	}



	public function publish(){
		$sql = "update banner SET `publish` =  '{$this->post['publish']}' 
				WHERE  id = '{$this->post['id']}';";
		$this->db->query($sql);
	}
	public function first(){
		$sql = "update banner SET `first` =  '{$this->post['first']}' 
				WHERE  id = '{$this->post['id']}';";
		$this->db->query($sql);
	}

	public function delete_cover(){
		$sql = "update  banner set img_title = '' where id='{$this->post['id']}'";
		$this->db->query($sql);
	}

	public function delete_multimedia(){
		$sql = "update  banner set multimedia = '' where id='{$this->post['id']}'";
		$this->db->query($sql);
	}

	public function check_first($max=1){
		$search ="";
		$text="";
		if (isset($this->post['search_start_date']) and $this->post['search_start_date']!=''){
			$search .= " and (date_start >= '{$this->post['search_start_date']}' OR date_end >= '{$this->post['search_start_date']}')";
		}
		if (isset($this->post['search_end_date']) and $this->post['search_end_date']!=''){
			$search .= " and (date_end <= '{$this->post['search_end_date']}' OR date_start <= '{$this->post['search_end_date']}')";
		}

		$sql = "SELECT id FROM banner WHERE id <> '{$this->post['id']}' AND `publish`='1' AND `type`='5' {$search} AND `first`= '1' ";
		$query = $this->db->query($sql);
		if($query->num_rows>($max-1)){
			$rows = $query->num_rows;
			$text = "此時段已有發布的常駐廣告，為:";
			$query = $query->result_array();

			for($num=0;$num<$rows;$num++){
				$sql = "SELECT banner_title FROM banner WHERE id = '{$query[$num]['id']}'";
				$query2 = $this->db->query($sql);
				$titel = $query2->result_array();
				$text .= "\n".$titel[0]["banner_title"];
			}
			echo $text;
		}
	}

	public function del(){
		$sql = "UPDATE banner SET  publish='2' WHERE id='{$this->post['id']}'";
		$this->db->query($sql);
	}

	public function sort(){
		$ids = $this->post['id'];
		$i = 1;
		foreach ($ids as $id){
			$sql = "update banner set sort='{$i}' where id='{$id}'";
			$this->db->query($sql);
			$i++;
		}

	}

	public function get_log($id){
		
	}

}
?>