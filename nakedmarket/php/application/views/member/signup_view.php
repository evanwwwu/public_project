
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
      <span>Sign up</span>
    </div>
    <form id="member_signup" class="info" method="post" action="<?php echo SITE_URL; ?>member/signup_save">
      <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
      <label class="username">
        <input name="email" placeholder="電子郵件" type="text" />
      </label>
      <label class="password">
        <input name="password" placeholder="密碼" type="password" />
      </label>
      <label class="password">
        <input name="password2" placeholder="再次確認密碼" type="password" />
      </label>
      <input type="submit" class="login_btn" value="建立帳號">
      <button class="fb_login">
        <span>facebook 帳號登入</span>
      </button>
    </form>
  </div>
</div>