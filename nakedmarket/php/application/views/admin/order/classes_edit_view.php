
<h2 class="content-subhead" id="stacked-form">訂單管理 - <span id="ContentPlaceHolder1_lbl_title"><?php echo $row["order_no"]; ?></span></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>classes_order" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>訂單編號</label>
  <span><?php echo $row["order_no"]; ?></span>
  <input type="hidden" value="<?php echo $row["order_no"]; ?>" name="order_no">
  <label>訂單狀態</label>
  <input type="hidden" name="old_state" value="<?php echo $row["state"]; ?>">
  <select name="order_type">
    <?php foreach ($states as $state): ?>
      <option value="<?php echo $state ?>" <?PHP echo (@$row["state"]==$state)?"selected":""?>><?php echo $state ?></option>            
    <?php endforeach ?>
  </select>
  <label>付款方式</label>
  <span><?php echo $pay_type[$row["pay_type"]]; ?></span>

  <label>總金額</label>
  <span style="color:red;"><?php echo $row["total"]; ?></span>
  
  <h3>課程資訊</h3>
  <p>名稱: <?php echo $row["classes_name"]; ?>  <?php echo date("Y/m/d H:i",strtotime($row["classes_date"])); ?></p>
  <h3>報名資料</h3>
  <?php $order = (array)json_decode($row["member_data"]); ?>
  <ul>
    <li>姓名: <?php echo $order["username"] ?></li>
    <li>電話: <?php echo $order["phone"] ?></li>
    <li>電子信箱: <?php echo $order["email"] ?></li>
    <li>備註: <?php echo $order["msg"] ?></li>
  </ul>


</form>
<script>
  $(function () {
    edit_view.init();
    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save/<?PHP echo @$row['id']?>", 
      function(arr, $form, options){
      });
  });
</script>