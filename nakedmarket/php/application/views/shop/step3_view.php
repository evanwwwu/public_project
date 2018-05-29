<div class="main_content">
  <?php echo $step_view; ?>
  <div class="content">
    <form  method="post" action="<?php echo SITE_URL; ?>shop/step4">
      <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
      <input name="username" type="hidden" value="<?php echo @$post["username"] ?>"/>
      <input name="email" type="hidden" value="<?php echo @$post["email"] ?>"/>
      <input name="phone" type="hidden" value="<?php echo @$post["phone"] ?>"/>
      <input name="mobile" type="hidden" value="<?php echo @$post["mobile"] ?>"/>
      <input name="address" type="hidden" value="<?php echo @$post["address"] ?>"/>
      <input name="member_id" type="hidden" value="<?php echo $post["member_id"]; ?>">
      <div class="pays">
        <label>
        <input name="pay_type" type="radio" value="Credit" checked />
          <div class="item credit">
            <div class="icon">
              <img alt="" src="<?PHP echo ASSETS_URL;?>images/credit_icon.png" />
            </div>
            <span>信用卡</span>
          </div>
        </label>
        <label>
          <input name="pay_type" type="radio" value="WebATM"/>
          <div class="item webatm">
            <div class="icon">
              <img alt="" src="<?PHP echo ASSETS_URL;?>images/webatm_icon.png" />
            </div>
            <span>WEB ATM</span>
          </div>
        </label>
        <label>
          <input  name="pay_type" type="radio" value="CVS" />
          <div class="item store">
            <div class="icon">
              <img alt="" src="<?PHP echo ASSETS_URL;?>images/store_icon.png" />
            </div>
            <span>超商付款</span>
          </div>
        </label>
      </div>
      <div class="b">
        <input type="submit" class="next_btn" value="下一步確認付款">
      </div>
    </form>
  </div>
</div>