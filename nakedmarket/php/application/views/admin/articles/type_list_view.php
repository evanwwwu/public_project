<h2 class="content-subhead" id="stacked-form"><?PHP echo $h2; ?></h2>
<div class="right">
    <a class="pure-button notice" href="<?PHP echo ADMIN_URL.$controller_addr?>/type_edit" title="新增">新增</a>
</div>

<ul class="ul_table">
    <li>
        <div class="thead"><div>發佈</div><div>名稱</div><div></div></div>
        <ul class="level1">
            <?PHP foreach ($rs as $le => $row): ?>
            <li id="sub_row_<?PHP echo $row["id"]?>">
                <div>
                    <i value="<?PHP echo @$row["id"]?>" class="icon-move s1" ></i>
                    <input type="checkbox" class="publish" value="<?PHP echo @$row["id"]?>" <?PHP echo (@$row["publish"]=="1")?"checked":""?> onclick="list_view.publish($(this),'<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/type_publish')"/>
                </div>
                <div class="title_name" style="width:50%;">
                    <?php if (count($row["sub"])>0): ?>
                        <span class="up_down">＋</span>
                    <?php endif; ?>
                    <?PHP echo $row["title"] ?></div>
                    <div>
                        <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/type_edit/<?PHP echo @$row["id"]?>"><i class="icon-pencil"></i></a>
                        <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo @$row["id"]?>','<?PHP echo ADMIN_URL.$this->data["controller_addr"]?>/type_del/sub')"><i class="icon-trash"></i></a>
                    </div>
                </li>
                <?PHP endforeach; ?>
            </ul>
        </li>
    </ul>
    <script>
        $(function () {
            $(".level1").find(">li .title_name").each(function(inx,obj){
                $(obj).click(function(){
                    $(this).parent().find(".up_down").toggle(function(){
                        $(this).find(".up_down").html("＋");
                    });
                    $(this).parent().find("ul").slideToggle();
                });
            });
            $('.level1').sortable({
                handle: ".icon-move.s1",
                placeholder: "sortable-placeholder",
                start: function (event, ui) {
                    $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
                },
                stop: function (event, ui) {
                    var q="";
                    $(this).find('.icon-move.s1').each(function (index, element) {
                        q += '&id[]=' + $(this).attr('value');
                    });
                    $.post('<?PHP echo ADMIN_URL.$this->data["controller_addr"];?>/type_sort', q)
                }
            });

        })
    </script>