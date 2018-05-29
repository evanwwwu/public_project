<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Works_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->title = "title1";
            $this->type_title = "title";
            $this->customer = "customer1";
            $this->designer = "designer1";
            $this->codesigner = "codesigner1";
            $this->place = "place1";
            $this->material = "material1";
            $this->note = "note1";
            break;
            case 'tw':
            $this->title = "title2";
            $this->type_title = "title2";
            $this->customer = "customer2";
            $this->designer = "designer2";
            $this->codesigner = "codesigner2";
            $this->place = "place2";
            $this->material = "material2";
            $this->note = "note2";
            break;
            case 'cn':
            $this->title = "title3";
            $this->type_title = "title3";
            $this->customer = "customer3";
            $this->designer = "designer3";
            $this->codesigner = "codesigner3";
            $this->place = "place3";
            $this->material = "material3";
            $this->note = "note3";
            break;
        }
    }
    public function rs($start=0,$pagesize=10,$tag=""){
        $result = array();
        $search = "";
        if($tag!=""){
            $search = "AND typeid = '{$tag}'";
        }
        $sql = "SELECT {$this->title} as title,works.* FROM works WHERE isdelete='0' AND isshow='1' {$search} ORDER BY sort limit {$start},{$pagesize}";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $row['type'] = $this->get_type($row['typeid']);
            array_push($result,$row);
        }
        return @$result;
    }

    public function row($title=""){
        $result = array();
        if($title!=""){
            $sql = "SELECT {$this->title} as title, {$this->customer} as customer, {$this->designer} as designer, {$this->codesigner} as codesigner, {$this->place} as place, {$this->material} as material, {$this->note} as note, works.* FROM works WHERE isdelete='0' AND url = '{$title}'";
            $query = $this->db->query($sql);
            $row = $query->row_array();
            $row['type'] = $this->get_type($row['typeid']);
            $row['filename'] = $this->get_imgs($row['workid']);
        }
        return @$row;
    }

    public function get_typeid($title=''){
        $sql = "SELECT * FROM workstype WHERE url='{$title}'";
        $query = $this->db->query($sql);
        $query = $query->row_array();
        return $query;
    }

    public function get_typeid2($id=''){
        $sql = "SELECT * FROM workstype WHERE typeid='{$id}'";
        $query = $this->db->query($sql);
        $query = $query->row_array();
        return $query;
    }

    public function index_works(){
        $sql="SELECT {$this->title} as title,works.* FROM works WHERE isdelete='0' AND isshow = '1' ORDER BY sort limit 0,1";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $row['type'] = $this->get_type($row['typeid']);
        $row['filename'] = $this->get_imgs($row['workid']);
        return $row;
    }

    private function get_type($type_id){
        $sql = "SELECT {$this->type_title} as title FROM workstype WHERE typeid = {$type_id}";
        $query = $this->db->query($sql);
        $query = $query->row_array();
        return $query['title'];
    }

    private function get_imgs($worksid){
        $sql ="SELECT filename FROM worksupload WHERE parentid='{$worksid}'";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $filename = array();
            $query = $query->result_array();
            foreach($query as $row){
                array_push($filename,$row['filename']);
            }
            return $filename;
        }
    }
}
?>