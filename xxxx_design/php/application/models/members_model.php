<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->profession = "profession1";
            $this->name = "name1";
            $this->content = "content1";
            break;
            case 'tw':
            $this->profession = "profession2";
            $this->name = "name2";
            $this->content = "content2";
            break;
            case 'cn':
            $this->profession = "profession3";
            $this->name = "name3";
            $this->content = "content3";
            break;
        }
    }

    public function rs($start=0,$pagesize=8){
    	$result = array();
    	$sql = "SELECT {$this->profession} as profession, {$this->name} as name, {$this->content} as content, members.* FROM members WHERE isdelete='0' and isshow='1' ORDER BY sort limit {$start},{$pagesize}";
    	$query = $this->db->query($sql);
    	foreach($query->result_array() as $row){
            array_push($result,$row);
        }
        return @$result;
    }

}
?>