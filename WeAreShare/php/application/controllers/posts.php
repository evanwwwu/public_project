<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('posts_model','model');
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
		$data['page_title'] = '文章 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'posts';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '文章';
		$data['data'] = $this->model->rs02();
		$this->load->view('posts_view',$data);
	}

	public function edit($id=0){
		$this->load->model('users_model');
		$this->check_login();
		$data['page_title'] = '文章編輯 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'posts';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '文章編輯';
		$data['data'] = $this->model->row($id);
		$data['terms'] = $this->model->get_terms();
		$data['us'] = $this->users_model->rs();
		$this->load->model('global_model');
		$data['hot_tag'] = $this->global_model->tag_count();
		$data['us_id'] = $data['data']['ID'];
		$this->load->view('posts_edit_view',$data);
	}
	function toAscii($str, $replace=array(), $delimiter='-') {
		if( !empty($replace) ) {
			$str = str_replace((array)$replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//ignore', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}
	function cleanURL($string)
	{
	    $url = str_replace("'", '', $string);
	    $url = str_replace('%20', ' ', $url);
	    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url); // substitutes anything but letters, numbers and '_' with separator
	    $url = trim($url, "-");
	    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);  // you may opt for your own custom character map for encoding.
	    $url = strtolower($url);
	    $url = preg_replace('~[^-a-z0-9_]+~', '', $url); // keep only letters, numbers, '_' and separator
	    return $url;
	}

	public function images($id=0){
		$this->check_login();
		$data['page_title'] = '照片編輯 - ' . SITE_TITLE_ADMIN;
		$data['menu_selected'] = 'posts';
		$data['header'] = $this->load->view('header_view',$data,TRUE);
		$data['footer'] = $this->load->view('footer_view',NULL,TRUE);
		$data['menu'] = $this->load->view('menu_view',$data,TRUE);
		$data['h2'] = '照片編輯';
		$data['data'] = $this->model->row($id);
		$data['terms'] = $this->model->get_terms();
		$data['images'] = $this->model->get_images($id);
		$this->load->model('global_model');
		$data['hot_tag'] = $this->global_model->tag_count();
		$this->load->view('images_edit_view',$data);
	}

	public function add2rec($id,$id2){
		echo $this->model->add2rec($id,$id2);
	}

	public function search_tag(){
		$tags = $this->model->get_tags();
		echo json_encode($tags);
	}

	public function search_posts($id){
		$tags = $this->model->get_posts($id);
		echo json_encode($tags);
	}

	public function save(){
		$this->check_login(1);
		$id = $this->model->save();
		
	}

	public function publish(){
		$this->check_login(1);
		$this->model->publish();
	}

	public function del(){
		$this->check_login(1);
		$this->model->del();
		echo '$("#row_'.$this->post['id'].'").remove();';
	}

	public function delete_cover(){
		$this->check_login(1);
		$this->model->delete_cover();
		echo '$("#cover_preview").empty();';
	}

	public function delete_gallery(){
		$this->check_login(1);
		$this->model->delete_gallery();
		echo '$("#cover_preview").empty();';
	}

	public function delete_tag(){
		$this->check_login(1);
		$this->model->delete_tag();
	}

	public function delete_recommend(){
		$this->check_login(1);
		$this->model->delete_recommend();
	}

	public function sort(){
		$this->check_login(1);
 		$this->model->sort();
	}

	public function gallery_sort(){
		$this->check_login(1);
		$this->model->gallery_sort();
	}

	public function getrec($id=0){
	  echo json_encode($this->model->get_recommend($id));
	}
}