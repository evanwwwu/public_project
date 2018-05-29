
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>project" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是

  <label>所屬類別</label>
  <select name="type_id" >
    <?PHP foreach($types as $type):?>
    <option value="<?PHP echo $type["id"]?>"><?PHP echo $type["title_tw"]?></option>
    <?PHP endforeach;?>
  </select>

  <label>封面照 (700 × 296)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">
  
  <label>內容照 (1100 x 468)</label>
  <div class="gallery">
    <?PHP if(@$row["gallery_img"]!=''):?>
    <?PHP foreach(json_decode($row["gallery_img"]) as $key => $gallery):?>
    <input type="hidden" class="default_img" name="gallery_img[]" value="<?PHP echo $gallery?>">
    <?PHP endforeach;?>
    <?PHP endif;?>
  </div>

  <br>
  <br>
</form>
<script>
$(function () {

  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL?>/project/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["700x"],
    crop_min: [0,0],
    crop_ratio:700/296,
    crop_path:'<?PHP echo UPLOAD_URL?>/project/crop/'
  });

  $(".gallery").myGallery({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL?>/project/gallery_img/',
    img_size: ["1100x468"]
  });

  $("#frm").mylanguagesTab({
    path_url:"<?PHP echo ADMIN_URL?>project/get_lang/<?PHP echo $id?>/",
    languages: ["en","tw"],
    surecce:function(){
      edit_view.ckedit(".ckedit");
    }
  });


  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL?>project/save/<?PHP echo @$id?>", 
    function(arr, $form, options){
    });
})
function add_format(obj){
  var lan = $(obj).parent(".formats").data("lan");
  var formats = $('<div class="formats_div">標題:<input type="text" name="formats_title_'+lan+'[]">內容:<br><textarea cols="30" rows="10" name="formats_content_'+lan+'[]"></textarea><br></div>');
  var del_btn = $('<a href="javascript:void(0)"><i class="icon-trash"></i>DELETE</a>');
  del_btn.click(function(){
    if (!confirm('確定刪除?')) return;
    $(this).parents(".formats_div").remove();
  });
  formats.append(del_btn);
  $(obj).parent(".formats").append(formats);
  $(".formats").sortable({
    placeholder: "sortable-placeholder"
  });
}
</script>