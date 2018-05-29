<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$sql = "SELECT * FROM admin_user WHERE username=? AND password=? AND active <> '0'";
		$query = $this->db->query($sql,array($this->post["username"],$this->post["password"]));
		if($query->num_rows()>0){
			$row = $query->row();
			$_SESSION[ADMIN_NAME] = $row->username;
			$_SESSION[ADMIN_ACTIVE] = $row->active;
			echo 'location="'.ADMIN_URL.'"';
		}
		else{
			echo "$('input[name=".$this->security->get_csrf_token_name()."]').val('".$this->security->get_csrf_hash()."');";
			echo "alert('登入失敗');";
		}

	}
}
?>