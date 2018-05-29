<?PHP echo $header?>
<body>
  <div class="pure-g-r " id="layout">
   <?PHP echo $menu?>
   <div class="pure-u" id="main">
    <div class="content">
     <h2 class="content-subhead" id="stacked-form"><?PHP echo $h2;?></h2>
     <form id="frm" class="pure-form pure-form-stacked">
      <input type="hidden" id="id" name="id" value="<?PHP echo $data['ID']?>">
      <fieldset>
        
       <div style="">
        <div style="display:inline-block;"><button type="submit" class="pure-button notice">SAVE</button></div>
        <div style="display:inline-block;"><a href="<?PHP echo SITE_URL?>calendar/<?PHP echo $data['post_name']?>?preview=1" target="_blank" class="pure-button pure-button-primary">預覽</a></div>
        <div style="display:inline-block;"><a href="<?PHP echo ADMIN_URL?>calendar/images/<?PHP echo $data['ID']?>" class="pure-button pure-button-primary">編輯照片</a></div>
        <div style="display:inline-block;"><a title="DELETE" class="pure-button error" onclick="del(<?PHP echo $data['ID']?>)" >DELETE</a></div>
        <div style="display:inline-block;"><a href="<?PHP echo ADMIN_URL?>calendar" class="pure-button">BACK</a></div>
        </div>
        <div style="clear:both"></div>
        <label></label>
       <hr>

       <label>發佈</label>
       <input name="post_status" value="publish" type="radio" <?PHP echo ($data['post_status']=='publish')?'checked':''; ?>> 是 
       <input name="post_status" value="unpublish" type="radio" <?PHP echo ($data['post_status']=='unpublish' || $data['post_status']=='auto-draft')?'checked':''; ?>> 否

       <label>標籤</label>
       <textarea class="tags pure-input-1-3" name="tags" rows="1"><?PHP echo $data['tags']?></textarea>

       <label></label>
       <?PHP foreach($hot_tag as $tags)
       {
        echo "<a class='hot_tag pure-button pure-button-xsmall'>".$tags['name']."</a>";
       }
       ?>

       <label>標題</label>
       <input id="post_title" name="post_title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo $data['post_title']?>">

       <label>作者</label>
        <select name = "post_author" id="post_author">
        <?PHP 
            if($data['post_author']==$_SESSION[ADMIN_SESSION])
              echo '<option selected="true" value="'.$_SESSION[ADMIN_SESSION].'">'.$_SESSION[ADMIN_NAME].'</option>';
            else
              echo '<option value="'.$_SESSION[ADMIN_SESSION].'">'.$_SESSION[ADMIN_NAME].'</option>';

        foreach($us as $row):
          if($row['id']!=$_SESSION[ADMIN_SESSION]){
            if($data['post_author']==$row['id'])
            echo '<option selected="true" value="'.$row['id'].'">'.$row['display_name'].'</option>';
            else
            echo '<option value="'.$row['id'].'">'.$row['display_name'].'</option>';
        }
        endforeach;
         ?>
        </select>

       <label>地點</label>
       <textarea class="location pure-input-1-3" name="location" rows="1"><?PHP echo $data['location']?></textarea>

       <label>發佈日期</label>
       <input id="post_date" name="post_date" type="text" placeholder="" class="pure-input" value="<?PHP echo substr($data['post_date'],0,16)?>">

       <label>起始日期 ~ 結束日期</label>
       <input id="start_date" name="start_date" type="text" placeholder="" class="pure-input" style="display:inline" value="<?PHP echo $data['start_date']?>"> ~ 
       <input id="end_date" name="end_date" type="text" placeholder="" class="pure-input" style="display:inline" value="<?PHP echo $data['end_date']?>">

       <label>內容</label>
       <div style="width:100%; max-width:975px;">
         <textarea class=" adv" id="post_content" name="post_content" rows="20"><?PHP echo $data['post_content']?></textarea>
       </div>
        <label></label>
       <hr>

       <label>封面</label>
       <input id="cover_file" name="cover_file" type="file" placeholder="" class="pure-input"> <span id="cover_loading"></span>
       <div id="cover_preview">
        <?PHP if ($data['cover_img']!=''):?>
        <br>
        <img src="<?PHP echo SITE_URL?>upload/<?PHP echo $data['cover_img']?>" style="border:1px solid #cccccc">
        <br>
        <a href="javascript:void(0)" onclick="delete_img($(this))"><i class="icon-trash"></i>DELETE</a><br><br>
        <?PHP endif;?>
      </div>

      <label>圖片秀</label>
      <input id="gallery_file" name="gallery_file" type="file" multiple placeholder="" class="pure-input"> <span id="gallery_loading"></span>
      <div id="gallery">
        <?PHP foreach($data['gallery'] as $gallery_img):?>
        <div class="gallery_img">
         <img src="<?PHP echo SITE_URL?>upload/<?PHP echo $gallery_img?>"><br>
         <a href="javascript:void(0)" onclick="delete_img_gallery($(this),'<?PHP echo $gallery_img?>')"><i class="icon-trash"></i>DELETE</a>
         <input type="hidden" name="gallery[]" value="<?PHP echo $gallery_img?>">
       </div>
       <?PHP endforeach;?>

     </div>
     <label>推薦</label>
     <div>
        <a href="javascript:void(0);" class="pure-button rec " event="calendar">推薦行事曆</a>
     </div>
     <div id="rec_panel">
        <?PHP foreach($data['recommend'] as $recommend):?>
        <div id="rec_<?PHP echo $recommend['meta_id']?>"><a href="javascript:void(0)" onclick="delete_recommend(<?PHP echo $recommend['meta_id']?>)"><i class="icon-trash"></i></a> <?PHP echo $recommend['title']?></div>
        <?PHP endforeach;?>
     </div>
   </fieldset>
 </form>
</div>
<?PHP echo $footer?>
</div>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style>

.hot_tag{
  margin:5px;
  font-size: 12px;
}
.term a{ visibility:hidden;}
.term:hover > a{visibility:visible;}
#cover_preview img{max-width:235px; height:auto;}
#gallery{
	margin-top:20px;
	padding: 20px;
	border: 1px solid #ccc;
}
.gallery_img{
  position:relative;
  width: 150px;
  height: 200px;
  border: 1px solid #ccc;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: top;
  margin: 2px;
  zoom: 1;
  *display: inline;
  _height: 176px;
  text-align:center;
}
.gallery_img img{
  max-width:150px;
  max-height:150px;
  padding-bottom:30px;
}
.gallery_img a{
  position:absolute;
  left:0;
  bottom:0;
}
.gallery_img .loading{
	margin-top:40%;
	text-align: center;
}
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
    var config = new Object();
    config.toolbar = 'Basic';
    //config.filebrowserImageBrowseUrl = '<?PHP echo ADMIN_URL?>kcfinder/browse.php?type=images';
    config.filebrowserImageUploadUrl = '<?PHP echo ADMIN_URL?>file/ckupload/upload/<?PHP echo $data['ID']?>';
    config.extraPlugins = 'stylesheetparser';
    config.extraPlugins = 'mediaembed';
    config.extraPlugins = 'autogrow';
    config.contentsCss = '<?PHP echo ADMIN_URL?>assets/old/css/front.css';
    config.stylesSet = [];
    config.autoGrow_onStartup = true;
    config.toolbar_Basic = [
        ['Source'],
        ['Bold', 'Italic', 'Underline', 'FontSize'],
        ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Link', 'Unlink'],
        ['TextColor', 'BGColor'],
        ['Image', 'MediaEmbed', 'Table', 'HorizontalRule', 'SpecialChar']
    ];
    var adv = $('.adv').ckeditor(function () {}, config).editor;
    //adv.replace( 'ckfinder' );
    CKFinder.setupCKEditor( adv );
    adv.on('change',function(){
      change = 1;
    });
    $('#cover_file').fileupload({
        change: function (e, data) {
            $('#cover_loading').html('<i class="icon-spinner icon-spin"></i>');
        },
        formData: {
            'id': <?PHP echo $data['ID'] ?>
        },
        url: '<?PHP echo ADMIN_URL?>file/upload/cover_file',
        sequentialUploads: true,
        dataType: 'html',
        done: function (e, data) {
            var json = $.parseJSON(data.result);
            if (json[0].error == '') {
                $('#cover').val('');
                showimg(0, json[0].filename);
                $('#deleteimg').val(0);
                $('#cover_loading').empty();
            } else {
                alert('error');
            }
        },
        dropZone: null
    });
    $('.hot_tag').click(function (){
          var name = $(this).text();
          if ( $('textarea[name="tags"]').val()==""){
              $('textarea[name="tags"]').val(name);
          }
          else{
             var text = $('textarea[name="tags"]').val();
             text += ","+name;
          $('textarea[name="tags"]').val(text).trigger('autosize.resize');;
             }
        } 
      )
    $('#gallery_file').fileupload({
        change: function (e, data) {
            $.each(data.files, function (index, file) {
                $('#gallery').append('<div id="temp_' + (uploaded + index) + '" class="gallery_img"><div class="loading"><i class="icon-spinner icon-spin"></i><br><span></span></div></div>');
            })
        },
        formData: {},
        url: '<?PHP echo ADMIN_URL?>file/gallery_upload/gallery_file/<?PHP echo $data['ID']?>',
        sequentialUploads: true,
        dataType: 'html',
        done: function (e, data) {
            console.log('temp_' + uploaded)
            $('#temp_' + uploaded).html('<img src="<?PHP echo SITE_URL?>upload/' + data.result + '" style=""><br><a href="javascript:void(0)" onclick="delete_img_gallery($(this),\'' + data.result + '\')"><i class="icon-trash"></i>DELETE</a><input type="hidden" name="gallery[]" value="' + data.result + '">');
            uploaded++;
        },
        dropZone: null,
        progress: function (e, data) {
            $.each(data.files, function (index, file) {
                //console.log(file.name);
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#temp_' + uploaded).find('span').html(progress + "%")
            });
        }
    });

    $('#gallery').sortable({
        placeholder: "sortable-placeholder",
        stop: function (event, ui) {
            var q = 'id=<?PHP echo $data['ID']?>';
            $('input[name="gallery[]"]').each(function () {
                q += '&gallery[]=' + $(this).val();
            })
            console.log(q);
            $.post('<?PHP echo ADMIN_URL?>calendar/gallery_sort', q)
        }
    });


    $('.tags').autosize();
    tag_autocomplte($('.tags'));

    //$('.recommend').autosize();
    recommend_autocomplte($('.recommend'));
    location_autocomplte($('.location'));

    $('#frm').ajaxForm({
      beforeSubmit:function(){change=0;},
        url: '<?PHP echo ADMIN_URL?>calendar/save',
        type: 'post',
        dataType: 'script'
    });

     $('#post_date').datetimepicker({
        setDate:new Date(),
       changeMonth: true,
       changeYear: true,
       dateFormat:"yy-mm-dd",
       timeFormat :"hh:mm"
     });

     $('#start_date,#end_date').datepicker({
       changeMonth: true,
       changeYear: true,
       dateFormat:"yy-mm-dd",
     });

    $('.rec').bind('click', function () {
        var width = 800;
        var height = 600;
        var left = parseInt((screen.availWidth/2) - (width/2));
        var top = parseInt((screen.availHeight/2) - (height/2));
        var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
        myWindow = window.open("<?PHP echo ADMIN_URL?>recommend/"+$(this).attr("event")+"/<?PHP echo $us_id?>",'recommend',windowFeatures)
    });
})

function rec_updata(){
  $.post("<?PHP echo ADMIN_URL?>posts/getrec/<?PHP echo $us_id?>",null,function(data){
    $("#rec_panel div").remove();
    for(var x=0;x<data.length;x++){
      $("#rec_panel").append('<div id="rec_'+data[x].meta_id+'"><a href="javascript:void(0)" onclick="delete_recommend('+data[x].meta_id+')"><i class="icon-trash"></i></a>'+data[x].title+'</div>');
    }
  },"json")
}

function tag_autocomplte(obj) {
    obj.bind("keydown", function (event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
            $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
        }
    })
        .autocomplete({
            source: function (request, response) {
                $.getJSON("<?PHP echo ADMIN_URL . 'event/search_tag'?>", {
                    term: extractLast(request.term)
                }, response);
            },
            search: function () {
                // custom minLength
                var term = extractLast(this.value);
                if (term.length < 1) {
                    return false;
                }
            },
            focus: function () {
                // prevent value inserted on focus
                return false;
            },
            select: function (event, ui) {
                var terms = split(this.value);
                // remove the current input
                terms.pop();
                // add the selected item
                terms.push(ui.item.value);
                // add placeholder to get the comma-and-space at the end
                terms.push("");
                this.value = terms.join(",");
                return false;
            }
        });

}

function recommend_autocomplte(obj) {
    obj.bind("keydown", function (event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
            $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
        }
    })
        .autocomplete({
            source: function (request, response) {
                $.getJSON("<?PHP echo ADMIN_URL . 'calendar/search_posts/' . $data['ID']?>", {
                    term: extractLast(request.term)
                }, response);
            },
            search: function () {
                // custom minLength
                var term = extractLast(this.value);
                if (term.length < 1) {
                    return false;
                }
            },
            focus: function () {
                // prevent value inserted on focus
                return false;
            },
            select: function (event, ui) {
                $('#rec_id').val(ui.item.id);
            }
        });

}

function location_autocomplte(obj) {
    obj.bind("keydown", function (event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
            $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
        }
    })
        .autocomplete({
            source: function (request, response) {
                $.getJSON("<?PHP echo ADMIN_URL . 'calendar/search_location/' . $data['ID']?>", {
                    term: extractLast(request.term)
                }, response);
            },
            search: function () {
                // custom minLength
                var term = extractLast(this.value);
                if (term.length < 1) {
                    return false;
                }
            },
            focus: function () {
                // prevent value inserted on focus
                return false;
            },
            select: function (event, ui) {
                var terms = split(this.value);
                // remove the current input
                terms.pop();
                // add the selected item
                terms.push(ui.item.value);
                // add placeholder to get the comma-and-space at the end
                terms.push("");
                this.value = terms.join(",");
                return false;
            }
        });

}


function split(val) {
    return val.split(/,\s*/);
}

function del(id){
  if (!confirm('Delete?')) return;
  $.post('<?PHP echo ADMIN_URL?>calendar/del/0','id='+id,function(){
    location = '<?PHP echo ADMIN_URL?>calendar';
  },'script');
}

function extractLast(term) {
    return split(term).pop();
}

function showimg(id, file) {
    $('#cover_preview').html('<br><img src="<?PHP echo SITE_URL?>upload/' + file + '" style="border:1px solid #cccccc"><br><a href="javascript:void(0)" onclick="delete_img($(this))"><i class="icon-trash"></i>DELETE</a><br><br>');
}

function delete_img(obj) {
    if (!confirm('確定刪除封面?')) return;
    var target = obj.parent();
    target.empty();
    $.post('<?PHP echo SITE_URL?>admin/calendar/delete_cover', 'id=' + $('#id').val(), null, 'script');
}

function delete_img_gallery(obj, filename) {
    if (!confirm('確定刪除照片?')) return;
    var target = obj.parent();
    target.remove();
    $.post('<?PHP echo SITE_URL?>admin/calendar/delete_gallery', 'id=' + $('#id').val() + '&filename=' + filename, null, 'script');
}

function delete_tag(id) {
    if (!confirm('確定刪除類別?')) return;
    $.post('<?PHP echo SITE_URL?>admin/calendar/delete_tag', 'id=' + id, null, 'script');
}
function delete_recommend(id){
  if (!confirm('確定刪除?')) return;
  $.post('<?PHP echo SITE_URL?>admin/calendar/delete_recommend', 'id=' + id, function(){$('#rec_'+id).remove();}, 'script');
}
</script>
</body>
</html>