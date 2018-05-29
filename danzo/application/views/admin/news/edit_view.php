
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>news?type=<?PHP echo $type?>" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <input type="hidden" name="type" value="<?PHP echo $type?>">
  
  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是


  <label>日期</label>
  <input type="text" class="date_ui" name="create_date" value="<?PHP echo mb_substr(@$row["create_date"],0,10)?>">
  
  <label>封面照 (270 × 270)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">
  
  <label>內容照 (625 × 345)</label>
  <input type="hidden" name="content_img" class="content_img" value="<?PHP echo @$row['content_img']?>">
  
  <br>
</form>
<script>
$(function () {

  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL?>/news/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["270x"],
    crop_min: [0,0],
    crop_ratio:1,
    crop_path:'<?PHP echo UPLOAD_URL?>/news/crop/'
  });

  $(".content_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL?>/news/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["625x"],
    crop_min: [0,0],
    crop_ratio:625/345,
    crop_path:'<?PHP echo UPLOAD_URL?>/news/crop/'
  });

  $("#frm").mylanguagesTab({
    path_url:"<?PHP echo ADMIN_URL?>news/get_lang/<?PHP echo $id?>/",
    languages: ["en","tw"],
    surecce:function(){
      edit_view.ckedit(".ckedit");
    }
  });


  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL?>news/save/<?PHP echo @$id?>", 
    function(arr, $form, options){
    });
})
</script>