<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Model {

    function __construct()
    {
        parent::__construct();
		$sql = "select id from admin_user where username='{$this->post['username']}' and userpwd='{$this->post['password']}' and active=1";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			$row = $query->row();
			$_SESSION[ADMIN_SESSION] = $row->id;
			$_SESSION['user_login_id'] = $row->id;
			echo 'location="'.ADMIN_URL.'posts";';
		}
		else{
			echo 'alert("login error!");';
		}
    }
}
?>