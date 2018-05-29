<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
		$this->data['main_banner'] = $this->global_model->get_main_banner();
		$this->data['side_banner'] = $this->global_model->get_side_banner();
		$this->data['first_banner'] = $this->global_model->get_first_banner();
		$this->load->model('member_model');
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		$this->data['member_data'] = array();
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
		$this->load->model('order/order_process');
	}

	public function shopping($title){
		$this->data['menu_selected'] = "shop";

		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array(urldecode($title));
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL.'order/shopping'.$title;
		$this->data['meta']['cover_img'] = 'FB.jpg';
		
		//獨立區塊start
		$this->data['SCData'] = $this->order_process->SCData();
		$this->data['DeliveryList'] = $this->order_process->DeliveryList();
		$this->data['PayList'] = $this->order_process->PayList();
		$this->data['MemberData'] = $this->order_process->MemberData($_SESSION['user_login_id']);
		//獨立區塊end
		
		$this->data = $this->global_model->site_init2(1,$this->data);
		$this->load->view('old/order/shoppingcart',$this->data);
	}
	public function shop_add(){
		$data = $this->order_process->ShopAdd();
		echo json_encode($data);
	}
	public function order_add(){
		$data = $this->order_process->OrderAdd();
		if($data['Status']=="0000")
		{
			//依付款方式決定定接下來動作
			switch ($_POST['pay'])
			{
				case "1";//金流
					$OrderData['Order_OrderStatus'] = 2;
					//送出訂單確認信
					//金流流程
					
					break;
				case "2";//轉向訂單明細
					$OrderData['Order_OrderStatus'] = 1;
					//送出訂單確認信
					
					//跳轉頁面
					header("Location: ".SITE_URL."order/order_detial/".$data['OrderId']);
					exit;
					break;
				case "3";//轉向訂單明細
					$OrderData['Order_OrderStatus'] = 5;
					//送出訂單確認信
					
					//跳轉頁面
					header("Location: ".SITE_URL."order/order_detial/".$data['OrderId']);
					exit;
					break;
			}
			
		}else{
			
			$this->data['menu_selected'] = "shop";
			$this->data['tag_id'] = 0;
			$meat = $this->global_model->meta_array(urldecode($title));
			$this->data['meta']['title'] = $meat[0];
			$this->data['meta']['brief'] = $meat[1];
			$this->data['meta']['keyword'] = $meat[2];
			$this->data['meta']['url'] = SITE_URL.'order/shopping'.$title;
			$this->data['meta']['cover_img'] = 'FB.jpg';
			
			//獨立區塊start
			$this->data['Msg'] = $data['Msg'];
			//獨立區塊end
			
			$this->data = $this->global_model->site_init2(1,$this->data);
			$this->load->view('old/order/order_erro',$this->data);
		}
	}
	public function shop_del(){
		$data = $this->order_process->ShopDel();
		
		echo json_encode($data);
	}
	public function shop_change(){
		$data = $this->order_process->ShopChange();
		
		echo json_encode($data);
	}
	public function order_list(){
		$this->data['menu_selected'] = "shop";
		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array(urldecode($title));
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL.'order/order_list'.$title;
		$this->data['meta']['cover_img'] = 'FB.jpg';
			
		//獨立區塊start
		$this->data['OrderList'] = $this->order_process->OrderList();
		//獨立區塊end
			
		$this->data = $this->global_model->site_init2(1,$this->data);
		$this->load->view('old/order/order_list',$this->data);
	}
	public function order_detial($Id){
		$this->data['menu_selected'] = "shop";
		$this->data['tag_id'] = 0;
		$meat = $this->global_model->meta_array(urldecode($Id));
		$this->data['meta']['title'] = $meat[0];
		$this->data['meta']['brief'] = $meat[1];
		$this->data['meta']['keyword'] = $meat[2];
		$this->data['meta']['url'] = SITE_URL.'order/order_detial'.$Id;
		$this->data['meta']['cover_img'] = 'FB.jpg';
			
		//獨立區塊start
		$data = $this->order_process->OrderDetial($Id);
		$this->data['OrderData'] = $data['OrderData'];
		$this->data['OrderDetial'] = $data['OrderDetial'];
		$this->data['MemberData'] = $this->order_process->MemberData($_SESSION['user_login_id']);
		//獨立區塊end
			
		$this->data = $this->global_model->site_init2(1,$this->data);
		$this->load->view('old/order/order_detial',$this->data);
	}
	function reply_number(){
		//更新後五碼
		$data = $this->order_process->ReplyNumber();
		//送出匯款確認信
		
		echo json_encode($data);
	}
	function test_cre(){
	
		$OrderData['Order_OrderStatus'] = 2;
		//送出訂單確認信
		//金流流程
		$data['pay_type_url'] 	=	"https://test.esafe.com.tw/Service/Etopm.aspx";
		$data['pay_type_r_code'] 	=	"gn28960943";
	
		$OrderData = $this->order_process->get_OrderById("10");
		$data['OrderData'] = $OrderData;
	
		$_POST 	= 	array(
				"Merchantnumber"=>	"S1608309074"
				,"OrderNumber"	=>	$OrderData->Order_Id
				,"Amount"		=>	$OrderData->Order_Money
				,"OrgorderNumber"	=>	'177buy'
				,"ApproveFlag"	=>	'1'
				,"DepositFlag"	=>	'1'
				,"Englishmode"	=>	'0'	//	返回頁面
				,"iphonepage"	=>	'0'
		);
	
		$this -> load -> view('/old/order/cirdet',$data);
	}
	function sure_return(){
		echo "0000";
	}
	function tradereturn(){
	
		$order	=	$this -> order_process -> get_OrderById($_POST['Td']);
	
		$CheckValue = sha1("S1608309074"."gn28960943".$_POST['buysafeno'].$order->Order_Money.$_POST['errcode']);
		$CheckValue = strtoupper($CheckValue);
	
		if($_POST['note2'] == "mobile"){
			if($_POST['errcode'] == "00" && $CheckValue == $_POST['ChkValue']){
				$this-> order_process -> change_OrderStatus($_POST['Td'],"6");
				header("Location: ".Mobile_Uul.'order/order_detial/'.$order->Order_Id);
			}else{
				$this-> order_process -> change_OrderStatus($_POST['Td'],"8");
				header("Location: ".Mobile_Uul);
			}
		}else{
			if($_POST['errcode'] == "00" && $CheckValue == $_POST['ChkValue']){
				$this-> order_process -> change_OrderStatus($_POST['Td'],"6");
				header("Location: ".SITE_URL.'order/order_detial/'.$order->Order_Id);
			}else{
				$this-> order_process -> change_OrderStatus($_POST['Td'],"8");
				header("Location: ".SITE_URL);
			}
		}
	}
}