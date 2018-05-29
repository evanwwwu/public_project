<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.1.0/pure-min.css">
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-1.7.2.min.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-ui-1.8.16.custom.min.js"></script>
    <script src="<?PHP echo ADMIN_URL?>assets/old/js/jquery-ui-timepicker-addon.js"></script>
</head>
<body class="recommend">
    <div class="pure-g-r " id="layout">
        <div class="pure-u" id="main">
            <div class="content">
                <form class="pure-form" id="search_frm">
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
                            <th width="5%">推薦</th>
                            <th>權限</th>
                            <th>使用者名稱</th>
                            <th>群組</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?PHP foreach($data as $row):?>
                        <tr id="row_<?PHP echo $row['id']?>">
                            <td>
                                <div>
                                    <input type="checkbox" class="rec" value="<?PHP echo $row['id']?>" <?PHP  foreach ($recs_id as $val){echo ($row['id']==$val['rec_id'])?'checked':'';}?>  onclick="rec($(this))"><i class="icon-move"></i>
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
                            <td><?PHP echo $row['users']?></td>
                        </tr>
                        <?PHP endforeach;?>
                    </tbody>
                </table>
            </div>
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
  .recommend{
    margin-top:20px; 
    margin-left:20px;  
}
</style>
<script>
$(function(){

    $('#search_date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat:"yy-mm-dd"
    });
})
function rec(obj){
    console.log(obj.attr('checked'));
    if (obj.attr('checked')){
        move = "0";
    }
    else{
        move = "1";
    }
    if (window.opener){
        try{
            window.opener.rec_updata(move,obj.attr('value'));
        }
        catch(e){

        }
    }
}


</script>
</body>
</html>