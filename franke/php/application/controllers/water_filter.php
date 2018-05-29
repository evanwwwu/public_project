<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Water_filter extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["menus"] = $this->main_model->get_menu();
		$this->data["controller_addr"]  = "water_filter";
		$this->load->model("product_model");
		$this->product_model->url = "water_filter";
		$this->data["h2"] = "淨水器";
		$this->data["meta"] = array(
			"title"=>"瑞士Franke淨水生飲系統總代理-佳群貿易",
			"keyword"=>"Franke淨水器,Franke 濾水器,Franke生飲機,Franke淨水設備,陶瓷濾心,Franke陶瓷濾心",
			"des"=>"在尋找淨水器推薦嗎？瑞士Franke淨水器(濾水器生飲機)。由AISI304 18/10不鏽鋼打造外桶，搭配不鏽鋼高壓進出水管。保證台灣消費者最安全的保障。Franke淨水器(濾水器生飲機)使用陶瓷濾心，水分子需通過兩萬個交錯0.2微米細小毛孔，有效阻擋細菌與重金屬。並每年派遣專人前往府上更換並做安全檢查。");
	}

	public function index()
	{
		$this->data["rs"] = $this->product_model->get_product_rs();
		$this->data['page_view'] = $this->load->view('water_filter_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function detail($id=0){
		$this->data['row'] = $this->product_model->get_product($id);
		$meta_img=json_decode($this->data["row"]["gallery_img"]);
		$this->data["meta"] = array(
			"title"=>"瑞士Franke".$this->data["row"]["title"]." 台灣總代理-佳群貿易",
			"keyword"=>"Franke淨水器,Franke 濾水器,Franke生飲機,Franke淨水設備,陶瓷濾心,Franke陶瓷濾心",
			"img"=>(@$meta_img[0]!="")?IMG_URL."upload/".$meta_img[0]:"",
			"des"=>mb_substr($this->main_model->DeleteHtml($this->data["row"]["content"]), 0, 120, 'UTF-8'));
		$this->data["de_part"] = $this->product_model->get_part_rs($this->data["row"]["parts"]);
		$this->data["sp_part"] = $this->product_model->get_part_rs($this->data["row"]["sp_parts"]);
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
		$this->data["rec_product"] = $this->product_model->get_product_rec(json_decode($this->data["row"]["recommend"]));
		
		if(@$_SESSION[USER_ID]!=""){
			$this->main_model->save_histoy($_SESSION[USER_ID]["id"],$this->data["row"]["id"]);
		}
		$this->data['page_view'] = $this->load->view('product/detail_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}

	public function send(){
		if($this->post["mail"]!=""&&$this->post["username"]!=""&&$this->post["phone"]!=""&&$_POST["content"]!=""){
			$msg = "電子信箱:".$this->post["mail"]."<br>";
			$msg .= "姓名:".$this->post["username"]."<br>";
			$msg .= "連絡電話".$this->post["phone"]."<br>";
			$msg .= "內容:".addslashes(@$_POST["content"]);
			$status =$this->main_model->send_mail("franketw@gmail.com","濾水器問題通知",$msg);
			if($status["status"]){	
				echo "alert('感謝您的來信！我們將儘快與您聯繫。')";
			}
			else{
				echo "alert('error');console.log('".$status["error"]."')";
			}
		}else{
			header("location:".SITE_URL);exit;
		}
	}
}
