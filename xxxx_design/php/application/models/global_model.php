	<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
	}

	public function controller_init(){
		$this->check_lan();
		$this->lang->load('xyi',$this->uri->segment(1));
		$_SESSION['lang'] = $this->uri->segment(1);
		$data['site_js'] = $this->load->view("site_js_view",NULL,TRUE);
		$this->load->helper('my_file_helper');
		$data['work_tags'] = $this->work_tag();
		$data['work_tag']='';
		return $data; 
	}

	private function check_lan(){
		ob_start();
		$lan = array("tw","cn","en");
		if(!in_array($this->uri->segment(1),$lan)){
			$browser_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
			switch(strtolower($browser_lang[0])){
				case 'zh-tw':
				$_SESSION['user_detault_locale'] = 'tw';
				header ('HTTP/1.1 301 Moved Permanently');
				header ('Location: '.SITE_URL.'tw');
				exit;
				break;
				case 'zh-cn':
				$_SESSION['user_detault_locale'] = 'cn';
				header ('HTTP/1.1 301 Moved Permanently');
				header ('Location: '.SITE_URL.'cn');
				exit;
				break;
				default:
				$_SESSION['user_detault_locale'] = 'en';
				header ('HTTP/1.1 301 Moved Permanently');
				header ('Location: '.SITE_URL.'en');
				exit;
				break;
			}
		}
	}

	public function work_tag(){
		switch($this->uri->segment(1)){
			case 'en':
			$this->title = "title";
			break;
			case 'tw':
			$this->title = "title2";
			break;
			case 'cn':
			$this->title = "title3";
			break;
		}
		$sql = "SELECT {$this->title} as title_name, workstype.* FROM workstype ORDER BY sort";
		$query = $this->db->query($sql);
		$query = $query->result_array();
		return $query;
	}

}
?>