<div class="main_content">
  <div class="main_title">
    <h3>
      Welcome
    </h3>
    <p>
      歡迎來信詢問任何訂單、商品及帳戶問題
    </p>
    <a href="mailto:nakedmarket.tw@gmail.com" target="_blank">nakedmarket.tw@gmail.com</a>
  </div>
  <div class="member_div">
    <div class="title">
      <span>Log in</span>
    </div>
    <form class="info" id="member_login" method="post" action="<?php echo SITE_URL; ?>member/login">
      <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
      <label class="username">
        <input name="email" placeholder="電子郵件" type="text" />
      </label>
      <label class="password">
        <input name="password" placeholder="密碼" type="password" />
      </label>
      <input type="submit" class="login_btn" value="登入">
      <div class="get_div">
        <a href="<?php echo SITE_URL; ?>member/getpass">忘記密碼?</a>
        <span>／</span>
        <a href="<?php echo SITE_URL; ?>member/signup">註冊會員</a>
      </div>
      <button type="button" class="fb_login"><span>facebook 帳號登入</span></button>
    </form>
  </div>
</div>