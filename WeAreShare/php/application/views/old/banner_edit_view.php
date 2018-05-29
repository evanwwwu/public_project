<?PHP echo $header?>
<body>
  <div class="pure-g-r " id="layout">
   <?PHP echo $menu?>
   <div class="pure-u" id="main">
    <div class="content">
     <h2 class="content-subhead" id="stacked-form"><?PHP echo $h2;?></h2>
     <form id="frm" class="pure-form pure-form-stacked">
      <input type="hidden" id="id" name="id" value="<?PHP echo $data['id']?>">
      <fieldset>
        
       <div style="">
        <div style="display:inline-block;"><button  type="submit" class="pure-button notice">SAVE</button></div>
        <div style="display:inline-block;"><a title="DELETE" class="pure-button error" onclick="del(<?PHP echo $data['id']?>)" >DELETE</a></div>
        <div style="display:inline-block;"><a href="<?PHP echo ADMIN_URL?>banner?type=<?PHP echo $type?>" class="pure-button">BACK</a></div>
        </div>
        <div style="clear:both"></div>
        <label></label>
       <div style="display:none;"> 
              <label>類別</label>
              <select  class="type_search" name="type">
                  <?PHP foreach ($size as $row):?>
                  <option value="<?PHP echo $row['id']?>" <?PHP echo (isset($data['type']) and ($data['type']==$row['id'] ||$type==$row['id'] ))?"selected":"";?>><?PHP echo $row['type_title']." (".$row['size'].")"?></option>
                  <?PHP endforeach;?>
              </select>
       </div>
       <hr>
       <div id="up_img">
           <?PHP foreach ($size as $row){

           if($type==$row['id'])
            {
            $img_size="圖片(".$row['size'].")";
            }
           }?>
           <label><?PHP echo $img_size; ?></label>
           <input id="cover_file" name="cover_file" type="file" placeholder="" class="pure-input"> <span id="cover_loading"></span>
           <input type="hidden" id="img_title" name="img_title" value="<?PHP echo $data['img_title']?>">
           <div id="cover_preview">
                <?PHP if ($data['img_title']!=''):?>
                <br>
                <img src="<?PHP echo SITE_URL?>upload/<?PHP echo $data['img_title']?>" style="border:1px solid #cccccc">
                <br>
                <a href="javascript:void(0)" onclick="delete_img($(this))"><i class="icon-trash"></i>DELETE</a><br><br>
                <?PHP endif;?>
          </div>
      </div>

       <div id="multimedia" style="display:none;">

          <div style="" id="multimedia_type">
          <label>影片選擇</label>
          <input name="m_type" value="0" type="radio" <?PHP echo ($m_type=="0")?'checked':''; ?>> 無
          <input name="m_type" value="1" type="radio" <?PHP echo ($m_type=='1')?'checked':''; ?>> Flash
          <input name="m_type" value="2" type="radio" <?PHP echo ($m_type=='2')?'checked':''; ?>> Video
          </div>

          <div id="flash" style="display:none;">
             <label>Flash (width=960 height=450)</label>
             <input id="multimedia_file" name="multimedia_file" type="file" placeholder="" class="pure-input"> <span id="multimedia_loading"></span>

             <input type="hidden" id="flash_input" name="multimedia" value="<?PHP echo ($m_type=='1')?$data['multimedia']:''?>">
             <div id="multimedia_preview">
                  <?PHP if ($data['multimedia']!=''&&$m_type=="1"):?>
                  <br>
                  <a target="_blank" href="<?PHP echo $data['multimedia'] ?>" class="falsh_link">預覽</a>
                  <br>
                  <a href="javascript:void(0)" onclick="delete_mul($(this))"><i class="icon-trash"></i>DELETE</a><br><br>
                  <?PHP endif;?>
            </div>
          </div>

          <div id="youtube" style="display:none;">  
             <label>Video (width=960 height=450)</label>
             <textarea name="" id="youtube_input" class="pure-input-3-3" cols="68" rows="4"><?PHP echo ($m_type=='2')?$data['multimedia']:''?></textarea>
          </div>

      </div>

      <hr>       
      <label>發佈</label>
      <input name="banner_publish" value="1" type="radio" <?PHP echo ($data['publish']=='1')?'checked':''; ?>> 是 
      <input name="banner_publish" value="0" type="radio" <?PHP echo ($data['publish']=='0'|| $data['publish']=='' )?'checked':''; ?>> 否

       <label>標題</label>
       <input id="banner_title" name="banner_title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo $data['banner_title']?>">

       <label>開始日期</label>
       <input id="date_start" name="date_start" type="text" placeholder="" class="pure-input date_box" value="<?PHP echo (isset($data['date_start']))?substr($data['date_start'],0,16):date('Y-m-d 00:00')?>">

       <label>結束日期</label>
       <input id="date_end" name="date_end" type="text" placeholder="" class="pure-input date_box" value="<?PHP echo (isset($data['date_end']))?substr($data['date_end'],0,16):date('Y-m-d 23:59')?>">

       <label>內容</label>
       <textarea class="pure-input-3-3" name="description" cols="35" rows="5"><?PHP echo $data['description']?></textarea>
       
       <label>連結</label>
       <input id="link" name="link" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo $data['link']?>">
      
      <div style="display:none;" id="first_radio">
          <label>常駐</label>
          <input name="first" value="1" type="radio" <?PHP echo ($data['first']=='1')?'checked':''; ?>> 是 
          <input name="first" value="0" type="radio" <?PHP echo ($data['first']=='0'||$data['first']=="")?'checked':''; ?>> 否
      </div>
       <hr>
     </div>

   </fieldset>
 </form>
</div>
<?PHP echo $footer?>
</div>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style>


#cover_preview img{max-width:235px; height:auto;}

.sortable-placeholder{
  width:152px;
  height:200px;
  background-color:#FF9;
  display: inline-block;
}
.ui-widget{
  font-size:60%;
}
</style>
<script>var uploaded = 0;
$(function () {

          $('textarea').bind('input', function() { 
           console.log($(this).val());
        });

          switch($(".type_search :selected").val())
          {
            case "1":
              $("#multimedia").show();
              $("#first_radio").hide();              
            break;

            case "5":
              $("#multimedia").hide();
              $("#first_radio").show();
            break;

          }

        switch($("input[name='m_type']:checked").val())
        {
          case "1":
            $("#flash").show();
            $("#flash_input").attr("name","multimedia");
            $("#youtube").hide();
            $("#youtube_input").attr("name","");
          break;
          case "2":
            $("#flash").hide();
            $("#flash_input").attr("name","");
            $("#youtube").show();
            $("#youtube_input").attr("name","multimedia");
          break;
          case "0":
            $("#flash").hide();
            $("#flash_input").attr("name","multimedia");
            $("#youtube").hide();
            $("#youtube_input").attr("name","");
            $("[name='multimedia']").val('');
            $("#multimedia_preview").empty();
          break;
            
        }

    $('#cover_file').fileupload({
        change: function (e, data) {
            $('#cover_loading').html('<i class="icon-spinner icon-spin"></i>');
        },
        formData: {
            'id': <?PHP echo $data['id'] ?>
        },
        url: '<?PHP echo ADMIN_URL?>file/banner/cover_file',
        sequentialUploads: true,
        dataType: 'html',
        done: function (e, data) {
            var json = $.parseJSON(data.result);
            if (json[0].error == '') {
                showimg(0, json[0].filename);
                $('#cover_loading').empty();
            } else {
                alert('error');
            }
        },
        dropZone: null
    });

    $('#multimedia_file').fileupload({
        change: function (e, data) {
            $('#multimedia_loading').html('<i class="icon-spinner icon-spin"></i>');
        },
        formData: {
            'id': <?PHP echo $data['id'] ?>
        },
        url: '<?PHP echo ADMIN_URL?>file/banner/multimedia_file',
        sequentialUploads: true,
        dataType: 'html',
        done: function (e, data) {
            var json = $.parseJSON(data.result);
            if (json[0].error == '') {
                $("input[name='multimedia']").val(json[0].filename);
                $("#multimedia_preview").html('<br><a target="_blank" href="<?PHP echo SITE_URL?>upload/'+json[0].filename+'" class="falsh_link" >預覽</a><br><a href="javascript:void(0)" onclick="delete_mul($(this))"><i class="icon-trash"></i>DELETE</a><br><br>')
                $('#multimedia_loading').empty();
            } else {
                alert('error');
            }
        },
        dropZone: null
    });


    $('#frm').ajaxForm({
        beforeSubmit:function(){change=0;},
        url: '<?PHP echo ADMIN_URL?>banner/save',
        type: 'post',
        dataType: 'script'
    });
     $('.date_box').datetimepicker({
       setDate:new Date(),
       changeMonth: true,
       changeYear: true,
       dateFormat:"yy-mm-dd",
       timeFormat :"hh:mm"
     });
    $('.date_box').change(function(){
        if($("input[name='date_start']").val()!="" && $("input[name='date_end']").val()!=""){
            var  start =  new  Date($("input[name='date_start']").val());
            var  end =  new  Date($("input[name='date_end']").val());
            if((end-start)<0){
                alert("開始時間不可大於結束時間");
                $(this).val("");
            }
        }    
    });    

     // $('.type_search').change(function(){
     //      switch($(".type_search :selected").val())
     //      {
     //        case "1":
     //          $("#multimedia").show();
     //          $("#first_radio").hide();
     //          $("input[name='first']").attr("checked","0");
     //          break;
     //        case "2":
     //          $("#first_radio").hide();
     //          $("#multimedia").hide();             
     //        break;  
     //        case "3":
     //          $("#first_radio").hide();
     //          $("#multimedia").hide();
     //          break; 
     //        case "5":
     //          $("#multimedia").hide();
     //          $("[name=multimedia]").val("");  
     //          $("#first_radio").show();
     //          break; 
     //      }
     // });
     $("input[name='m_type']").change(function(){
        switch($("input[name='m_type']:checked").val())
        {
          case "1":
            $("#flash").show();
            $("#flash_input").attr("name","multimedia");
            $("#youtube").hide();
            $("#youtube_input").attr("name","");
          break;
          case "2":
            $("#flash").hide();
            $("#flash_input").attr("name","");
            $("#youtube").show();
            $("#youtube_input").attr("name","multimedia");
          break;
          case "0":
            $("#flash").hide();
            $("#flash_input").attr("name","multimedia");
            $("#youtube").hide();
            $("#youtube_input").attr("name","");
            $("[name='multimedia']").val('');
            $("#multimedia_preview").empty();
          break;
            
        }

     });
     //常數檢查     
     // $('input[name="first"]').change(function(){
     //  if ($("input[name='first']:checked").val()=="1") {
     //    if($("#date_start").val()=="" || $("#date_end").val()==""){
     //          alert("請先選擇時段");
     //          $("input[name='first']").attr("checked","0");
     //        }
     //    else{
     //          var p = "id="+$('#id').val()+"&search_start_date="+$("input[name='date_start']").val()+"&search_end_date="+$("input[name='date_end']").val();
     //          $.post('<?PHP echo ADMIN_URL?>banner/check_first',p,function(data){
     //            if(data!=""){
     //            alert(data);
     //            $("input[name='first']").attr("checked","0");
     //            }
     //          },'text');
     //        }
           
     //  }        
     // });

})

function showimg(id, file) {
    $("input[name='img_title']").val(file);
    $('#cover_preview').html('<br><img src="<?PHP echo SITE_URL?>upload/' + file + '" style="border:1px solid #cccccc"><br><a href="javascript:void(0)" onclick="delete_img($(this))"><i class="icon-trash"></i>DELETE</a><br><br>');
}

function delete_img(obj) {
    if (!confirm('確定刪除檔案?')) return;
    var target = obj.parent();
    target.empty();
    $.post('<?PHP echo SITE_URL?>admin/banner/delete_cover', 'id=' + $('#id').val(), function(){$("input[name='img_title']").val("")}, 'script');
}
function delete_mul(obj) {
    if (!confirm('確定刪除檔案?')) return;
    var target = obj.parent();
    target.empty();
    $.post('<?PHP echo SITE_URL?>admin/banner/delete_multimedia', 'id=' + $('#id').val(), function(){$("input[name='multimedia']").val("")}, 'script');
}

function del(id){
  if (!confirm('Delete?')) return;
  $.post('<?PHP echo ADMIN_URL?>banner/del/0','id='+id,function(){
    location = '<?PHP echo ADMIN_URL?>banner?type=<?PHP echo $type?>';
  },'script');
}

function checkform(){
        var date_start = $("input[name='date_start']").val();
        var date_end = $("input[name='date_end']").val();
        if(banner_title!=""&img_title!=""&date_start!=""&date_end!=""){}
        else{
            alert("請確實填寫欄位!!");
            return false;
        }

}

</script>
</body>
</html>