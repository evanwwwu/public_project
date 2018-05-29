<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faucet extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->global_model->init();
		$this->post = $this->input->post(NULL,TRUE);
		$this->get = $this->input->get(NULL,TRUE);
		$this->data["controller_addr"]  = "faucet";
		$this->load->model("product_model");
		$this->product_model->url = "faucet";
		$this->product_model->admin_model = true;
	}

	/*banner*/
	public function banner(){
		$this->data["h2"] = "龍頭 輪播圖管理";
		$this->data["rs"] = $this->product_model->get_banner_rs();
		$this->data['content_view'] = $this->load->view('admin/product/banner_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function banner_edit($id=0){
		$this->data["h2"] = "龍頭 輪播圖管理 - 編輯";
		$this->data["id"] = $id;
		$this->data['row'] = $this->product_model->get_banner_row($id);
		$this->data['content_view'] = $this->load->view('admin/product/banner_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function banner_save($id=0){
		$where = " id = '".$id."'";
		$main_id = $this->product_model->get_main_id();
		$table=array(
			"PK"=>"id",
			"main_id"=>$main_id,
			"filename"=>$this->post["filename"],
			"title" =>$this->post["title"],
			"publish" =>$this->post["publish"]
			);
		$bid = $this->global_model->sql_save("product_banner",$table,$where);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/banner_edit/".$bid."';";
	}
	public function banner_publish(){
		$main_id = $this->product_model->get_main_id();
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK" => "id",
			"publish" => $this->post["publish"]
			);
		$bid = $this->global_model->sql_save("product_banner",$table,$where);
	}
	public function banner_del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("product_banner",$where);
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
			$this->global_model->sql_save("product_banner",$table,$where);
		}
	}


	/*menu*/
	public function menu(){
		// $this->log->admin_write_log("INFO","龍頭選單管理");
		$this->data["h2"] = "龍頭 選單管理 - 編輯";
		$this->data["submenu"] = $this->product_model->get_menu("submenu");
		$this->data["feature"] = $this->product_model->get_menu("feature");
		$this->data['content_view'] = $this->load->view('admin/product/menu_view',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function menu_save(){
		$main_id = $this->product_model->get_main_id();
		$save = array("submenu"=>2,"feature"=>3);
		foreach($save as $type => $num){
			for($i=0;$i<$num;$i++){
				$where = "id = '".$this->post[$type."_id"][$i]."' and type = '".$type."'";
				$table=array(
					"PK"=>"id",
					"main_id"=>$main_id,
					"type"=>$type,
					"cover_img"=>$this->post[$type."_cover"][$i],
					"title" =>$this->post[$type."_title"][$i],
					"link" =>$this->post[$type."_link"][$i],
					"sort"=>$i
					);
				$id = $this->global_model->sql_save("product_submenu",$table,$where);
			}
		}
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/menu/';";
	}

	/*filter*/
	public function filter(){
		$this->data["h2"] = "龍頭 過濾選項管理 - 編輯";
		$this->data["filters"] = $this->product_model->get_filters();
		$this->data['content_view'] = $this->load->view('admin/product/filter_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function filter_save(){
		$main_id = $this->product_model->get_main_id();
		$where = "id = '".$this->post["key"]."'";
		if($this->post["type"]=="filter"){
			$type = "filter";
			$databace = "product_filter";
			$table = array(
				"PK"=>"id",
				"main_id"=>$main_id,
				"title"=>$this->post["title"]
				);
		}
		else{
			$type = "option";
			$databace = "filter_option";
			$table = array(
				"PK"=>"id",
				"filter_id"=>$this->post["filter_id"],
				"name"=>$this->post["name"]
				);
		}
		$id = $this->global_model->sql_save($databace,$table,$where);
		echo '{"id":'.$id.',"type":"'.$type.'"}';
	}

	public function filter_del($id=0){
		$where = "id = '".$id."'";
		$this->global_model->sql_del("product_filter",$where);
	}

	public function filter_sort(){
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("product_filter",$table,$where);
		}
	}
	public function option_del($id=0){
		$where = "id = '".$id."'";
		$this->global_model->sql_del("filter_option",$where);
	}
	public function option_sort(){
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("filter_option",$table,$where);
		}
	}
	/*part*/
	public function parts(){
		$this->data["h2"] = "龍頭 配件管理";
		$this->data["rs"] = $this->product_model->get_part_rs();
		$this->data['content_view'] = $this->load->view('admin/product/parts_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function parts_edit($id=0){
		$this->data["h2"] = "龍頭 配件管理 - 編輯";
		$this->data["id"] = $id;
		$this->data["row"] = $this->product_model->get_part($id);
		$this->data['content_view'] = $this->load->view('admin/product/parts_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function parts_save($id=0){
		$where = "id = '".$id."'";
		$main_id = $this->product_model->get_main_id();
		$table = array(
			"PK"=>"id",
			"main_id"=>$main_id,
			"title"=>$this->post["title"],
			"cover_img"=>$this->post["cover_img"],
			"price"=>$this->post["price"],
			"part_no"=>$this->post["part_no"]
			);
		$id = $this->global_model->sql_save("product_parts",$table,$where);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/parts_edit/".$id."';";
	}
	public function parts_del($id=0){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("product_parts",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
	/*AD*/
	public function ad(){
		$this->data["h2"] = "龍頭 廣告管理";
		$this->data["rs"] = $this->product_model->get_ad_rs();
		$this->data['content_view'] = $this->load->view('admin/product/ad_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function ad_edit($id=0){
		$this->data["h2"] = "龍頭 廣告管理 - 編輯";
		$this->data["id"] = $id;
		$this->data["row"] = $this->product_model->get_ad($id);
		$this->data['content_view'] = $this->load->view('admin/product/ad_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}
	public function ad_save($id=0){
		$where = "id = '".$id."'";
		$main_id = $this->product_model->get_main_id();
		$table = array(
			"PK"=>"id",
			"main_id"=>$main_id,
			"type"=>"AD",
			"publish"=>$this->post["publish"],
			"title"=>$this->post["title"],
			"cover_img"=>$this->post["cover_img"],
			"link"=>$this->post["link"]
			);
		$id = $this->global_model->sql_save("product_submenu",$table,$where);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/ad_edit/".$id."';";
	}
	public function ad_publish(){
		$main_id = $this->product_model->get_main_id();
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK" => "id",
			"publish" => $this->post["publish"]
			);
		$bid = $this->global_model->sql_save("product_submenu",$table,$where);
	}
	public function ad_del(){
		$where = "id = '".$this->post["id"]."' and type='AD'";
		$this->global_model->sql_del("product_submenu",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
	}
	public function ad_sort()
	{
		$ids = $this->post["id"];
		foreach($ids as $cou => $id)
		{
			$where = "id = '".$id."'";
			$table = array(
				"PK"=>"id",
				"sort"=>$cou
				);
			$this->global_model->sql_save("product_submenu",$table,$where);
		}
	}

///products
	public function products(){
		$this->data["h2"] = "龍頭 商品管理";
		$this->data["rs"] = $this->product_model->get_product_rs();
		$this->data['content_view'] = $this->load->view('admin/product/product_list',$this->data,true);
		$this->load->view('admin/master_view',$this->data);

	}
	public function edit($id=0)
	{
		$this->data["h2"] = "龍頭 商品管理 - 編輯";
		$this->data["id"] = $id;
		$this->data["filters"] = $this->product_model->get_filters();
		$this->data['row'] = $this->product_model->get_product($id);
		$this->data['content_view'] = $this->load->view('admin/product/product_edit',$this->data,true);
		$this->load->view('admin/master_view',$this->data);
	}

	public function save($id=0){
		$where = " id = '".$id."'";
		$main_id = $this->product_model->get_main_id();
		$sel_part = array();
		if(count(@$this->post["select_title"])>0){
			foreach($this->post["select_title"] as $kk=>$title)
			{
				$sel_parts =(isset($this->post["p".$kk."_ids"]))?$this->post["p".$kk."_ids"]:[];
				$set =array("select_title"=>urlencode($title),"sel_parts"=>$sel_parts);
				array_push($sel_part,$set);
			}
		}
		$parts = (isset($this->post["set0_val"]))?json_encode($this->post["set0_val"]):"[]";
		$sp_parts = (isset($this->post["set1_val"]))?json_encode($this->post["set1_val"]):"[]";
		$recommend = (isset($this->post["set2_val"]))?json_encode($this->post["set2_val"]):"[]";
		$table=array(
			"PK"=>"id",
			"main_id"=>$main_id,
			"title"=>$this->post["title"],
			"cover_img"=>json_encode(@$this->post["cover_img0"]),
			"gallery_img"=>json_encode(@$this->post["gallery0"]),
			"product_no"=>@$this->post["product_no"],
			"price"=>@$this->post["price"],
			"parts"=>$parts,
			"sp_parts"=>$sp_parts,
			"parts_select"=>json_encode($sel_part),
			"content"=>addslashes(@$_POST["content"]),
			"recommend"=>$recommend,
			"publish" =>$this->post["publish"]
			);
		$pid = $this->global_model->sql_save("products",$table,$where);
		$this->product_save_filter($pid);
		echo "alert('編輯完成!');";
		echo "location='".ADMIN_URL.$this->data["controller_addr"]."/edit/".$pid."';";
	}
	private function product_save_filter($pid=0){
		$where = "product_id = '".$pid."'";
		$main_id = $this->product_model->get_main_id();
		$this->global_model->sql_del("product_filter_relationship",$where);
		if(count(@$this->post["filter_ids"])>0){
			foreach($this->post["filter_ids"] as $fid){
				$where = "product_id = '0'";
				$table=array(
					"PK"=>"product_id",
					"product_id"=>$pid,
					"main_id"=>$main_id,
					"filter_id"=>$fid
					);
				$rid = $this->global_model->sql_save("product_filter_relationship",$table,$where);
			}
		}
	}
	public function publish(){
		$where = "id = '".$this->post["id"]."'";
		$table = array(
			"PK"=>"id",
			"publish"=>$this->post["publish"]
			);
		$this->global_model->sql_save("products",$table,$where);
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
			$this->global_model->sql_save("products",$table,$where);
		}
	}

	public function del(){
		$where = "id = '".$this->post["id"]."'";
		$this->global_model->sql_del("products",$where);
		echo '$("#row_'.$this->post['id'].'").remove();';
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

	public function select_part($setid = 0){
		$this->data["h2"] = "水槽 選擇配件";

		switch(@$this->post["type"]){
			case "sel":
			$this->data["typeid"] = "1";
			break;
			case "buy":
			$this->data["typeid"] = "2";
			break;
			default:
			$this->data["typeid"] = "0";
			break;
		}
		$this->data["sel_inx"] = @$this->post["sel_inx"];
		$this->data["set_id"] = $setid;
		$this->data["ids"] = json_decode($this->post["ids"]);
		$this->data["ids"] = ($this->data["ids"]=="")?array():$this->data["ids"];
		$this->product_model->admin_model = true;
		$this->data["rs"] = $this->product_model->get_part_rs();
		$this->load->view("admin/product/check_part",$this->data);
	}

	public function get_part(){
		$datas = $this->product_model->get_part_rec($this->post["ids"]);
		echo json_encode($datas);
	}

	public function select_product($setid = 0){
		$this->data["h2"] = "龍頭 選擇推薦商品";
		$this->data["set_id"] = $setid;
		$this->data["ids"] = json_decode($this->post["ids"]);
		$this->data["ids"] = ($this->data["ids"]=="")?array():$this->data["ids"];
		$this->product_model->admin_model = true;
		$this->data["rs"] = $this->product_model->get_product_rs(1);
		$this->load->view("admin/product/check_product",$this->data);
	}

	public function get_product_rec(){
		$datas = $this->product_model->get_product_rec($this->post["ids"]);
		echo json_encode($datas);
	}
}