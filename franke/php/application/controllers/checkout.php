<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"] = "checkout";
		$this->load->model("order_model");
		$this->data["menus"] = $this->main_model->get_menu();
	}
	public function index(){
		$this->my_log->user_write_log("info","購買列表頁");
		$this->data["rs"] = $this->cart->contents();
		$this->data["total"] = $this->cart->total();
		$this->data['page_view'] = $this->load->view('checkout/mylist_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function step02(){
		if($this->post["step"]!="sp01"){
			$this->my_log->user_write_log("info","強制登入 購買步驟2");
			header("location:".SITE_URL);exit;
		}
		$this->my_log->user_write_log("info","購買步驟2 內容:".json_encode($this->post)."商品:".json_encode($this->cart->contents()));
		$this->data["post"] = $this->post;
		$this->data['page_view'] = $this->load->view('checkout/step02_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function send(){
		if($this->post["step"]!="sp02"){
			$this->my_log->user_write_log("info","強制登入 購買步驟3");
			header("location:".SITE_URL);exit;
		}
		$this->save_order();
		// $this->cart->destroy();
		$this->data['page_view'] = $this->load->view('checkout/end_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function save_order(){
		$no = $this->order_model->get_order_no();
		$msg_product = [];
		if(@$this->post["pro"]!=""){
			foreach($this->post["pro"] as $pro){
				array_push($msg_product,urlencode($pro));
			}
		}
		$msg_product = json_encode($msg_product);
		$member = array("username"=>urlencode($this->post["username"]),"email"=>$this->post["mail"],"phone"=>$this->post["phone"],"identity"=>urlencode($this->post["identity"]));
		$where = " id = '0'";
		$table=array(
			"PK"=>"id",
			"order_no"=>date("ymd")."-".$no,
			"member"=>json_encode($member),
			"total_amount" =>$this->cart->total(),
			"msg_product"=>$msg_product,
			"products" =>json_encode($this->cart->contents()),
			"status" =>"未處理",
			"message" =>addslashes(@$_POST["content"]),
			"createtime"=>date("Y-m-d H:i:s")
			);
		$this->my_log->user_write_log("info","儲存訂單 訂單編號:".date("ymd")."-".$no);
		$msg = "訂單編號:".date("ymd")."-".$no."<br>";
		$msg .= "建單時間:".date("Y-m-d H:i:s");
		$status =$this->main_model->send_mail("franketw@gmail.com","訂單編號: ".date("ymd")."-".$no." 建立完成",$msg);
		$mid = $this->global_model->sql_save("orders",$table,$where);
	}
}

