<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fitting extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["menus"] = $this->main_model->get_menu();
		$this->data["controller_addr"]  = "fitting";
		$this->load->model("product_model");
		$this->product_model->url = "fitting";
		$this->data["h2"] = "週邊配件";
	}

	public function products(){
		$this->data["meta"] = array(
			"title"=>"瑞士Franke不鏽鋼捲軸墊、給皂器 強化我們的廚房",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,franke周邊配件,franke周邊產品,franke捲軸墊,franke捲簾墊,franke不鏽鋼捲軸墊,franke不鏽鋼捲簾墊, 捲軸墊,捲簾墊,不鏽鋼捲軸墊,不鏽鋼捲簾墊,franke給皂器,給皂器,垃圾桶,檯面式垃圾桶,檯面垃圾桶,廚房給皂器",
			"des"=>"瑞士Franke為世界第一大水槽品牌，市佔率全球第一。Franke擁有頂尖廚房研發設計團隊，不斷的為全世界的廚房帶來嶄新的發明和優質的產品。其中，從以往的檯面式垃圾桶、三合一龍頭(三用龍頭)，到近年的不繡鋼捲軸墊(捲簾墊)，皆是出自Franke之手。");
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
			"img"=>(@$meta_img[0]!="")?IMG_URL."upload/".$meta_img[0]:"",
			"keyword"=>"Franke,瑞士Franke,Franke台灣,franke水龍頭,franke不銹鋼龍頭, franke伸縮龍頭, franke濾水器龍頭, franke淨水器龍頭, franke生飲機龍頭,水龍頭,進口龍頭",
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