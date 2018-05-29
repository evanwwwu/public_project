  <label>姓名</label>
  <input name="name_<?PHP echo $lan?>" type="text" placeholder="" class="pure-input-1-4" value="<?PHP echo @$name?>">
  <label>自傳</label>
  <textarea name="document_<?PHP echo $lan?>" cols="100" rows="10"><?PHP echo @$document?></textarea>
  <label>學歷</label>   
  <div class="educations">
    <input type="button" class="select_btn button-success pure-button pure-button-secondary" onclick="add_education($(this))" value="新增學歷">
    <br>
    <?PHP if(@$education!=""):?>
    <?php foreach(json_decode($education) as $edu): ?>
    <div class="edu_div">
      <i class="icon-move" ></i>
      <span>學校:</span>
      <input type="text" class="pure-input-1-4" name="edu_school_<?PHP echo $lan?>[]" value="<?php echo urldecode($edu->edu_school); ?>">
      <span>系所:</span>
      <input type="text" class="pure-input-1-4" name="edu_dep_<?PHP echo $lan?>[]" value="<?php echo urldecode($edu->edu_dep); ?>">
      <i class="icon-trash"></i>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
</div>
<br>
<label>獎項</label>
<div class="awards">
  <input type="button" class="select_btn button-success pure-button pure-button-secondary" onclick="add_awards($(this))" value="新增獎項">
  <br>
  <?PHP if(@$awards!=""):?>
  <?php foreach(json_decode($awards) as $award): ?>
  <div class="award_div">
    <i class="icon-move" ></i>
    <span>名稱:</span>
    <input type="text" class="pure-input-1-4" name="awards_name_<?PHP echo $lan?>[]" value="<?php echo urldecode($award->awards_name) ?>">
    <span>名次:</span>
    <input type="text" class="pure-input-1-4" name="awards_no_<?PHP echo $lan?>[]" value="<?php echo urldecode($award->awards_no) ?>">
    <i class="icon-trash"></i>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<br>
<label>展覽</label>   
<div class="exhibitions">
  <input type="button" class="select_btn button-success pure-button pure-button-secondary" onclick="add_exhibitions($(this))" value="新增展覽">
  <br>
  <?PHP if(@$exhibition!=""):?>
  <?php foreach(json_decode($exhibition) as $exh): ?>
  <div class="exh_div">
    <i class="icon-move" ></i>
    <span>名稱:</span>
    <input type="text" class="pure-input-1-4" name="exh_name_<?PHP echo $lan?>[]" value="<?php echo urldecode($exh->exh_name); ?>">
    <i class="icon-trash"></i>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<br>
<label>媒體報導</label> 
<div class="press">  
  <input type="button" class="select_btn button-success pure-button pure-button-secondary" onclick="add_press($(this))" value="新增展覽">
  <br>
  <?PHP if(@$press!=""):?>
  <?php foreach(json_decode($press) as $pre): ?>
  <div class="press_div">
    <i class="icon-move" ></i>
    <span>名稱:</span>
    <input type="text" class="pure-input-1-4" name="press_name_<?PHP echo $lan?>[]" value="<?php echo urldecode($pre->press_name) ?>">
    <i class="icon-trash"></i>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<br>