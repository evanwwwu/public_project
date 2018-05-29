<h2 class="content-subhead" id="stacked-form">會員管理</h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>member" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>會員狀態</label>
  <select name="active">
    <option value="0" <?php echo ($row["active"]=="0")?"selected":""; ?>>停用</option>
    <option value="1" <?php echo ($row["active"]=="1")?"selected":""; ?>>啟用</option>
  </select>
  <label>E-mail</label>
  <span><?php echo $row["email"] ?></span>
  <label>FB狀態</label>
  <span><?php echo ($row["fb_id"]!="")?$row["fb_id"]:"未綁定"; ?></span>
  <label>姓名</label>
  <input name="username" value="<?php echo $row["username"]; ?>">

  <label>電話</label>
  <input class="pure-input-1-4" name="phone" value="<?php echo $row["phone"]; ?>">

  <label>手機</label>
  <input class="pure-input-1-4" name="mobile" value="<?php echo $row["mobile"]; ?>">
  
  <label>地址</label>
  <input type="text" class="pure-input-1-2" name="address" value="<?php echo $row["address"];?>" >

</form>
<script>
  $(function () {
    edit_view.init();
    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save/<?PHP echo @$id?>", 
      function(arr, $form, options){
      });
  });

</script>