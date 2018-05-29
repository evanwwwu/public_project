<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("classes_model");
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
		$this->data["month_name"] = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"); 
		$this->data["day_name"] = array("一","二","三","四","五","六","日"); 
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->helper("allpay_sdk");
	}

	public function index()
	{
		$this->data["page_addr"] = "classes";
		$this->data["rs"] = $this->classes_model->get_rs();
		$this->data['page_view'] = $this->load->view('classes_view',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function detail($id=0){
		$test = new AllInOne();
		$this->data["page_addr"] = "classes_detail";
		$this->data["row"] = $this->classes_model->get_row($id);
		$this->data['page_view'] = $this->load->view('classes_detail',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function order(){
		$this->data["page_addr"] = "classes_order";
		$this->data["row"] =$this->classes_model->get_classes_data($this->post["date_id"]);
		$this->data['page_view'] = $this->load->view('classes_order',$this->data,true);
		$this->load->view('master_view',$this->data);
	}
	public function send_order(){
		$this->load->model("order_model");
		$order_data = array();
		$inx = array("username","phone","email","msg");
		foreach ($inx as $x) {
			$order_data[$x] =urlencode(@$this->post[$x]);
		}
		$this->post["member_data"]  = urldecode(json_encode($order_data));
		$result = $this->order_model->create_c_order();
		if($result!==false){
			$data = $this->order_model->get_c_row($result);
			$data["post"] = $this->post;
			$this->log->ec_write_log("INFO","建立教室訂單 訂單編號:".$data["order_no"]);
			$this->goto_pay($data);
		}
		else{
			$this->log->ec_write_log("INFO","教室訂單建立失敗。");
		}
	}
	public function goto_pay($data){
		try {
			$obj = new AllInOne();
			$obj->ServiceURL  = EC_ServiceURL;
			$obj->HashKey     = EC_HashKey;
			$obj->HashIV      = EC_HashIV;
			$obj->MerchantID  = EC_MerchantID;
			$obj->Send['ReturnURL'] = SITE_URL."classes/step_end" ;
			$obj->Send['ClientBackURL'] = SITE_URL;
			// $obj->Send['OrderResultURL'] = SITE_URL."classes/step_end";
			$obj->Send['MerchantTradeNo']   = $data["order_no"];
			$obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');
			$obj->Send['TotalAmount']       = $data["total"];
			$obj->Send['TradeDesc']         = "Naked Market" ;
			$obj->Send['ChoosePayment']     = $data["pay_type"];
			//訂單的商品資料
			array_push($obj->Send['Items'], 
				array('Name' => $data["classes_name"]."", 'Price' => (int)$data["total"],'Currency' => "元", 'Quantity' => (int)"1", 'Unit' => "堂","URL"=>""));
			
        //產生訂單(auto submit至AllPay)
			$obj->CheckOut();
		} 
		catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function step_end(){
		$this->load->model("order_model");
		try
		{
			$oPayment = new AllInOne();
			$oPayment->HashKey     = EC_HashKey;
			$oPayment->HashIV      = EC_HashIV;
			$oPayment->MerchantID  = EC_MerchantID;
			$arFeedback = $oPayment->CheckOutFeedback();
			$this->log->ec_write_log("INFO",json_encode($arFeedback));
			// print_r($arFeedback);
			/* 檢核與變更訂單狀態 */
			if (sizeof($arFeedback) > 0) {
				$where = "order_no = '".$arFeedback["MerchantTradeNo"]."'";
				$table= array(
					"PK"=>"id",
					"trade_no"=>$arFeedback["TradeNo"],
					"pay_date"=>$arFeedback["PaymentDate"],
					);
				if ($arFeedback["RtnCode"]=="1") {
					$this->log->ec_write_log("INFO","訂單編號:".$arFeedback["MerchantTradeNo"]."付款完成");
					$table["state"] = "付款完成";
					$this->global_model->sql_save("classes_order",$table,$where);
					$this->order_model->update_classes($arFeedback["MerchantTradeNo"]);
				}
				else{
					$this->log->ec_write_log("INFO","訂單編號:".$arFeedback["MerchantTradeNo"]."付款失敗");	
					$table["state"] = "付款失敗";	
					$this->global_model->sql_save("classes_order",$table,$where);			
				}
				print '1|OK';
			} else {
				print '0|Fail';
			}
		}
		catch (Exception $e)
		{
			print '0|' . $e->getMessage();
		}
	}
}