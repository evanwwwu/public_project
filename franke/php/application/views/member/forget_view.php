<section>
    <article class="wrap main type02">
        <div class="breadcrumb noline">
            <p>
                <a href="<?PHP echo SITE_URL; ?>">HOME</a>
                >
                <a>忘記密碼</a>
            </p>
        </div>
        <div class="part">
            <div class="title">
                <h1><span>會員登入</span></h1>
                <div class="line"></div>
            </div>
            <div class="members_part">
                <div class="signin forgetpass">
                    <form id="forget_form">
                        <div class="title">
                            <p>忘記密碼？</p>
                        </div>
                        <p>密碼重置信將會發送到您的默認電子信箱</p>
                        <label>
                            <p>電子郵件＊</p>
                            <input type="text" name="mail" />
                        </label>
                        <button type="button"><a href="<?PHP echo SITE_URL ?>/member">返回</a></button>
                        <button>送出</button>
                    </form>
                </div>
            </div>
        </div>
    </article>
</section>
<script type="text/javascript">
$(function(){
    $("#forget_form").ajaxForm({
        beforeSubmit: function(){
            var mail = $("input[name=mail]").val();
            if(mail=="")
            {
                alert("請填寫註冊信箱!");
                return false;
            }
        },
        url:"<?PHP echo SITE_URL; ?>member/forget_mail",
        type: 'post',
        dataType: 'script'
    });
})
</script>