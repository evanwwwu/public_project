
<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
<form id="frm" class="pure-form pure-form-stacked">
  <?php echo form_hidden($this->security->get_csrf_token_name(),  $this->security->get_csrf_hash()); ?>
  <div style="">
    <div style="display: inline-block;">
      <button type="submit" class="pure-button notice">儲存</button>
    </div>
    <div style="display: inline-block;">
      <a href="<?PHP echo ADMIN_URL.$this->data['controller_addr'];?>" class="pure-button">回上頁</a>
    </div>
  </div>
  <hr>
  <label>課程名稱</label>
  <input type="text" class="pure-input-1-2" name="title" value="<?php echo @$row["title"] ?>">
  <label>發佈</label>
  <input type="radio" name="publish" value="0" <?PHP echo (@$row["publish"]=="0")?"checked":"" ?>>否
  <input type="radio" name="publish" value="1" <?PHP echo (!isset($row["publish"])||@$row["publish"]=="1")?"checked":"" ?>>是

  <label>開課月份</label>
  <select name="month" class="month">
    <?php foreach ($month_name as $key => $m):?>
      <option value="<?php echo ($key+1); ?>" <?php echo (@$row["month"]==($key+1))?"selected":"" ?>><?php echo $m; ?></option>
    <?php endforeach; ?>
  </select>
  <div class="dates_div">
    <label>課程日期<button style="margin-left:10px;" class="notice pure-button" onclick="project.add_classesdate();"type="button">新增</button></label>
    <?php foreach ($row["dates"] as $key => $date): ?>
      <div class="dates">
        <a href="javascript:void(0)" onclick="get_detail(<?php echo $date["date_id"] ?>)">學員資料</a>
        <input type="hidden" name="date_id[]" value="<?php echo $date["date_id"] ?>">
        日期:<input class="date_ui" time="HH:mm" type="text" name="classes_date[]" value="<?php echo $date['classes_date'] ?>">
        人數:<input type="text" name="people_limit[]" value="<?php echo $date['people_limit'] ?>">
        金額:<input type="text" name="price[]" value="<?php echo $date['price'] ?>">
        現在人數:<span><?php echo $date["now_people"];?></span>
        <a href="javascript:void(0)" onclick="project.delete_date2($(this),'<?php echo @$date['id'] ?>')">刪除<i class="icon-trash"></i></a>
      </div>    
    <?php endforeach;?>
  </div>

  <label>內容照 (1050 × 300)</label>
  <input type="hidden" name="main_img" class="main_img" value="<?PHP echo @$row['main_img']?>">
  <div class="top_content">
    <label>課程簡介 <button style="margin-left:40px;" class="notice pure-button" onclick="project.add_table(3,'classes');"type="button">新增規格欄</button></label>
    <?php if (count(json_decode(@$row["top_text"]))>0): ?>
      <?php foreach (json_decode(@$row["top_text"]) as $i=> $top_content): ?>
        <div class="t_div">
          <table class="pure-table pure-table-bordered" width="100%">
            <thead>
              <tr>
                <th><span>產品規格</span> <button class="del_not del" type="button" onclick="project.table_del($(this))">刪除</button><button class="notice add" type="button" onclick="project.add_tr($(this),'classes')">新增</button></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($top_content as $key => $top): ?>
                <tr>
                  <td><input type="text" class="pure-input-1-2" name="t_text" value="<?php echo $top->t_text; ?>"><a href="javascript:void(0)" onclick="edit_view.delete_tr($(this))">　<i class="icon-trash"></i></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <label>老師名稱</label>
  <input type="text" name="teacher_name" value="<?php echo @$row["teacher_name"] ?>">
  <label>師資照片 (370 × 210)</label>
  <input type="hidden" name="teacher_img" class="teacher_img" value="<?PHP echo @$row['teacher_img']?>">

  <label>師資介紹</label>
  <textarea name="teacher_text" rows="10" cols="70"><?php echo @$row["teacher_text"] ?></textarea>

  <label>課程內容</label>
  <textarea name="content" class="ckedit"><?php echo @$row["content"] ?></textarea>
  <br>
  <br>
</form>
<script>
  $(function () { 
    edit_view.ckedit($(".ckedit"),"");
    edit_view.init();

    $(".teacher_img").myCoverUpload({
      img_url: '<?PHP echo IMG_URL?>',
      upload_url: '<?PHP echo UPLOAD_URL.$controller_addr;?>/upload/',
      thumbnail_type: 'crop',
      thumbnail_size: ["370x"],
      crop_min: [],
      crop_ratio:37/21,
      crop_path:'<?PHP echo UPLOAD_URL.$controller_addr;?>/crop/'
    });

    $(".main_img").myCoverUpload({
      img_url: '<?PHP echo IMG_URL?>',
      upload_url: '<?PHP echo UPLOAD_URL.$controller_addr;?>/upload/',
      thumbnail_type: 'crop',
      thumbnail_size: ["1050x"],
      crop_min: [],
      crop_ratio:105/30,
      crop_path:'<?PHP echo UPLOAD_URL.$controller_addr;?>/crop/'
    });
    edit_view.form_set($("#frm"), "<?PHP echo ADMIN_URL.$controller_addr;?>/save/<?PHP echo @$id?>", 
      function(arr, $form, options){
        var top_content=[];
        $(".t_div").each(function(){
          var new_arr=[];
          $(this).find("tbody tr").each(function(){
            var l = {"t_text":""};
            l.t_text = $(this).find("input[name=t_text]").val();
            new_arr.push(l);
          });
          top_content.push(new_arr);
        });
        arr.push({name:'top_text', value:JSON.stringify(top_content)});
      });

  });
  function get_detail(did){
    window.open("<?php echo ADMIN_URL; ?>classes/get_member/"+did,"_blank");
  }

</script>