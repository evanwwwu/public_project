<h2 class="content-subhead" id="stacked-form">訂單管理</h2>

<form id="form_search" action="" method="get">
    訂單狀態 : 
    <select name="order_type">
        <option value="">所有狀態</option>
        <?php foreach ($states as $state): ?>
            <option value="<?php echo $state ?>" <?PHP echo (@$this->get["order_type"]==$state)?"selected":""?>><?php echo $state ?></option>            
        <?php endforeach ?>
    </select>
    付款方式 : 
    <select name="pay_no">
        <option value="">所有方式</option>
        <?php foreach ($pay_type as $p_k => $pay): ?>
            <option value="<?php echo $p_k ?>" <?PHP echo (@$this->get["pay_no"]==$p_k)?"selected":""?>><?php echo $pay ?></option>            
        <?php endforeach ?>
    </select>
    建立時間 (起)：<input class="s_date" type="text" name="start_date" value="<?PHP echo @$this->get["start_date"]?>">
    建立時間 (訖)：<input class="s_date" type="text" name="end_date" value="<?PHP echo @$this->get["end_date"]?>">
    訂單編號：<input type="text" name="order_no" value="<?PHP echo @$this->get["order_no"]?>">
    <a class="pure-button" onclick="filter_list()">搜尋</a>
<!--     <a class="pure-button pure-button-primary" title="名單匯出" onclick="ex_dowload();">匯出搜尋結果</a> -->
</form>
<br>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="100">訂單狀態</th>
            <th>訂單編號</th>
            <th width="200">建立時間</th>
            <th width="130">付款方式</th>
            <th width="130">總金額</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach ($rs as $row):?>
        <tr id="row_<?PHP echo $row['id']?>">
            <td><?php echo $row["state"]; ?></td>
            <td><?php echo $row["order_no"]; ?></td>
            <td><?php echo $row["create_date"]; ?></td>
            <td><?php echo @$pay_type[$row["pay_type"]]; ?></td>
            <td><?php echo $row["total"]; ?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?php echo ADMIN_URL.$controller_addr; ?>/edit/<?PHP echo $row["id"]?>"><i class="icon-pencil"></i></a>
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL.$controller_addr?>/del')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?PHP endforeach;?>
    </tbody>
</table>
<script>
    $(function () {
        $('.s_date').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });
    function filter_list(){
        $("#form_search").attr("action","");
        $('#form_search').submit();
    }
    function ex_dowload(){
        $("#form_search").attr("action","<?PHP echo ADMIN_URL?>orders/dowload_excel/");
        $('#form_search').submit();
    }
</script>