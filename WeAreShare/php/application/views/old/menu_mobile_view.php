<div id="adBanner">
    <?PHP if ($main_banner['link']!=''):?>
    <a  target="_blank" href="<?PHP echo ($main_banner['link']=='')?'javascript:viod(0)':SITE_URL . 'adclick/?ad=' . $main_banner['id'] . '&url=' . $main_banner['link'] . ''?>"><?PHP echo ($main_banner['img_title']=='')?'':'<img src="'.SITE_URL.'/upload/'.$main_banner['img_title'].'">'?><div class="mask"></div></a>
    <?PHP else:?>
    <?PHP echo ($main_banner['img_title']=='')?'':'<img src="'.SITE_URL.'/upload/'.$main_banner['img_title'].'">'?><div class="mask"></div>
    <?PHP endif;?>
</div>
<div id="menu" class="fbMenu">
    <div class="search">
        <form id="frm_search" action="<?PHP echo SITE_URL?>search" onsubmit="return search_term();">
            <a href="javascript:void(0)" onclick="if(search_term()==true) $('#frm_search').submit();"><img src="<?php echo SITE_URL?>assets/old/images/transparent.gif" /></a><input id="key" name="key" type="text">
        </form>

    </div>
    <ul>
    	<li><a href="<?PHP echo SITE_URL?>article/tag/時尚">時尚<span>Fashion</span></a></li>
		<li><a href="<?PHP echo SITE_URL?>article/tag/人物">人物<span>People</span></a></li>
		<li><a href="<?PHP echo SITE_URL?>article/tag/美容">美容<span>Beauty</span></a></li>
		<li><a href="<?PHP echo SITE_URL?>article/tag/珠寶">珠寶鐘錶<span>Jewelry & Watch</span></a></li>
		<li><a href="<?PHP echo SITE_URL?>article/tag/文創">生活文創<span>Culture & Life style</span></a></li>
		<li><a href="<?PHP echo SITE_URL?>article/tag/東西名人成年禮">成年禮<span>Society</span></a></li>
		<li><a class="showul" href="<?PHP echo SITE_URL?>society">分享東西<span>Society</span><img src="<?php echo SITE_URL?>assets/old/images/transparent.gif" /></a>
			<ul>
				<li><a href="<?PHP echo SITE_URL?>people">名人錄</a></li>
				<li><a href="<?PHP echo SITE_URL?>brand">外稿作者</a></li>
			</ul>
		</li>
		<li><a href="<?PHP echo SITE_URL?>event">派對 <span>Party</span></a></li>
		<li><a href="https://www.youtube.com/channel/UCtA6pXuxaTjolDQXiDcVCBA">影音<span>Video</span></a>
			<ul style="">
				<?php foreach ($menu_data[4] as $val){?>
				<li><a href="<?PHP echo SITE_URL?>video/index/<?=$val->VideoType_Id?>"><?=$val->VideoType_Name?></a></li>
				<?php }?>
			</ul>
		</li>
		<li><a <?PHP echo (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0)?"class='showul'":"";?> href="<?PHP echo SITE_URL?>shop">商城<span>Shop</span>
			<?PHP if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0):?>
			<img src="<?php echo SITE_URL?>assets/old/images/transparent.gif" /></a>
			<ul>
				<li><a href="<?PHP echo SITE_URL?>order/shopping/購物車">購物車</a></li>
				<li><a href="<?PHP echo SITE_URL?>order/order_list/我的訂單">我的訂單</a></li>
				<!--<li><a href="">購買紀錄</a></li>
				 <li><a href="#">社交禮儀</a></li> -->
			</ul>
			<?PHP endif;?>
		</li>
		<li><a href="<?PHP echo SITE_URL?>article/about/1">關於<span>about</span></a></li>
		<li><a href="#">　<span>　</span></a></li>
            <div class="clear"></div>
        </ul>
    </div>
    <div id="logMenu" class="logMenu">
        <ul>
            <?PHP if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0):?>
            <li><a href="#" onclick="oxox_site.profile();" class="memberInfo"><?PHP echo strtoupper($_SESSION['user_login_email']);?></a><span>|</span></li>
            <li><a href="#" onclick="oxox_site.logout();" class="logOut">LOG OUT</a><span></span></li>
            <?PHP else:?>
            <li><a href="#" class="signIn">SIGN UP</a><span>|</span></li>
            <li><a href="#" class="logIn">LOG IN</a><span></span></li>
            <?PHP endif;?>
        </ul>
    </div>