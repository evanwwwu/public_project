<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	var $ship = 0;
	var $sale_total = array();
	public function __construct(){
		parent::__construct();
		$this->data["sub_menu"] = $this->main_model->init();
		$this->data["cart_view"] = $this->load->view("cart_view","",true);
		$this->data["page_addr"] = "pay_step";
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->load->helper("allpay_sdk");
		$this->load->model("order_model");
	}

	public function step1(){
		if($this->cart->total_items()<=0){
			header("Location:".SITE_URL);
			exit;			
		}
		$this->data["sp"] = 1;
		$this->data["step_view"] = $this->load->view("shop/step_view",$this->data,true);
		$this->data["page_view"] = $this->load->view("shop/step1_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}

	public function step2(){
		if($this->cart->total_items()<=0){
			header("Location:".SITE_URL);exit;
		}
		$this->data["sp"] = 2;
		$this->data["member"] = @$_SESSION["member_data"];
		$this->data["step_view"] = $this->load->view("shop/step_view",$this->data,true);
		$this->data["page_view"] = $this->load->view("shop/step2_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}
	public function step3(){
		if($this->cart->total_items()<=0){
			header("Location:".SITE_URL);exit;
		}
		$this->data["sp"] = 3;
		$this->data["post"] = $this->post;
		$this->data["step_view"] = $this->load->view("shop/step_view",$this->data,true);
		$this->data["page_view"] = $this->load->view("shop/step3_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}
	public function step4(){
		if($this->cart->total_items()<=0){
			header("Location:".SITE_URL);exit;
		}
		$this->data["sp"] = 4;
		$this->data["post"] = $this->post;
		$this->data["step_view"] = $this->load->view("shop/step_view",$this->data,true);
		$this->data["page_view"] = $this->load->view("shop/step4_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}

	public function error(){
		$result = (array)json_decode($this->post["Result"],true);
		$this->update_order($result["MerchantOrderNo"],"付款失敗",date("Y-m-d H:i:s"));
		$this->data['content_page'] = $this->load->view("shop/error_view",$this->data,true);
		$this->load->view("master_view",$this->data);
	}

	private function update_order($order_no="",$state="",$pay_time=""){
		$f = "order_no = '".$order_no."'";
		$table=array(
			"PK"=>"order_no",
			"PK_val"=>$order_no,
			"state"=>$state
			);
		if($pay_time!=""){
			$table["pay_time"] = $pay_time;
		}
		$oid = $this->global_model->sql_save("orders",$table,$where);
	}
	public function send_order(){
		if($this->cart->total_items()>0){
			$this->post["order_data"] = $this->update_member();
			// if($this->order_model->check_products()){
			$result = $this->create_order();
			if($result["status"] !== false){
				$data = $this->order_model->get_row($result);
				//新增銷貨Excel 
				$this->create_excel("DT20",$data);
				$data["post"] = $this->post;
				$this->log->ec_write_log("INFO","建立訂單 訂單編號:".$data["order_no"]);
				$this->goto_pay($data);
			}
			// }
			else{
				$this->log->ec_write_log("INFO","訂單建立失敗。");
				echo "<script>alert('".$result['error']."');location='".SITE_URL."';</script>";
			}
		}
	}

	private function create_excel($type="DT20",$data = array()){
		$this->load->library("ftp");
		$this->ftp->connect();
		$files = $this->ftp->list_files('/');
		$file_no = 0;
		if(count($files)>1){
			foreach ($files as $key => $value) {
				$file = explode(".",$value);
				if(@$file[1]=="xlsx"){
					$file =  explode("-",$file[0]);
					if(str_replace("/","",$file[0])==$type && intval($file[1])>$file_no){
						$file_no = $file[1];
					}
				}
			}
		}
		$filename= $type."-".($file_no+1).".xlsx";
		$this->load->library('excel');
		$objPHPExcel = new PHPExcel();
		$objReader = PHPExcel_IOFactory::createReader('Excel2007');
		$date = new DateTime("now");
		$date->modify("-1911 year");
		$c_now = ltrim($date->format("Y/m/d"),"0");
		switch($type){
			case "DT20":
			$objPHPExcel = $objReader->load(APPPATH."/third_party/DT20_template.xlsx");
			foreach ($data["products"] as $key => $row) {
				$num = $key+2;
				$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$num, "net")
				->setCellValue('B'.$num, $data['order_no'])
				->setCellValue('C'.$num, "008")
				->setCellValue('E'.$num, $row["product_no"])
				->setCellValue('F'.$num, $row["qty"])
				->setCellValue('G'.$num, $c_now)
				->setCellValue('K'.$num, str_pad((int)$key+1,4,'0',STR_PAD_LEFT))
				->setCellValue('M'.$num, $row["price"])
				->setCellValue('S'.$num, "3");
			}
			break;
			case "DT21":
			$objPHPExcel = $objReader->load(APPPATH."/third_party/DT21_template.xlsx");
			foreach ($data["products"] as $key => $row) {
				$num = $key+2;
				$objPHPExcel->getActiveSheet()
				->setCellValue('A'.$num, "net")
				->setCellValue('B'.$num, $data['order_no'])
				->setCellValue('C'.$num, "008")
				->setCellValue('E'.$num, $row["product_no"])
				->setCellValue('F'.$num, $row["qty"])
				->setCellValue('G'.$num, $c_now)
				->setCellValue('N'.$num, "3");
			}
			break;
		}
		
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save($filename);
		$this->ftp->upload($filename,$filename);
		unlink($filename);
	}
	
	private function create_order(){
		$result = $this->order_model->create_order();
		return $result;
	}
	
	private function update_member(){
		$update = false;
		$member = $_SESSION['member_data'];
		$table=array("PK"=>"id");
		$order_data = array();
		$inx = array("username","phone","mobile","address");
		foreach ($inx as $x) {
			if ($member[$x]=="") {
				$update = true;
				$table[$x] = $this->post[$x];
			}
			$order_data[$x] = urlencode($this->post[$x]);
		}
		if($update){
			$where = "id = '".$_SESSION["member_id"]."'";
			$this->global_model->sql_save("members",$table,$where);
			$_SESSION["member_data"] = $order_data;
			$_SESSION["member_data"] = urldecode($_SESSION["member_data"]);
		}
		$order_data["email"] = $this->post["email"];
		return  urldecode(json_encode($order_data));
	}

	public function goto_pay($data){
		try {
			$obj = new AllInOne();
			$obj->ServiceURL  = EC_ServiceURL;
			$obj->HashKey     = EC_HashKey;
			$obj->HashIV      = EC_HashIV;
			$obj->MerchantID  = EC_MerchantID;
			$obj->Send['ReturnURL'] = SITE_URL."shop/step_end" ;
			$obj->Send['ClientBackURL'] = SITE_URL;
			// $obj->Send['OrderResultURL'] = SITE_URL."shop/step_end" ;
			// $obj->Send['OrderResultURL'] = SITE_URL;
			$obj->Send['MerchantTradeNo']   = $data["order_no"];
			$obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');
			$obj->Send['TotalAmount']       = $data["total"];
			$obj->Send['TradeDesc']         = "Naked Market" ;
			$obj->Send['ChoosePayment']     = $data["pay_type"];
			if($data["pay_type"]=="CVS"){
				$obj->SendExtend["PaymentInfoURL"] = SITE_URL."shop/cvs_success";
				$obj->SendExtend['StoreExpireDate']= "5";
			}
			//訂單的商品資料
			foreach ($data["products"] as $key => $row) {
				array_push($obj->Send['Items'], 
					array('Name' => $row["product_name"], 'Price' => (int)$row["price"],'Currency' => "元", 'Quantity' => (int)$row["qty"], 'Unit' => $row["unit_text"],"URL"=>""));
			}
			array_push($obj->Send['Items'], 
				array('Name' =>"運費", 'Price' => (int)$data["ship"]["total"],'Currency' => "元", 'Quantity' => (int)1, 'Unit' => $data["ship"]["product_name"],"URL"=>""));
        //產生訂單(auto submit至AllPay)
			$obj->CheckOut();
		} 
		catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function cvs_success(){
		try
		{
			$oPayment = new AllInOne();
			$oPayment->HashKey     = EC_HashKey;
			$oPayment->HashIV      = EC_HashIV;
			$oPayment->MerchantID  = EC_MerchantID;
			$arFeedback = $oPayment->CheckOutFeedback();			
			$this->log->ec_write_log("INFO","超商取號".json_encode($arFeedback));
			if (sizeof($arFeedback) > 0) {
				$where = "order_no = '".$arFeedback["MerchantTradeNo"]."'";
				$table= array(
					"PK"=>"id",
					"trade_no"=>$arFeedback["TradeNo"],
					"cvs_no"=>$arFeedback["PaymentNo"],
					"state"=>"取號完成"
					);
				$this->global_model->sql_save("orders",$table,$where);	
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

	public function step_end(){
		try
		{
			$oPayment = new AllInOne();
			$oPayment->HashKey     = EC_HashKey;
			$oPayment->HashIV      = EC_HashIV;
			$oPayment->MerchantID  = EC_MerchantID;
			$arFeedback = $oPayment->CheckOutFeedback();
			$this->log->ec_write_log("INFO",json_encode($arFeedback));
			print_r($arFeedback);
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
					$this->global_model->sql_save("orders",$table,$where);
				}
				else{
					$this->log->ec_write_log("INFO","訂單編號:".$arFeedback["MerchantTradeNo"]."付款失敗");	
					$table["state"] = "付款失敗";	
					$this->global_model->sql_save("orders",$table,$where);
					$this->order_model->add_product($arFeedback["MerchantTradeNo"]);

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

//-----CART
	public function add2cart(){
		$add_date = false;
		if($this->cart->total_items()>0){
			foreach($this->cart->contents() as $key=>$item){
				if($item["id"]==$this->post["id"]){
					$data = array(
						"rowid"=>$item["rowid"],
						"qty"=>(int)$item["qty"] + (int)$this->post["qty"]
						);
					$this->cart->my_update($data);
					$add_date = false;
					break;
				}
				else{
					$add_date = true;
				}
			}
		}
		else{
			$add_date = true;
		}
		if($add_date){
			$data = array(
				"id"=>$this->post["id"],
				"qty"=>$this->post["qty"],
				"price"=>$this->post["price"],
				"name"=>str_replace(array("\r", "\n", "\r\n", "\n\r"," "),"",$this->post["name"]),
				"options"=>json_decode($this->post["option"])
				);
			$this->cart->insert($data);
		}
		$result = array("total"=>count($this->cart->contents()),"view"=>$this->load->view("cart_view","",true),"price"=>$this->cart->total());
		echo json_encode($result);
	}

	public function des_cart(){
		$this->cart->destroy();
	}
	public function test_show(){
		print_r($this->cart->contents());
	}

	public function update_item(){
		$data = array(
			"rowid"=>$this->post["rowid"],
			"qty"=>$this->post["qty"]
			);
		$this->cart->my_update($data);
		$content = $this->cart->contents();
		$content = $content[$this->post["rowid"]];
		$result = array("rowid"=>$this->post["rowid"],"subtotal"=>$content["subtotal"]);
		echo json_encode($result);
	}

	public function del_item(){
		$content = $this->cart->contents();
		$content = $content[$this->post["rowid"]];
		$data = array(
			"rowid"=>$this->post["rowid"],
			"qty"=>0
			);
		$this->cart->my_update($data);
		$result = array("rowid"=>$this->post["rowid"],"price"=>$content["subtotal"],"ship"=>$this->cart->ship,"total"=>($this->cart->total()+$this->cart->ship),"ship_type"=>$this->cart->ship_type);
		echo json_encode($result);
	}
}
