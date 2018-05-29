
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL?>member" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (@$row["publish"]=="1")?"checked":"" ?>>是

  <label>所屬類別</label>
  <select name="office" >
    <option value="1" <?PHP echo ($row["office"]=="1")?"selected":"" ?>>產品設計</option>
    <option value="2" <?PHP echo ($row["office"]=="2")?"selected":"" ?>>平面設計</option>
    <option value="3" <?PHP echo ($row["office"]=="3")?"selected":"" ?>>行銷企劃</option>
  </select>

  <label>大頭照 (300 × 300)</label>
  <input type="hidden" name="cover_img" class="cover_img" value="<?PHP echo @$row['cover_img']?>">
  
  <label>Email</label>
  <input type="text" name="email" class="pure-input-1-2" value="<?PHP echo @$row["email"]?>">
  <br>
  <br>
</form>
<script>
$(function () {

  $(".cover_img").myCoverUpload({
    img_url: '<?PHP echo IMG_URL?>upload/',
    upload_url: '<?PHP echo UPLOAD_URL?>/member/upload/',
    thumbnail_type: 'crop',
    thumbnail_size: ["300x"],
    crop_min: [0,0],
    crop_ratio:1,
    crop_path:'<?PHP echo UPLOAD_URL?>/member/crop/'
  });

  $("#frm").mylanguagesTab({
    path_url:"<?PHP echo ADMIN_URL?>member/get_lang/<?PHP echo $id?>/",
    languages: ["en","tw"],
    surecce:function(){
      edit_view.init();
      $(".educations").sortable({
        handle: ".icon-move",
        items: ".edu_div"
      });
      $(".awards").sortable({
        handle: ".icon-move",
        items: ".award_div"
      });
      $(".exhibitions").sortable({
        handle: ".icon-move",
        items: ".exh_div"
      });
      $(".press").sortable({
        handle: ".icon-move",
        items: ".press_div"
      });
    }
  });
  edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL?>member/save/<?PHP echo @$id?>", 
    function(arr, $form, options){
    });
});

function add_education(obj){
  var len =obj.parents(".languageTab").attr("id");
  var div = $('<div class="edu_div"><i class="icon-move" ></i><span>學校:</span><input type="text" class="pure-input-1-4" name="edu_school'+len+'[]"><span>系所:</span><input type="text" class="pure-input-1-4" name="edu_dep'+len+'[]"></div>');
  var del_btn = $('<i class="icon-trash"></i>').click(function(){
    if (!confirm('確認刪除?')) return;
    $(this).parent().remove();
  });
  div.append(del_btn);
  obj.parent().append(div);
  obj.parent().sortable({
    handle: ".icon-move",
    items: ".edu_div"
  });
}
function add_awards(obj){
  var len =obj.parents(".languageTab").attr("id");
  var div = $('<div class="award_div"><i class="icon-move" ><span>名稱:</span><input type="text" class="pure-input-1-4" name="awards_name'+len+'[]"><span>名次:</span><input type="text" class="pure-input-1-4" name="awards_no'+len+'[]"></div>');
  var del_btn = $('<i class="icon-trash"></i>').click(function(){
    if (!confirm('確認刪除?')) return;
    $(this).parent().remove();
  });
  div.append(del_btn);
  obj.parent().append(div);
  obj.parent().sortable({
    handle: ".icon-move",
    items: ".award_div"
  });
}
function add_exhibitions(obj){
  var len =obj.parents(".languageTab").attr("id");
  var div = $('<div class="exh_div"><i class="icon-move" ></i><span>名稱:</span><input type="text" class="pure-input-1-4" name="exh_name'+len+'[]"></div>');
  var del_btn = $('<i class="icon-trash"></i>').click(function(){
    if (!confirm('確認刪除?')) return;
    $(this).parent().remove();
  });
  div.append(del_btn);
  obj.parent().append(div);
  obj.parent().sortable({
    handle: ".icon-move",
    items: ".exh_div"
  });
}
function add_press(obj){
  var len =obj.parents(".languageTab").attr("id");
  var div = $('<div class="press_div"><i class="icon-move" ></i><span>名稱:</span><input type="text" class="pure-input-1-4" name="press_name'+len+'[]"></div>');
  var del_btn = $('<i class="icon-trash"></i>').click(function(){
    if (!confirm('確認刪除?')) return;
    $(this).parent().remove();
  });
  div.append(del_btn);
  obj.parent().append(div);
  obj.parent().sortable({
    handle: ".icon-move",
    items: ".press_div"
  });
}
</script>