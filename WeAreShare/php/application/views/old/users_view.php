<?PHP echo $header?>
<body>
    <div class="pure-g-r " id="layout">
        <?PHP echo $menu?>
        <div class="pure-u" id="main">
            <div class="content">
                <h2 class="content-subhead" id="stacked-form"><?PHP echo $h2?></h2>
                <form class="pure-form">
                    <div class="right"><a onclick="change=0;" class="pure-button notice" href="<?PHP echo ADMIN_URL?>users/edit" title="新增">新增</a></div>
                </form>
                <form class="pure-form" id="search_frm">
                    <select name="a_z">
                        <option value="0">不設定包含字母</option>
                        <?PHP foreach($a_z as $a_z):?>
                        <?PHP echo '<option value="'.$a_z.'"'?><?PHP echo (isset($this->get['a_z']) and $this->get['a_z']==$a_z)?"selected":"";?>><?PHP echo $a_z?></option> ?>
                        <?PHP endforeach;?>
                    </select>
                    <select name="active">
                        <option value="">不設定權限</option>
                        <option value="1" type="radio"> 管理者 </option>
                        <option value="2" type="radio"> 一般使用者 </option>
                        <option value="0" type="radio"> 停用 </option>
                    </select>
                    <select name="group">
                        <option value="">不設定群組</option>
                        <option value="作者群" type="radio"> 作者群 </option>
                        <option value="視覺團隊" type="radio"> 視覺團隊 </option>
                        <option value="東西團隊" type="radio"> 東西團隊 </option>
                    </select>
                    <input type="text" name="search_key" placeholder="不設定關鍵字" value="<?PHP echo (isset($this->get['search_key']))?$this->get['search_key']:"";?>">
                    <button onclick="change=0;" class="pure-button" type="submit" href="#" title="搜尋">搜尋</button>
                </form>
                <br>   
                <table class="pure-table pure-table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th width="5%">發佈</th>
                            <th>權限</th>
                            <th>使用者帳號</th>
                            <th>顯示名稱</th>
                            <th>群組</th>
                            <th width="130"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP foreach($data as $row):?>
                        <tr id="row_<?PHP echo $row['id']?>">
                            <td>
                                <div>
                                    <i value="<?PHP echo $row['id']?>" class="icon-move" style="visibility: hidden;"></i><input type="checkbox" class="pulish" value="<?PHP echo $row['id']?>" <?PHP echo ($row['post_status']=='publish')?'checked':'';?>  onclick="publish($(this))"></i>
                                </div>
                            </td>
                            <td>
                                <?PHP 
                                switch($row['active'])
                                {
                                    case "0":
                                    echo $admin = "停用";
                                    break;

                                    case "1":
                                    echo $admin = "管理者";
                                    break;

                                    case "2":
                                    echo $admin = "一般使用者";
                                    break;
                                }
                                ?>
                            </td>
                            <td><?PHP echo $row['username']?></td>
                            <td><?PHP echo (isset($row['display_name']))?$row['display_name']:""?>
                            <td><?PHP echo $row['users']?></td>
                            <td>
                                <a onclick="change=0;" class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL . 'users/edit/' .$row['id']?>"><i class="icon-pencil"></i></a> 
                                <a class="pure-button" title="刪除" onClick="change=0;del(<?PHP echo $row['id']?>)"><i class="icon-trash"></i></a></td>
                            </tr>
                            <?PHP endforeach;?>
                        </tbody>
                    </table>
                </div>
                <?PHP echo $footer?>
            </div>
        </div>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <style>
        .icon-move{visibility:hidden};
        .ui-sortable-helper td{
        }
        .sortable-placeholder td{
            height:40px;
            background-color:#FF9;
        }
        .ui-widget{
          font-size:60%;
      }
      </style>
      <script>
      $(function(){

        $('#search_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd"
        });
        $('td div').hover(
            function(){
                $(this).find('.icon-move').css('visibility','visible');
            },
            function(){
                $(this).find('.icon-move').css('visibility','hidden');
            }
            );
        $('tbody').sortable({ 
            handle: ".icon-move" ,
            placeholder: "sortable-placeholder",
            start: function( event, ui ) {
                $('.sortable-placeholder').append('<td colspan="20">&nbsp;</td>')
            },
            stop: function( event, ui ) {
                var q = '';
                $('.icon-move').each(function(index, element) {
                    q+='&id[]='+$(this).attr('value');
                });
                $.post('<?PHP echo ADMIN_URL?>users/sort',q)
            }
        });
    })
      function publish(obj){
        var q = "id="+obj.attr('value');
        if (obj.attr('checked')){
            q += "&publish=publish"
        }
        else{
            q += "&publish=unpublish"
        }
        $.post('<?PHP echo ADMIN_URL?>users/publish',q,null,'script');
    }

    function del(id){
        if (!confirm('Delete?')) return;
        $.post('<?PHP echo ADMIN_URL?>users/del','id='+id,null,'script');
    }

    </script>
</body>
</html>