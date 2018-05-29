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
//一般
	public function index()
	{ 
		$this->data["h2"] = "會員管理 列表";
		$this->data["rs"] = $this->member_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/member/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["h2"] = "會員管理 編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->member_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/member/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = "id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"username"=>$this->post['username'],
			"mobile"=>$this->post['mobile'],
			"phone"=>$this->post['phone'],
			"active"=>$this->post['active'],
			"address"=>$this->post['address'],
			);
		$bid = $this->global_model->sql_save("members",$table,$where);
		echo "alert('儲存完成!');";
		echo "location='".ADMIN_URL."member/edit/".$bid."';";
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
		$where2 = "id = '".$this->post["pid"]."'";
		$this->global_model->sql_del("products",$where2);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
// img

	public function file_upload($file="flie")
	{
		$this->load->model('upload_model');
		$file = $this->upload_model->file_upload($file);
		echo json_encode($file);
	}
	public function upload($file="flie"){
		$this->load->model('upload_model');
		$this->upload_model->data_key = array('image_width');
		$img = $this->upload_model->img_upload($file);
		echo json_encode($img);
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