
<div id="overlay">
</div>
<!-- log in form -->
<div id="logIn" class="popupForm" style="display:none;">
	<a href="#" class="closeBtn">X</a>
	<h1>登入會員</h1>
	<form name="login" action="" method="post" accept-charset="utf-8">
		<h3>社群帳號登入</h3>
		<div class="socialMedia">
			<a href="#" onclick="register_fb()"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif" alt="Facebook登入" class="fb"/></a>
			<span>or</span>
		</div>
		<h3>Email信箱登入</h3>
		<ul class="login">
			<li><input type="text" name="email" placeholder="請輸入您的Email信箱"></li>
			<li><input type="password" name="pwd" placeholder="請輸入您的登入密碼"></li>
			<li><input type="checkbox" name="remember" value="1"><span>請記得我的帳號密碼</span></li>
			<li><a href="#" class="submit">還不是會員？</a><a href="#" class="submit">忘記密碼？</a></li>
		</ul>
		<a href="#" class="submitBtn">LOG IN <span>/</span> 登入</a>
	</form>
</div>
<!-- end log in form -->
<!-- register form -->
<div id="register" class="popupForm" style="display:none;">
	<a href="#" class="closeBtn">X</a>
	<h1>註冊會員</h1>
	<form name="register" action="" method="post" accept-charset="utf-8">
		<h3>社群帳號註冊</h3>
		<div class="socialMedia">
			<a href="#" onclick="register_fb()"><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif" alt="Facebook登入" class="fb"/></a>
		</div>
		<h3>一般註冊</h3>
		<ul class="register">
			<li><input type="text" name="email" class="email" placeholder="請輸入您的Email信箱"></li>
			<li><span>*Email信箱即為您的登入帳號</span></li>
			<li><a href="#" onclick='$(".closeBtn").click();$(".logIn").click();'>我已經有帳號，前往登入></a></li>
		</ul>
		<a href="#" class="submitBtn">SIGN UP <span>/</span> 註冊會員</a>
	</form>
</div>
<!-- end register form -->
<!-- register success form -->
<div id="registerSuccess" class="popupForm" style="display:none;">
	<a href="#" class="closeBtn">X</a>
	<h1>註冊成功</h1>
	<div class="msgArea">
		<p>
			請至電子信箱收取確認信啟動帳號以完成註冊，謝謝。
		</p>
	</div>
</div>
<div id="editSuccess" class="popupForm" style="display:none;">
	<a href="#" class="closeBtn">X</a>
	<h1>修改成功</h1>
	<div class="msgArea">
		<p>
			您已成功修改完成。
		</p>
	</div>
</div>
<!-- end register success form -->
<!-- forgot pass form -->
<div id="forgotPass" class="popupForm" style="display:none;">
	<a href="#" class="closeBtn">X</a>
	<h1>忘記密碼</h1>
	<form name="forgotpass" action="" method="post" accept-charset="utf-8">
		<ul class="forgotPass">
			<li><input class="email" name="email" type="text" placeholder="請輸入您的Email信箱"></li>
			<li><span>*我們會將密碼重設信寄發到您預設的信箱</span></li>
		</ul>
		<a href="#" class="submitBtn">SUMBIT <span>/</span> 提交送出</a>
	</form>
</div>
<!-- end forgot pass form -->
<!-- profile form -->
<div id="profile" class="popupForm" style="display:;">
	<a href="#" class="closeBtn">X</a>
	<h1>個人資料</h1>
	<form name="profile" action="" method="post" accept-charset="utf-8">
		<ul class="profile">
			<li class="highLight" style="text-align:center;">※為必填資料</li>
			<li><label>Email</label><span class="email">leeshizen@gmail.com</span></li>
			<li><label class="highLight">密碼※</label><input type="password" name="pwd" placeholder="請輸入英文字母或數字"></li>
			<li><label style="font-size:14px;" class="highLight confirm">確認密碼※</label><input type="password" name="pwd2" placeholder="請輸入英文字母或數字"></li>
			<li><label class="highLight" >姓名※</label><input type="text" placeholder="姓" class="lastName" name="last_name"><input type="text" placeholder="名" class="firstName" name="first_name"></li>
			<li class="mobilePhone"><label>手機</label><select name="mobile_country"><?PHP echo $country_codes_mobile?></select><input type="text" name="mobile" placeholder="ex:0900-000-111" class="mobileNum"></li>
			<li class="address"><label>地址</label><input type="text" placeholder="郵遞區號" name="zipcode" style="margin-right:5px;margin-left:0px;width:20%"><select name="country"><?PHP echo $country_codes_address?></select><select class="noMargin" name="province"></select><select class="helfSelect" name="city"></select><select class="helfSelect" name="area"></select><input type="text" name="address" placeholder="請輸入詳細地址"></li>
			<li><label>性別</label><input type="radio" name="gender" value="男"><span>男</span><input type="radio" name="gender" value="女"><span>女</span><input type="radio" name="gender" value="不指定"><span>不指定</span></li>
			<li class="birth"><label>生日</label><select name="birth_y"></select><select name="birth_m"></select><select class="noMargin" name="birth_d"></select></li>
<!-- 			<li class="educ"><label>學歷</label><select name="edu"><option value="">請選擇</option><option value="研究生">研究生</option></select></li>
	<li class="job"><label>職業</label><select name="job"><option value="">請選擇</option><option value="生技醫療">生技醫療</option></select></li> -->
</ul>
<div class="note"><input type="checkbox" name="epaper">我要訂閱分享東西網路電子報</div>
<div class="note"><input type="checkbox" name="agree"value='0'><span style="cursor:pointer;" onclick="copyright($(this))" >我已同意分享東西網路會員條款與隱私權聲明</span></a></div>
<a href="#" class="submitBtn">SUMBIT <span>/</span> 送出</a>
</form>
</div>
<!-- end profile form -->
<!-- edit profile form -->
<?PHP
if(@$_SESSION['user_login_id']!=''):
	if (count($member_data)>0):
		$info = json_decode($member_data['info']);
// print_r($member_data);exit;
	unset($info->pwd);
	?>
	<div id="editProfile" class="popupForm">
		<a href="#" class="closeBtn">X</a>
		<h1>編輯個人資料</h1>
		<form name="profile" action="" method="post" accept-charset="utf-8">
			<!-- <pre><?PHP print_r($member_data)?></pre> -->
			<ul class="profile">
				<li>※為必填資料</li>
				<li><label>Email</label><span class="email"><?PHP echo $member_data['email']?></span></li>
				<li><label class="highLight">密碼※</label><input type="password" name="pwd" placeholder="請輸入英文字母或數字"></li>
				<li><label style="font-size:14px;" class="highLight confirm">確認密碼※</label><input type="password" name="pwd2" placeholder="請輸入英文字母或數字"></li>
				<li><label class="highLight" >姓名※</label><input type="text" placeholder="姓" class="lastName" name="last_name" value="<?PHP echo $info->last_name?>"><input type="text" placeholder="名" class="firstName" name="first_name" value="<?PHP echo $info->first_name?>"></li>
				<li class="mobilePhone"><label>手機</label><select name="mobile_country"><?PHP echo $country_codes_mobile?></select><input type="text" name="mobile" placeholder="ex:0900-000-111" class="mobileNum" value="<?PHP echo $info->mobile?>"></li>
				<li class="address"><label>地址</label><input type="text" placeholder="郵遞區號" name="zipcode" style="margin-right:5px;margin-left:0px;width:20%" value="<?PHP echo $info->zipcode?>"><select name="country"><?PHP echo $country_codes_address?></select><select class="noMargin" name="province"></select><select class="helfSelect" name="city"></select><select class="helfSelect" name="area"></select><input type="text" name="address" placeholder="請輸入詳細地址" value="<?PHP echo $info->address?>"></li>
				<li><label>性別</label><input type="radio" name="gender" value="男"><span>男</span><input type="radio" name="gender" value="女"><span>女</span><input type="radio" name="gender" value="不指定"><span>不指定</span></li>
				<li class="birth"><label>生日</label><select name="birth_y"></select><select name="birth_m"></select><select class="noMargin" name="birth_d"></select></li>
<!-- 			<li class="educ"><label>學歷</label><select name="edu"><option value="">請選擇</option><option value="研究生">研究生</option></select></li>
	<li class="job"><label>職業</label><select name="job"><option value="">請選擇</option><option value="生技醫療">生技醫療</option></select></li> -->
</ul>
<div class="note"><input type="checkbox" name="epaper">我要訂閱分享東西網路電子報</div>
<div class="note"><input type="checkbox" name="agree"><span style="cursor:pointer;" onclick="copyright($(this))">我已同意分享東西網路會員條款與隱私權聲明</span></div>
<a href="#" class="submitBtn">SUMBIT <span>/</span> 送出</a>
</form>
</div>
<?PHP endif;?>
<?PHP endif;?>
<!-- end profile form -->
<wb:share-button type="button" size="middle"> </wb:share-button>
<script>
var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src='//www.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<script src="<?PHP echo SITE_URL?>assets/old/js/swipe.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/fotorama.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/magnific.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/country_codes.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/jquery.form.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/tw_city.js"></script>
<script src="<?PHP echo SITE_URL?>assets/old/js/china_city.js"></script>
<div id="fb-root"></div>
<script type="text/javascript" src="http://connect.facebook.net/zh_TW/all.js"></script>


<?PHP if (count($member_data)>0):?>
<script>
var member_info = <?PHP echo $member_data['info'];?>;
$(function(){
	oxox_site.set_selected();

})
<?=$_SESSION[ADMIN_SESSION]?>
</script>
<?PHP endif;?>
