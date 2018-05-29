<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "project";
		$this->databace = "project";
		$this->load->model("project_model");
		$this->project_model->admin_model = true;
	}
	public function index()
	{
		$this->data["h2"] = "PROJECT 專案管理";
		$this->data["rs"] = $this->project_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/project/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["h2"] = "PROJECT 專案管理 - 編輯";
		$this->data["id"] = $id;
		$this->data["types"] = $this->project_model->get_type();
		$this->data['row'] = $this->project_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/project/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$lans = array("en","tw");
		foreach($lans as $lan)
		{
			$formats[$lan] = array();
			$fo_title = @$this->post["formats_title_".$lan];
			$fo_content = @$this->post["formats_content_".$lan];
			if($fo_title!=""){
				foreach($fo_title as $key => $title){
					$new = array("formats_title"=>urlencode($title),"formats_content"=>urlencode($fo_content[$key]));
					array_push($formats[$lan],$new);
				}
			}
		}
		$table=array(
			"PK"=>"id",
			"type_id"=>$this->post["type_id"],
			"title_en" =>@$this->post["title_en"],
			"title_tw" =>@$this->post["title_tw"],
			"cover_img" =>@$this->post["cover_img"],
			"gallery_img" =>json_encode(@$this->post["gallery_img0"]),
			"content_en"=>addslashes(@$_POST["content_en"]),
			"content_tw"=>addslashes(@$_POST["content_tw"]),
			"formats_en"=>json_encode($formats["en"]),
			"formats_tw"=>json_encode($formats["tw"]),
			"publish" =>$this->post["publish"]
			);
		$tid = $this->global_model->sql_save($this->databace,$table,$where);
		echo "location='".ADMIN_URL."project/edit/".$tid."';";
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

	public function type(){
		$this->data["h2"] = "PROJECT 專案管理 - 類別";
		$this->data["rs"] = $this->project_model->get_type();
		$this->data['content_view'] = $this->load->view('admin/project/type_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function type_save($id=0){
		$where = "id = '".$id."'";
		$table = array(
			"PK"=>"id",
			"title_en"=>$this->post["title_en"],
			"title_tw"=>$this->post["title_tw"],
			"publish"=>"1"
			);
		$this->global_model->sql_save("project_type",$table,$where);
		echo "location='".ADMIN_URL."project/type';";
	}
	public function type_sort(){
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("project_type",$table,$where);
		}
	}
	public function type_publish(){
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK"=>"id",
			"publish"=>$this->post["publish"]
			);
		$this->global_model->sql_save("project_type",$table,$where);
	}

	public function type_del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("project_type",$where);
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
		$field = array("title","content","formats");
		$this->data['row'] = $this->project_model->get_row($id);
		if(count($this->data["row"])>0)
		{
			foreach($field as $ff)
			{
				$data[$ff] = $this->data["row"][$ff."_".$lan];
			}
		}
		echo $this->load->view('admin/project/tab_view',$data,true);
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
	public function gallery_img($file="input_name"){
		//原圖 與 裁圖
		$this->load->model('upload_model');
		$this->upload_model->data_key = array('image_width');
		$img = $this->upload_model->img_upload($file);

		$thumbnail_size = json_decode($this->post['thumbnail_size']);
		if (count($thumbnail_size)){
			$this->upload_model->size = $thumbnail_size;
			$this->upload_model->img_fit($img['file']);
			$file_name = explode('/',$img['file']);

			$img = array('file'=>$file_name[0].'/'.file_core_name($file_name[1]).'_'.$thumbnail_size[0].'.'. file_extension($file_name[1]));
		}
		else{
			$file_name = explode('/',$img['file']);
			$img = array('file'=>$file_name[0].'/'.file_core_name($file_name[1]).'.'. file_extension($file_name[1]));
		}
		echo json_encode($img);
	}


}