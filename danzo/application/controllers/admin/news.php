<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "news";
		$this->databace = "news";
		$this->load->model("news_model");
		$this->news_model->admin_model = true;
	}
	private function check_type(){
		if($this->get["type"]!="news"&&$this->get["type"]!="press"||!isset($this->get["type"])){
			header("location:".ADMIN_URL."news?type=news");exit;
		}
	}
	public function index()
	{
		$this->check_type();
		$this->data["type"] = $this->get["type"];
		$this->data["h2"] = "NEWS 新聞管理 - ".strtoupper($this->data["type"]);
		$this->data["rs"] = $this->news_model->get_rs($this->get["type"]);
		$this->data['content_view'] = $this->load->view('admin/news/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->check_type();
		$this->data["type"] = $this->get["type"];
		$this->data["h2"] = "NEWS 新聞管理 - ".strtoupper($this->data["type"])."編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->news_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/news/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"type_name"=>$this->post["type"],
			"title_en" =>@$this->post["title_en"],
			"title_tw" =>@$this->post["title_tw"],
			"cover_img"=>@$this->post["cover_img"],
			"content_img"=>@$this->post["content_img"],
			"sub_title_en"=>@$this->post["sub_title_en"],
			"sub_title_tw"=>@$this->post["sub_title_tw"],
			"related_en"=>@$this->post["related_en"],
			"related_tw"=>@$this->post["related_tw"],
			"content_en"=>@$this->post["content_en"],
			"content_tw"=>@$this->post["content_tw"],
			"create_date" =>$this->post["create_date"],
			"publish" =>$this->post["publish"]
			);
		$tid = $this->global_model->sql_save($this->databace,$table,$where);
		echo "location='".ADMIN_URL."news/edit/".$tid."?type=".$this->post["type"]."';";
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

	public function upload($file="flie"){
		$this->load->model('upload_model');
		$this->upload_model->data_key = array('image_width');
		$img = $this->upload_model->img_upload($file);
		echo json_encode($img);
	}

	public function get_lang($id=0,$lan="")
	{
		$data = array("lan"=>$lan);
		$field = array("title","sub_title","related","content");
		$this->data['row'] = $this->news_model->get_row($id);
		if(count($this->data["row"])>0)
		{
			foreach($field as $ff)
			{
				$data[$ff] = $this->data["row"][$ff."_".$lan];
			}
		}
		echo $this->load->view('admin/news/tab_view',$data,true);
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