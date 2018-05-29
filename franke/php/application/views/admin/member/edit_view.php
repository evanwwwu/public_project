
<h2 class="content-subhead" id="stacked-form">帳號管理 - <span id="ContentPlaceHolder1_lbl_title">編輯</span></h2>
<form id="frm" class="pure-form pure-form-stacked">
    <input type="hidden" name="act" value="edit">
    <div style="">
        <div style="display: inline-block;">
            <button type="submit" class="pure-button notice">儲存</button>
        </div>
        <div style="display: inline-block;">
            <a href="<?PHP echo ADMIN_URL?>member" class="pure-button">回上頁</a>
        </div>
    </div>
    <hr>
    <input type="hidden" name="id" value="<?PHP echo (isset($row["id"]))?$row["id"]:"0" ?>">

    <label>權限</label>
    <input type="radio" name="active" value="1" <?PHP echo (@$row["active"]=="1")?"checked":"" ?>>一般
    <input type="radio" name="active" value="0"  <?PHP echo (@$row["active"]=="0"||!isset($row["active"]))?"checked":"" ?>>停用

    <label>電子信箱</label>
    <input type="text" class="pure-input-1-2" name="email" value="<?PHP echo @$row["email"]?>">
    
    <label>新密碼</label>
    <input type="password" name="password" placeholder="">
    <label>密碼確認</label>
    <input type="password" id="password2" name="password2" placeholder="">

    <label>姓名</label>
    <input type="text" name="name" value="<?PHP echo $row["name"]; ?>" placeholder="">
    <label>電話</label>
    <input type="text" name="phone" value="<?PHP echo $row["phone"]; ?>" placeholder="">
    <label>身分</label>
    <select name="identity">
        　<option value="消費者" <?PHP echo ($row["status"]=="消費者")?"selected":""; ?>>消費者</option>
        　<option value="設計師" <?PHP echo ($row["status"]=="設計師")?"selected":""; ?>>設計師</option>
        　<option value="建設公司" <?PHP echo ($row["status"]=="建設公司")?"selected":""; ?>>建設公司</option>
        　<option value="廚具公司" <?PHP echo ($row["status"]=="廚具公司")?"selected":""; ?>>廚具公司</option>
        　<option value="其他" <?PHP echo ($row["status"]=="其他")?"selected":""; ?>>其他</option>
    </select>
    <br><br><br>
    <div id="history">
      <h3>會員瀏覽紀錄</h3>
      <div>
        <ul>
            <?PHP foreach ($history as $his): ?>
            <li><span>觀看商品: <?PHP echo $his["product_no"] ?></span>  <span>觀看時間:  <?PHP echo $his["create_date"] ?></span></li>
            <?PHP endforeach; ?>
        </ul>
    </div>
</div>


</form>
<script>
$(function () {
    $.ajaxSetup({ 
        async : false 
    });
    $("#history").accordion({
        collapsible: true,
        active :false
    });
    $('#frm').ajaxForm({
        beforeSubmit: function () {
            $("button[type=submit]").hide();
            var regExp = /^[^@^\s]+@[^\.@^\s]+(\.[^\.@^\s]+)+$/;
            if (!$("input[name=email]").val().match(regExp) )
            {
                alert("請輸入正確的E-MAIL!");
                $("button[type=submit]").show();
                return false;
            }
            var  error = true;
            $.post("<?PHP echo ADMIN_URL; ?>/member/check_save",{mid:"<?PHP echo $row['id'] ?>",email:$("input[name=email]").val()},function(data){
                if(!data.error){
                    error=false;
                }
            },"json");
            if(error){
                alert("此Email已有會員");
                $("button[type=submit]").show();
                return false;
            }
            if($("input[name=password]").val()!=""||$("input[name=password2]").val()!=""){
                if($("input[name=password]").val()!=$("input[name=password2]").val()){
                    alert("密碼不相同!");
                    $("button[type=submit]").show();
                    return false;
                }
            }
        },
        url: '<?PHP echo ADMIN_URL?>member/save/<?PHP echo @$row["id"]?>',
        type: 'post',
        dataType: 'script'
    });
})
</script>