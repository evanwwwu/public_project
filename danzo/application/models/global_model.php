<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
    }

    public function init()
    {
        $this->checklogin();
    }
    
    public function chech_active($active = array()){
        if($_SESSION[ADMIN_ACTIVE]=="0"||!isset($_SESSION[ADMIN_ACTIVE])){
            header("Location:".ADMIN_URL.$_SESSION[ACTIVE_PATH][0]);
            ob_end_flush();
            exit;
        }else{
            if(!in_array($_SESSION[ADMIN_ACTIVE],$active)){
                $this->active_goto();
            }
        }
    }

    public function active_goto(){
        header("location:".ADMIN_URL.$_SESSION[ACTIVE_PATH][$_SESSION[ADMIN_ACTIVE]]);
        ob_end_flush();
        exit;
    }

    public function checklogin()
    {
        if($_SESSION[ADMIN_ACTIVE]=="0"||!isset($_SESSION[ADMIN_ACTIVE]))
        {
            header("location:".SITE_URL."admin/login");
            ob_end_flush();
            exit;
        }
    }

    public function sql_save($table_name='', $fields=array("PK"=>""),$where="")
    {
        $sql = "select * from {$table_name} where {$where}";
        $query = $this->db->query($sql);
        if($query->num_rows()==0)
        {
            $grids = "(";
                $vals = "(";
                    foreach($fields as $key => $val)
                    {
                        if($key!="PK"&&$key!="PK_val")
                        {
                         $grids .= "`".$key."`,";
                         $vals .= "'".$val."',";
                     }
                 }
                 if($grids!="(")
                 {
                    $grids =mb_substr($grids,0,mb_strlen($grids)-1,"utf8").")";
$vals =mb_substr($vals,0,mb_strlen($vals)-1,"utf8").")";
$sql = "INSERT INTO {$table_name} {$grids} VALUES {$vals}";
$query = $this->db->query($sql);
return $this->db->insert_id();
}
else
{
    return 0;
}
}
else
{
    $set = "";
    foreach($fields as $key => $val)
    {
        if($key!="PK"&&$key!="PK_val"&&$key!=$fields["PK"])
        {
            $set .= "`".$key."`='".$val."',";
        }
    }
    $set =mb_substr($set,0,mb_strlen($set)-1,"utf8");
    if($set!="")
    {
        $sql = "UPDATE {$table_name} SET {$set} WHERE {$where}";
        $query = $this->db->query($sql);
    }
    $sql = "select * from {$table_name} where {$where}";
    $query = $this->db->query($sql);
    $row = $query->row_array();
    return $row[$fields["PK"]];
}
}

public function sql_del($table_name="",$where=""){
    $sql = "DELETE FROM {$table_name} WHERE {$where}";
    $this->db->query($sql);
}

public function search_tag()
{
    $terms = $_GET['term'];
    $sql = "select name as value from tags where name like '%{$terms}%' order by name";
    $query = $this->db->query($sql);
    return $query->result_array();
}

public function get_tag($ids="")
{
    $tag_name="";
    if($ids!="")
    {
        $sql = "SELECT GROUP_CONCAT(name) AS tag_name FROM tags WHERE id IN ({$ids}) ORDER BY FIELD(id,{$ids})";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        $tag_name = $result["tag_name"];
    }
    return $tag_name;
}
}
?>