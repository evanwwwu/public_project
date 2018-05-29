<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Global_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function site_init(){
        $this->load->helper('url');
        // $data['current_url'] = current_url();
        $data['menus'] = $this->get_menu_data();
        // $data['login_view'] = $this->load->view('login_view',$data,true);
        // $data['page_head'] = $this->load->view('page_head_view',$data,true);
        // $data['page_top'] = $this->load->view('page_top_view',$data,true);
        // $data['menu_mobile'] = $this->load->view('menu_mobile_view',$data,true);
        // $data['menu_main'] = $this->load->view('menu_main_view',$data,true);
        // $data['page_footer'] = $this->load->view('page_footer_view',$data,true);
        // if ($aside==1) $data['aside'] = $this->load->view('aside_view',$data,true);
        return $data;
    }
    public function site_init2($aside=0,$data){
        $this->load->helper('url');
        $data['current_url'] = current_url();
        $data['menu_data'] = $this->get_menu_data2();
        $data['login_view'] = $this->load->view('old/login_view',$data,true);
        $data['page_head'] = $this->load->view('old/page_head_view',$data,true);
        $data['page_top'] = $this->load->view('old/page_top_view',$data,true);
        $data['menu_mobile'] = $this->load->view('old/menu_mobile_view',$data,true);
        $data['menu_main'] = $this->load->view('old/menu_main_view',$data,true);
        $data['page_footer'] = $this->load->view('old/page_footer_view',$data,true);
        if ($aside==1) $data['aside'] = $this->load->view('old/aside_view',$data,true);
        return $data;
    }
    public function meta_array($key=''){
        $meta_array = array(
            'welcome'=>array(
                'title'=>'東西名人 We People - 第一生活潮流分享網站',
                'brief'=>'東西全球文創集團全新策畫，東西名人We People，內容囊括全球時尚名人、美容趨勢、名貴珠寶鐘錶、文創生活、各類生活特別企劃、國際展覽與拍賣，東西名人全部一手包辦。',
                'keyword'=>'東西名人,We People,時尚,美容,珠寶,鐘錶,文創,生活,人物,東西全球文創集團,東西全球文創產業有限公司,WE WestEast Global Cultural Creativity Groups,東西媒體集團,WE WestEast Media Group,東西雜誌,WestEast Magazine,WE PEOPLE, 東西名人,Publishing,出版,Media,媒體,公關活動,PR, Events,品牌行銷,Branding,顧問經紀,Agency,策展,Curating'),
        		'about'=>array(
        				'title'=>'東西名人 We People - 第一生活潮流分享網站',
        				'brief'=>'東西全球文創集團全新策畫，東西名人We People，內容囊括全球時尚名人、美容趨勢、名貴珠寶鐘錶、文創生活、各類生活特別企劃、國際展覽與拍賣，東西名人全部一手包辦。',
        				'keyword'=>'東西名人,We People,時尚,美容,珠寶,鐘錶,文創,生活,人物,東西全球文創集團,東西全球文創產業有限公司,WE WestEast Global Cultural Creativity Groups,東西媒體集團,WE WestEast Media Group,東西雜誌,WestEast Magazine,WE PEOPLE, 東西名人,Publishing,出版,Media,媒體,公關活動,PR, Events,品牌行銷,Branding,顧問經紀,Agency,策展,Curating'),        		
        	'article'=>array(
                'title'=>'',
                'brief'=>'東西全球文創集團全新策畫，生活潮流分享網站-東西名人We People，精選第一手潮流報導，精選時尚名人、美容趨勢、名貴珠寶鐘錶與文創生活等豐富資訊。',
                'keyword'=>'文化,珠寶,時尚,生活,美容,人物,鐘錶'),
            '時尚'=>array(
                'title'=>'',
                'brief'=>'東西名人We People精選全球時尚趨勢第一線，囊括全球時尚品牌、包包鞋子配件、名人時尚派對、高級訂製服秀場、活動後台花絮、焦點話題及品牌活動發表會。',
                'keyword'=>'品牌,包包,鞋子,名人,時尚'),
            '人物'=>array(
                '',
                '東西名人We People帶你深入名人世界，提供國內外知名企業家、社會成功人士經典語錄、創業家的心路歷程與人生歷練以及企業管理人經驗分享。',
                '名人,創業家,企業家,慈善公益'),
            '美容'=>array(
                '',
                '東西名人We People美麗祕技大解析，最夯最時尚的彩妝保養品、品牌香水、醫美抗老產品、名人妝容分享、最新美容趨勢與你分享。',
                '香水,彩妝,保養,彩妝技術'),
            '珠寶'=>array(
                '',
                '東西名人We People與你一起探索璀璨珠寶世界，包含高級珠寶品牌、藝術珠寶設計作品、工藝美學大師、蘇富比珠寶拍賣、工藝經典之作。',
                '珠寶品牌,珠寶拍賣'),
            '鐘錶'=>array(
                '',
                '東西名人We People精選鐘錶經典之作，包含全球經典鐘錶收藏、紀念錶款、製錶大師、珠寶鐘錶藝術展覽、世界拍賣紀錄和拍場實錄。',
                '鐘錶設計,鐘錶拍賣,珠寶錶'),
            '文創'=>array(
                '',
                '東西名人We People提供多元豐富的世界藝術家與美學創作，與你分享藝術文化與創意作品、各式珍品收藏、國內外藝術展和藝術拍賣市場、藝術博覽會、名家與大師、亞洲藝術等深入報導。',
                '藝術,文創,收藏'),
            '生活'=>array(
                '',
                '東西名人We People匯聚生活品味美學，綜合國內外建築大師作品、新銳家具設計、奢華名人旅遊、經典美酒佳釀、各式葡萄酒威士忌、精選頂級飯店、國際房產趨勢、高級汽車等。',
                '建築,家具,設計,旅遊'),
            'topic'=>array(
                '',
                '東西名人We People特別企劃-食衣住行專題，提供名貴汽車超跑、空間美學設計、頂級美食、房地產規劃、時尚服飾配件、精選豪宅、私人飛機遊艇等全方位生活資訊。',
                '美食,衣服,住家,旅遊'),
            '食'=>array(
                '',
                '東西名人We People各式精緻美食薈萃、米其林頂級餐廳與美食、老饕優質評鑑、世界一流主廚、美酒佳釀。',
                '美食,餐廳,米其林'),
            '衣'=>array(
                '',
                '東西名人We People介紹各大精品與設計師、品牌包包鞋子配件、高級訂製服時裝秀、時尚話題新作、穿搭提案、時尚直擊、潮流前線。',
                '品牌,包包,鞋子,高級訂製服'),
            '住'=>array(
                '',
                '東西名人We People介紹頂級豪宅與建築師、景觀豪宅新作、莊園別墅、建築大師代表作品與現代新銳藝術設計。',
                '建築師,豪宅,莊園,藝術設計'),
            '行'=>array(
                '',
                '東西名人We People介紹名人旅遊與頂級名車、全球知名觀光景點、名貴私人交通工具，包含超跑、遊艇、私人飛機、雙B名車等奢華生活品味。',
                '旅遊,景點,超跑,名車'),
            'column'=>array(
                '東西名人Sharing | 東西名人 We People','東西名人誌 WE PEOPLE 編輯團隊，東西名人We People提供專欄作家、視覺設計團隊、東西編輯團隊介紹。',
                '作者,編輯,團隊,視覺設計,影像處理'),
            '作者群'=>array(
                '',
                '東西名人誌 WE PEOPLE 的專欄作家提供名人和素人的觀點與看法。',
                '東西名人,專欄作家'),
            '視覺團隊'=>array(
                '',
                '東西名人誌 WE PEOPLE 的視覺團隊，介紹視覺設計、影像處理編輯群。',
                '東西名人,視覺設計'),
            '東西團隊'=>array(
                '',
                '東西名人誌 WE PEOPLE 的文字編輯團隊，文章主題豐富多元，愛好電影、地區文化、珠寶設計、藝術展覽、文創生活、美妝精品、時尚品牌和慈善公益的你絕不能錯過。',
                '東西名人,編輯'),
            'gallery'=>array(
                '',
                '不論是大人物、貴重珠寶、奢華趨勢、頂級時尚、藝術文創、高級鐘錶、美容美妝、名人品味、生活風格、超跑、富豪生活，所有涵蓋食衣住行育樂的生活方式、尊貴頂級服務、高端奢侈品，都可以在東西名人We People找到。',
                '文化,珠寶,時尚,生活,美容,人物,鐘錶,藝廊,畫廊'),
            'g時尚'=>array(
                '',
                '東西名人We People提供頂級時尚精品、品牌龍頭、奢華表徵、紳士高端精品、名人最愛行頭、富豪奢華娛樂、趨勢潮流、高級訂製服與街拍時尚，與你分享第一手的時尚報導。',
                '精品,品牌,時尚'),
            'g美容'=>array(
                '',
                '東西名人We People提供美容新訊，讓你在第一時間掌握所有彩妝新品、美白抗老護膚技巧、年輕肌齡祕方、頂級保養品、美甲藝術。',
                '美容,彩妝,保養'),
            'g珠寶'=>array(
                '',
                '東西名人We People展示頂級珠寶設計、品牌系列作、珠寶設計大師典藏作品、全球珠寶拍賣展覽。',
                '珠寶展,珠寶藝術設計'),
            'g鐘錶'=>array(
                '',
                '東西名人We People展示稀世珍藏名貴腕錶、鐘錶藏家評鑑、經典鐘錶作品、全球名錶展覽。',
                '鐘錶,名錶收藏'),
            'g文創'=>array(
                '',
                '東西名人We People參與各種文化創意與藝術活動，無論是電影、文化藝術、文創生活、舞蹈戲劇、各類書畫展覽，與你分享所有文創新訊。',
                '藝術,文創,收藏'),
            'g生活'=>array(
                '',
                '東西名人We People環繞食住行育樂，多方位生活元素之最新話題，新銳設計作品、經典建築美學設計、生活大師評鑑經典美酒佳釀、景觀豪宅與飯店和奢華名人旅遊等豐富生活資訊。',
                '建築,家具,設計,旅遊'),
            'g人物'=>array(
                '',
                '東西名人We People報導深具話題性的名人，帶你認識國內外知企業管理人、社會成功人士專訪、名人話題與動態及創業家的心路歷程與人生歷練。',
                '名人,企業家'),
            'schedule'=>array(
                '',
                 '東西名人We People提供品牌活動、名人派對、紅白酒烈酒美饌珍饈饗宴、名貴高級甜點來台發表、慶開幕、新品上市、周年、生日重要時刻儀式、名人巨星丰采歡聚、高級鐘錶珠寶發表競標、世界重要活動儀式、國際重要頒獎賽事。',
                 '行事曆,派對,計畫,行程'),
            'event'=>array('',
                '東西名人We People提供東西方重要活動、精品品牌派對、國際級設計大師來台、奢侈品派對、慈善晚宴、品酒晚會、藝術鑑賞派對。',
                '派對,名人'),
            'calendar'=>array('',
                '東西名人We People提供全球活動行程，包含品牌活動派對、新品鑑賞、頒獎典禮、藝術博覽會、蘇富比拍賣、品牌時裝週、設計大獎與慈善晚宴。',
                '行事曆,計畫,行程'),
            'society'=>array(
                '',
                '東西名人We People囊括國內外年度風雲人物、社會知名人士以及全球奢侈品精品品牌錄。',
                '品牌,名牌,名人'),
            'people'=>array('',
                '東西名人We People提供環球高社經地位人士、全球焦點注目名人、年度十大名人榜、國內外風雲人物和業內傑出人才。',
                '名人,風雲人物'),
            'brand'=>array(
                '',
                '東西名人We People提供國內外精品、國際奢侈品、新銳設計師品牌及國際注目焦點品牌。',
                '品牌,名牌,設計師名品'),
            '東西名人成年禮'=>array('',
                '《WE PEOPLE東西名人 名門冠笄成年禮》（WE PEOPLE The Debutante Ball）希望能將優良的社交禮儀與形式，完整傳承下來，形式上融合了中國傳統的成年禮「笄禮」及歐洲的首進社交舞會。',
                'WE PEOPLE東西名人成年禮,WE PEOPLE The Debutante Ball,名門冠笄成年禮,國際社交儀式,社交舞會'));
        
        return @$meta_array[$key];

    }
    public function menu_title($key=''){
        $menu_title = array('article'=>'','column'=>'分享東西Sharing','society'=>'東成西就Society','schedule'=>'東奔西跑Event','gallery'=>'東張西望Gallery');
        return @$menu_title[$key];

    }
    public function get_menu_data2(){
        
        $result = array();

        //guide menu
        $sql = "select * from terms where term_group=0 order by sort,term_id";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0){
            $result[0] = $query->result_array();
        }
        else{
            $result[0] = array();
        }

        //topic menu
        $result[1] = array(
            '食','衣','住','行'
            );

        //sharing menu
        $result[2] = array(
            array('作者群','celebrity'),
            array('視覺團隊','contributor'),
            array('東西團隊','team')
            );

        //gallery menu
        $sql = "select * from terms where term_group=4 order by sort,term_id";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0){
            $result[3] = $query->result_array();
        }
        else{
            $result[3] = array();
        }
        //影片 類型
        $this->db->select("VideoType_Id,VideoType_Name");
        $this->db->from("videotype");
        $this->db->where("VideoType_Status","1");
        $this->db->order_by("VideoType_Sequence","DESC");
        $query = $this->db->get();
        $VideoType = $query->result(); 
        unset($query);
        $result[4] = $VideoType;
        
        return $result;

    }
    public function get_menu_data(){
        $result = array();

        //guide menu
        $sql = "SELECT * FROM terms WHERE term_group=0 ORDER BY sort,term_id";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0){
            $result = $query->result_array();
        }

        // //topic menu
        // $result[1] = array(
        //     '食','衣','住','行'
        //     );

        // //sharing menu
        // $result[2] = array(
        //     array('作者群','celebrity'),
        //     array('視覺團隊','contributor'),
        //     array('東西團隊','team')
        //     );

        //gallery menu
        // $sql = "select * from terms where term_group=4 order by sort,term_id";
        // $query = $this->db->query($sql);
        // if ($query->num_rows()>0){
        //     $result[3] = $query->result_array();
        // }
        // else{
        //     $result[3] = array();
        // }
        // //影片 類型
        // $this->db->select("VideoType_Id,VideoType_Name");
        // $this->db->from("videotype");
        // $this->db->where("VideoType_Status","1");
        // $this->db->order_by("VideoType_Sequence","DESC");
        // $query = $this->db->get();
        // $VideoType = $query->result(); 
        // unset($query);
        // $result[4] = $VideoType;
        
        return $result;

    }
    public function add_view_count($banner_id){
    	$this->load->helper('url');
    	$url = current_url();
    	$now = date('Y-m-d H:i:s');
        $sql = "insert into banner_log(banner_id,createtime,act,url) values('{$banner_id}','{$now}','0','{$url}')";
        $this->db->query($sql);
    }

    public function add_click_count($banner_id){
        $this->load->helper('url');
        $url = current_url();
        $now = date('Y-m-d H:i:s');
        $sql = "insert into banner_log(banner_id,createtime,act,url) values('{$banner_id}','{$now}','1','{$url}')";
        $this->db->query($sql);
    }

    public function get_banners($type=0,$count=0,$start=0){
        $result = array();
    	$now = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM banner WHERE NOW() BETWEEN date_start AND date_end AND publish = 1 AND `type` = {$type} ORDER BY sort asc,date_start DESC LIMIT {$start},{$count}";
        $query = $this->db->query($sql);
    	if ($query->num_rows()>0){
    		$result = $query->result_array();
    		foreach($result as $row){
    			$this->add_view_count($row['id']);
    		}
    	}
    	return $result;
    }

    public function get_main_banner(){
    	$result = array();
    	$now = date('Y-m-d H:i:s');
    	$sql = "SELECT * FROM banner WHERE '{$now}' BETWEEN date_start AND date_end AND publish = 1 AND `type` = 1 ORDER BY sort asc ,date_start DESC LIMIT 0,1";
    	$query = $this->db->query($sql);
    	if ($query->num_rows()>0){
    		$result = $query->row_array();
    		$this->add_view_count($result['id']);
    	}
    	else{
    		$result['banner_title'] = '';
    		$result['img_title'] = '';
    		$result['multimedia'] = '';
    		$result['descriotion'] = '';
    		$result['link'] = '';
    	}
    	return $result;
    }

    public function get_banner_rs($type=0,$count=0,$start=0){
        $result = array();
    	$now = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM banner WHERE '{$now}' BETWEEN date_start AND date_end AND publish = 1 AND `type` = {$type} ORDER BY sort asc,date_start DESC LIMIT {$start},{$count}";
    	$query = $this->db->query($sql);
    	$result = $query->result_array();
    	foreach($result as $row){
    		$this->add_view_count($row['id']);
    	}
        return $result;
    }

    public function get_index_banner($count=2,$ad_s =0){
    	$result = array();
    	$now = date('Y-m-d H:i:s');
    	$sql = "SELECT * FROM banner WHERE NOW() BETWEEN date_start AND date_end AND publish = 1 AND `type` = 2 ORDER BY sort asc,date_start DESC limit {$ad_s},{$count}";
    	$query = $this->db->query($sql);
    	if ($query->num_rows()>0){
    		$result = $query->result_array();
    		foreach($result as $row){
    			$this->add_view_count($row['id']);
    		}
    	}
    	return $result;
    }

    public function get_list_banner(){
    	$result = array();
    	$now = date('Y-m-d H:i:s');

      $exist_list_banner = isset($_GET['exist_banner'])?$_GET['exist_banner']:array();
      if (count($exist_list_banner)==0){
          $sql = "SELECT * FROM banner WHERE date_start<='{$now}' AND date_end>='{$now}' AND publish=1 AND `type`=3 ORDER BY RAND() LIMIT 0,1";
      }
      else{
       // $exist_list_banner = implode(',',$exist_list_banner);
         $sql = "SELECT * FROM banner WHERE date_start<='{$now}' AND date_end>='{$now}' AND publish=1 AND `type`=3 AND id NOT IN({$exist_list_banner}) ORDER BY RAND() LIMIT 0,1";
     }
     $query = $this->db->query($sql);
     if ($query->num_rows()>0){
        $result = $query->row_array();
        $this->add_view_count($result['id']);
     }
        return $result;
    }

public function get_list_banner2($size=0){
    $result = array();
    $now = date('Y-m-d H:i:s');
    $sql = "select * from banner where date_start<='{$now}' and date_end>='{$now}' and publish=1 and type=3 order by rand() limit 0,{$size}";
    $query = $this->db->query($sql);
    if ($query->num_rows()>0){
        $result = $query->result_array();
        foreach($result as $row){
            $this->add_view_count($row['id']);
        }
            //array_push($list_banner,$result['id']);
    }
    return $result;
}
public function add_sub($email=""){
    $result = array();
    $sql = "SELECT * FROM edm_list WHERE email = '{$email}'";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
        $result = array("info"=>"此信箱已訂閱!");
    }else{
        $sql = "INSERT INTO edm_list VALUES (0,'{$email}',NOW())";
        $query = $this->db->query($sql);
        $result = array("info"=>"感謝您的訂閱!");
    }
    return $result;
}
public function get_slideshow_banner($gallery_count){
   $result = array();
   $now = date('Y-m-d H:i:s');
   $ad_count = ceil($gallery_count / 10);
   if ($ad_count>0){

     $sql = "select id,img_title,link from banner where date_start<='{$now}' and date_end>='{$now}' and publish=1 and type=4 order by rand() limit 0,{$ad_count}";
     $query = $this->db->query($sql);
     $i = 0;
     $pagesize = 10;
     $pagesize = ($pagesize>$gallery_count)?$gallery_count:$pagesize;

        foreach($query->result_array() as $row){
            $start = $i * $pagesize;
            $position = rand($start+1,$start+$pagesize-1);
            $row['position'] = $position;
            $row['closed'] = 0;
            $row['viewed'] = 0;
            array_push($result,$row);
            $i++;
        }  
    }   
    return $result;
}

public function get_side_banner(){
    $result = array();
    $sql = "SELECT * FROM sidebar WHERE id = '1' AND publish='1'";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
        $now = date('Y-m-d H:i:s');
        $sql = "SELECT * FROM banner WHERE date_start<='{$now}' AND date_end>='{$now}' AND publish=1 AND `type`=5 AND `first`=1 ORDER BY RAND()";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0){
            $result = $query->result_array();
            foreach ($result as $side_id) {
                $this->add_view_count($side_id['id']);
            }
        }
    }
        // print_r($result);exit;
    return $result;
}

public function get_first_banner($id_array="",$loadsize=1){
    $this->post = $this->input->post(null,true);
    $result = array();
    $postid = (isset($this->post['inset_id']))?$this->post['inset_id']:"false";
    $sql = "SELECT * FROM sidebar WHERE id = '2' AND publish='1'";
    $query = $this->db->query($sql);
    if($query->num_rows()>0){
        $not_in = "";
        $now = date('Y-m-d H:i:s');
        if($id_array!=""){
            $not_in ="and id not in (".$id_array.")";
        }
        $sql = "select * from banner where date_start<='{$now}' and date_end>='{$now}' and publish=1 and type=5 and first=0 {$not_in} order by rand() limit 0,{$loadsize}";
        $query = $this->db->query($sql);
        $cont_sql = "select * from banner where date_start<='{$now}' and date_end>='{$now}' and publish=1 and type=5 and first=0";
        $query2 = $this->db->query($cont_sql);
        if ($query->num_rows()>0){
            foreach ($query->result_array() as $first) {
                if($postid!=""){
                 $this->add_view_count($postid);
             }
             $first['cont']=$query2->num_rows();
             array_push($result,$first);
         }

     }
 }
       // print_r($result);exit;
 return $result;
}


public function add_post_view($post_id){
    $sql = "insert into posts_view values(null,'{$post_id}','".date('Y-m-d H:i:s')."')";
    $this->db->query($sql);
}

public function fix_gallery($filename){
    // $filename = str_replace('_thumb','',$filename);
    // $config['image_library'] = 'gd2';
    // $config['source_image'] = 'upload/'.$filename;
    // $config['create_thumb'] = TRUE;
    // $config['maintain_ratio'] = TRUE;
    // $config['width'] = 0;
    // $config['height'] = 500;
    // //$this->load->helper('MY_file_helper');
    // //$config['new_image']   = file_core_name($filename) . '_thumb.' . file_extension($filename);
    // $this->load->library('image_lib',$config);
    // $this->image_lib->fit();
    // //echo '<!--fix ' . $config['new_image'] . $config['height'] . '-->';
    // //$this->image_lib->clear();
}

public function check_img_exist($filename){
    $upload_path = dirname(dirname(dirname(__FILE__))) . '/upload/';
    if (!file_exists($upload_path . $filename)){
        $this->download_img($filename);
    }
    else{
        if (!file_exists($upload_path . $filename)){
            return;
        }

        // $filetime = filemtime($upload_path . $filename);
        // $update_time = mktime(19,50,0,1,10,2014);
        // if ($filetime < $update_time){
        //     $sql = "select * from posts where post_title='{$filename}'";
        //     $query = $this->db->query($sql);
        //     $row = $query->row_array();
        //     $img_type = $row['post_type'];
        //     $filename = str_replace('_thumb','',$filename);
        //     if (!file_exists($upload_path . $filename)){
        //         return;
        //     }
        //     $config['image_library'] = 'gd2';
        //     $config['source_image'] = 'upload/'.$filename;
        //     //$config['create_thumb'] = TRUE;
        //     $config['maintain_ratio'] = TRUE;
        //     if ($img_type=='cover-img'){
        //         $config['width'] = 250;
        //         $config['height'] = 250;
        //     }
        //     else{
        //         $config['width'] = 0;
        //         $config['height'] = 500;
        //     }
        //     $this->load->helper('MY_file_helper');
        //     $config['new_image']   = file_core_name($filename) . '_thumb.' . file_extension($filename);
        //     $this->load->library('image_lib',$config);
        //     $this->image_lib->fit();
        //     echo '<!--fix ' . $config['new_image'] . $config['height'] . $img_type . '-->';
        // }
    }
}
public function download_img($url){
    $url = 'http://demo.dosomething-studio.com/westeast_/upload/' . $url;
    $upload_path = dirname(dirname(dirname(__FILE__))) . '/upload/';
    $filename = substr($url,strrpos($url,'/')+1);
    $img = $upload_path . $filename;
    file_put_contents($img, file_get_contents($url));
}

private function get_cover_img($id){
    $sql = "select post_title from posts where post_parent='{$id}' and post_type='cover-img' order by post_date desc";
    $query = $this->db->query($sql);
    $result = '';
    if ($query->num_rows>0){
        $row = $query->row_array();
        $result = $row['post_title'];
    }
    return $result;
}


public function check_code($is_check,$email,$pwd){
    if($is_check=='0'){
        $sql = "UPDATE members SET active='1' WHERE email='{$email}' AND pwd='{$pwd}'";
        $query = $this->db->query($sql);
        header("Content-Type:text/html; charset=utf-8");
        echo "<script>alert('認證成功!!');location='".SITE_URL."'</script>";
    }
    else{
        header("Content-Type:text/html; charset=utf-8");
        echo "<script>alert('認證失敗!!');location='".SITE_URL."'</script>";
    }
}

}
?>