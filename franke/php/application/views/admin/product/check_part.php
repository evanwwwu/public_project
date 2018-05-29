<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="<?PHP echo ADMIN_ASSETS;?>css/icon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/pure-min.css">
<link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/theme.css">
<link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui.css">
<script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-1.11.0.min.js"></script>
<script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-ui.min.js"></script>
<script src="<?PHP echo ADMIN_ASSETS;?>js/jquery.form.min.js"></script>
<link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery.Jcrop.css">
<link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/admin.css">
<link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/admin_plugin.css">
<script src="<?PHP echo ADMIN_ASSETS;?>js/site.js"></script>
<title>
    <?PHP echo (!isset($h2))?SITE_TITLE_ADMIN:$h2;?>
</title>

<body>
    <div class="pure-g-r" id="layout">

        <div class="pure-u" id="main">
            <div class="content">
                <h2 class="content-subhead" id="stacked-form">
                    <?PHP echo $h2?>
                </h2>
                <table class="pure-table pure-table-bordered" width="100%">
                    <thead>
                        <th width="5%">選取</th>
                        <th>配件名稱</th>
                        <th>金額</th>
                    </thead>
                    <tbody>
                        <?PHP foreach($rs as $row):?>
                        <tr id="row_<?PHP echo $row['id']?>">
                            <td>
                                <div>
                                    <input type="checkbox" class="check_btn" value="選擇" data-id="<?PHP echo $row['id']?>" <?PHP echo (in_array($row['id'], $ids))?"checked":"" ?> onclick="rec($(this))">
                                </div>
                            </td>
                            <td><?PHP echo $row["title"]?></td>
                            <td><?PHP echo $row["price"]?></td>
                        </tr>
                        <?PHP endforeach;?>
                    </tbody>
                </table>
            </div>
            <script>
            var set_id = "<?PHP echo $set_id?>";
            var wid;
            var sel_inx = "<?PHP echo $sel_inx?>";
            function rec(obj) {
                wid = obj.attr("data-id");
                check_val = obj.is(":checked");
                if (window.opener) {
                    try {
                        console.log("<?PHP echo $typeid?>");
                        switch("<?PHP echo $typeid?>"){
                            case "1":
                            console.log(wid+"s"+sel_inx);
                            window.opener.add_select_part(wid,sel_inx,check_val);
                            break;
                            case "2":
                            break;
                            default:
                            window.opener.rec_updata(wid,set_id,check_val);
                            break;
                        }
                    } catch (e) {}
                }
            }
            </script>
        </div>
    </div>
</body>

</html>
