<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init(); 
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "classes";
		$this->databace = "classes";
		$this->load->model("classes_model");
		$this->data["month_name"] = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"); 
		$this->classes_model->admin_model = true;
	}
//一般
	public function index()
	{ 
		$this->data["h2"] = "料理教室管理 列表";
		$this->data["rs"] = $this->classes_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/classes/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["h2"] = "料理教室管理 編輯";
		$this->data["id"] = $id;
		$this->data["types"] = $this->classes_model->get_type_rs();
		$this->data['row'] = $this->classes_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/classes/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function get_member($date_id=0){
		$this->data["pay_type"] = array("Credit"=>"信用卡","WebATM"=>"線上ATM","CVS"=>"超商取號");
		$this->data["members"] = $this->classes_model->get_order($date_id);
		$this->data["classes"] = $this->classes_model->get_c_date($date_id);
		$this->load->view("admin/classes/order_member",$this->data);
	}

	public function get_filter($parent_id){
		echo json_encode($this->classes_model->get_filters_rs($parent_id));
	}
	public function save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"title"=>@$this->post["title"],
			"month"=>@$this->post["month"],
			"teacher_img"=>@$this->post["teacher_img"],
			"teacher_text"=>@addslashes(@$_POST["teacher_text"]),
			"teacher_name"=>@$this->post["teacher_name"],
			"main_img"=>@$this->post["main_img"],
			"content"=>addslashes(@$_POST["content"]),
			"publish"=>$this->post["publish"],
			"top_text"=>addslashes(@$_POST["top_text"])
			);
		$cid = $this->global_model->sql_save($this->databace,$table,$where);
		if(count(@$this->post["date_id"])>0){
			foreach ($this->post["date_id"] as $key => $date_id) {
				$where2 ="date_id = '".$date_id ."'";
				$table2=array(
					"PK"=>"date_id",
					"classes_id"=>$cid,					
					"classes_date"=>$this->post["classes_date"][$key],
					"people_limit"=>$this->post["people_limit"][$key],
					"price"=>$this->post["price"][$key]
					);
				$this->global_model->sql_save("classes_date",$table2,$where2);
			}
		}
		echo "alert('儲存完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/edit/".$cid."';";
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
	public function del_member(){
		$where = "id = '".$this->post["id"]."'";
		$table=array(
			"PK"=>"id",
			"state"=>"訂單取消"
			);
		$cid = $this->global_model->sql_save("classes_order",$table,$where);
		$this->classes_model->update_del_order($this->post["id"]);

	}
	/////////type

	public function type(){
		$this->data["h2"] = "料理教室管理 類別列表";
		$this->data["rs"] = $this->classes_model->get_type_rs();
		$this->data['content_view'] = $this->load->view('admin/classes/type_list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}	

	public function type_edit($id=0){
		$this->data["h2"] = "料理教室管理 類別編輯";
		$this->data["id"] = $id;
		$this->data["row"] = $this->classes_model->get_type_row($id);
		$this->data['content_view'] = $this->load->view('admin/classes/type_edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function type_save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"relation_id"=>"0",
			"level"=>"0",
			"main_type"=>$this->data["controller_addr"],
			"title" =>$this->post["title"],
			"publish" =>$this->post["publish"]
			);
		$bid = $this->global_model->sql_save("sub_type",$table,$where);
		echo "alert('儲存完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/type_edit/".$bid."';";
	}

	public function type_publish(){
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK"=>"id",
			"publish"=>$this->post["publish"]
			);
		$this->global_model->sql_save("sub_type",$table,$where);
	}

	public function type_sort()
	{
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("sub_type",$table,$where);
		}
	}

	public function type_del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("sub_type",$where);
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