<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_model extends CI_Model {
    var $size = array();   //圖片尺寸
    var $data_key = array(); //回傳數值
    var $firstname ="";   //抬頭名
    public function __construct(){
        parent::__construct();
        $this->post = $this->input->post(NULL,TRUE);
        $this->get = $this->input->get(NULL,TRUE);
        $this->upload_path = "./upload/";

        $this->directory =  $this->upload_path.date('Y-m-d');
        if(!is_dir($this->directory)){
            mkdir($this->directory,0777);
        }
        
    }
    // 原圖上傳
    public function img_upload($file){
        $config['upload_path'] = $this->directory;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = false;
        $config['file_name'] = $this->firstname.md5(uniqid(mt_rand()));
        $this->load->library('upload',$config);
        if (!$this->upload->do_upload($file))
        {
            $data = $this->upload->display_errors();
            $array = array('error' => $data);
        }
        else
        {
            $data = $this->upload->data();
            $file_name = explode ('/',$data['full_path']);
            $file = array_pop($file_name);
            $date = array_pop($file_name);
            $file = $date.'/'.$file;
            $array = array('file' =>$file);
            if($this->data_key!= ''){
                foreach($this->data_key as $row){
                    $array[$row] = $data[$row];
                } 
            }
        }
        return $array;

    }
    // 改變尺寸
    public function resize($file,$width){
        $this->load->helper('my_file_helper');
        $config['image_library'] = 'gd2';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['source_image'] =  $this->upload_path .$file;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 600;
        $config['height'] = 600;
        $filename = explode("/",file_core_name($file));
        $config['new_image']   = $filename[count($filename)-1]. '_resize.'. file_extension($file);
        $this->image_lib->initialize($config);
        if (!$this->image_lib->fit())
        {
            $data = $this->image_lib->display_errors();
            $array = array('error' => $data);
        }
        else{ 
            $array = array('file' =>file_core_name($file). '_resize.'. file_extension($file));
        }
        $this->image_lib->clear();
        return $array;
    }
    // 撐滿裁切
    public function img_fit($file){
        $this->load->helper('my_file_helper');
        if($this->size!=''){
            foreach($this->size as $row){
                $config['image_library'] = 'gd2';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['source_image'] = $this->upload_path.$file;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = TRUE;
                $si = explode('x',$row);
                $file_name = explode('/',$file);
                $config['width'] = $si[0];
                $config['height'] = $si[1];
                $config['new_image']   = file_core_name($file_name[1]). '_' . $row .'.'. file_extension($file_name[1]) ;
                $this->image_lib->initialize($config);
                $this->image_lib->fit();
                $this->image_lib->clear();
            }
            return 0;
        }
    }

    public function p_img_fit($file){
        if($this->size!=''){
            foreach($this->size as $row){
                $config['image_library'] = 'gd2';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['source_image'] = $this->upload_path.$file;
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = TRUE;
                $config["quality"] = "80";
                $config['overwrite'] = true;
                $si = explode('x',$row);
                $file_name = explode('/',$file);
                $config['width'] = $si[0];
                $config['height'] = $si[1];
                $config['new_image']   = file_core_name($file_name[1]).'.'. file_extension($file_name[1]) ;
                $this->image_lib->initialize($config);
                $this->image_lib->fit();
                $this->image_lib->clear();
            }
            return 0;
        }
    }
    // 裁圖功能，包含XY定位
    public function img_crop()
    {
        $config['image_library'] = 'gd2';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['source_image'] = $this->upload_path.$this->post['file'];
        $config['create_thumb'] = false;
        $config['width'] = $this->post['width'] * $this->get['ra'];
        $config['height'] = $this->post['height'] * $this->get['ra'];
        $file_name = explode('/',$this->post['file']);
        if($this->post['x']>=0&&$this->post['y']>=0){
            $config['maintain_ratio'] = false;
            $config['new_image'] = file_core_name($file_name[1]). '_crop_' . $this->post['width'].'x'.$this->post['height'].'.'. file_extension($file_name[1]);
            $config['x_axis'] = $this->post['x'] * $this->get['ra'];        
            $config['y_axis'] = $this->post['y'] * $this->get['ra'];
            $this->image_lib->initialize($config);
            if (!$this->image_lib->crop())
            {
                $data = $this->image_lib->display_errors();
                $array = array('error' => $data);
            }
            else{
                $array = array('file' =>$file_name[0].'/'.file_core_name($file_name[1]). '_crop_' . $this->post['width'].'x'.$this->post['height'].'.'. file_extension($file_name[1]));
            }
        }else{
            $config['maintain_ratio'] = TRUE;
            $config['new_image']   = file_core_name($file_name[1]). '_fit_' . $this->post['width'].'x'.$this->post['height'] .'.'. file_extension($file_name[1]) ;
            $this->image_lib->initialize($config);
            // print_r($config);print_r($this->post);exit;
            if (!$this->image_lib->fit())
            {
                $data = $this->image_lib->display_errors();
                $array = array('error' => $data);
            }
            else{
                $array = array('file' =>$file_name[0].'/'.$config['new_image']);
            }

        }
        return $array;
    }
    //檔案上傳
    public function file_upload($file)
    {
        $config['upload_path'] = $this->directory;
        $config['allowed_types'] = 'pdf|doc|docx|gif|jpg|png';
        $config['encrypt_name'] = 'true';
        $this->load->library('upload',$config);
        if (!$this->upload->do_upload($file))
        {
            $array = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = $this->upload->data();
            $file_name = explode ('/',$data['full_path']);
            $file = array_pop($file_name);
            $date = array_pop($file_name);
            $array = array('filename'=>$date."/".$file,'data' => $data);
        }
        return $array;
    }
    //CKedit套件上傳功能
    public function ckupload($file='upload',$id=0){
        $config['upload_path'] = $this->directory;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = false;
        $config['file_name'] = $this->firstname.md5(uniqid(mt_rand()));
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
            echo '<script type="text/javascript">
                    //'.$id.'
            window.parent.CKEDITOR.tools.callFunction( '.$_GET['CKEditorFuncNum'].', "'.$img.'" );
            </script>';
            // 跨域傳輸 需更改ckedit.js config 
            // echo '<script type="text/javascript">
            // location="'.$_GET["backurl"].'?ImageUrl='.$img.'&CKEditorFuncNum='.$_GET['CKEditorFuncNum'].'";
            // </script>';
            /*
            跨網域 controller function
            public function cktool()
            {
               echo '<script type="text/javascript">
               window.parent.CKEDITOR.tools.callFunction( '.$_GET['CKEditorFuncNum'].', "'.$_GET["ImageUrl"].'" );
               </script>';
            }

            */
        }
    }


//舊版沒有 GET["ra"]
    // public function img_crop(){
    //     $this->load->library('image_lib');
    //     $this->load->helper('my_file_helper');
    //     $config['image_library'] = 'gd2';
    //     $config['allowed_types'] = 'gif|jpg|png';
    //     $config['source_image'] = $this->upload_path.$this->post['file'];
    //     $config['create_thumb'] = false;
    //     $config['width'] = $this->post['width'];
    //     $config['height'] = $this->post['height'];
    //     $file_name = explode('/',$this->post['file']);

    //     if($this->post['x']>=0&&$this->post['y']>=0){
    //         $config['maintain_ratio'] = false;
    //         $config['new_image'] = file_core_name($file_name[1]). '_crop_' . $this->post['width'].'x'.$this->post['height'].'.'. file_extension($file_name[1]);
    //         $config['x_axis'] = $this->post['x'];        
    //         $config['y_axis'] = $this->post['y'];        
    //         $this->image_lib->initialize($config); 
    //         if (!$this->image_lib->crop())
    //         {
    //             $data = $this->image_lib->display_errors();
    //             $array = array('error' => $data);
    //         }
    //         else{
    //             $array = array('file' =>$file_name[0].'/'.file_core_name($file_name[1]). '_crop_' . $this->post['width'].'x'.$this->post['height'].'.'. file_extension($file_name[1]));
    //         }
    //     }else{
    //         $config['maintain_ratio'] = TRUE;
    //         $config['new_image']   = file_core_name($file_name[1]). '_' . $this->post['width'].'x'.$this->post['height'] .'.'. file_extension($file_name[1]) ;
    //         $this->image_lib->initialize($config);
    //         if (!$this->image_lib->fit())
    //         {
    //             $data = $this->image_lib->display_errors();
    //             $array = array('error' => $data);
    //         }
    //         else{
    //             $array = array('file' =>$file_name[0].'/'.file_core_name($file_name[1]). '_' . $this->post['width'].'x'.$this->post['height'] .'.'. file_extension($file_name[1]));
    //         }

    //     }
    //     return $array;
    // }
}
?>