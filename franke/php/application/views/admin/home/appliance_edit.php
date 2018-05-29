
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$controller_addr?>/appliance" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>

  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是

  <label>版型</label>
  <input type="radio" name="type" value="1" id="sam1" <?PHP echo (@$row["type"]=="1"||!isset($row["type"]))?"checked":"" ?>><label class="for_checkbox" for="sam1"><img width="200" src="<?PHP echo ASSETS_URL?>admin/images/app_sample1.png"></label>
    <input type="radio" name="type" value="2" id="sam2" <?PHP echo (@$row["type"]=="2")?"checked":""?>><label class="for_checkbox" for="sam2"><img width="200" src="<?PHP echo ASSETS_URL?>admin/images/app_sample2.png"></label>


  <label>連結名稱</label>
  <input name="link_title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["link_title"]?>">

  <label>連結</label>
  <input name="link" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo @$row["link"]?>">

  <label>封面照 (900 × 400)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">

  <label>內容</label>
  <textarea name="content" cols="30" rows="10"><?PHP echo @$row["content"]?></textarea>
  <br>
  <br>
</form>
<script>
$(function () {
  edit_view.init();
  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL.$controller_addr?>/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["900x"],
    crop_min: [],
    crop_ratio:9/4,
    crop_path:'<?PHP echo UPLOAD_URL.$controller_addr?>/crop/'
  });

  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr?>/appliance_save/<?PHP echo @$id?>", 
    function(arr, $form, options){
    });
})
</script>