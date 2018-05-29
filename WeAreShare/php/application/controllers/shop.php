<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->data['main_banner'] = $this->global_model->get_main_banner();
		$this->data['side_banner'] = $this->global_model->get_side_banner();
		$this->data['first_banner'] = $this->global_model->get_first_banner();
		$this->load->model('member_model');
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		$this->data['member_data'] = array();
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
		$this->load->model('shop/shop_process');
	}

	public function index(){
		$this->data['menu_selected'] = "shop";

		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array('shop');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL.'shop';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		
		//獨立區塊start
		$this->data['ProductList'] = $this->shop_process->ProductList(0);
		
		//獨立區塊end
		
		$this->data = $this->global_model->site_init2(1,$this->data);
		$this->load->view('old/shop/shop_view',$this->data);
	}
	public function ajax_product(){
		
		$this->data['ProductList'] = $this->shop_process->ProductList($_POST['page']);
		
		$data = $this->load->view('old/shop/template/product_list',$this->data,true);
		
		echo json_encode(array("count"=>count($this->data['ProductList']),"data"=>$data));
	}
	public function product_detial($Id){
		$this->data['menu_selected'] = "shop";
	
		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array('shop');
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL.'shop';
		$this->data['meta']['cover_img'] = 'FB.jpg';
		//獨立區塊start
		$this->data['ProductDetial'] = $this->shop_process->ProductDetial($Id);
		//獨立區塊end
		
		$this->data = $this->global_model->site_init2(1,$this->data);
		$this->load->view('old/shop/product_detial',$this->data);
	}
	public function recommend($title=''){
		$this->load->model('posts_model');
		$data = $this->posts_model->row($title);
		$data = $this->posts_model->get_recommend($data['ID']);
		$result = array();
		foreach($data as $row){
			$item = array();
			$item['url'] = SITE_URL . 'shop/' . $row['post_name'];
			$item['img'] = IMG_URL . 'upload/' . $row['cover_img'];
			$item['date'] = $row['display_date'];
			$item['title'] = $row['post_title'];
			array_push($result,$item);
		}
		echo count($result)==0?"":json_encode($result);
	}
}