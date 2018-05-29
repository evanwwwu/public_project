<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sink extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["menus"] = $this->main_model->get_menu();
		$this->data["controller_addr"]  = "sink";
		$this->load->model("product_model");
		$this->product_model->url = "sink";
		$this->data["h2"] = "水槽";
	}

	public function products(){
		switch(@$this->get["filter"]){
			case "28":
			$this->data["meta"] = array(
				"title"=>"瑞士Franke頂級AISI 304 18/10不鏽鋼水槽 台灣總代理-佳群貿易",
				"keyword"=>"Franke,瑞士Franke,Franke台灣,franke水槽,franke不鏽鋼水槽,不鏽鋼水槽, 進口水槽",
				"des"=>"瑞士Franke為世界第一大不鏽鋼水槽品牌，市佔率全球第一。擁有頂尖不鏽鋼水槽設計團隊研發各式不鏽鋼單槽、不鏽鋼雙槽、不鏽鋼平台槽。皆以最高標準生產製造。");
			break;
			case "27":
			$this->data["meta"] = array(
				"title"=>"瑞士Franke頂級結晶花崗石(結晶石)水槽 台灣總代理-佳群貿易",
				"keyword"=>"台灣,franke水槽,franke結晶花崗石水槽, franke結晶石水槽,結晶花崗石水槽,結晶石水槽,進口水槽",
				"des"=>"瑞士Franke為世界第一大水槽品牌，市佔率全球第一。擁有頂尖結晶花崗石(結晶石)水槽設計團隊研發各式結晶花崗石(結晶石)單槽、結晶花崗石(結晶石)雙槽、結晶花崗石(結晶石)平台槽。皆以最高標準生產製造。");
			break;
			default:
			$this->data["meta"] = array(
				"title"=>"瑞士Franke頂級304不鏽鋼水槽、結晶花崗石(結晶石)水槽",
				"keyword"=>"Franke,瑞士Franke,Franke台灣,franke水槽,franke結晶花崗石水槽, franke結晶石水槽,結晶花崗石水槽,結晶石水槽,進口水槽,franke不鏽鋼水槽,不鏽鋼水槽",
				"des"=>"瑞士Franke為世界第一大不鏽鋼水槽品牌，市佔率全球第一。擁有頂尖不鏽鋼水槽、結晶花崗石水槽設計團隊研發各式不鏽鋼單槽、不鏽鋼雙槽、不鏽鋼平台槽、結晶花崗石(結晶石)單槽、結晶花崗石(結晶石)雙槽、結晶花崗石(結晶石)平台槽。皆以最高標準生產製造。");
			break;
		}
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
		$meta_img=json_decode($this->data["row"]["gallery_img"]);
		$this->data["meta"] = array(
			"title"=>"瑞士Franke".$this->data["row"]["title"]." 台灣總代理-佳群貿易",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,franke水龍頭,franke不銹鋼龍頭, franke伸縮龍頭, franke濾水器龍頭, franke淨水器龍頭, franke生飲機龍頭,水龍頭,進口龍頭",
			"img"=>(@$meta_img[0]!="")?IMG_URL."upload/".$meta_img[0]:"",
			"des"=>mb_substr($this->main_model->DeleteHtml($this->data["row"]["content"]), 0, 120, 'UTF-8'));
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
		$this->data['page_view'] = $this->load->view('product/detail_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
}