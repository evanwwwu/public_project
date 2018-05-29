<section>
    <article class="wrap main type02">
        <div class="breadcrumb noline">
            <p>
                <a href="<?PHP echo SITE_URL; ?>">HOME</a>
                >
                <a>聯絡我們</a>
            </p>
        </div>
        <form id="send_form">
            <div class="part">
                <div class="title">
                    <h1><span>聯絡我們</span></h1>
                    <div class="line"></div>
                </div>
                <div class="signup_part contact">
                    <div><p>請留下您的聯絡方式與提問，我們將儘速與您聯絡。</p></div>
                    <div class="part">
                        <div class="company_info">
                            <h3>佳群貿易</h3>
                            <p>
                                公司名稱：佳群貿易有限公司<br/>
                                電&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;話：02-2506-7398<br/>
                                傳&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真：02-2506-4568<br/>
                                地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址：台北市南京東路三段65號9樓<br/>
                                上班時間：周一至周五 上午8:30~下午6:00
                            </p>
                        </div>
                        <div>
                            <label>
                                <p>電子郵件</p>
                                <input type="text" name="mail" value="<?PHP echo (isset($_SESSION[USER_ID]))?$_SESSION[USER_ID]["email"]:""; ?>"/>
                            </label>
                            <label>
                                <p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</p>
                                <input type="text" name="username" value="<?PHP echo (isset($_SESSION[USER_ID]))?$_SESSION[USER_ID]["name"]:""; ?>"/>
                            </label>
                            <label>
                                <p>聯絡電話</p>
                                <input type="text" name="phone" value="<?PHP echo (isset($_SESSION[USER_ID]))?$_SESSION[USER_ID]["phone"]:""; ?>"/>
                            </label>
                            <label>
                                <p>您的身份</p>
                                <select name="identity">
                                    　<option value="">請選擇您的身份</option>
                                    　<option value="消費者" <?PHP echo (@$_SESSION[USER_ID]["status"]=="消費者")?"selected":"" ?>>消費者</option>
                                    　<option value="設計師" <?PHP echo (@$_SESSION[USER_ID]["status"]=="設計師")?"selected":"" ?>>設計師</option>
                                    　<option value="建設公司" <?PHP echo (@$_SESSION[USER_ID]["status"]=="建設公司")?"selected":"" ?>>建設公司</option>
                                    　<option value="廚具公司" <?PHP echo (@$_SESSION[USER_ID]["status"]=="廚具公司")?"selected":"" ?>>廚具公司</option>
                                    　<option value="其他" <?PHP echo (@$_SESSION[USER_ID]["status"]=="其他")?"selected":"" ?>>其他</option>
                                </select>
                            </label>
                            <label>
                                <p>您的問題</p>
                                <textarea name="content"></textarea>
                            </label>
                            <div class="btn_part">
                                <button>送出</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </article>
</section>
<script type="text/javascript">
$(function(){
    $("#send_form").ajaxForm({
        beforeSubmit: function(){
            var username = $("input[name=username]").val();
            var mail = $("input[name=mail]").val();
            var phone = $("input[name=phone]").val();
            var content = $("textarea[name=content]").val();
            var identity = $("select[name=identity] option:selected").val();
            if(username==""||mail==""||phone==""||identity==""||content=="")
            {
                alert("請填寫完整資料!");
                return false;
            }
            var regExp = /^[^@^\s]+@[^\.@^\s]+(\.[^\.@^\s]+)+$/;
            if (!$("input[name=mail]").val().match(regExp) )
            {
                alert("請輸入正確的E-MAIL!");
                return false;
            }
        },
        success:function(){
            $("#send_form").resetForm();
        },
        url:"<?PHP echo SITE_URL; ?>contact/send",
        type: 'post',
        dataType: 'script'
    });
})
</script>