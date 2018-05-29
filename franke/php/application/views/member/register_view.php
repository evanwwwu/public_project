<section>
    <article class="wrap main type02">
        <div class="breadcrumb noline">
            <p>
                <a href="<?PHP echo SITE_URL; ?>">HOME</a>
                >
                <a>會員註冊</a>
            </p>
        </div>
        <div class="part">
            <div class="title">
                <h1><span>會員註冊</span></h1>
                <div class="line"></div>
            </div>
            <form id="register_form">
                <div class="signup_part">
                    <div><p>請填寫您的基本資料以註冊會員</p></div>
                    <div class="part">
                        <div>
                            <label>
                                <p>電子郵件</p>
                                <input type="text" name="mail"/>
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
                                <input type="text" name="username" />
                            </label>
                            <label>
                                <p>聯絡電話</p>
                                <input type="text" name="phone" />
                            </label>
                            <label>
                                <p>您的身份</p>
                                <select name="identity">
                                    　<option value="">請選擇您的身份</option>
                                    　<option value="消費者">消費者</option>
                                    　<option value="設計師">設計師</option>
                                    　<option value="建設公司">建設公司</option>
                                    　<option value="廚具公司">廚具公司</option>
                                    　<option value="其他">其他</option>
                                </select>
                            </label>
                            <label class="mention">
                                <input type="checkbox" name="mention" value="1"/>
                                <p>
                                    您若同意Franke總代理-佳群貿易有限公司使用您的聯絡資訊，
                                    以便即時提供您Franke最新產品資訊、活動 或專人服務，請勾
                                    選此欄位。<br/>
                                    *您亦可隨時以書面方式通知本公司，要求停用或刪除您所提供
                                    之個人資料。
                                </p>
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
    $("#register_form").ajaxForm({
        beforeSubmit: function(){
            var username = $("input[name=username]").val();
            var pass1 = $("input[name=pass1]").val();
            var pass2 = $("input[name=pass2]").val();
            var mail = $("input[name=mail]").val();
            var phone = $("input[name=phone]").val();
            var mention = $("input[name=mention]:checked").val();
            var identity = $("select[name=identity] option:selected").val();
            if(username==""||pass1==""||pass2==""||mail==""||phone==""||identity=="")
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
            if(pass1 !=pass2){
                alert("請確認密碼相同!");
                return false;
            }
            if(mention!="1"){
                alert("請確認同意使用資訊!");
                return false;
            }
        },
        url:"<?PHP echo SITE_URL; ?>member/check_member",
        type: 'post',
        dataType: 'script'
    });
})
</script>