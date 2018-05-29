<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->post = $this->input->post(null,true);
		$this->load->library('email');
	}

	public function index(){
		$this->load->view('oxox_js_view');
	}

	public function login_pop($login=false){
		$this->load->model("member_model");
		if (isset($_SESSION['user_login_id'])){
			$this->data['member_data'] = $this->member_model->get_row($_SESSION['user_login_id']);
		}
		$this->data["login"] = $login;
		$this->data['country_codes_mobile'] = $this->member_model->get_country_code('Taiwan','mobile');
		$this->data['country_codes_address'] = $this->member_model->get_country_code('Taiwan','address');
		$this->load->view("login_view",$this->data);
	}

	public function topic_page($page,$tag_id){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('posts_model');
		$this->data['posts'] = $this->posts_model->rs_topic(0,$tag_id,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_article_view',$this->data);
	}

	public function article_page($start,$tag_id=0){
		$pagesize = 6;
		$this->load->model('posts_model');
		$this->data['posts'] = $this->posts_model->rs(0,$tag_id,$start,$pagesize);
		$html = $this->load->view('more_article_view',$this->data,true);
		$result = array("url"=>SITE_URL."ajax/article_page/".($start+$pagesize)."/".$tag_id,"html"=>$html);
		echo json_encode($result);
	}

	public function index_page($start,$tag_id=0,$ad_s=0){
		$pagesize = 9;
		$this->load->model('posts_model');
		$this->data['posts'] = $this->posts_model->rs(0,$tag_id,$start,$pagesize);
		$this->data["ad"] = $this->global_model->get_index_banner(1,$ad_s);
		$html = $this->load->view('more_index_view',$this->data,true);
		$result = array("url"=>SITE_URL."ajax/index_page/".($start+$pagesize)."/0/".($ad_s+1),"html"=>$html);
		echo json_encode($result);
	}
	
	
	public function author_page($page,$tag_id,$post_parent){
		$pagesize = 4;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('posts_model');
		$this->data['posts'] = $this->posts_model->rs($post_parent,$tag_id,$current_posts,$pagesize);
		$this->load->view('more_author_detail_view',$this->data);
	}
	public function author_list_page($page,$class){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('author_model');
		$this->data['data'] = $this->author_model->rs($current_posts,$pagesize,urldecode($class));
		$this->load->view('more_author_view',$this->data);
	}

	public function column_page($page){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('posts_model');
		$this->data['posts'] = $this->posts_model->rs_column($current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_article_view',$this->data);
	}

	public function event_page($page,$tag_id){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('event_model');
		$this->data['posts'] = $this->event_model->rs(0,$tag_id,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_event_view',$this->data);
	}

	public function event_page_by_date($page,$yymm){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('event_model');
		$this->data['posts'] = $this->event_model->search_month($yymm,$current_posts,$pagesize);

		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}

		$this->load->view('more_event_view',$this->data);
	}

	public function people_page($page){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('people_model');
		$this->data['posts'] = $this->people_model->rs('',$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_people_view',$this->data);
	}

	public function people_page_by_locale($page,$locale){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('people_model');
		$this->data['posts'] = $this->people_model->rs('',$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_people_view',$this->data);
	}

	public function people_page_by_letter($page,$locale){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('people_model');
		$this->data['posts'] = $this->people_model->rs('',$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_people_view',$this->data);
	}



	public function brand_page($page){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('people_model');
		$this->data['posts'] = $this->brand_model->rs('',$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_brand_view',$this->data);
	}
	public function brand_page_by_letter($page,$locale){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('brand_model');
		$this->data['posts'] = $this->brand_model->rs_letter('',$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_people_view',$this->data);
	}

	public function gallery_page($page,$tag_id){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('gallery_model');
		$this->data['posts'] = $this->gallery_model->rs(0,$tag_id,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_gallery_view',$this->data);
	}

	public function gallery_page_by_date($page,$yymm){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('gallery_model');
		$this->data['posts'] = $this->gallery_model->search_month($yymm,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_gallery_view',$this->data);
	}

	public function calendar_page($page,$tag_id){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('calendar_model');
		$this->data['posts'] = $this->calendar_model->rs(0,$tag_id,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_calendar_view',$this->data);
	}

	public function calendar_page_by_date($page,$yymm){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('calendar_model');
		$this->data['posts'] = $this->calendar_model->search_month($yymm,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_calendar_view',$this->data);
	}

	public function schedule_page($page,$tag_id){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('schedule_model');
		$this->data['posts'] = $this->schedule_model->rs(0,$tag_id,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_schedule_view',$this->data);
	}

	public function schedule_page_by_date($page,$yymm){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('schedule_model');
		$this->data['posts'] = $this->schedule_model->search_month($yymm,$current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_schedule_view',$this->data);
	}


	public function society_page($page){
		$pagesize = 6;
		$current_posts = ($page-1) * $pagesize;
		$this->load->model('society_model');
		$this->data['posts'] = $this->society_model->rs($current_posts,$pagesize);
		$list_banner = $this->global_model->get_list_banner();
		if (count($list_banner)>0 && count($this->data['posts']['data'])>0){
			$offset = rand(2,5);
			array_splice($this->data['posts']['data'],$offset,0, array($list_banner));
		}
		$this->load->view('more_society_view',$this->data);
	}

	public function register_email(){
		$this->load->model('member_model');
		$result = $this->member_model->register_email();
		if ($result==0){
			echo json_encode(array("status"=>"error","info"=>"EMAIL已經被註冊"));
		}
		else{
				$row = $this->member_model->email_get_row($this->post['email']);
				$message ="感謝您在“分享東西We Are Sharing”網站註冊，請點選以下連結來啟動您的帳號。\n\n請點選以下連結來啟動您的帳號:\n".SITE_URL."register_check?code=".md5($row['email'].$row['createtime'])."&email=".urlencode($row['email'])."\n\n您的註冊信箱(會員帳號): ".$row['email']."\n您的登入密碼: ".$row['pwd']."\n\n如果您有任何問題，請聯繫我們的客服信箱：\n\ninfo@wearesharing.com\n\n致禮，\n分享東西We Are Sharing"; 
				$this->email->from('info@wearesharing.com', 'We Are Sharing');
				$this->email->to($this->post['email']);
				$this->email->subject('歡迎加入WeAreSharing.com！請完成電子信箱認證');
				$this->email->message($message);
				if($this->email->send()){
					echo json_encode(array("status"=>true,"title"=>"註冊成功","info"=>"請至電子信箱收取確認信啟動帳號以完成註冊，謝謝。"));
				}
		}
	}

	public function update_profile(){
		$this->load->model('member_model');
		$result = $this->member_model->update_profile();
		if ($result>0){
				echo json_encode(array("status"=>true,"title"=>"修改成功","info"=>"您已成功修改完成。"));
		}
	}

	public function login_email(){
		$this->load->model('member_model');
		$result = $this->member_model->login_email();
		if ($result==true){
			echo 'location.reload();';
		}
		else{
			echo 'alert("登入失敗");';
		}
	}

	public function logout(){
		$this->load->model('member_model');
		$this->member_model->logout();
		header("Location:".SITE_URL);
	}

	public function login_fb(){
		$this->load->model('member_model');
		$result = $this->member_model->login_fb();
		if ($result==true){
			echo 'location.reload();';
		}
		else{
			echo 'alert("請先使用Facebook帳號註冊");';
			echo '$("#logIn").hide();$("#register").show();';
		}
	}
	
	// public function register_weibo(){
	// 	$this->load->model('member_model');
	// 	$result = $this->member_model->register_fb();
	// 	if ($result==0){
	// 		echo 'alert("EMAIL已經被註冊");';
	// 	}
	// 	else{
	// 		$member_data = $this->member_model->get_row($result);
	// 		echo '$("#register").hide();$("#profile").fadeIn();';
	// 		echo '$(".profile .email").html("'.$member_data['email'].'");';
	// 	}
	// 	//header('location:https://api.weibo.com/2/account/profile/email.json');
	// }
	public function register_fb(){
		$this->load->model('member_model');
		$result = $this->member_model->register_fb();
	}
	
	public function event_submenu($act=''){
		$yy = (!isset($_POST['yy']))?date('Y'):$_POST['yy'];
		switch ($act){
			case 'prev':
			$yy -= 1;
			$this->load->model('event_model');
			$this->data['yy_mm_menu'] = $this->event_model->get_ym_menu($yy);
			echo json_encode($this->data['yy_mm_menu']);
			break;
			case 'next':
			$yy += 1;
			$this->load->model('event_model');
			$this->data['yy_mm_menu'] = $this->event_model->get_ym_menu($yy);
			echo json_encode($this->data['yy_mm_menu']);
			break;
			default:
			break;
		}
	}
	public function ad_viewed(){
		$id = $_GET['ad'];
		$this->global_model->add_view_count($id);
	}
public function add_sub(){
	$result = $this->global_model->add_sub($this->post["email"]);
	echo json_encode($result);
}
	public function forgotPass(){
		$this->load->model('member_model');
		$result = $this->member_model->forgotPass();
		if ($result==0){
			echo json_encode(array("status"=>"error","info"=>"查無此會員"));
		}
		else{
			$message = "".$this->post['email']." 您好\n\n您於 ".date('Y-m-d H:i:s')."在“分享東西We Are Sharing”網站使用忘記密碼功能。\n您的密碼已經變更為 :".$result."\n請使用新密碼登入，並更改密碼。\n\nhttp://www.waearesharing.com\n客服信箱：info@wearesharing.com\n\n*請勿直接回覆此郵件";
			$this->email->from('info@wearesharing.com', 'We Are Sharing');
			$this->email->to($this->post['email']);
			$this->email->subject('密碼變更通知信');
			$this->email->message($message);
			if($this->email->send()){
				echo json_encode(array("status"=>true,"title"=>"忘記密碼","info"=>"請至電子信箱收取密碼通知信，謝謝。"));
			}
			else{
				show_error($this->email->print_debugger());
			}
		}
	}
}