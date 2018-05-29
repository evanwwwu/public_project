<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "home";
		$this->load->model("home_model");
		$this->home_model->admin_model = true;
	}

	/*banner*/
	public function banner(){
		$this->data["h2"] = "首頁 輪播圖管理";
		$this->data["rs"] = $this->home_model->get_banner_rs();
		$this->data['content_view'] = $this->load->view('admin/home/banner_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function banner_edit($id=0){
		$this->data["h2"] = "首頁 輪播圖管理 - 編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->home_model->get_banner_row($id);
		$this->data['content_view'] = $this->load->view('admin/home/banner_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function banner_save($id=0){
		$where = " id = '".$id."'";
		
		$table=array(
			"PK"=>"id",
			"cover_img"=>$this->post["cover_img"],
			"link"=>$this->post["link"],
			"title" =>$this->post["title"],
			"publish" =>$this->post["publish"]
			);
		$bid = $this->global_model->sql_save("index_banner",$table,$where);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/banner_edit/".$bid."';";
	}
	public function banner_publish(){
		
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK" => "id",
			"publish" => $this->post["publish"]
			);
		$bid = $this->global_model->sql_save("index_banner",$table,$where);
	}
	public function banner_del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("index_banner",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
	public function banner_sort()
	{
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("index_banner",$table,$where);
		}
	}


	/*product*/
	public function product(){
		$this->data["h2"] = "首頁 PRODUCT區塊 - 編輯";
		$this->data["rs"] = $this->home_model->get_product();
		$this->data['content_view'] = $this->load->view('admin/home/product_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function product_save(){
		
		for($i=0;$i<3;$i++){
			$where = "id = '".$this->post["pid"][$i]."'";
			$table=array(
				"PK"=>"id",
				"cover_img"=>@$this->post["cover_img"][$i],
				"title" =>@$this->post["title"][$i],
				"link" =>@$this->post["link"][$i]
				);
			$id = $this->global_model->sql_save("index_product",$table,$where);
		}
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/product/';";
	}

	/*feature*/
	public function feature(){
		$this->data["h2"] = "首頁 FEATURE區塊";
		$this->data["rs"] = $this->home_model->get_feature_rs();
		$this->data['content_view'] = $this->load->view('admin/home/feature_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function feature_edit($id=0){
		$this->data["h2"] = "首頁 FEATURE區塊 - 編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->home_model->get_feature_row($id);
		$this->data['content_view'] = $this->load->view('admin/home/feature_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function feature_save($id=0){
		$where = "id = '".$id."'";
		$table = array(
			"PK"=>"id",
			"cover_img"=>$this->post["cover_img"],
			"link"=>$this->post["link"],
			"link_title"=>$this->post["link_title"]
			);
		$id = $this->global_model->sql_save("index_feature",$table,$where);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/feature_edit/".$id."';";
	}

	public function feature_del(){
		$where = "id = '".$this->post['id']."'";
		$this->global_model->sql_del("index_feature",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}

	public function feature_publish(){
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK"=>"id",
			"publish"=>$this->post["publish"]
			);
		$this->global_model->sql_save("index_feature",$table,$where);
		
	}
	public function feature_sort(){
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("index_feature",$table,$where);
		}
	}
	/*appliance*/
	public function appliance(){
		$this->data["h2"] = "首頁 APPLIANCE區塊";
		$this->data["rs"] = $this->home_model->get_appliance_rs();
		$this->data['content_view'] = $this->load->view('admin/home/appliance_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function appliance_edit($id=0){
		$this->data["h2"] = "首頁 APPLIANCE區塊 - 編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->home_model->get_appliance_row($id);
		$this->data['content_view'] = $this->load->view('admin/home/appliance_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function appliance_save($id=0){
		
		$where = "id = '".$id."'";
		$table = array(
			"PK"=>"id",
			"type"=>$this->post["type"],
			"publish"=>$this->post["publish"],
			"cover_img"=>$this->post["cover_img"],
			"link"=>$this->post["link"],
			"content"=>addslashes(@$_POST["content"]),
			"link_title"=>$this->post["link_title"]
			);
		$id = $this->global_model->sql_save("index_appliance",$table,$where);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/appliance_edit/".$id."';";
	}

	public function appliance_del(){
		$where = "id = '".$this->post['id']."'";
		$this->global_model->sql_del("index_appliance",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}

	public function appliance_publish(){
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK"=>"id",
			"publish"=>$this->post["publish"]
			);
		$this->global_model->sql_save("index_appliance",$table,$where);
		
	}
	public function appliance_sort(){
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("index_appliance",$table,$where);
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
}