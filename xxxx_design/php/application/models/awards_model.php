<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awards_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->title = "title1";
            $this->w_title = "w_title1";
            break;
            case 'tw':
            $this->title = "title2";
            $this->w_title = "w_title2";
            break;
            case 'cn':
            $this->title = "title3";
            $this->w_title = "w_title3";
            break;
        }
    }

    public function rs($year=""){
    	$result = array();
        $search = "";
        if($year!=""){
            $search = "AND YEAR(createdate) IN ($year)";
        }
    	$sql = "SELECT {$this->title} as title, awards.* FROM awards WHERE isdelete='0' and isshow='1' {$search} ORDER BY  YEAR(createdate) DESC,sort";
    	$query = $this->db->query($sql);
    	foreach($query->result_array() as $row){
            $row['works'] =$this->get_works($row['aid']);
            array_push($result,$row);
        }
        return @$result;
    }
    public function row($id){
        $result = array();
        if($id!="0"){
            $sql = "SELECT * FROM awards WHERE isdelete='0' AND aid = {$id}";
            $query = $this->db->query($sql);
            $row = $query->row_array();
            $row['works'] =$this->get_works($id);
        }
        return @$row;
    }

    public function get_year($start=0,$pagesize=2){
        $sql = "SELECT YEAR(createdate) AS year FROM awards WHERE isdelete='0' and isshow='1' GROUP BY year order by YEAR(createdate) DESC limit {$start},{$pagesize}";
        $query = $this->db->query($sql);
        return $query->result_array();

    }
    private function get_works($id){
        $result = array();
        $sql = "SELECT {$this->w_title} as w_title, workid FROM awards_assoc WHERE aid = {$id} order by sort";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $wid){
            $sql ="SELECT url,cover_img FROM works WHERE workid = {$wid['workid']}";
            $query =   $this->db->query($sql);
            $query = $query->row_array();
            $wid['url'] = @$query['url'];
            $wid['w_cover_img'] = @$query['cover_img'];
            array_push($result,$wid);
        }
        return $result;
    }

}
?>