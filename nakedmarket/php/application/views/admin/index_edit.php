
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
  </div>
  <hr>
  <?php for($i=0; $i<6;$i++): ?>
    <label class="item" style="display:inline-block;margin:10px 20px;">
      <span>食材<?php echo ($i+1);?></span>
      <select name="select_index[]">
        <option value="0">無</option>
        <?php foreach ($rs as $key => $row): ?>          
          <option value="<?php echo $row["id"] ?>" <?php echo ($row["id"]==@$select_rs[$i]["id"])?"selected":""; ?>><?php echo $row["title"]?></option>
        <?php endforeach ?>
      </select>
    </label>
  <?php endfor; ?>
  <br>
  <br>
</form>
<script>
  $(function () {
    edit_view.ckedit($(".ckedit"),"");
    edit_view.init();
    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save", 
      function(arr, $form, options){
      });

  });
</script>