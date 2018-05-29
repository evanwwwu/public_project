
<h2 class="content-subhead" id="stacked-form">帳號管理 - <span id="ContentPlaceHolder1_lbl_title">編輯</span></h2>
<form id="frm" class="pure-form pure-form-stacked">
    <input type="hidden" name="act" value="edit">
    <div style="">
        <div style="display: inline-block;">
            <button type="submit" class="pure-button notice">儲存</button>
        </div>
        <div style="display: inline-block;">
            <a href="<?PHP echo ADMIN_URL?>accounts" class="pure-button">回上頁</a>
        </div>
    </div>
    <hr>
    <input type="hidden" name="id" value="<?PHP echo (isset($row["id"]))?$row["id"]:"0" ?>">
    <label>帳號</label>
    <input type="radio" name="active" value="1" <?PHP echo (@$row["active"]=="1")?"checked":"" ?>>總管理者
    <input type="radio" name="active" value="2" <?PHP echo (@$row["active"]=="2")?"checked":"" ?>>啟用
    <input type="radio" name="active" value="0"  <?PHP echo (@$row["active"]=="0"||!isset($row["active"]))?"checked":"" ?>>停用

    <label>帳號</label>
    <input type="text" id="username" name="username" value="<?PHP echo @$row["username"]?>" <?PHP echo (isset($row["username"]))?"readonly":"" ?>>
    
    <label>新密碼</label>
    <input type="password" id="password" name="password" placeholder="">
    <label>密碼確認</label>
    <input type="password" id="password2" name="password2" placeholder="">
</form>
<script>
$(function () {
    $('#frm').ajaxForm({
        beforeSubmit: function () {
            if($("input[name=password]").val()!=""||$("input[name=password2]").val()!=""){
                if($("input[name=password]").val()!=$("input[name=password2]").val()){
                    alert("密碼不相同!");
                    return false;
                }
            }
        },
        url: '<?PHP echo ADMIN_URL?>accounts/save/<?PHP echo @$row["id"]?>',
        type: 'post',
        dataType: 'script'
    });
})
</script>