<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

    function __construct(){
        parent::__construct();        
        $this->post = $this->input->post(null,true);
    }

    public function register_email(){
        $fields = $this->db->list_fields('members');
        $fields = implode(',',$fields);
        $member_id = 0;
        $sql = "select id from members where email='{$this->post['email']}' and active=1";
        $query = $this->db->query($sql);
        if ($query->num_rows==0){ //沒有已啟用EMAIL
            $sql = "select id from members where email='{$this->post['email']}' and active=0";
            $query = $this->db->query($sql);
            if ($query->num_rows>0){ //有尚未啟用的EMAIL
                $row = $query->row_array();
                $member_id = $row['id'];
            }
            else{
                $form = json_encode($this->post);
                $sql = "insert into members({$fields}) values(NULL,'{$this->post['email']}','0','0','{$this->post['pwd']}','0','{$form}','".date('Y-m-d H:i:s')."','','','')";
                $this->db->query($sql);
                $member_id = $this->db->insert_id();
            }
        }
        return $member_id;
    }

public function register_fb(){
    $member_id = 0;
    if(!$this->login_fb())
    {
        $fields = $this->db->list_fields('members');
        $fields = implode(',',$fields);
        $sql = "select id from members where email='{$this->post['email']}' and active=1";
        $query = $this->db->query($sql);
        if ($query->num_rows==0){ //沒有已啟用EMAIL
            $sql = "select id from members where email='{$this->post['email']}' and active=0";
            $query = $this->db->query($sql);
            if ($query->num_rows>0){ //有尚未啟用的EMAIL
                $row = $query->row_array();
                $member_id = $row['id'];
                $sql = "update members set fbid='{$this->post['fbid']}' and active=1 where id='{$member_id}'";
                $this->db->query($sql);
            }
            else{
                $form = json_encode($this->post);
                $sql = "insert into members({$fields}) values(NULL,'{$this->post['email']}','0','0','{$this->post['pwd']}','1','{$form}','".date('Y-m-d H:i:s')."','','','')";
                $this->db->query($sql);
                $member_id = $this->db->insert_id();
            }
        }
        else{
            $sql = "update members set fbid='{$this->post['fbid']}' where email='{$this->post['email']}'";
            $this->db->query($sql);
        }
        $sql = "select id from members where email='{$this->post['email']}' and active=1";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $_SESSION['user_login_id'] = $row['id'];
        $_SESSION['user_login_email'] = $row['email'];
    }
    echo 'location.reload();';
}

public function get_row($member_id){
   $sql = "select email,info from members where id='{$member_id}'";
   $query = $this->db->query($sql);
   $row = array();
   if ($query->num_rows>0){
    $row = $query->row_array();
}
return $row;
}

public function email_get_row($member_email){
   $sql = "select email,createtime,pwd from members where email='{$member_email}'";
   $query = $this->db->query($sql);
   $row = array();
   if ($query->num_rows>0){
    $row = $query->row_array();
}
return $row;
}


public function get_country_code($selected='Taiwan',$type=''){
   $sql = "select * from country_codes order by name";
   $query = $this->db->query($sql);
   $html = '';
   if ($type=='mobile'){
        foreach($query->result_array() as $row){
            if ($row['nicename']==$selected){
                $html .= '<option value="'.$row['iso'].'" selected>'.$row['nicename'].' +'.$row['phonecode'].'</option>';
            }
            else{
                $html .= '<option value="'.$row['iso'].'">'.$row['nicename'].' +'.$row['phonecode'].'</option>';
            }
        }
    }
    elseif($type=='address'){
        foreach($query->result_array() as $row){
            if ($row['nicename']==$selected){
                $html .= '<option value="'.$row['iso'].'" selected>'.$row['nicename'].'</option>';
            }
            else{
                $html .= '<option value="'.$row['iso'].'">'.$row['nicename'].'</option>';
            }
        }
    }
    return $html;
}

public function update_profile(){
    $member_id = 0;
    $sql = "select * from members where email='{$this->post['email']}'";
    $query = $this->db->query($sql);
    if ($query->num_rows>0){
        $row = $query->row_array();
        $member_id = $row['id'];
        $form = json_encode($this->post);
        $sql = "update members set pwd='{$this->post['pwd']}',info='{$form}' where id='{$member_id}'";
        $sql = str_replace("\\u", "\\\u", $sql);
        $this->db->query($sql);
    }
    return $member_id;
}

public function login_fb(){
    $sql = "select * from members where email='{$this->post['email']}' and fbid='{$this->post['fbid']}' and active=1";
    $query = $this->db->query($sql);
    $login = false;
    if ($query->num_rows>0){
        $row = $query->row_array();
        $_SESSION['user_login_id'] = $row['id'];
        $_SESSION['user_login_email'] = $row['email'];
        $login = true;
    }
    return $login;
}

public function login_email(){
    $sql = "select * from members where email='{$this->post['email']}' and pwd='{$this->post['password']}' and active=1";
    $query = $this->db->query($sql);
    $login = false;
    if ($query->num_rows>0){
        $row = $query->row_array();
        $_SESSION['user_login_id'] = $row['id'];
        $_SESSION['user_login_email'] = $row['email'];
        $login = true;
    }
    return $login;
}

public function logout(){
    $_SESSION['user_login_id'] = 0;
    $_SESSION['user_login_email'] = '';
}
public function forgotPass(){
    $sql ="SELECT * FROM members WHERE email='{$this->post['email']}' AND active='1'";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
        $rand = rand(10000,99999);
        $sql = "UPDATE members SET pwd='{$rand}' WHERE email='{$this->post['email']}'";
        $query = $this->db->query($sql);
        return $rand;
    }else{
        return 0;
    }
}

}
?>