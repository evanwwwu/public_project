<section>
    <article class="wrap main type02">
        <div class="breadcrumb noline">
            <p>
                <a href="">HOME</a>
                >
                <a href="">會員登入</a>
            </p>
        </div>
        <div class="part">
            <div class="title">
                <h1><span>會員登入</span></h1>
                <div class="line"></div>
            </div>
            <div class="members_part">
                <div class="signin clearfix">
                    <form id="login_form">
                        <div class="title">
                            <p>已加入會員</p>
                        </div>
                        <p>若您已註冊成為會員，請於下方輸入您的電子郵件及密碼以登入帳戶</p>
                        <label>
                            <p>電子郵件＊</p>
                            <input type="text" name="mail" />
                        </label>
                        <label>
                            <p>密碼＊</p>
                            <a href="<?PHP echo SITE_URL; ?>member/forget" class="forget">忘記密碼？</a>
                            <input type="password" name="pass" />
                        </label>
                        <button>登入</button>
                    </form>
                </div>
                <div class="signup">
                    <div class="title">
                        <p>還不是會員？</p>
                    </div>
                    <p>現在就立即註冊成為會員，一同體驗便利的網站服務吧！</p>
                    <a href="<?PHP echo SITE_URL; ?>member/register"><button>註冊</button></a>
                </div>
            </div>
        </div>
    </article>
</section>
<script type="text/javascript">
$(function(){
    $("#login_form").ajaxForm({
        beforeSubmit: function(){
            var mail = $("input[name=mail]").val();
            var pass = $("input[name=pass]").val();
            if(mail==""||pass=="")
            {
                alert("請填寫完整資料!");
                return false;
            }
        },
        url:"<?PHP echo SITE_URL; ?>member/login",
        type: 'post',
        dataType: 'script'
    });
})
</script>