<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
	}

	public function upload($file='file'){
		$config['upload_path'] = '../upload/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['encrypt_name'] = 'false';
		$this->load->library('upload',$config);
		if ( !$this->upload->do_upload($file))
		{
			$data = $this->upload->display_errors();
			$array = array(
				'error' => $data
			);
		}
		else
		{
			$data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image']	= '../upload/'.$data['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 250;
			$config['height'] = 250;
			$this->load->library('image_lib',$config);
			$this->image_lib->fit();
			$this->load->helper('MY_file_helper');
			$thumb = file_core_name($data['file_name']) . '_thumb.' . file_extension($data['file_name']);
			$array = array(
				'filename' => $thumb,
				'error' => ''
			);
		}
		$this->save_image($_POST['id'],$thumb,'cover-img');
		echo '['.stripslashes(json_encode($array)).']';
		exit;
	}

	public function upload02($file='file'){
		$config['upload_path'] = '../upload/';
		$config['allowed_types'] = 'gif|jpg|png|';
		$config['encrypt_name'] = 'false';
		$this->load->library('upload',$config);
		if ( !$this->upload->do_upload($file))
		{
			$data = $this->upload->display_errors();
			$array = array(
				'error' => $data
			);
		}
		else
		{
			$data = $this->upload->data();
			$config['image_library'] = 'gd2';
			$config['source_image']	= '../upload/'.$data['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 440;
			$config['height'] = 440;
			$this->load->library('image_lib',$config);
			$this->image_lib->fit();
			$this->load->helper('MY_file_helper');
			$thumb = file_core_name($data['file_name']) . '_thumb.' . file_extension($data['file_name']);
			$array = array(
				'filename' => $thumb,
				'error' => ''
			);
		}
		$this->save_image($_POST['id'],$thumb,'cover-img');
		echo '['.stripslashes(json_encode($array)).']';
		exit;
	}

	public function banner($file='file'){
		$config['upload_path'] = '../upload/';
		$config['allowed_types'] = 'gif|jpg|png|swf';
		$config['encrypt_name'] = 'false';
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload($file))
		{
			$data = $this->upload->display_errors();
			$array = array(
				'error' => $data
			);
		}
		else
		{
			$data = $this->upload->data();
			$thumb = $data['file_name'];
			$array = array(
				'filename' => $thumb,
				'error' => ''
			);
		}
		echo '['.stripslashes(json_encode($array)).']';
		exit;
	}

	public function ckupload($file='upload',$id=0){
		$config['upload_path'] = '../upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = 'true';
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload($file))
		{
			$data = $this->upload->display_errors();
			$array = array(
				'error' => $data
			);
		}
		else
		{
			$data = $this->upload->data();
			//寫入
			$this->save_image($id,$data['file_name'],'content-img');
			echo '<script type="text/javascript">
					//'.$id.'
					window.parent.CKEDITOR.tools.callFunction( '.$_GET['CKEditorFuncNum'].', "'.SITE_URL.'upload/'.$data['file_name'].'" );
					</script>';
		}
	}

	public function gallery_upload($file='upload',$id=0){
		$config['upload_path'] = '../upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = 'true';
		$this->load->library('upload',$config);
		if ( ! $this->upload->do_upload($file))
		{
			$data = $this->upload->display_errors();
			$array = array(
				'error' => $data
			);
		}
		else
		{
			$data = $this->upload->data();

			$config['image_library'] = 'gd2';
			$config['source_image']	= '../upload/'.$data['file_name'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 0;
			$config['height'] = 500;
			$this->load->library('image_lib',$config);
			$this->image_lib->fit();
			$this->load->helper('MY_file_helper');
			$thumb = file_core_name($data['file_name']) . '_thumb.' . file_extension($data['file_name']);
			$array = array(
				'filename' => $thumb,
				'error' => ''
			);
		}
	
		$this->save_image($id,$thumb,'gallery-img');
		echo $thumb;
		exit;
	}


	private function save_image($id,$filename,$type){
		$sql = "INSERT INTO  `posts` (
			`ID` ,
			`post_author` ,
			`post_date` ,
			`post_date_gmt` ,
			`post_content` ,
			`post_title` ,
			`post_excerpt` ,
			`post_status` ,
			`comment_status` ,
			`ping_status` ,
			`post_password` ,
			`post_name` ,
			`to_ping` ,
			`pinged` ,
			`post_modified` ,
			`post_modified_gmt` ,
			`post_content_filtered` ,
			`post_parent` ,
			`guid` ,
			`menu_order` ,
			`post_type` ,
			`post_mime_type` ,
			`comment_count`
			)
			VALUES (
			NULL ,  {$_SESSION[ADMIN_SESSION]},  '" . date('Y-m-d H:i:s') . "',  '0000-00-00 00:00:00',  '',  '{$filename}',  '',  'inherit',  'open',  'open',  '',  '',  '',  '',  '0000-00-00 00:00:00',  '0000-00-00 00:00:00',  '',  '{$id}',  '',  '0',  '{$type}',  '',  '0'
			)";
		$this->db->query($sql);
	}
}