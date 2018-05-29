<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faucet extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["menus"] = $this->main_model->get_menu();
		$this->data["controller_addr"]  = "faucet";
		$this->load->model("product_model");
		$this->product_model->url = "faucet";
		$this->data["h2"] = "龍頭";
	}

	public function products(){
		$this->data["meta"] = array(
			"title"=>"瑞士Franke頂級進口龍頭 台灣總代理-佳群貿易",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,franke水龍頭,franke不銹鋼龍頭, franke伸縮龍頭, franke濾水器龍頭, franke淨水器龍頭, franke生飲機龍頭,水龍頭,進口龍頭",
			"des"=>"瑞士Franke家用廚房設備，提供頂級304 18/10不鏽鋼水槽、結晶花崗石水槽(結晶石)、水龍頭、淨水器(濾水器生飲機)排油煙機、火爐、電陶爐、感應爐、烤箱、咖啡機等全方位產品與服務。佳群貿易矢志藉由國外一流的設計、最先進的技術開拓國人的視野，提升生活品味。");
		$this->data["filter_id"] = explode(",",@$this->get["filter"]);
		$this->data["banners"] = $this->product_model->get_banner_rs();
		$this->data["filters"] = $this->product_model->get_filters();
		$this->data["ads"] = $this->product_model->get_ad_rs();
		$this->data["rs"] = $this->product_model->get_product_rs();
		if(count($this->data["ads"])>0){
			// if(floor(count($this->data["rs"])/count($this->data["ads"]))==0){
			// 	$this->data["ad_scale"] = 1;
			// }
			// else{
			// 	$this->data["ad_scale"] = floor(count($this->data["rs"])/count($this->data["ads"]));
			// }
			$this->data["ad_scale"] = 4;
		}
		else{
			$this->data["ad_scale"] = 0;
		}
		$this->data['page_view'] = $this->load->view('product/list_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function detail($id=0){
		$this->data['row'] = $this->product_model->get_product($id);
		$this->data["de_part"] = $this->product_model->get_part_rs(@$this->data["row"]["parts"]);
		$this->data["sp_part"] = $this->product_model->get_part_rs(@$this->data["row"]["sp_parts"]);
		$parts_select= json_decode($this->data["row"]["parts_select"]);
		$this->data["parts_select"] = array();
		if(count($parts_select)>0){
			foreach($parts_select as$key => $select){
				$parts = $select->sel_parts;
				$parts = json_encode($parts);
				$parts = $this->product_model->get_part_rs($parts);
				$new = array("title"=>$select->select_title,"parts"=>$parts);
				array_push($this->data["parts_select"],$new);
			}	
		}
		else{
			$this->data["parts_select"] = "";
		}
		$this->data["rec_product"] = $this->product_model->get_product_rec(json_decode(@$this->data["row"]["recommend"]));
		if(@$_SESSION[USER_ID]!=""){
			$this->main_model->save_histoy($_SESSION[USER_ID]["id"],$this->data["row"]["id"]);
		}
		$meta_img=json_decode($this->data["row"]["gallery_img"]);
		$this->data["meta"] = array(
			"title"=>"瑞士Franke".$this->data["row"]["title"]." 台灣總代理-佳群貿易",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,franke水龍頭,franke不銹鋼龍頭, franke伸縮龍頭, franke濾水器龍頭, franke淨水器龍頭, franke生飲機龍頭,水龍頭,進口龍頭",
			"img"=>(@$meta_img[0]!="")?IMG_URL."upload/".$meta_img[0]:"",
			"des"=>mb_substr($this->main_model->DeleteHtml($this->data["row"]["content"]), 0, 120, 'UTF-8'));
		$this->data['page_view'] = $this->load->view('product/detail_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}