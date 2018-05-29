<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data["controller_addr"] = "index";
		$this->data["menus"] = $this->main_model->get_menu();
	}

	public function index()
	{
		$this->data["meta"] = array("title"=>"瑞士Franke台灣官方網站 總代理-佳群貿易","keyword"=>"Franke,瑞士Franke,Franke台灣,franke水槽, franke不鏽鋼水槽, franke結晶花崗石水槽, franke結晶石水槽,franke龍頭,franke淨水器,franke濾水器,franke生飲機,franke家電,franke烤箱,franke咖啡機,franke排油煙機,franke電陶爐,franke感應爐,franke抽油煙機","des"=>"瑞士Franke家用廚房設備，提供頂級304 18/10不鏽鋼水槽、結晶花崗石水槽(結晶石)、水龍頭、淨水器(濾水器生飲機)排油煙機、火爐、電陶爐、感應爐、烤箱、咖啡機等全方位產品與服務。佳群貿易矢志藉由國外一流的設計、最先進的技術開拓國人的視野，提升生活品味。");
		$this->load->model("home_model");
		$this->data["banners"] = $this->home_model->get_banner_rs();
		$this->data["products"] = $this->home_model->get_product();
		$this->data["features"] = $this->home_model->get_feature_rs();
		$this->data["apps"] = $this->home_model->get_appliance_rs();
		$this->data['page_view'] = $this->load->view('index_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}
