<section>
    <form id="order_form"  method="post" action="<?PHP echo SITE_URL;?>checkout/send">
        <?PHP if (@$post["pro"]!=""): ?>
        <?PHP foreach ($post["pro"] as $p): ?>
        <input type="hidden" name="pro[]" value="<?PHP echo $p;?>">
        <?PHP endforeach; ?>
        <?PHP endif; ?>
        <input type="hidden" name="content" value="<?PHP echo @$post['content'] ?>">
        <input type="hidden" name="step" value="sp02">
        <article class="wrap main type02">
            <div class="breadcrumb noline">
                <p>
                    <a href="<?PHP echo SITE_URL;?>">HOME</a>
                    >
                    <a href="<?PHP echo SITE_URL;?>checkout/">考慮選單</a>
                </p>
            </div>
            <div class="part">
                <div class="steps_block">
                    <div class="step01">
                        <h3>我的考慮選單</h3>
                        <div class="mask"></div>
                        <div class="bg"></div>
                    </div>
                    <div class="step02 active">
                        <h3>基本資料填寫</h3>
                        <div class="bg"></div>
                    </div>
                    <div class="step03">
                        <h3>謝謝您的洽詢!</h3>
                        <div class="mask"></div>
                        <div class="bg"></div>
                    </div>
                </div>
                <div class="mylist s2">
                    <div class="part">
                        <div class="content">
                            <label>
                                <p>電子郵件</p>
                                <input type="text" name="mail" value="<?PHP echo (isset($_SESSION[USER_ID]))?$_SESSION[USER_ID]["email"]:"" ?>" />
                            </label>
                            <label>
                                <p>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</p>
                                <input type="text" name="username" value="<?PHP echo (isset($_SESSION[USER_ID]))?$_SESSION[USER_ID]["name"]:"" ?>"/>
                            </label>
                            <label>
                                <p>聯絡電話</p>
                                <input type="text" name="phone" value="<?PHP echo (isset($_SESSION[USER_ID]))?$_SESSION[USER_ID]["phone"]:"" ?>"/>
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
                        </div>
                        <div class="btn_part">
                            <button type="button"><a href="<?PHP echo SITE_URL;?>checkout/">返回上一頁</a></button>
                            <button><a>確認，送出</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </form>
</section>
<script type="text/javascript">
$(function(){
    $("#order_form").submit(function() {
        var username = $("input[name=username]").val();
        var mail = $("input[name=mail]").val();
        var phone = $("input[name=phone]").val();
        var identity = $("select[name=identity] option:selected").val();
        if(username==""||mail==""||phone==""||identity=="")
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

    });
});
</script>