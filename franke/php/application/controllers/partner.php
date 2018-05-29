<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["menus"] = $this->main_model->get_menu();
		$this->data["controller_addr"]  = "partner";
		$this->load->model("partner_model");
		if (!isset($_SERVER['PHP_AUTH_USER'])) {
			header("WWW-Authenticate: Basic realm=\"franke leesintl\"");
			header("HTTP/1.0 401 Unauthorized");
			exit;
		} else {
			if (isset($_SERVER['PHP_AUTH_USER'])&&($_SERVER['PHP_AUTH_USER'] == 'admin') && ($_SERVER['PHP_AUTH_PW'] == 'leesintlpass')) {
			} else {
				header("WWW-Authenticate: Basic realm=\"franke leesintl\"");
				unset($_SERVER['PHP_AUTH_USER']);
				header("HTTP/1.0 401 Unauthorized");
				exit;
			}
		}
	}

	public function index($area=""){
		$this->data["area"] = $this->partner_model->get_area($area);
		switch($area){
			case "north":
			$this->data["meta"] = array(
				"title"=>"瑞士Franke北部廚具夥伴",
				"keyword"=>"Franke,瑞士Franke,Franke台灣,廚具公司,廚具店,櫥櫃,系統櫥櫃,進口廚具,進口櫥櫃,德國廚具,義大利廚具,Franke經銷商,Franke夥伴專區,台北廚具公司,新北廚具公司,桃園廚具公司,新竹廚具公司",
				"des"=>"瑞士Franke與台灣各大廚具公司相互配合，提供台灣消費者最佳的廚房體驗。Franke與台北市廚具公司、新北市廚具公司、桃園廚具公司、新竹廚具公司、桃園廚具公司、台中廚具公司、台南廚具公司、高雄廚具公司皆有配合與提供服務，保障您家中Franke產品的使用與維護。");
			break;
			case "west":
			$this->data["meta"] = array(
				"title"=>"瑞士Franke中部廚具夥伴",
				"keyword"=>"Franke,瑞士Franke,Franke台灣,廚具公司,廚具店,櫥櫃,系統櫥櫃,進口廚具,進口櫥櫃,德國廚具,義大利廚具,Franke經銷商,Franke夥伴專區,台中廚具公司",
				"des"=>"瑞士Franke與台灣各大廚具公司相互配合，提供台灣消費者最佳的廚房體驗。Franke與台北市廚具公司、新北市廚具公司、桃園廚具公司、新竹廚具公司、桃園廚具公司、台中廚具公司、台南廚具公司、高雄廚具公司皆有配合與提供服務，保障您家中Franke產品的使用與維護。");
			break;
			case "south":
			$this->data["meta"] = array(
				"title"=>"瑞士Franke南部廚具夥伴",
				"keyword"=>"Franke,瑞士Franke,Franke台灣,廚具公司,廚具店,櫥櫃,系統櫥櫃,進口廚具,進口櫥櫃,德國廚具,義大利廚具,Franke經銷商,Franke夥伴專區,台南廚具公司,高雄廚具公司",
				"des"=>"瑞士Franke與台灣各大廚具公司相互配合，提供台灣消費者最佳的廚房體驗。Franke與台北市廚具公司、新北市廚具公司、桃園廚具公司、新竹廚具公司、桃園廚具公司、台中廚具公司、台南廚具公司、高雄廚具公司皆有配合與提供服務，保障您家中Franke產品的使用與維護。");
			break;
			case "east":
			$this->data["meta"] = array(
				"title"=>"瑞士Franke東部廚具夥伴",
				"keyword"=>"Franke,瑞士Franke,Franke台灣,廚具公司,廚具店,櫥櫃,系統櫥櫃,進口廚具,進口櫥櫃,德國廚具,義大利廚具,Franke經銷商,Franke夥伴專區,宜蘭廚具公司,花蓮廚具公司",
				"des"=>"瑞士Franke與台灣各大廚具公司相互配合，提供台灣消費者最佳的廚房體驗。Franke與台北市廚具公司、新北市廚具公司、桃園廚具公司、新竹廚具公司、桃園廚具公司、台中廚具公司、台南廚具公司、高雄廚具公司皆有配合與提供服務，保障您家中Franke產品的使用與維護。");
			break;
		}
		$this->data["rs"] = $this->partner_model->get_partner_rs($this->data["area"]["id"]);
		$this->data['page_view'] = $this->load->view('partner/list_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function store($id=0){
		$this->data["row"] = $this->partner_model->get_partner_row($id);
		switch ($this->data["row"]["type_id"]) {
			case '1':
			$title = "北區";
			break;
			case '2':
			$title = "中區";
			break;
			case '3':
			$title = "南區";
			break;
			case '4':
			$title = "東區";
			break;
			default:
			$title = "";
			break;
		}
		$this->data["meta"] = array(
			"title"=>"瑞士Franke".$title."廚具夥伴",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,廚具公司,廚具店,櫥櫃,系統櫥櫃,進口廚具,進口櫥櫃,德國廚具,義大利廚具,Franke經銷商,Franke夥伴專區,宜蘭廚具公司,花蓮廚具公司",
			"des"=>mb_substr($this->main_model->DeleteHtml($this->data["row"]["content"]), 0, 120, 'UTF-8'));
		$this->data["products"] = $this->get_product_rec(json_decode($this->data["row"]["product_ids"]));
		$this->data['page_view'] = $this->load->view('partner/detail_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function get_product_rec($ids=""){
		$this->load->model("product_model");
		$datas = $this->product_model->get_product_rec($ids);
		return $datas;
	}
}