<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awards_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        $this->wids = 0;
        if($this->get['wids']!=''){
           $this->wids = $this->get['wids'];
       }
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
    if($row['works']!=array()){
        array_push($result,$row);
    }
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
    // $sql = "SELECT GROUP_CONCAT(aid ORDER BY YEAR(createdate) DESC,sort) AS aids FROM awards WHERE isdelete='0' AND isshow='1'";
    // $query = $this->db->query($sql);
    // $query = $query->row_array();
    $sql = "SELECT aid FROM (SELECT b.*,a.createdate FROM awards a, awards_assoc b WHERE a.aid=b.aid  AND a.isdelete='0' ORDER BY YEAR(createdate) DESC ) `temp`  GROUP BY workid ORDER BY YEAR(createdate) DESC";
    $query = $this->db->query($sql);
    $aids = array();
    foreach($query->result_array() as $id){
        array_push($aids,$id['aid']);
    }
    $aids = implode(',',$aids);
    $sql = "SELECT YEAR(createdate) AS year FROM awards WHERE isdelete='0' and isshow='1' AND aid IN ({$aids}) GROUP BY year order by YEAR(createdate) DESC limit {$start},{$pagesize}";
    $query = $this->db->query($sql);
    return $query->result_array();

}
private function get_works($id){
    $result = array();
    $sql = "SELECT workid,work_cover_img FROM awards_assoc WHERE aid = {$id} and workid NOT IN ({$this->wids}) order by sort";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
        foreach($query->result_array() as $wid){
            $sql ="SELECT url,{$this->title} as work_title FROM works WHERE workid = {$wid['workid']} and isdelete='0' and isshow='1' ";
            $query =   $this->db->query($sql);
            if($query->num_rows()>0){
                $query = $query->row_array();
                $wid['url'] = @$query['url'];
                $wid['work_title'] = @$query['work_title'];
                $wid['award_title'] = $this->work_awards($wid['workid']);
            // print_r($sql.'|||');
                $this->wids .= ','.$wid['workid'];
                array_push($result,$wid);
            }
        }
    }
    return $result;
}

private function work_awards($w_id){
    $sql = "SELECT GROUP_CONCAT(aid) as aids FROM awards_assoc WHERE workid = '{$w_id}'";
    $query = $this->db->query($sql);
    $query = $query->row_array();
    $sql = "SELECT {$this->title} as title, awards.* FROM awards WHERE aid IN ({$query['aids']}) and isdelete='0' and isshow='1' ORDER BY  YEAR(createdate) DESC,sort";
    $query = $this->db->query($sql);
    return $query->result_array();
}
public function index_award(){
    $result = array();
    $sql="SELECT awards.* FROM awards WHERE isdelete='0' AND isshow='1' ORDER BY  YEAR(createdate) DESC,sort";
    $query = $this->db->query($sql);
    foreach($query->result_array() as $row){
        if(count($result)<3){
            $row['works'] =$this->get_works($row['aid']);
            if($row['works']!=array()){
                foreach($row['works'] as $work){
                    array_push($result,$work);
                }
            }
        }
    }
    // print_r($result);exit;
    return @$result;
}

}
?>