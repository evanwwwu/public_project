<h2 class="content-subhead" id="stacked-form">訂單管理</h2>
<!-- <div class="right">
    <a class="pure-button notice" href="<?PHP echo ADMIN_URL?>accounts/edit" title="新增">新增</a>
</div> -->
<form id="form_search" class="pure-form" action="" style="margin-bottom:40px;" method="get">
    詢單狀態 : 
    <select name="status">
        <option value="">不設定狀態</option>
        <option value="未處理" <?PHP echo (@$this->get["status"]=="未處理")?"selected":""?>>未處理</option>
        <option value="已連絡" <?PHP echo (@$this->get["status"]=="已連絡")?"selected":""?>>已連絡</option>
        <option value="準備出貨" <?PHP echo (@$this->get["status"]=="準備出貨")?"selected":""?>>準備出貨</option>
        <option value="出貨完成" <?PHP echo (@$this->get["status"]=="出貨完成")?"selected":""?>>出貨完成</option>
        <option value="訂單取消" <?PHP echo (@$this->get["status"]=="訂單取消")?"selected":""?>>訂單取消</option>
    </select>
    建單日期(起)：<input class="s_date pure-input-1-5" type="text" name="start_date" value="<?PHP echo @$this->get["start_date"]?>">
    建單日期(訖)：<input class="s_date pure-input-1-5" type="text" name="end_date" value="<?PHP echo @$this->get["end_date"]?>">
    詢單編號：<input type="text" name="order_no" value="<?PHP echo @$this->get["order_no"] ?>">
    <a class="pure-button pure-button-secondary" onclick="$('#form_search').submit();">搜尋</a>
</form>
<table class="pure-table pure-table-bordered" width="100%">
    <thead>
        <tr>
            <th width="10%">詢單編號</th>
            <th width="100">詢單狀態</th>
            <th>建單日期</th>
            <th width="130"></th>
        </tr>
    </thead>
    <tbody class="ui-sortable">
        <?PHP foreach($rs as $row):?>
        <tr id="row_<?PHP echo $row['id']?>">
            <td><?PHP echo $row["order_no"] ?></td>
            <td><?PHP echo $row['status']?></td>
            <td><?PHP echo $row['createtime']?></td>
            <td>
                <a class="pure-button" title="編輯" href="<?PHP echo ADMIN_URL?>order/edit/<?PHP echo $row['id']?>"><i class="icon-pencil"></i></a> 
                <a class="pure-button" title="刪除" onclick="list_view.del('<?PHP echo $row['id']?>','<?PHP echo ADMIN_URL?>order/del')"><i class="icon-trash"></i></a>

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
})
</script>