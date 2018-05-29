<a class="prev_btn" href="<?php echo SITE_URL; ?>classes">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/back_arr.png" />
</a>
<div class="main_img_pic">
  <img alt="" src="<?PHP echo IMG_URL.$row["main_img"];?>" />
  <?php if ($row["now_people"] >= $row["people_limit"]): ?>
    <div class="over">
      <span>已額滿</span>
    </div>
  <?php endif; ?>
</div>
<div class="main_content">
  <div class="detail_title">
    <div class="t1">
      <?php echo $row["title"] ?>
    </div>
    <div class="t2">
      <?php foreach ($row["dates"] as $k=>$date): ?>
        <?php 
        if ($k!=0){
          echo ", ";
        }
        ?>
        <?php echo date("n/d",strtotime($date["classes_date"]))."（".$day_name[(date("N",strtotime($date["classes_date"]))-1)]."）"; ?>
      <?php endforeach ?>
    </div>
  </div>
  <div class="content">
    <div class="info">
      <?php if (count(json_decode(@$row["top_text"]))>0): ?>
        <?php foreach (json_decode(@$row["top_text"]) as $i=> $top_content): ?>
          <ul>
            <?php foreach ($top_content as $key => $top): ?>
              <li>
                <?php echo $top->t_text; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <div class="a_text">
      <div class="a_title">
        <p>
          主廚介紹
        </p>
      </div>
      <div class="t_content cooker">
        <div class="pic">
          <img alt="" src="<?PHP echo IMG_URL.$row["teacher_img"];?>" style="display:inline-block;" />
        </div>
        <div class="text">
          <?php echo nl2br(@$row["teacher_text"]); ?>
        </div>
      </div>
    </div>
    <?php if (@$row["content"]): ?>
      <div class="a_text">
        <div class="a_title">
          <p>
            課程內容
          </p>
        </div>
        <div class="t_content">
          <?php echo $row["content"]; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <form action="<?php echo SITE_URL ?>classes/order" class="up_form" method="post">
    <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
    <input type="hidden" name="classes_id" value="<?php echo @$row["id"]; ?>">
    <label class="date_s"><span>課程日期</span>
      <div class="select">
        <p class="placeholder">
          請選擇日期
        </p>
        <ul>
          <?php foreach ($row["dates"] as $key => $date): ?>
            <?php if ($date["now_people"]<$date["people_limit"]): ?>
              <li data-value="<?php echo $date["date_id"]; ?>">
                <?php echo date("n/d",strtotime($date["classes_date"]))."（".$day_name[(date("N",strtotime($date["classes_date"]))-1)]."）".date("H:i",strtotime($date["classes_date"])); ?>
              </li>
            <?php endif; ?> 
          <?php endforeach; ?>
        </ul>
        <input name="date_id" type="hidden" />
      </div>
    </label>
    <label class="name"><span>學員姓名</span><input name="username" type="text" /></label>
    <label class="phone"><span>聯絡電話</span><input name="phone" type="text" /></label>
    <label class="email"><span>電子郵件</span><input name="email" type="text" /></label>
    <label class="msg"><span>備註</span><textarea name="msg"></textarea></label>
    <label class="submit">
      <button>
        <span>我要報名</span>
        <div class="icon">
          <img alt="" src="<?PHP echo ASSETS_URL;?>images/add_bag.png" />
        </div>
      </button>
    </label>
  </form>
  <div class="note_div">
    <div class="n_title">
      報名注意事項
    </div>
    <div class="s_title">
      請詳細閱讀，以免影響權益
    </div>
    <div class="content">
      <div class="item">
        <p>1. 料理教室費用皆以單堂計算。</p>
        <p>2. 料理教室統一以網路報名為主。</p>
        <p>3. 課程達5人確認開課,裸市集將主動發送開課確認函至您報名填寫的Email。</p>
        <p>4. 如未達開班人數,我們將於開課前5天以Email方式通知,並在3個工作天內退款完成。</p>
        <p>5. 因安全考量,裸市集料理課程報名須年滿12歲以上。為確保上課品質,請勿邀請未報名友人及幼童一同上課旁聽。</p>
      </div>
      <div class="item">
        <p class="t">報名方式：</p>
        <p>裸市集官網→點選料理教室→選擇課程→填寫報名單→線上付款→報名成功→至會員中心查看課程訂單,付款成功即代表報名成功</p>
        <p>* 注意: 報名成功不代表確認開課。詳細請參閱以下未達開課人數之退款方式。</p>
        <p>* 如確認開課,裸市集將主動發送開課確認通知至您報名填寫的Email。</p>
      </div>
      <div class="item">
        <p class="t">取消課程：</p>
        如欲取消課程,請參照以下退款規則說明：
        <ul>
          <li>
            取消課程,請主動來信告知，以利後台作業。請寄至nakedmarket.tw@gmail.com
            信件主旨請註明 訂單編號、開課日期、課程。內文請註明報名之姓名、聯絡電話。 
            <p class="s">* 訂單編號請於會員中心查看</p>
          </li>
          <li>
            <p class="t">退款規則如下：</p>
            <p>開課5日前取消(不包含開課當日)，全額退款。</p>
            <p>開課5日內取消，將不予退款、換課、保留/更改課程，但可由親友代為上課。</p>
            <p class="s">*如開課時間為6/10，6/4（含）前取消，全額退款；6/5起取消，不予退款。</p>
            <p class="s">*由於開課前5日已著手準備食材以及訂貨等業務，恕無法提供退款。</p>
          </li>
        </ul>
      </div>
      <div class="item">
        <p class="t">未達開班人數</p>
        <p>如未達開班人數，我們將於開課前5天以Email方式通知，並在3個工作天內退款完成。</p>
      </div>
      <div class="item">
        <p class="t">包班上課</p>
        <p>人數須達5人以上，符合開班人數。如有需要請來電02-27198809洽詢。</p>
      </div>
    </div>
  </div>
</div>