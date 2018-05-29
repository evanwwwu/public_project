<?PHP echo $header?>
<body>
    <div class="pure-g-r " id="layout">
     <?PHP echo $menu?>
     <div class="pure-u" id="main">
      <div class="content">
       <h2 class="content-subhead" id="stacked-form"><?PHP echo $h2;?></h2>
       <form id="frm" class="pure-form pure-form-stacked">

        <input type="hidden" id="deleteimg" name="deleteimg" value="0">
        <div style="">
            <div style="display:inline-block;"><button type="submit" class="pure-button notice">SAVE</button></div>
            <div style="display:inline-block;"><a title="DELETE" class="pure-button error" onclick="del(<?PHP echo $data['ID']?>)" >DELETE</a></div>
            <div style="display:inline-block;"><a href="<?PHP echo ADMIN_URL?>users" class="pure-button">BACK</a></div>
        </div>
        <div style="clear:both"></div>
        <label></label>
        <hr>

        <label>權限</label>
        <input name="active" value="1" type="radio" > 管理者 
        <input name="active" value="2" type="radio" > 一般使用者 
        <input name="active" value="0" type="radio" > 停用
        <label>帳號</label>
        <input id="username" name="username" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $user_data['username']?>">

        <label>密碼</label>
        <input id="userpwd" name="userpwd" type="password" placeholder="" class="pure-input-1-5" value="">
        <label>再輸入一次密碼</label>
        <input id="userpwd" name="userpwd2" type="password" placeholder="" class="pure-input-1-5" value="">

        <label>顯示名稱</label>
        <input id="display_name" name="display_name" type="text" placeholder="" class="pure-input-1-5" value="<?php echo $user_data['display_name']?>">


        <label>發佈</label>
        <input name="post_status" value="publish" type="radio" <?PHP echo ($data['post_status']=='publish')?'checked':''; ?>> 是 
        <input name="post_status" value="unpublish" type="radio" <?PHP echo ($data['post_status']=='unpublish' || $data['post_status']=='auto-draft')?'checked':''; ?>> 否

        <label>群組</label>
        <input name="author_type" value="作者群" type="radio" <?PHP echo ($data['author_type']=='作者群')?'checked':''; ?>> 作者群 
        <input name="author_type" value="視覺團隊" type="radio" <?PHP echo ($data['author_type']=='視覺團隊')?'checked':''; ?>> 視覺團隊 
        <input name="author_type" value="東西團隊" type="radio" <?PHP echo ($data['author_type']=='東西團隊')?'checked':''; ?>> 東西團隊 

                <!-- <label>東方 / 西方</label>
                <input name="locale" value="east" type="radio" <?PHP echo ($data['locale']=='east')?'checked':''; ?>> 東方 
                <input name="locale" value="west" type="radio" <?PHP echo ($data['locale']=='west' || $data['post_status']=='auto-draft')?'checked':''; ?>> 西方 -->

                <label>標籤</label>
                <textarea class="tags pure-input-1-3" name="tags" rows="1"><?PHP echo $data['tags']?></textarea>

                <label></label>
                <?PHP foreach($hot_tag as $tags)
                {
                    echo "<a class='hot_tag pure-button pure-button-xsmall'>".$tags['name']."</a>";
                }
                ?>

                <!-- <label>名稱 - 分類</label>
                <select name = "meta_value" id="meta_value">
                <?PHP 
                foreach ($a_z as $row){
                if($data['letter']==$row){
                echo '<option selected="true" value="'.$row.'">'.$row.'</option>';
                }
                else{
                echo '<option value="'.$row.'">'.$row.'</option>';
                }
                } ?>
                </select>

                <label>名稱</label>
                <input id="post_title" name="post_title" type="text" placeholder="" class="pure-input-1-3" value="<?PHP echo $data['post_title']?>"> -->

                <!--        <label>日期</label>
                <input id="post_date" name="post_date" type="text" placeholder="" class="pure-input" value="<?PHP echo substr($data['post_date'],0,16)?>"> -->

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
                <label>推薦</label>
                <div>
                    <a href="javascript:void(0);" class="pure-button rec "event="user">推薦作者</a>
                </div>

                <div id="rec_panel">
                    <?PHP foreach($recommends as $recommend):?>
                    <?PHP if(isset($recommend['id'])):?>
                    <div id="rec_<?PHP echo $recommend['id']?>"><input name="rec[]" type="hidden" value="<?PHP echo $recommend['id']?>"><a href="javascript:void(0)" onclick="delete_recommend(<?PHP echo $recommend['id']?>)"><i class="icon-trash"></i></a> <?PHP echo $recommend['display_name']?></div>
                    <?PHP endif;?>
                    <?PHP endforeach;?>

                </div>  

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
    min-height: 176px;
    border: 1px solid #ccc;
    display: -moz-inline-stack;
    display: inline-block;
    vertical-align: top;
    margin: 2px;
    zoom: 1;
    *display: inline;
    _height: 176px;
}
.gallery_img .loading{
    margin-top:40%;
    text-align: center;
}
.gallery_img a{
    position:absolute;
    bottom:0;
}
.sortable-placeholder{
    width:152px;
    height:178px;
    background-color:#FF9;
    display: inline-block;
}
.ui-widget{
  font-size:60%;
}
</style>
<script>
var id = "<?php echo $user_data['id'] ?>";
$(function(){
	
	$("input[value='<?php echo $user_data['active']?>']").attr("checked","true");


    $('#frm').ajaxForm({
        beforeSubmit:function(){change=0;},
        url: '<?PHP echo ADMIN_URL?>users/save/'+id,
        type: 'post',
        dataType: 'script'
    });
})

function checkform(){
    var username = $("input[name='username']").val();
    var password = $("input[name='userpwd']").val();
    var active = $("input[name='active']:checked").val();
    var display_name = $("input[name='display_name']").val();
    if(username!=null&password!=null&active!=null&display_name!=null&$("input[name='userpwd2']").val()!=null){

        if($("input[name='userpwd2']").val()!=password){
            alert("請確認兩次密碼都相同");
            $("input[name='userpwd2']").val("");
            $("input[name='userpwd']").val("");
            return false;
        }

    }
    else{
        alert("請確實填寫欄位!!");
        return false;
    }

}

var uploaded = 0;
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
            'id': "<?PHP echo $data['ID'] ?>"
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
         $('textarea[name="tags"]').val(text).trigger('autosize.resize');
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
        $.post('<?PHP echo ADMIN_URL?>people/gallery_sort', q)
    }
});
$('.rec').bind('click', function () {
    var width = 800;
    var height = 600;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;
    myWindow = window.open("<?PHP echo ADMIN_URL?>recommend/"+$(this).attr("event")+"/<?PHP echo $us_id?>",'recommend',windowFeatures);
});

$('.tags').autosize();
tag_autocomplte($('.tags'));

    //$('.recommend').autosize();
    recommend_autocomplte($('.recommend'));
    location_autocomplte($('.location'));

    // $('#frm').ajaxForm({
    //     url: '<?PHP echo ADMIN_URL?>people/save',
    //     type: 'post',
    //     dataType: 'script'
    // });
$('#post_date').datetimepicker({
    setDate:new Date(),
    changeMonth: true,
    changeYear: true,
    dateFormat:"yy-mm-dd",
    timeFormat :"hh:mm"
});
$('.add2rec').bind('click', function () {
    if ($('#rec_id').val() == 0) {
        alert('找不到文章');
        return false;
    } else {
        $.post('<?PHP echo ADMIN_URL?>people/add2rec/<?PHP echo $data['ID']?>/' + $('#rec_id').val(), function (data) {
          $('#rec_panel').append('<div id="rec_'+data+'"><a href="javascript:void(0)" onclick="delete_recommend('+data+')"><i class="icon-trash"></i></a> ' + $('#recommend').val() + '</div>');
          $('#recommend').val('');
          $('#rec_id').val(0)
      });
    }
})
})

function tag_autocomplte(obj) {
    obj.bind("keydown", function (event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
            $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
    }
})
    .autocomplete({
        source: function (request, response) {
            $.getJSON("<?PHP echo ADMIN_URL . 'people/search_tag'?>", {
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
            $.getJSON("<?PHP echo ADMIN_URL . 'people/search_posts/' . $data['ID']?>", {
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
            $.getJSON("<?PHP echo ADMIN_URL . 'people/search_location/' . $data['ID']?>", {
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


function split(val) {
    return val.split(/,\s*/);
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
    $.post('<?PHP echo SITE_URL?>admin/people/delete_cover', 'id=' + $('#id').val(), null, 'script');
}

function delete_img_gallery(obj, filename) {
    if (!confirm('確定刪除照片?')) return;
    var target = obj.parent();
    target.remove();
    $.post('<?PHP echo SITE_URL?>admin/people/delete_gallery', 'id=' + $('#id').val() + '&filename=' + filename, null, 'script');
}

function delete_tag(id) {
    if (!confirm('確定刪除類別?')) return;
    $.post('<?PHP echo SITE_URL?>admin/people/delete_tag', 'id=' + id, null, 'script');
}
function delete_recommend(id){
  if (!confirm('確定刪除?')) return;
  $('#rec_'+id).remove();
}
function rec_updata(move,id){
    if(move==0){
      $.post("<?PHP echo ADMIN_URL?>users/getrec/"+id,null,function(data){
        $("#rec_panel").append('<div id="rec_'+data.id+'"><input name="rec[]" type="hidden" value="'+data.id+'"><a href="javascript:void(0)" onclick="delete_recommend('+data.id+')"><i class="icon-trash"></i></a>'+data.display_name+'</div>');
    },"json")
  }else{
    $("#rec_"+id).remove();
}
}
function del(id){
  if (!confirm('Delete?')) return;
  $.post('<?PHP echo ADMIN_URL?>users/del/0','id='+id,function(){
    location = '<?PHP echo ADMIN_URL?>users';
},'script');
}
</script> 
</body>
</html>