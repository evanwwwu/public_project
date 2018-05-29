<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "member";
		$this->databace = "members";
		$this->load->model("member_model");
		$this->member_model->admin_model = true;
	}
	public function index()
	{
		$this->data["h2"] = "MEMBER 成員管理";
		$this->data["rs"] = $this->member_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/member/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["h2"] = "MEMBER 成員管理 - 編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->member_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/member/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$lans = array("en","tw");
		foreach($lans as $lan)
		{
			$educations[$lan] = array();
			$edu_title = @$this->post["edu_school_".$lan];
			$edu_content = @$this->post["edu_dep_".$lan];
			if(count($edu_title)>0){
				foreach($edu_title as $key => $title){
					$new = array("edu_school"=>urlencode($title),"edu_dep"=>urlencode($edu_content[$key]));
					array_push($educations[$lan],$new);
				}
			}
			$awards[$lan] = array();
			$awards_name = @$this->post["awards_name_".$lan];
			$awards_no = @$this->post["awards_no_".$lan];
			if(count($awards_name)>0){
				foreach($awards_name as $key => $title){
					$new = array("awards_name"=>urlencode($title),"awards_no"=>urlencode($awards_no[$key]));
					array_push($awards[$lan],$new);
				}
			}
			$exhibitions[$lan] = array();
			$exh_name = @$this->post["exh_name_".$lan];
			if(count($exh_name)>0){
				foreach($exh_name as $key => $title){
					$new = array("exh_name"=>urlencode($title));
					array_push($exhibitions[$lan],$new);
				}
			}
			$press[$lan] = array();
			$press_name = @$this->post["press_name_".$lan];
			if(count($press_name)>0){
				foreach($press_name as $key => $title){
					$new = array("press_name"=>urlencode($title));
					array_push($press[$lan],$new);
				}
			}
		}
		$table=array(
			"PK"=>"id",
			"name_en" =>@$this->post["name_en"],
			"name_tw" =>@$this->post["name_tw"],
			"office"=>@$this->post["office"],
			"email"=>@$this->post["email"],
			"cover_img" =>@$this->post["cover_img"],
			"document_en"=>addslashes(@$_POST["document_en"]),
			"document_tw"=>addslashes(@$_POST["document_tw"]),
			"education_en"=>json_encode($educations["en"]),
			"education_tw"=>json_encode($educations["tw"]),
			"awards_en"=>json_encode($awards["en"]),
			"awards_tw"=>json_encode($awards["tw"]),
			"exhibition_en"=>json_encode($exhibitions["en"]),
			"exhibition_tw"=>json_encode($exhibitions["tw"]),
			"press_en"=>json_encode($press["en"]),
			"press_tw"=>json_encode($press["tw"]),
			"publish" =>$this->post["publish"]
			);
		$tid = $this->global_model->sql_save($this->databace,$table,$where);
		echo "location='".ADMIN_URL."member/edit/".$tid."';";
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
		$field = array("name","document","education","awards","exhibition","press");
		$this->data['row'] = $this->member_model->get_row($id);
		if(count($this->data["row"])>0)
		{
			foreach($field as $ff)
			{
				$data[$ff] = $this->data["row"][$ff."_".$lan];
			}
		}
		echo $this->load->view('admin/member/tab_view',$data,true);
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