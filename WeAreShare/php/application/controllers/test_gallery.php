<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_gallery extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(null,true);
	}

	public function index(){
		$sql = "SELECT post_title,ID FROM `posts` WHERE `post_type`='gallery-img' and post_parent in(select id from posts where post_parent=0 and post_status='publish') order by ID desc";
		$query = $this->db->query($sql);
		$i=0;
		$this->load->library('image_lib');
		foreach($query->result_array() as $row){
			$i++;
			$size = getimagesize('upload/'.$row['post_title']);
			if ($size[0]==250 and $size[1]==250){
				$file = str_replace("_thumb","",$row['post_title']);
				$config['image_library'] = 'gd2';
				$config['source_image']	= 'upload/'.$file;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 0;
				$config['height'] = 500;
				$this->image_lib->initialize($config);
				$this->image_lib->fit();
				$this->image_lib->clear();
				var_dump($i);
				var_dump($row['ID']);
				var_dump($file);
				var_dump($size);
				echo "<br>";
			}
		}
		echo "<br>end";

	}

	public function by_parent($id){
		$sql = "SELECT post_title FROM `posts` WHERE `post_type`='gallery-img' and post_parent='{$id}'";
		$query = $this->db->query($sql);
		$i=0;
		foreach($query->result_array() as $row){
			$i++;
			$file = str_replace("_thumb","",$row['post_title']);
			$config['image_library'] = 'gd2';
			$config['source_image']	= 'upload/'.$file;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 0;
			$config['height'] = 500;
			$this->load->library('image_lib',$config);
			$this->image_lib->fit();
			var_dump($file);
			var_dump($i);
		}
		echo "<br>end";
	}

	public function by_name($filename){
		$file = str_replace("_thumb","",$filename);
		$config['image_library'] = 'gd2';
		$config['source_image']	= 'upload/'.$file;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 0;
		$config['height'] = 500;
		$this->load->library('image_lib',$config);
		$this->image_lib->fit();
		var_dump($file);
	}
}
