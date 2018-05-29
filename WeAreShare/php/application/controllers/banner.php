<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('banner_model','model');
		$this->load->model('users_model');
		$this->load->model('tags_model');
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
	}

	private function check_login($ajax=0){
		if ($_SESSION[ADMIN_SESSION] == 0){
			if ($ajax==0){
				header('location:'.ADMIN_URL);exit;
			}
			else{
				echo 'location="'.ADMIN_URL.'"';exit;
			}
		}
	}

	public function index(){
		$this->check_login();
		$this->get = $this->input->get(NULL,TRUE);
		switch($this->get['type'])
		{
			case "1":
			 $t_name="背景";
			break;
			case "2":
			 $t_name="首頁";
			break;
			case "3":
			 $t_name="清單頁";
			break;
			case "4":
			 $t_name="圖片盒";
			break;
			case "5":
			 $t_name="側欄";
			break; 
		}

		$data['page_title'] = '廣告 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'banner';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['data'] = $this->model->rs02();
		$data['h2'] = '廣告 - '.$t_name;
		$this->load->view('banner_view',$data);
	}

	public function record($type=1,$id=0){
		$this->check_login();

		switch($type)
		{
			case "1":
			 $t_name="背景";
			break;
			case "2":
			 $t_name="首頁";
			break;
			case "3":
			 $t_name="清單頁";
			break;
			case "4":
			 $t_name="圖片盒";
			break;
			case "5":
			 $t_name="側欄";
			break; 
		}

		$data['page_title'] = '廣告編輯 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'banner';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '廣告編輯 - '.$t_name;
		$data['data'] = $this->model->row($id);
		$data['size'] = $this->model->get_size();
		$data['us_id'] = $data['data']['id'];
		$data['type'] = $type;
		$multimedia=explode(".",$data['data']['multimedia']);
		if($multimedia[0]!=""){
			switch($multimedia["1"])
			{
				case "swf":
					$data['m_type'] = "1";
				break;
				default:
					$data['m_type'] = "2";
				break;
			}
		}
		else{
			$data['m_type'] = "0";
		}		
		$this->load->view('banner_record_view',$data);
	}

	public function edit($type=1,$id=0){
		$this->check_login();

		switch($type)
		{
			case "1":
			 $t_name="背景";
			break;
			case "2":
			 $t_name="首頁";
			break;
			case "3":
			 $t_name="清單頁";
			break;
			case "4":
			 $t_name="圖片盒";
			break;
			case "5":
			 $t_name="側欄";
			break; 
		}

		$data['page_title'] = '廣告編輯 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'banner';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '廣告編輯 - '.$t_name;
		$data['data'] = $this->model->row($id);
		$data['size'] = $this->model->get_size();
		$data['us_id'] = $data['data']['id'];
		$data['type'] = $type;
		$multimedia=explode(".",$data['data']['multimedia']);
		if($multimedia[0]!=""){
			switch($multimedia["1"])
			{
				case "swf":
					$data['m_type'] = "1";
				break;
				default:
					$data['m_type'] = "2";
				break;
			}
		}
		else{
			$data['m_type'] = "0";
		}		
		$this->load->view('banner_edit_view',$data);
	}

	public function publish(){
		$this->check_login(1);
		$this->model->publish();
	}	

	public function first(){
		$this->check_login(1);
		$this->model->first();
	}	

	public function save(){
		$this->check_login(1);
		$id = $this->model->save();
		
	}
	public function delete_cover(){
		$this->check_login(1);
		$this->model->delete_cover();
		echo '$("#cover_preview").empty();';
	}
	public function delete_multimedia(){
		$this->check_login(1);
		$this->model->delete_multimedia();
		echo '$("#multimedia_preview").empty();';
	}
	public function check_first(){
		$this->check_login(1);
		$max = 9999999;  //可同時存在數量
		$this->model->check_first($max);
	}	
	public function del($ajax=1){
		$this->check_login(1);
		$this->model->del();
		if($ajax=='1'){
			echo '$("#row_'.$this->post['id'].'").remove();';	
		}
	}
	public function sort(){
		$this->model->sort();
	}
}