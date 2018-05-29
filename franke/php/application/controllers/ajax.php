<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
	}

	public function add2cart(){
		$form = $this->post;
		$data = array(
			'id'      => $form['id'],
			'qty'     => 1,
			'price'   => $form['price'],
			'name'    => urlencode($form['name']),
			'options' => array("site_price"=>$form["site_price"],"product_no"=>urlencode($form["pro_no"]),"cover_img"=>$form["cover_img"],"parts"=>urlencode($form['option_data']),"main_id"=>$form["main_id"])
			);
		$this->cart->insert($data);
		echo '$("#shopcar ul").load("'.SITE_URL.'ajax/load_cart",function(){$("#shopcar").addClass("active");});$(".cart_total_price").html("'.$this->cart->total().'");';
	}

	public function load_cart(){
		$this->load->model("order_model");
		$this->data['cart'] = $this->cart->contents();
		$html = $this->load->view("cart_view",$this->data);
	}

	public function get_total(){
		$data = array("total_price"=>$this->cart->total(),"total_item"=>$this->cart->total_items());
		echo json_encode($data);
	}

	public function remove_cart($rowid=""){
		$data = array(
			array(
				'rowid'   => $rowid,
				'qty'     => 0
				)
			);
		$this->cart->update($data);
	}
	public function destroy_cart(){
		$this->cart->destroy();
	}
}

