<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function get_menu(){
		$menus = array("sink","faucet");
		$this->load->model("product_model");
		foreach($menus as $kk=>$main){
			$this->product_model->url = $main;
			$menus[$main]["main_id"] = $this->product_model->get_main_id();
			$menus[$main]["submenu"] = $this->product_model->get_menu("submenu");
			$menus[$main]["feature"] = $this->product_model->get_menu("feature");
		}
		return $menus;
	}

	public function send_mail($username="",$title="",$msg="")
	{
		$config = Array(
			'mailtype'  => 'html', 
			'charset'   => 'utf-8'
			);
// franke@leesintl.com.tw
		$this->load->library('email',$config);
		$this->email->from("franke@leesintl.com","FRANKE");
		$this->email->to($username);
		$this->email->subject($title);
		$this->email->message($msg);
		if($this->email->send())
		{
			return array("status"=>true);
		}
		else
		{
			return array("status"=>false,"error"=>$this->email->print_debugger());
		}
	}
	public function product_main($mid=0){
		$sql = "SELECT * FROM product_main WHERE id = '{$mid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result["title"];
	}
	public function get_url($mid=0){
		$sql = "SELECT * FROM product_main WHERE id = '{$mid}'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return @$result["url"];
	}
	public function save_histoy($mid=0,$pid=0){
		$sql = "INSERT INTO member_history VALUES ('{$mid}','{$pid}','".date("Y-m-d H:i:s")."')";
		$query = $this->db->query($sql);
	}
	public function DeleteHtml($str) 
	{
		$str = trim($str); 
		$str = strip_tags($str,"");
		$str = str_replace("&nbsp;","",$str);
		$str = str_replace("\t","",$str);
		$str = str_replace("\r\n","",$str); 
		$str = str_replace("\r","",$str); 
		$str = str_replace("\n","",$str); 
		$str = str_replace(" "," ",$str); 
		return trim($str);
	}

}
?>