<?PHP echo $header?>
<body>
  <div class="pure-g-r " id="layout">
     <?PHP echo $menu?>
     <div class="pure-u" id="main">
        <div class="content">
           <h2 class="content-subhead" id="stacked-form"><?PHP echo $h2;?> - <?PHP print_r($data['post_title'])?></h2>
  
              <input type="hidden" id="id" name="id" value="<?PHP echo $data['ID']?>">

                 <div style="">
                   <form id="frm" class="pure-form pure-form-stacked">                   
                    <div style="display:inline-block;"><button type="submit" class="pure-button notice">SAVE</button></div>
                    <div style="display:inline-block;"><a href="javascript:history.back();" class="pure-button">BACK</a></div>
                </div>
                <div style="clear:both"></div>
                <label></label>
                <hr>

            <div style="padding-bottom:150px;">
            <table class="pure-table pure-table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="30%">照片</th>
                        <th width="10%">時間</th>
                        <th  width="30%">標籤</th>
                        <th  width="30%">圖片註解</th>
                        <!-- <th width="50"></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach($images as $row):?>
                    <tr id="row_<?PHP echo $row['ID']?>">
                        <input type="hidden" name="post_id[]" value="<?PHP echo $row['ID']?>">
                        <td valign="top"><img src="<?PHP echo SITE_URL . 'upload/' . $row['post_title']?>" style="width:100%; "></td>
                        <td valign="top"><?PHP echo substr($row['post_date'],0,10)?></td>
                        <td valign="top"><textarea class="tags pure-input-3-3" name="tags[]" rows="1" cols="35" ><?PHP echo $row['tags']?></textarea>
                        <div style="max-width:300px;">
                        <?PHP foreach($hot_tag as $tags)
                        {
                            echo "<a id='row_".$row['ID']."'class='hot_tag pure-button pure-button-xsmall'>".$tags['name']."</a>";
                        }
                       ?>    
                        </div>
                        </td>       
                        <td valign="top"><textarea class="content pure-input-3-3" name="content[]" cols="1" rows="1"><?PHP echo $row['content']?></textarea></td>
                        <!-- <td valign="top">
                            <a class="pure-button" title="儲存" href="javascript:save_content(<?PHP echo $row['ID']?>);"><i class="icon-save"></i></a> 
                        </td> -->
                    </tr>
                    <?PHP endforeach;?>
                </tbody>
            </table>

            </div>
            </form>
        </div>
        <?PHP echo $footer?>
    </div>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<style>
.hot_tag{
  margin:3px;
  font-size:1px;
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
<script>var uploaded = 0;
$(function () {
    $('#gallery').sortable({
        placeholder: "sortable-placeholder",
        stop: function (event, ui) {
            var q = 'id=<?PHP echo $data['ID']?>';
            $('input[name="gallery[]"]').each(function () {
                q += '&gallery[]=' + $(this).val();
            })
            console.log(q);
            $.post('<?PHP echo ADMIN_URL?>posts/gallery_sort', q)
        }

    });

        $('.hot_tag').click(function (){
          var name = $(this).text();
            $('.tags,.content').resize();
          if ( $('#'+$(this).attr('id')+' textarea[name="tags[]"]').val()==""){
              $('#'+$(this).attr('id')+' textarea[name="tags[]"]').val(name);
          } 
          else{
             var text = $('#'+$(this).attr('id')+' textarea[name="tags[]"]').val();
             text += ","+name;
          $('#'+$(this).attr('id')+' textarea[name="tags[]"]').val(text).trigger('autosize.resize');

             }
        } 
      );

    $('.tags,.content').autosize();
    tag_autocomplte($('.tags'));

    $('#frm').ajaxForm({
      beforeSubmit:function(){change=0;},
        url: '<?PHP echo ADMIN_URL?>images',
        type: 'post',
        dataType: 'script',
    });

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
            $.getJSON("<?PHP echo ADMIN_URL . 'posts/search_tag'?>", {
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

function extractLast(term) {
    return split(term).pop();
}

// function save_content(id){
//     var obj = $('#row_'+id);
//     var tags = obj.find('.tags').val();
//     var content = obj.find('.content').val();
//     var q = 'id='+id+'&tags='+tags+'&content='+content;
//     $.post('<?PHP echo ADMIN_URL?>images',q,'','script')
// }
</script>
</body>
</html>