<a class="prev_btn" href="<?php echo SITE_URL; ?>classes/detail/<?php echo $this->post["classes_id"] ?>">
  <img alt="" src="<?PHP echo ASSETS_URL;?>images/back_arr.png" />
</a>

<form action="<?php echo SITE_URL ?>classes/send_order" method="post">
    <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div class="main_content">
    <div class="order_title">
      <h3>
        Class
      </h3>
      <p>
        歡迎來信詢問任何訂單、商品及帳戶問題
      </p>
      <a href="mailto:nakedmarket.tw@gmail.com">nakedmarket.tw@gmail.com</a>
    </div>
    <div class="order_info">
      <div class="s_title">
        <span>報名資訊</span>
      </div>
      <div class="content">
        <ul>
          <li>
            <span>課程名稱：</span><span><?php echo $row["title"] ?></span>
            <input type="hidden" name="classes_name" value="<?php echo $row["title"]; ?>">
            <input type="hidden" name="date_id" value="<?php echo $this->post["date_id"]; ?>">
            <input type="hidden" name="msg" value= "<?php echo $this->post["msg"] ?>">
            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
          </li>
          <li>
            <span>課程日期：</span><span><?php echo date("n/d",strtotime($row["classes_date"]))."（".$day_name[(date("N",strtotime($row["classes_date"]))-1)]."）"; ?></span>
          </li>
          <li>
            <span>學員姓名：</span><span><?php echo $this->post["username"]; ?></span>
            <input type="hidden" name="username" value="<?php echo $this->post["username"]; ?>">
          </li>
          <li>
            <span>聯絡電話：</span><span><?php echo $this->post["phone"]; ?></span>
            <input type="hidden" name="phone" value="<?php echo $this->post["phone"]; ?>">
          </li>
          <li>
            <span>電子郵件：</span><span><?php echo $this->post["email"]; ?></span>
            <input type="hidden" name="email" value="<?php echo $this->post["email"]; ?>">
          </li>
        </ul>
        <div class="info">
          <p>
            報名成功不代表確認開課，如未達到開課人數，我們將在開課前三日通知並全額退款
          </p>
          <p>
            開課前不另作通知，若因故不克前往，開課7日前來電取消將會全額退款，3⽇前取消退款50%，3日以內取消恕不接受退款或學費轉移及保留。
          </p>
        </div>
      </div>
    </div>
    <div class="order_pay">
      <div class="s_title">
        <span>請選擇付款方式</span>
      </div>
      <div class="pays">
        <label><input name="pay_type" type="radio" value="Credit" checked  />
          <div class="item credit">
            <div class="icon">
              <img alt="" src="<?PHP echo ASSETS_URL;?>images/credit_icon.png" />
            </div>
            <span>信用卡</span>
          </div>
        </label><label><input name="pay_type" type="radio" value="WebATM"  />
        <div class="item webatm">
          <div class="icon">
            <img alt="" src="<?PHP echo ASSETS_URL;?>images/webatm_icon.png" />
          </div>
          <span>WEB ATM</span>
        </div>
      </label>
    </div>
  </div>
  <input type="submit" class="check_btn" value="確認">
</div>

</form>