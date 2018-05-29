<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function init(){
		$this->check_lan();
	}

	private function check_lan(){
		$lan = array("tw","en");
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
				$_SESSION['user_detault_locale'] = 'tw';
				header ('HTTP/1.1 301 Moved Permanently');
				header ('Location: '.SITE_URL.'tw');
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
		$this->lang->load('site',$this->uri->segment(1));   //語系文字檔
	}
	public function get_col(){
		switch($this->uri->segment(1)){
			case "tw":
			$col = array(
				"title"=>"title_tw",
				"content"=>"content_tw",
				"formats"=>"formats_tw",
				"sub_title"=>"sub_title_tw",
				"related"=>"related_tw",
				"name"=>"name_tw",
				"document"=>"document_tw",
				"education"=>"education_tw",
				"awards"=>"awards_tw",
				"exhibition"=>"exhibition_tw",
				"press"=>"press_tw",
				"address"=>"address_tw"
				);
			break;
			default:
			$col = array(
				"title"=>"title_en",
				"content"=>"content_en",
				"formats"=>"formats_en",
				"sub_title"=>"sub_title_en",
				"related"=>"related_en",
				"name"=>"name_en",
				"document"=>"document_en",
				"education"=>"education_en",
				"awards"=>"awards_en",
				"exhibition"=>"exhibition_en",
				"press"=>"press_en",
				"address"=>"address_en"
				);
			break;
		}
		return $col;
	}
}
?>