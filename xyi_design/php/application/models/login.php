<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
		
		$sql = "SELECT * FROM users WHERE userid='{$this->post['username']}' AND userpwd='{$this->post['password']}' ";	
		$query = $this->db->query($sql);	
		if($query->num_rows()>0){
		$row = $query->row();
		$_SESSION[ADMIN_SESSION] = $row->userid;
		$_SESSION[ADMIN_ACTIVE] = $row->auth;
			echo 'location="'.ADMIN_URL.'works"';	
		}
		else{
			echo "alert('登入失敗');";
		}

    }
}
?>