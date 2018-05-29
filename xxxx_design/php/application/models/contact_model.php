<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        switch($this->uri->segment(1)){
            case 'en':
            $this->title = "title1";
            $this->left_top = "left_top1";
            $this->right_top = "right_top1";
            $this->center_top = "center_top1";
            break;
            case 'tw':
            $this->title = "title2";
            $this->left_top = "left_top2";
            $this->right_top = "right_top2";
            $this->center_top = "center_top2";
            break;
            case 'cn':
            $this->title = "title3";
            $this->left_top = "left_top3";
            $this->right_top = "right_top3";
            $this->center_top = "center_top3";
            break;
        }
    }

    public function row(){
        $result = array();
        $sql = "SELECT {$this->left_top} as left_top, {$this->right_top} as right_top, {$this->center_top} as center_top, {$this->title} as title, cover_img FROM contact WHERE cid='1'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return @$row;
    }

}
?>