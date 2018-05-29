<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "partner";
		$this->load->model("partner_model");
		$this->partner_model->admin_model = true;
	}

	public function index($area=""){
		$this->data["area"] = $this->partner_model->get_area($area);
		$this->data["h2"] = "夥伴專區 ".@$this->data["area"]["title"];
		$this->data["rs"] = $this->partner_model->get_partner_rs($this->data["area"]["id"]);
		$this->data['content_view'] = $this->load->view('admin/partner/partner_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($area="",$id=0){
		$this->data["area"] = $this->partner_model->get_area($area);
		$this->data["de_area"] = $this->data["area"]["id"];
		$this->data["areas"] = $this->partner_model->get_area_rs();
		$this->data["h2"] = "夥伴專區 - 編輯";
		$this->data["row"] = $this->partner_model->get_partner_row($id);
		$this->data['content_view'] = $this->load->view('admin/partner/partner_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);

	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$products = (isset($this->post["set0_val"]))?json_encode($this->post["set0_val"]):"[]";
		
		$product_content = array();
		if(@$this->post["pro_name"]!=""){
			$pors = $this->post["pro_name"];
			foreach($pors as $key=>$pname){
				$img = (isset($this->post["pro_gallery".$key]))?$this->post["pro_gallery".$key]:[];
				$new = array("pro_name"=>urlencode($pname),"pro_link"=>$this->post["pro_link"][$key],"pro_img"=>$img);
				array_push($product_content,$new);
			}
		}
		$table=array(
			"PK"=>"id",
			"type_id"=>$this->post["type_id"],
			"banner"=>$this->post["banner"],
			"phone"=>$this->post["phone"],
			"link"=>$this->post["link"],
			"address"=>$this->post["address"],
			"open_time"=>$this->post["open_time"],
			"brand"=>$this->post["brand"],
			"cover_img"=>$this->post["cover_img"],
			"brand"=>$this->post["brand"],
			"title" =>$this->post["title"],
			"product_ids"=>$products,
			"product_content"=>json_encode($product_content),
			"publish" =>$this->post["publish"],
			"content"=>$this->post["content"],
			"gallery_img"=>json_encode(@$this->post["gallery0"])
			);
		$bid = $this->global_model->sql_save("store",$table,$where);
		$area = $this->partner_model->get_area_url($this->post["type_id"]);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/edit/".$area["url"]."/".$bid."';";
	}
	public function publish(){
		
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK" => "id",
			"publish" => $this->post["publish"]
			);
		$bid = $this->global_model->sql_save("store",$table,$where);
	}
	public function del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("store",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
	public function sort()
	{
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("store",$table,$where);
		}
	}



	/*original*/
	public function crop(){
		$this->load->model('upload_model');
		$crop = $this->upload_model->img_crop();
		$thumbnail_size = json_decode($this->post['thumbnail_size']);
		if (count($thumbnail_size)){
			$this->upload_model->size = $thumbnail_size;
			$this->upload_model->img_fit($crop['file']);
			$file_name = explode('/',$crop['file']);
			$crop = array('file'=>$file_name[0].'/'.file_core_name($file_name[1]).'_'.$thumbnail_size[0].'.'. file_extension($file_name[1]));
		}
		else{
			$file_name = explode('/',$crop['file']);
			$crop = array('file'=>$file_name[0].'/'.file_core_name($file_name[1]).'.'. file_extension($file_name[1]));
		}
		echo json_encode($crop);
	}

	public function upload($file="flie"){
		$this->load->model('upload_model');
		$this->upload_model->data_key = array('image_width');
		$img = $this->upload_model->img_upload($file);
		echo json_encode($img);
	}
	public function gallery_img($file="input_name"){
		//原圖 與 裁圖
		$this->load->model('upload_model');
		$this->upload_model->data_key = array('image_width');
		$img = $this->upload_model->img_upload($file);
		$thumbnail_size = json_decode($this->post['thumbnail_size']);
		if (count($thumbnail_size)){
			$this->upload_model->size = $thumbnail_size;
			$this->upload_model->img_moo_resize($img["file"]);
			$file_name = explode('/',$img['file']);
			$img = array('file'=>$file_name[0].'/'.file_core_name($file_name[1]).'_'.$thumbnail_size[0].'.png');
		}
		else{
			$file_name = explode('/',$img['file']);
			$img = array('file'=>$file_name[0].'/'.file_core_name($file_name[1]).'.'. file_extension($file_name[1]));
		}
		echo json_encode($img);
	}

	public function select_product($setid = 0){
		$this->data["h2"] = "夥伴專區 選擇店內商品";
		$this->data["set_id"] = $setid;
		$this->data["ids"] = json_decode($this->post["ids"]);
		$this->data["ids"] = ($this->data["ids"]=="")?array():$this->data["ids"];
		$this->data["rs"] = $this->partner_model->get_product_rs();
		$this->load->view("admin/product/check_product",$this->data);
	}

	public function get_product_rec(){
		$this->load->model("product_model");
		$this->product_model->admin_model = true;
		$datas = $this->product_model->get_product_rec($this->post["ids"]);
		echo json_encode($datas);
	}
}