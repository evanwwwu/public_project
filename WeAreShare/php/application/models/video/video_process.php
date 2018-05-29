<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class video_process extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this -> load -> database();
        $this -> load -> library('pagination');
    }
	public function VideoList($Page,$TypeId){
		$this->db->select("Video_Id,Video_VideoTypeId,Video_Name,Video_Picture");
		$this->db->from("video");
		$this->db->where("Video_Status","1");
		if($TypeId != 0)
			$this->db->where("Video_VideoTypeId",$TypeId);
		$this->db->order_by("Video_AddTime","DESC");
		$this->db->limit("12",$Page);
		$query = $this->db->get();
		$data  = $query->result();
		unset($query);
		return $data;
	}
	public function VideoDetial($Id){
		$this->db->select("Video_VideoTypeId,Video_Name,Video_Content,Video_Iframe");
		$this->db->from("video");
		$this->db->where("Video_Status","1");
		$this->db->where("Video_Id",$Id);
		$query = $this->db->get();
		$data  = $query->row();
		unset($query);
		return $data;
	}
	public function VideoListPOP($TypeId){
		$this->db->select("Video_Id,Video_VideoTypeId,Video_Name,Video_Picture");
		$this->db->from("video");
		$this->db->where("Video_Status","1");
		if($TypeId != 0)
			$this->db->where("Video_VideoTypeId",$TypeId);
		$this->db->order_by("Video_AddTime","DESC");
		$this->db->limit("12");
		$query = $this->db->get();
		$data  = $query->result();
		unset($query);
		return $data;
	}
}
?>