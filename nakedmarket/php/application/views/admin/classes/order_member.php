<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="<?PHP echo ADMIN_ASSETS;?>css/favicon.ico"/>
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/pure-min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/theme.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/jquery-ui-timepicker-addon.min.css">
    <link rel="stylesheet" href="<?PHP echo ADMIN_ASSETS;?>css/style.css">
    <script src="<?PHP echo ADMIN_ASSETS;?>js/jquery-1.11.0.min.js"></script>
    <title>
        <?php echo $classes["title"]; ?>  <?php echo date("Y/m/d H:i",strtotime($classes["classes_date"])); ?>
    </title>
</head>
<body>
    <div id="">
        <div id="main">
            <div class="content">
                <h2 class="content-subhead" id="stacked-form">
                    <?php echo $classes["title"]; ?>  <?php echo date("Y/m/d H:i",strtotime($classes["classes_date"])); ?></h2>
                    <table class="pure-table pure-table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>訂單編號</th>
                                <th>付款方式</th>
                                <th>姓名</th>
                                <th>電話</th>
                                <th>電子信箱</th>
                                <th>建單日期</th>
                                <th>付款日期</th>
                                <th>刪除</th>
                            </tr>
                        </thead>
                        <tbody class="ui-sortable">
                            <?PHP foreach($members as $row):?>
                            <tr>
                                <td><?php echo $row["order_no"]; ?></td>
                                <td><?php echo @$pay_type[$row["pay_type"]]; ?></td>
                                <?php $order = (array)json_decode($row["member_data"]); ?>
                                <td><?php echo $order["username"] ?></td>
                                <td><?php echo $order["phone"] ?></td>
                                <td><?php echo $order["email"] ?></td>
                                <td><?php echo date("Y/m/d H:i",strtotime($row["create_date"])); ?></td>
                                <td><?php echo date("Y/m/d H:i",strtotime($row["pay_date"])); ?></td>
                                <td><a href="javascript:void(0)" onclick="delete_member($(this),'<?php echo @$row['id'] ?>')">刪除<i class="icon-trash"></i></a></td>
                            </tr>
                            <?PHP endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function delete_member(obj,oid){                
              if (!confirm('確認刪除?')) return;
              obj.parents("tr").remove();
              $.post("<?php echo ADMIN_URL; ?>classes/del_member", 'id=' + oid, null, 'script');
          }
      </script>
  </body>

  </html>
