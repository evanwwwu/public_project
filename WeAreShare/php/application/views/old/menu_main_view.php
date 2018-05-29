<div id="mainNav">
	<ul>
		<li <?PHP echo (urldecode($menu_selected)=='時尚')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/tag/時尚">時尚<span>Fashion</span></a></li>
		<li <?PHP echo (urldecode($menu_selected)=='人物')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/tag/人物">人物<span>People</span></a></li>
		<li <?PHP echo (urldecode($menu_selected)=='美容')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/tag/美容">美容<span>Beauty</span></a></li>
		<li <?PHP echo (urldecode($menu_selected)=='珠寶鐘錶')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/tag/珠寶鐘錶">珠寶鐘錶<span>Jewelry & Watch</span></a></li>
		<li <?PHP echo (urldecode($menu_selected)=='生活文創')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/tag/文創">生活文創<span>Culture & Life style</span></a></li>
		<li <?PHP echo (urldecode($menu_selected)=='東西名人成年禮')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/tag/東西名人成年禮">成年禮<span>Society</span></a></li>
		<li <?PHP echo ($menu_selected=='society')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>society">分享東西<span>Society</span></a>
			<ul>
				<li><a href="<?PHP echo SITE_URL?>people">名人錄</a></li>
				<li><a href="<?PHP echo SITE_URL?>brand">外稿作者</a></li>
			</ul>
		</li>
		<li <?PHP echo ($menu_selected=='schedule')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>event">派對 <span>Party</span></a></li>
		<li <?PHP echo ($menu_selected=='video')?'class="active"':''?>><a href="https://www.youtube.com/channel/UCtA6pXuxaTjolDQXiDcVCBA">影音<span>Video</span></a>
			<ul style="display:none">
				<?php foreach ($menu_data[4] as $val){?>
				<li><a href="<?PHP echo SITE_URL?>video/index/<?=$val->VideoType_Id?>"><?=$val->VideoType_Name?></a></li>
				<?php }?>
			</ul>
		</li>
		<li <?PHP echo ($menu_selected=='shop')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>shop">商城<span>Shop</span></a>
			<?PHP if (isset($_SESSION['user_login_id']) and $_SESSION['user_login_id']>0):?>
			<ul>
				<li><a href="<?PHP echo SITE_URL?>order/shopping/購物車">購物車</a></li>
				<li><a href="<?PHP echo SITE_URL?>order/order_list/我的訂單">我的訂單</a></li>
				<!--<li><a href="">購買紀錄</a></li>
				 <li><a href="#">社交禮儀</a></li> -->
			</ul>
			<?PHP endif;?>
		</li>
		<li <?PHP echo (urldecode($menu_selected)=='about')?'class="active"':''?>><a href="<?PHP echo SITE_URL?>article/about/1">關於<span>About</span></a></li>
		
		<div class="clear"></div>
	</ul>
</div>