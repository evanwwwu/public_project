<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->top = "top1";
            $this->bottom = "bottom1";
            break;
            case 'tw':
            $this->top = "top2";
            $this->bottom = "bottom2";
            break;
            case 'cn':
            $this->top = "top3";
            $this->bottom = "bottom3";
            break;
        }
    }

    public function row(){
        $result = array();
        $sql = "SELECT  {$this->top} as top, {$this->bottom} as bottom, cover_img FROM service WHERE serviceid='1'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return @$row;
    }
}
?>