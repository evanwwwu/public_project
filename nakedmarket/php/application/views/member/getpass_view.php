<div class="main_content">
  <div class="main_title">
    <h3>
      Welcome
    </h3>
    <p>
      歡迎來信詢問任何訂單、商品及帳戶問題
    </p>
    <a href="mailto:nakedmarket.tw@gmail.com">nakedmarket.tw@gmail.com</a>
  </div>
  <div class="member_div">
    <div class="title">
      <span>Forgot password</span>
    </div>
    <form id="getpass" class="info" method="post" action="<?php echo SITE_URL; ?>ajax/member_getpass">
      <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
      <div class="text">
        請輸入您當初註冊時所填寫的 E-mail 帳號。若是使用社群帳號登入的會員，請輸入您註冊社群帳號時所使用E-mail 帳號。我們將會寄送一封驗證電子郵件至您的信箱。
      </div>
      <label class="username">
        <input name="email" placeholder="電子郵件" type="text" />
      </label>
      <input class="login_btn" type="submit" value="確認">
    </form>
  </div>
</div>