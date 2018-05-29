<div class="popup popup__login">
  <div class="container">
    <div class="content">
      <div class="close-button"></div>
      <div class="main-div <?php echo ($login)?"login":"";?>">
        <div class="login-div">
          <?php if(!$login): ?>
          <div class="title">登入會員</div>
          <form class="login-form" action="<?php echo SITE_URL;?>ajax/login_email" method="post">
            <p>社群帳號登入</p>
            <div class="fb-btn" data-url="<?php echo SITE_URL;?>ajax/register_fb"></div>
            <p class="line"> <span>or</span></p>
            <div class="login-data">
              <label class="email"><span>Email信箱登入</span>
                    <input type="text" name="email" placeholder="請輸入您的Email信箱">
                  </label>
              <input type="password" name="password" placeholder="請輸入您的登入密碼">
              <label class="remeber">
                    <input type="checkbox" name="remeber" value="1"><span>請記得我帳號密碼</span>
                  </label>
              <div class="btns"><a href="#" class="signup-btn">還不是會員？</a><a href="#" class="getpass-btn">忘記密碼？</a></div>
              <button type="submit">LOG IN <span>/</span> 登入</button>
            </div>
          </form>
          <?php else: ?>
          <div class="title">選擇</div>
          <div class="btns"><a href="#" class="signup-btn">編輯會員</a><a href="<?PHP echo SITE_URL?>ajax/logout" class="">LOG OUT</a></div>
          <?php endif; ?>
        </div>
        <div class="signup-div">
          <div class="title"><?php echo ($login)?"編輯個人資料":"會員註冊";?></div>
          <form id="profile" action="<?php echo SITE_URL;?>ajax/<?php echo ($login)?"update_profile":"register_email";?>" method="post">
            <?php $info = json_decode(@$member_data['info'],true);?>
            <div class="signup-data">
              <p class="s info">※ 為必填資料</p>
              <label class="s"><span>※Email</span>
                    <input type="text" name="email" value="<?php echo @$member_data['email'];?>" <?php echo (@$member_data['email']!="")?"readonly":"";?> placeholder="Email信箱即為您的登入帳號">
                  </label>
              <label class="s"><span>※密碼</span>
                    <input type="password" name="pwd" placeholder="請輸入英文字母或數字">
                  </label>
              <label class="s"><span>※確認密碼</span>
                    <input type="password" name="pwd2" placeholder="請輸入英文字母或數字">
                  </label>
              <div class="s label name"><span>※姓名</span>
                    <div class="mul">
                      <input type="text" name="last_name" value="<?php echo @$info['last_name'];?>" placeholder="姓">
                      <input type="text" name="first_name" value="<?php echo @$info['first_name'];?>" placeholder="名">
                    </div>
                  </div>
              <div class="label mobile"><span>手機</span>
                    <div class="mul">
                      <select name="mobile_country">
                        <?php echo $country_codes_mobile;?>
                      </select>
                      <input type="text" name="mobile" value="<?php echo @$info['mobile'];?>" placeholder="ex:0900-000-111">
                    </div>
                  </div>
              <div class="label address"><span>地址</span>
                    <div class="mul">
                      <input type="text" placeholder="郵遞區號" value="<?php echo @$info['zipcode'];?>" name="zipcode">
                      <select name="country">
                        <?php echo $country_codes_address;?>
                      </select>
                      <select name="province"></select>
                      <select name="city"></select>
                      <select name="area"></select>
                      <input type="text" name="address" value="<?php echo @$info['address'];?>" placeholder="請輸入詳細地址">
                    </div>
                  </div>
              <div class="label gender"><span>性別</span>
                    <div class="mul">
                      <input type="radio" name="gender" <?php echo (@$info['gender']=="男")?"checked":"";?> value="男"><span>男</span>
                      <input type="radio" name="gender" <?php echo (@$info['gender']=="女")?"checked":"";?> value="女"><span>女</span>
                      <input type="radio" name="gender" <?php echo (@$info['gender']=="不指定")?"checked":"";?> value="不指定"><span>不指定</span>
                    </div>
                  </div>
              <div class=" label birth"><span>生日</span>
                    <div class="mul">
                      <select name="birth_y"></select>
                      <select name="birth_m"></select>
                      <select name="birth_d"></select>
                    </div>
                  </div>
              <label class="check">
                    <input type="checkbox" name="epaper" <?php echo (@$info['epaper']=="1")?"checked":"";?> value="1"><span class="t">我要訂閱分享東西網路電子報</span>
                  </label>
              <label class="check">
                    <input type="checkbox" name="agree" <?php echo ($login)?"checked":"";?> value="1"><a href="javascript:copyright('<?PHP echo SITE_URL?>copyright')" class="copyright">我已同意分享東西網路會員條款與隱私權聲明</a>
                    </label>
              <button type="submit">SUMBIT <span>/</span> 送出</button>
                    <?php if(!$login): ?>
                    <a href="#" class="login-btn">我已經有帳號，前往登入</a>
                    <?php else: ?>
                    <a href="#" class="login-btn">返回</a>
                    <?php endif; ?>
            </div>
          </form>
        </div>
        <div class="getpass-div">
          <div class="title">忘記密碼</div>
          <form id="forgotPass" action="<?php echo SITE_URL;?>ajax/forgotPass" method="post">
            <input name="email" type="text" placeholder="請輸入您的Email信箱">
            <p>*我們會將密碼重設信寄發到您預設的信箱</p>
            <button type="submit">SUMBIT <span>/</span> 送出</button><a href="#" class="login-btn">我已經有帳號，前往登入</a>
          </form>
        </div>
        <div class="success-div">
        <div class="title"></div>
        <div class="text">
          <div class="info"></div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>