<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "shop";
		$this->databace = "shop";
		$this->load->model("shop_model");
		$this->shop_model->admin_model = true;
	}
	public function index()
	{
		$this->data["h2"] = "SHOP 店家管理";
		$this->data["rs"] = $this->shop_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/shop/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["h2"] = "SHOP 店家管理 - 編輯";
		$this->data["id"] = $id;
		$this->data["countrys"] = $this->shop_model->get_country();
		$this->data['row'] = $this->shop_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/shop/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"country_id"=>$this->post["country_id"],
			"type_id"=>$this->post["type_id"],
			"title_en" =>@$this->post["title_en"],
			"title_tw" =>@$this->post["title_tw"],
			"address_en"=>@$this->post["address_en"],
			"address_tw"=>@$this->post["address_tw"],
			"link"=>@$this->post["link"],
			"phone"=>@$this->post["phone"],
			"publish" =>$this->post["publish"]
			);
		$tid = $this->global_model->sql_save($this->databace,$table,$where);
		echo "location='".ADMIN_URL."shop/edit/".$tid."';";
	}
	public function publish(){
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK"=>"id",
			"publish"=>$this->post["publish"]
			);
		$this->global_model->sql_save($this->databace,$table,$where);
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
			$this->global_model->sql_save($this->databace,$table,$where);
		}
	}

	public function del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del($this->databace,$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}

	public function country(){
		$this->data["h2"] = "SHOP 店家管理 - 國家類別";
		$this->data["rs"] = $this->shop_model->get_country();
		$this->data['content_view'] = $this->load->view('admin/shop/country_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function country_save($id=0){
		$where = "id = '".$id."'";
		$table = array(
			"PK"=>"id",
			"name_en"=>$this->post["name_en"],
			"name_tw"=>$this->post["name_tw"]
			);
		$this->global_model->sql_save("shop_country",$table,$where);
		echo "location='".ADMIN_URL."shop/country';";
	}
	public function country_sort(){
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("shop_country",$table,$where);
		}
	}
	public function country_del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("shop_country",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
	public function upload($file="flie"){
		$this->load->model('upload_model');
		$this->upload_model->data_key = array('image_width');
		$img = $this->upload_model->img_upload($file);
		echo json_encode($img);
	}

	public function get_lang($id=0,$lan="")
	{
		$data = array("lan"=>$lan);
		$field = array("title","address");
		$this->data['row'] = $this->shop_model->get_row($id);
		if(count($this->data["row"])>0)
		{
			foreach($field as $ff)
			{
				$data[$ff] = $this->data["row"][$ff."_".$lan];
			}
		}
		echo $this->load->view('admin/shop/tab_view',$data,true);
	}

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


}