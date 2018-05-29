<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Press_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->title = "title1";
            $this->name = "name1";
            $this->project = "project1";
            break;
            case 'tw':
            $this->title = "title2";
            $this->name = "name2";
            $this->project = "project2";
            break;
            case 'cn':
            $this->title = "title3";
            $this->name = "name3";
            $this->project = "project3";
            break;
        }
    }

    public function rs($year=""){
    	$result = array();
        $search = "";
        if($year!=""){
            $search = "AND YEAR(createtime) IN ($year)";
        }
        $sql = "SELECT {$this->name} as name, {$this->title} as title, {$this->project} as project, publishing.* FROM publishing where isdelete='0' and isshow='1' {$search} ORDER BY createtime DESC";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        // print_r($result);exit;
        return @$result;

    }
    public function row($url){
        $result = array();
        if($url!="0"){
            $sql = "SELECT {$this->name} as name, {$this->title} as title, {$this->project} as project, publishing.* FROM publishing WHERE isdelete='0' AND url = '{$url}'";
            $query = $this->db->query($sql);
            $row = $query->row_array();
            $row['filename'] = $this->get_imgs($row['pid']);
            array_push($result,$row);
        }
        return @$result[0];
    }

    private function get_imgs($publishingid){
        $sql ="SELECT address, type FROM publishing_img WHERE parentid='{$publishingid}' ORDER BY sort";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }
    public function get_year($start=0,$pagesize=1){
        $sql = "SELECT YEAR(createtime) AS year FROM publishing WHERE isdelete='0' and isshow='1' GROUP BY year order by YEAR(createtime) DESC limit {$start},{$pagesize}";
        $query = $this->db->query($sql);
        return $query->result_array();

    }
    public function index_press(){
        $sql="SELECT {$this->title} as title, $this->name as name, publishing.* FROM publishing WHERE isdelete='0' AND isshow = '1' ORDER BY createtime DESC limit 0,3";
        $query = $this->db->query($sql);
        $row = $query->result_array();
        return $row;
    }

}
?>