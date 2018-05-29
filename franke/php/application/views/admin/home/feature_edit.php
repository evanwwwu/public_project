
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$controller_addr?>/feature" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>

  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是

  <label>連結名稱</label>
  <input name="link_title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["link_title"]?>">

  <label>連結</label>
  <input name="link" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["link"]?>">

  <label>封面照 (1180 × 350)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">

  <br>
  <br>
</form>
<script>
$(function () {


  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["1180x"],
    crop_min: [],
    crop_ratio:118/35,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/feature_save/<?PHP echo @$id?>", 
    function(arr, $form, options){
    });
})
</script>