<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->left_top = "left_top1";
            $this->left_bottom = "left_bottom1";
            $this->mid_bottom = "mid_bottom1";
            $this->right_bottom = "right_bottom1";
            break;
            case 'tw':
            $this->left_top = "left_top2";
            $this->left_bottom = "left_bottom2";
            $this->mid_bottom = "mid_bottom2";
            $this->right_bottom = "right_bottom2";
            break;
            case 'cn':
            $this->left_top = "left_top3";
            $this->left_bottom = "left_bottom3";
            $this->mid_bottom = "mid_bottom3";
            $this->right_bottom = "right_bottom3";
            break;
        }
    }

    public function row(){
        $result = array();
        $sql = "SELECT {$this->left_top} as left_top, {$this->left_bottom} as left_bottom, {$this->mid_bottom} as mid_bottom, {$this->right_bottom} as right_bottom, cover_img, link1, link2, link3, link4 FROM contact WHERE cid='1'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return @$row;
    }

}
?>