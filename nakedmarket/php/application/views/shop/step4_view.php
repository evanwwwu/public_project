<div class="main_content">
  <?php echo $step_view; ?>
  <div class="content">
    <form method="post" action="<?php echo SITE_URL; ?>shop/send_order">
      <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
      <input name="member_id" type="hidden" value="<?php echo $post["member_id"]; ?>">
      <div class="check_div">
        <div class="div_title">
          <span>購物清單</span>
        </div>
        <div class="item i_title">
          <div>
            <p>
              商品
            </p>
          </div>
          <div>
            <p>
              商品名稱
            </p>
          </div>
          <div>
            <p>
              數量
            </p>
          </div>
          <div>
            <p>
              單價
            </p>
          </div>
          <div>
            <p>
              小記
            </p>
          </div>
        </div>
        <ul class="items">
          <?php foreach ($this->cart->contents() as $key => $item): ?>
            <li rowid="<?php echo $item["rowid"]; ?>">
              <div class="item">
                <div>
                  <img alt="" src="<?php echo $item["options"]->img;?>" />
                </div>
                <div class="item_name">
                  <p><?php echo $item["name"] ?></p>
                </div>
                <div>
                  <p>
                    <?php echo $item['qty'].$item["options"]->unit_text ?>
                  </p>
                </div>
                <div>
                  <p>
                    <?php echo $item["options"]->price_text ?>
                  </p>
                </div>
                <div>
                  <p>
                    <?php echo "$".($item["subtotal"]); ?>
                  </p>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="ship_div">
          <p>
            運送方式
          </p>
          <p class="ship_type">
            <?php echo $this->cart->ship_type; ?>
          </p>
          <p class="ship_price">
            <?php echo ($this->cart->ship==0)?"免運":$this->cart->ship; ?>
          </p>
        </div>
        <div class="totle_price">
        <span>總計</span><span class="n"><?php echo "$".($this->cart->total()+$this->cart->ship); ?></span>
        </div>
      </div>
      <div class="check_div">
        <div class="div_title">
          <span>收件人資訊</span>
        </div>
        <div class="member_info">
          <p class="username">
            <?php echo $post["username"]; ?>
            <input name="username" type="hidden" value="<?php echo @$post["username"] ?>"/>
          </p>
          <p class="email">
            <?php echo $post["email"]; ?>
            <input name="email" type="hidden" value="<?php echo @$post["email"] ?>"/>
          </p>
          <p class="address">
            <?php echo $post["address"]; ?>
            <input name="address" type="hidden" value="<?php echo @$post["address"] ?>"/>
          </p>
          <p class="mobile">
            <?php echo $post["mobile"]; ?>
            <input name="mobile" type="hidden" value="<?php echo @$post["mobile"] ?>"/>
          </p>
          <p class="phone">
            <?php echo $post["phone"]; ?>
            <input name="phone" type="hidden" value="<?php echo @$post["phone"] ?>"/>
          </p>
        </div>
      </div>
      <div class="check_div">
        <div class="div_title">
          <span>付款方式</span>
        </div>
        <div class="pays">
          <label class="<?php echo ($post["pay_type"]!="Credit")?"off":""; ?>">
            <input name="pay_type" type="radio" value="Credit" <?php echo ($post["pay_type"]=="Credit")?"checked":""; ?>/>
            <div class="item credit">
              <div class="icon">
                <img alt="" src="<?PHP echo ASSETS_URL;?>images/credit_icon.png" />
              </div>
              <span>信用卡</span>
            </div>
          </label>
          <label class="<?php echo ($post["pay_type"]!="WebATM")?"off":""; ?>">
            <input name="pay_type" type="radio" value="WebATM" <?php echo ($post["pay_type"]=="WebATM")?"checked":""; ?>/>
            <div class="item webatm">
              <div class="icon">
                <img alt="" src="<?PHP echo ASSETS_URL;?>images/webatm_icon.png" />
              </div>
              <span>WEB ATM</span>
            </div>
          </label>
          <label class="<?php echo ($post["pay_type"]!="CVS")?"off":""; ?>">
            <input  name="pay_type" type="radio" value="CVS" <?php echo ($post["pay_type"]=="CVS")?"checked":""; ?>/>
            <div class="item store">
              <div class="icon">
                <img alt="" src="<?PHP echo ASSETS_URL;?>images/store_icon.png" />
              </div>
              <span>超商付款</span>
            </div>
          </label>
        </div>
      </div>
      <div class="info_div">
        <div class="a_text">
          <div class="a_title">
            <p>
              購物說明
            </p>
          </div>
          <div class="t_content">
            <ul>
              <li>
                訂購完成後,系統發送訂單確認通知給您,我們將儘快為您安排出貨。
              </li>
              <li>
                低溫配送商品會於商品備註加入低溫配送提醒。
              </li>
              <li>
                集點卡僅適用於裸市集實體店面消費(不包含餐點),並不得與其他優惠活動合併使用。
              </li>
            </ul>
          </div>
        </div>
        <div class="a_text">
          <div class="a_title">
            <p>
              退貨說明
            </p>
          </div>
          <div class="t_content">
            <ul>
              <li>
                常溫商品均享有到貨七天的猶豫期(含例假日在內),低溫商品恕不提供退換貨服務。
              </li>
              <li>
                猶豫期並非試用期,若您收到商品經檢視後有任何不合意之處,請勿拆開使用,保持商品包裝完整,並於七日內辦理退貨,退貨前 請先來信或來電連絡。客服信箱:nakedmarket.tw@gmail.com 聯絡電話:02-2719-8809
              </li>
              <li>
                退回的商品須為未經使用過之完整新品,並請保持商品本身完整性；退貨商品如經拆封使用過,依民法第259條,裸市集保有要求消費者負起物品無法回復原狀之責任,不得退貨。
              </li>
              <li>
                除商品本身瑕疵外,其他退換貨原因請自行負擔運費。
              </li>
            </ul>
          </div>
        </div>
        <div class="a_text">
          <div class="a_title">
            <p>
              保存方式
            </p>
          </div>
          <div class="t_content">
            <ul>
              <li>
                所有商品拆封後請以密封罐保存為佳,放置陰涼通風處,需冷藏商品請置於冰箱
              </li>
              <li>
                所有商品拆封後請儘早食用完畢
              </li>
            </ul>
          </div>
        </div>
        <div class="a_text">
          <div class="a_title">
            <p>
              配送方式及問題
            </p>
          </div>
          <div class="t_content">
            <p>
              網路訂購配合黑貓宅急便常溫／低溫配,當日下午四點後下單視為隔日業務處理。
            </p>
            <p>
              *台北縣市如需機車快遞急件,請來電詢問02-2719-8809<br><br>
            </p>
            <p>
              配送詳細資訊如下:
            </p>
            <ul>
              <li>
                黑貓常溫宅配3-7個工作天送達指定地點。
              </li>
              <li>
                黑貓低溫宅配,如訂單含有1件需低溫宅配送商品,此筆訂單皆統一以低溫配送3-7個工作天送達指定地點。
              </li>
              <li>
                延遲狀況:店內活動,重大節慶及假日可能導致出貨量增加,將另行公告通知,並盡可能於正常配送日完成出貨。如因訂單較多,則可能會延遲 1-2日完成出貨,敬請見諒。若是因商品於準備出貨時發現庫存不足,瑕疵等狀況,我們將會有專人與您通知,確認出貨事宜。
              </li>
              <li>
                如遇特定節日前後(農曆過年、情人節 、聖誕節,等重大活動),出貨量較大,偶有物流業務量較大造成配送時程延誤, 則請見諒並請隨時告知我們您的需求及詢問配送狀況。
              </li>
            </ul>
          </div>
        </div>
        <div class="a_text i2">
          <div class="a_title">
            <p>
              付款方式
            </p>
          </div>
          <div class="t_content">
            <ul>
              <li>
                線上ATM轉帳匯款
              </li>
              <li>
                線上信用卡付款
              </li>
              <li>
                超商繳費<br>
                可至 7-11、全家、萊爾富、OK便利店使用ibon/超商機台輸入繳費代碼列印付款條碼，並至櫃檯繳款。若您有兩筆以上訂單，請依照繳費代碼個別輸入列印。<br>
                操作方式:ibon /超商機台點選「繳費」→「代碼繳費」→ 輸入繳費代碼 → 列印繳費條碼 → 至櫃檯付款。
              </li>
            </ul>
          </div>
        </div>
        <div class="a_text i2">
          <div class="a_title">
            <p>
              運費說明
            </p>
          </div>
          <div class="t_content">
            <ul>
              <li>
                常溫宅配NT$150，滿NT$1800免運費
              </li>
              <li>
                低溫宅配NT$220，滿NT$1800免運費
              </li>
            </ul>
          </div>
        </div>
        <label class="check_btn">
          <input type="checkbox" name="check_info" value="1">
          <div class="box"></div>
          <span>我已確並且瞭解購物須知, 配送方式及退貨說明</span>
        </label>
      </div>
      <div class="b">
        <input  class="next_btn" type="submit" value="確認">
      </div>
    </form>
  </div>
</div>
<script>
  $(function(){
    $("form").submit(function(){
      if($("input[name=check_info]:checked").val()!=1){
        alert("請確認購物須知!");
        return false;
      }
    });
  })
</script>