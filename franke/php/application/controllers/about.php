<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->data["controller_addr"] = "about";
		$this->data["menus"] = $this->main_model->get_menu();
	}

	public function franke()
	{
		$this->data["meta"] = array(
			"title"=>"瑞士Franke世界的廚房",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,結晶石水槽,結晶花崗石水槽,不鏽鋼水槽,水槽,龍頭,水龍頭,淨水器,濾水器,生飲機, 烤箱,爐具,抽油煙機,咖啡機",
			"des"=>"Franke成立於西元1911年的瑞士。100多年來Franke發展至今已成為橫跨全球五大洲40餘國，擁有64家分支機構的大型跨國集團。Franke產品領域廣闊主要產品包含烤箱、爐具、抽油煙機、咖啡機、不鏽鋼水槽、結晶花崗石(結晶石)水槽、水龍頭、淨水器(濾水器生飲機)。");
		$this->data['page_view'] = $this->load->view('about/franke_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function steel()
	{
		$this->data["meta"] = array(
			"title"=>"瑞士Franke頂級AISI 304 18/10不鏽鋼水槽、龍頭、淨水器",
			"keyword"=>"不鏽鋼,Franke不鏽鋼,AISI 304 18/10不鏽鋼,304不鏽鋼",
			"des"=>"");
		$this->data['page_view'] = $this->load->view('about/steel_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function leesintl(){
		$this->data["meta"] = array(
			"title"=>"佳群貿易有限公司 數十年的堅持",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,佳群貿易,佳群貿易有限公司,paini,義大利paini,日本toyo,toyo,carron,carron Phoenix",
			"des"=>"擁有40年歷史的佳群貿易 主代理進口:瑞士Franke廚房烤箱、爐具、抽油煙機、咖啡機、不鏽鋼水槽、結晶花崗石(結晶石)水槽、水龍頭、淨水器(濾水器生飲機)、義大利Paini水龍頭、日本TOYO Aluminuim K.K.、日本第一物產有限會社-群青在台業務。");
		$this->data['page_view'] = $this->load->view('about/leesintl_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}
