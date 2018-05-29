<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order_process extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this -> load -> database();
        $this -> load -> library('pagination');
    }
    
	public function ShopAdd(){
		if($_POST['num']<=0){
			$data = array("Status"=>"2121","Msg"=>"加入購物車失敗:別在測了");
			return $data;
			exit;
		}
		//檢查登入狀態
		if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0){
			
			$this->db->select("Specification_Id,Specification_ProductId,Specification_Inventory");
			$this->db->from("specification");
			$this->db->where("Specification_Status","1");
			$this->db->where("Specification_Id",$_POST['spec']);
			$query = $this->db->get();
			$spec = $query->row();
			unset($query);
			//檢查規格
			if(isset($spec->Specification_Id) && $spec->Specification_Id ==""){
				$data = array("Status"=>"2121","Msg"=>"加入購物車失敗:無效規格");
				return $data;
				exit;
			}
			//檢查商品是否存在
			if(isset($spec->Specification_ProductId) && $spec->Specification_ProductId != $_POST['p_id'])
			{
				$data = array("Status"=>"2130","Msg"=>"加入購物車失敗:無此商品");
				return $data;
				exit;
			}
			//檢查庫存
			$this->db->select('SC_Id,SC_Num');
			$this->db->from('shoppingcart');
			$this->db->where('SC_ProductId', $_POST['p_id']);
			$this->db->where('SC_SpecId', $_POST['spec']);
			$this->db->where("SC_MemberId",$_SESSION['user_login_id']);
			$query = $this->db->get();
			$ShoppingData = $query -> row();
			unset($query);
			
			if(isset($ShoppingData->SC_Id) && $ShoppingData->SC_Num+$_POST['num'] > $spec->Specification_Inventory){
				$data = array("Status"=>"6161","Msg"=>"加入購物車失敗:庫存不足");
				return $data;
				exit;
			}
			//驗證完成新增購物車 重複則修改
			if(isset($ShoppingData->SC_Id)&&$ShoppingData->SC_Id != ""){
				$data = array(
						'SC_Num' => $ShoppingData->SC_Num+$_POST['num']
				);
				$this->db->where('SC_Id',$ShoppingData->SC_Id);
				$this->db->update('shoppingcart', $data);
				
				$data = array("Status"=>"0000","Msg"=>"加入購物車成功");
			}else{
				$shoppingcart = array(
						'SC_ProductId' => $_POST['p_id'],
						'SC_MemberId' => $_SESSION['user_login_id'],
						'SC_Num' => $_POST['num'],
						'SC_SpecId'=>$_POST['spec'],
						'SC_TimeAdd'=>date("Y-m-d H:i:s")
				);
				
				$this->db->insert('shoppingcart', $shoppingcart);
				
				if($this->db->insert_id() != "")
					$data = array("Status"=>"0000","Msg"=>"加入購物車成功");
				else
					$data = array("Status"=>"1177","Msg"=>"加入購物車失敗");
			}
			
			
		}else
			$data = array("Status"=>"0202","Msg"=>"請先登入會員");
			
		return $data;
	}
	public function SCData(){
		$this->db->select('	SC_Id,SC_ProductId,SC_SpecId,SC_Num,
							Product_Id,Product_Name,Product_Price,Product_Picture,
							Specification_Name,Specification_Inventory
						');
		$this->db->from('shoppingcart');
		$this->db->join("product","product.Product_Id = shoppingcart.SC_ProductId");
		$this->db->join("specification","specification.Specification_Id = shoppingcart.SC_SpecId");
		$this->db->where("SC_MemberId",$_SESSION['user_login_id']);
		$this->db->where("Product_Status","1");
		$query = $this->db->get();
		$SCData = $query -> result();
		unset($query);
		
		$Total = 0; //總金額(不含運)
		$DeliveryPrice = 0;//運費
		foreach($SCData as $val){
			$Total = $Total + ($val->Product_Price*$val->SC_Num);
		}
		//判斷運費條件
		
		return array("SCData"=>$SCData,"Total"=>$Total,"DeliveryPrice"=>$DeliveryPrice);
	}
	public function DeliveryList(){
		$this->db->select("Delivery_Id,Delivery_Name,Delivery_Power,Delivery_Cost,Delivery_NoCost");
		$this->db->from('delivery');
		$this->db->where("Delivery_Status","1");
		$this->db->order_by("Delivery_Sequence","DESC");
		$query = $this->db->get();
		$data = $query -> result();
		unset($query);
		return $data;
	}
	public function PayList(){
		$this->db->select("Pay_Id,Pay_Name");
		$this->db->from('pay');
		$this->db->where("Pay_Status","1");
		$this->db->order_by("Pay_Sequence","DESC");
		$query = $this->db->get();
		$data = $query -> result();
		unset($query);
		return $data;
	}
	public function MemberData($Id){
		$this->db->select("id,b_name,b_phone,b_address,email");
		$this->db->from('members');
		$this->db->where("id",$Id);
		$query = $this->db->get();
		$data = $query -> row();
		unset($query);
		return $data;
	}
	public function OrderAdd(){
		//檢查都入狀態
		if($_POST['member_id']!=$_SESSION['user_login_id']){
			return array("Status"=>"1717","Msg"=>"請登入會員");
			die;
		}
		$MemberData = $this->MemberData($_SESSION['user_login_id']);
		//取出購物車資料
		$this->db->select('	SC_Id,SC_ProductId,SC_SpecId,SC_Num,
							Product_Id,Product_Name,Product_Price,
							Specification_Id,Specification_Name,Specification_Inventory
						');
		$this->db->from('shoppingcart');
		$this->db->join("product","product.Product_Id = shoppingcart.SC_ProductId");
		$this->db->join("specification","specification.Specification_Id = shoppingcart.SC_SpecId");
		$this->db->where("SC_MemberId",$_SESSION['user_login_id']);
		$this->db->where("Product_Status","1");
		$query = $this->db->get();
		$SCData = $query -> result();
		unset($query);
		if(isset($SCData)&&count($SCData)<=0){
			return array("Status"=>"0504","Msg"=>"購物車內並無資料");
			die;
		}
		
		//計算總金額
		$Total = 0; //總金額(不含運)
		$DeliveryPrice = 0;//運費
		$Num = 0;//總數量
		foreach($SCData as $val){
			//檢查每筆庫存
			if($val->SC_Num > $val->Specification_Inventory){
				return array("Status"=>"2727","Msg"=>"商品:".$val->Product_Name."-".$val->Specification_Name." 庫存不足 目前剩餘:".$val->Specification_Inventory);
				die;
			}
			$Total = $Total + ($val->Product_Price*$val->SC_Num);
			$Num = $Num + $val->SC_Num;
		}
		//取出送貨方式
		$this->db->select("Delivery_Id,Delivery_Name,Delivery_Power,Delivery_Cost,Delivery_NoCost");
		$this->db->from('delivery');
		$this->db->where("Delivery_Status","1");
		$this->db->where("Delivery_Id",$_POST['delivery']);
		$query = $this->db->get();
		$DeliveryList = $query -> row();
		unset($query);
		
		if(isset($DeliveryList->Delivery_Id) && $DeliveryList->Delivery_Id == ""){
			return array("Status"=>"7048","Msg"=>"無此送貨方式");
			die;
		}
		//計算運費
		if($Total < $DeliveryList->Delivery_NoCost){
			$Total = $Total+$DeliveryList->Delivery_Cost; //總金額(不含運)
			$DeliveryPrice = $DeliveryList->Delivery_Cost;//運費
		}
		//新增訂單
		$OrderData = array(
				'Order_UserId' => $_POST['member_id'],
				'Order_PayTypeId' => $_POST['pay'],
				'Order_DeliveryTypeId' => $_POST['delivery'],
				'Order_Num' => $Num,
				'Order_Money' => $Total,
				'Order_OName' => $_POST['o_name'],
				'Order_OPhone' => $_POST['o_phone'],
				'Order_OAddress' => $_POST['o_address'],
				'Order_Note' => $_POST['o_content'],
				'Order_DeliveryPrice' => $DeliveryPrice,
				'Order_TimeEdit' =>date("Y-m-d H:i:s"),
				'Order_TimeAdd' =>date("Y-m-d H:i:s")
		);
		//依付款方式決定 訂單狀態
		switch ($_POST['pay'])
		{
			case "1";
				$OrderData['Order_OrderStatus'] = 2;
				break;
			case "2";
				$OrderData['Order_OrderStatus'] = 1;
				break;
			case "3";
				$OrderData['Order_OrderStatus'] = 5;
				break;
		}
		
		$this->db->insert('order', $OrderData);
		$OrderId =  $this->db->insert_id();
		//修改 Order_OrderId A+當天日期+Id
		$ChabgeOrderId = array(
				'Order_OrderId' => "A".date("Ymd").$OrderId
		);
			
		$this->db->where('Order_Id', $OrderId );
		$this->db->update('order', $ChabgeOrderId);
		
		//新增至訂單明細，並扣除庫存，購物車刪除
		foreach($SCData as $val){
			//新增至訂單明細
			$OrderDetial = array(
					'OD_OrderId' => $OrderId,
					'OD_ProductId' => $val->Product_Id ,
					'OD_Name' => $val->Product_Name,
					'OD_Price'=>$val->Product_Price,
					'OD_Num'=>$val->SC_Num,
					'OD_Spec'=>$val->Specification_Name,
					'OD_TimeAdd'=>date("Y-m-d H:i:s")
			);
			$this->db->insert('orderdetial', $OrderDetial);
			unset($OrderDetial);
			//扣除庫存
			$Spec = array(
					'Specification_Inventory' => $val->Specification_Inventory-$val->SC_Num,
			);
			
			$this->db->where('Specification_Id', $val->Specification_Id);
			$this->db->update('specification', $Spec);
			unset($Spec);
			//購物車刪除
			
			$this->db->delete('shoppingcart', array('SC_Id' => $val->SC_Id));
			
		}
		//更新訂購人資料
		if($_POST['changem'] == 1){
			$Members = array(
					'b_name' => $_POST['b_name'],
					'b_phone' => $_POST['b_phone'],
					'b_address' => $_POST['b_address']
			);
			
			$this->db->where('id', $_SESSION['user_login_id']);
			$this->db->update('members', $Members);
		}
		
		return array("Status"=>"0000","Msg"=>"訂單新增成功","OrderId" => $OrderId );
	}
	public function ShopDel(){
		$this->db->delete('shoppingcart', array('SC_Id' => $_POST['cartid']));
		
		return array("Status"=>"0000","Msg"=>"訂單已刪除","OrderId" => $OrderId );
	}
	public function ShopChange(){
		if($_POST['num']<=0){
			$data = array("Status"=>"2121","Msg"=>"加入購物車失敗:別在測了");
			return $data;
			exit;
		}
		//檢查登入狀態
		if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0){
			//檢查庫存
			$this->db->select('SC_Id,Specification_Inventory');
			$this->db->from('shoppingcart');
			$this->db->join("specification","shoppingcart.SC_SpecId = specification.Specification_Id");
			$this->db->where('SC_Id', $_POST['cartid']);
			$query = $this->db->get();
			$ShoppingData = $query -> row();
			unset($query);
				
			if(isset($ShoppingData->SC_Id) && $_POST['num'] > $ShoppingData->Specification_Inventory){
				$data = array("Status"=>"6161","Msg"=>"加入購物車失敗:庫存不足");
				return $data;
				exit;
			}
			
			$UpData = array(
					'SC_Num' => $_POST['num']
			);
			
			$this->db->where('SC_Id', $ShoppingData->SC_Id);
			$this->db->update('shoppingcart', $UpData);
			
			$data = array("Status"=>"0000","Msg"=>"修改成功");
		}else
			$data = array("Status"=>"0202","Msg"=>"請先登入會員");
				
			return $data;
	}
	public function OrderList(){
		//取得訂單列表
		$this->db->select("Order_Id,Order_OrderId,Order_Num,Order_Money,Order_OName,date(Order_TimeAdd) as Order_TimeAdd,OrderStatus_Name");
		$this->db->from('order');
		$this->db->join("orderstatus","orderstatus.OrderStatus_Id = order.Order_OrderStatus");
		$this->db->where('Order_UserId', $_SESSION['user_login_id'] );
		
		//時間排序
		switch ($_POST['order_by'])
		{
			default:
				$this->db->order_by("Order_TimeAdd","DESC");
				break;
		}
		
		$query = $this->db->get();
		$OrderList = $query -> result();
		unset($query);
		
		return $OrderList; 
	}
	function OrderDetial($Id){
		//取得訂單資料
		$this->db->select("	Order_Id,Order_OrderId,Order_Num,Order_Money,Order_OrderStatus,Order_OName,Order_OPhone,Order_OAddress,Order_Note,date(Order_TimeAdd) as Order_TimeAdd,Order_DeliveryPrice,Order_PayNumber,
							Delivery_Content,Delivery_Name,
							Pay_Content,Pay_Name,Pay_RemitStatus,
							OrderStatus_Name,Order_PayDate");
		$this->db->from('order');
		$this->db->join("delivery","delivery.Delivery_Id = order.Order_DeliveryTypeId");
		$this->db->join("pay","pay.Pay_Id = order.Order_PayTypeId");
		$this->db->join("orderstatus","orderstatus.OrderStatus_Id = order.Order_OrderStatus");
		
		$this->db->where('Order_Id', $Id );
		$query = $this->db->get();
		$OrderData = $query -> row();
		unset($query);
		//取得訂單詳細
		$this->db->select("OD_ProductId,OD_Name,OD_Price,OD_Num,OD_Spec,Product_Id,Product_Name,Product_Picture");
		$this->db->from('orderdetial');
		$this->db->join("product","product.Product_Id = orderdetial.OD_ProductId");
		$this->db->where('OD_OrderId', $OrderData->Order_Id );
		$query = $this->db->get();
		$OrderDetial = $query -> result();
		unset($query);
		
		return array("OrderData"=>$OrderData,"OrderDetial"=>$OrderDetial);
	}
	public function ReplyNumber(){
		//確認是否為訂單擁有者
		$this->db->select("Order_Id");
		$this->db->from('order');
		$this->db->where('Order_UserId', $_SESSION['user_login_id'] );
		$this->db->where('Order_Id', $_POST['order_id'] );
		$query = $this->db->get();
		$OrderData = $query -> row();
		unset($query);
		if(isset($OrderData->Order_Id) && $OrderData->Order_Id == ""){
			$data = array("Status"=>"6161","Msg"=>"回填失敗:不是訂單擁有者");
			return $data;
			exit;
		}
		
		$data = array(
				'Order_PayDate' => $_POST['order_paydate'],
				'Order_PayNumber' => $_POST['order_paynumber']
		);
		
		$this->db->where('Order_Id', $OrderData->Order_Id);
		$this->db->update('order', $data);
		 
		return array("Status"=>"0000","Msg"=>"回填成功 ");
	}
	function get_OrderById($Id){
		//取得訂單資料
		$this->db->select("	Order_Id,Order_OrderId,Order_Num,Order_Money,Order_OrderStatus,Order_OName,Order_OPhone,Order_OAddress,Order_Note,date(Order_TimeAdd) as Order_TimeAdd,Order_DeliveryPrice,Order_PayNumber,
						");
		$this->db->from('order');
	
		$this->db->where('Order_Id', $Id );
		$query = $this->db->get();
		$OrderData = $query -> row();
		unset($query);
	
		return $OrderData;
	}
	function change_OrderStatus($Id,$OrderStatus){
		$data = array(
				'Order_OrderStatus' => $OrderStatus
		);
	
		$this->db->where('Order_Id', $Id);
		$this->db->update('order', $data);
	}
}
?>