<section>
    <article class="wrap main type02">
        <div class="breadcrumb noline">
            <p>
                <a href="<?PHP echo SITE_URL; ?>">HOME</a>
                >
                <a>會員修改</a>
            </p>
        </div>
        <div class="part">
            <div class="title">
                <h1><span>會員資料修改</span></h1>
                <div class="line"></div>
            </div>
            <form id="modify_form">
                <div class="signup_part">
                    <div><p>請填寫您的基本資料以修改</p></div>
                    <div class="part">
                        <div>
                            <label>
                                <p>電子郵件</p>
                                <p style="margin-left: 96px;"><?PHP echo $_SESSION[USER_ID]["email"]; ?></p>
                                <input type="hidden" name="mail" value="<?PHP echo $_SESSION[USER_ID]["email"]; ?>"/>
                            </label>
                            <label>
                                <p>密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;碼</p>
                                <input type="password" name="pass1"/>
                            </label>
                            <label>
                                <p>確認密碼</p>
                                <input type="password" name="pass2" />
                            </label>
                        </div>
                        <div>
                            <label>
                                <p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</p>
                                <input type="text" name="username" value="<?PHP echo $_SESSION[USER_ID]["name"]; ?>" />
                            </label>
                            <label>
                                <p>聯絡電話</p>
                                <input type="text" name="phone"  value="<?PHP echo $_SESSION[USER_ID]["phone"]; ?>"/>
                            </label>
                            <label>
                                <p>您的身份</p>
                                <select name="identity">
                                    　<option value="消費者" <?PHP echo ($_SESSION[USER_ID]["status"]=="消費者")?"selected":""; ?>>消費者</option>
                                    　<option value="設計師" <?PHP echo ($_SESSION[USER_ID]["status"]=="設計師")?"selected":""; ?>>設計師</option>
                                    　<option value="建設公司" <?PHP echo ($_SESSION[USER_ID]["status"]=="建設公司")?"selected":""; ?>>建設公司</option>
                                    　<option value="廚具公司" <?PHP echo ($_SESSION[USER_ID]["status"]=="廚具公司")?"selected":""; ?>>廚具公司</option>
                                    　<option value="其他" <?PHP echo ($_SESSION[USER_ID]["status"]=="其他")?"selected":""; ?>>其他</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="btn_part">
                        <button type="button" onclick="location='<?PHP echo SITE_URL; ?>member'">返回上一頁</button>
                        <button>送出</button>
                    </div>
                </div>
            </form>
        </div>
    </article>
</section>
<script type="text/javascript">
$(function(){
    $("#modify_form").ajaxForm({
        beforeSubmit: function(){
            var username = $("input[name=username]").val();
            var pass1 = $("input[name=pass1]").val();
            var pass2 = $("input[name=pass2]").val();
            var phone = $("input[name=phone]").val();
            var identity = $("select[name=identity] option:selected").val();
            if(username==""||pass1==""||pass2==""||phone==""||identity=="")
            {
                alert("請填寫完整資料!");
                return false;
            }
            if(pass1 !=pass2){
                alert("請確認密碼相同!");
                return false;
            }
        },
        url:"<?PHP echo SITE_URL; ?>member/check_member/<?PHP echo $_SESSION[USER_ID]['id'] ?>",
        type: 'post',
        dataType: 'script'
    });
})
</script>