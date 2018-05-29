<div class="main_content">
  <?php echo $step_view; ?>
  <div class="content">
    <div class="member_form">
      <form id="step_form" class="edit_form"  method="post" action="<?php echo SITE_URL; ?>shop/step3">
        <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
        <input type="hidden" name="member_id" value="<?php echo @$member["id"]; ?>">
        <label class="username">
          <span>收件人姓名</span>
          <input name="username" type="text" value="<?php echo @$member["username"] ?>"/>
        </label>
        <label class="email">
          <span>電子郵件</span>
          <input name="email" type="text" value="<?php echo @$member["email"] ?>" />
        </label>
        <label class="phone">
          <span>家用電話</span>
          <input name="phone" type="text" value="<?php echo @$member["phone"] ?>"/>
        </label>
        <label class="mobile">
          <span>手機號碼</span>
          <input name="mobile" type="text" value="<?php echo @$member["mobile"] ?>" />
        </label>
        <label class="address">
          <span>寄送地址</span>
          <input name="address" type="text" value="<?php echo @$member["address"] ?>"/>
        </label>
        <div class="b">
          <input type="submit" class="next_btn" value="下一步付款方式">
        </div>
      </form>
    </div>
  </div>
</div>