<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init(); 
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "ingredients";
		$this->databace = "ingredients";
		$this->load->model("ingredients_model");
		$this->ingredients_model->admin_model = true;
	}
	
	public function ftp_test(){
		$this->load->library("ftp");
		$this->ftp->connect();
		$files = $this->ftp->list_files('/');
		print_r($files);
		// 銷貨檔名DT20-1,DT20-2....
		// 銷退檔名DT21-1,DT20-2....
	}
	public function excel_test(){
		$this->load->helper('file');
		$this->load->library('excel_reader');
		$this->excel_reader->setOutputEncoding('UTF-8');
		$con = get_filenames(WAREHOUSE_PATH);
		// print_r($con);

		$this->excel_reader->read(WAREHOUSE_PATH.$con[0]);
		$worksheet = $this->excel_reader->sheets[0];
		// print_r($worksheet);
		$numRows = $worksheet['numRows'];   // rows count
		$numCols = $worksheet['numCols'];  // cols count
		$this->data["cells"] = $worksheet['cells']; //
		$this->load->view("admin/excel_table",$this->data);
	}
	
	public function add_data($file){
		$this->load->library('excel_reader');
		$this->excel_reader->setOutputEncoding('UTF-8');
		// $this->excel_reader->read($file);
		$this->excel_reader->read($_FILES[$file]['tmp_name']);
		$worksheet = $this->excel_reader->sheets[0];
		foreach($worksheet['cells'] as $key => $row){
			if ($key>1) {
				$this->new_product($row[1],$row[14],$row[36],$row[2]);
			}
		}
	}
	private function new_product($product_no,$unit_text,$count,$title){
		$where = "product_no = '".$product_no."' and product_type='ingredients'";
		$table=array(
			"PK"=>"id",
			"product_no"=>$product_no,
			"unit_text"=>$unit_text,
			"unit"=>1,
			"product_type"=>"ingredients",
			"price"=>0,
			"count"=>$count
			);
		$pid = $this->global_model->sql_save("products",$table,$where);
		$where2 = "id = '0'";
		$table2 = array(
			"PK"=>"id",
			"product_id"=>$pid,
			"title"=>$title,
			"publish"=>0			
			);
		$mid = $this->global_model->sql_save($this->databace,$table2,$where2);
		$table=array(
			"PK"=>"id",
			"main_id"=>$mid
			);
		$this->global_model->sql_save("products",$table,$where);
	}
//一般
	public function index()
	{ 
		$this->data["h2"] = "食材管理 列表";
		$this->data["rs"] = $this->ingredients_model->get_rs();
		$this->data['content_view'] = $this->load->view('admin/ingredients/list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function edit($id=0)
	{
		$this->data["h2"] = "食材管理 編輯";
		$this->data["id"] = $id;
		$this->data["types"] = $this->ingredients_model->get_type_rs();
		$this->data['row'] = $this->ingredients_model->get_row($id);
		$this->data['content_view'] = $this->load->view('admin/ingredients/edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function get_filter($parent_id){
		echo json_encode($this->ingredients_model->get_filters_rs($parent_id));
	}
	public function save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"type_id"=>@$this->post["type_id"],
			"filter_id"=>@$this->post["filter_id"],
			"cover_img"=>@$this->post["cover_img"],
			"main_img"=>$this->post["main_img"],
			"record_img"=>addslashes($_POST["record_img"]),
			"sub_title"=>$this->post["sub_title"],
			"content"=>addslashes(@$_POST["content"]),
			"info"=>addslashes(@$_POST["info"])
			);
		$pid = $this->global_model->sql_save($this->databace,$table,$where);
		$where2 ="id = '".$this->post["product_id"]."'";
		$table2=array(
			"PK"=>"id",
			"unit_text"=>$this->post["unit_text"],
			"unit"=>$this->post["unit"],
			"ship_type"=>$this->post["ship_type"],
			"price"=>$this->post["price"]
			);
		$this->global_model->sql_save("products",$table2,$where2);
		echo "alert('儲存完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/edit/".$pid."';";
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
	/////////type

	public function type(){
		$this->data["h2"] = "食材管理 類別列表";
		$this->data["rs"] = $this->ingredients_model->get_type_rs();
		$this->data['content_view'] = $this->load->view('admin/ingredients/type_list_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function type_edit($id=0){
		$this->data["h2"] = "食材管理 類別編輯";
		$this->data["id"] = $id;
		$this->data["types"] = $this->ingredients_model->get_type_rs();
		$this->data["row"] = $this->ingredients_model->get_type_row($id);
		$this->data['content_view'] = $this->load->view('admin/ingredients/type_edit_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function type_save($id=0){
		$where = " id = '".$id."'";
		$table=array(
			"PK"=>"id",
			"relation_id"=>(@$this->post["relation_id"]!="")?$this->post["relation_id"]:"0",
			"level"=>(@$this->post["level"]!="")?$this->post["level"]:"0",
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

	public function type_del($sub=""){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("sub_type",$where);
		if($sub=="sub"){
			echo '$("#sub_row_'.$this->post['id'].'").remove();';
		}
		else{
			echo '$("#row_'.$this->post['id'].'").remove();';
		}
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