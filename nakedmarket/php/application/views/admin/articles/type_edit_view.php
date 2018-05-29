
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$controller_addr?>/type" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>

  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="1")?"checked":"" ?>>是

  <label>標題</label>
  <input name="title" type="text" placeholder="" class="pure-input-1-4" value="<?PHP echo @$row["title"]?>">
  <br>
  <br>
</form>
<script>
  $(function () {
    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/type_save/<?PHP echo @$row['id']?>", 
      function(arr, $form, options){  
        arr.push({name:'level', value:parseInt($("select[name=relation_id]").find("option:selected").attr("level"))+1})
      });
  })
</script>