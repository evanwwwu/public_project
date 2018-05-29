<style>
#menu{
	overflow:visible;
	z-index:1;
}
#main{
	z-index:0;
}
.pure-menu li:hover > ul{
	top:0;
	left:150px;
	visibility:visible;
	width:150px;
}
.pure-menu-children li{
	background-color:#777;
}
.pure-menu-children li:hover{
	background-color:#333;
}
.pure-menu-children li:hover > .icon-right2{
	display: block;
}
.pure-menu-children a{
	color:#ffffff !important;
}
.icon-right{
	float:right;
	margin-top:-40px;
	padding:10px;
}
.icon-right2{
	float:right;
	margin-top:-43px;
	margin-right:10px;
	display:none;
}
</style>
	<a href="#menu" id="menuLink" class="pure-menu-link">
	<img src="<?PHP echo ADMIN_URL?>assets/old/images/navicon-png2x.png" width="20" alt="Menu toggle">
	</a>
	<div class="pure-u" id="menu">
		<div class="pure-menu pure-menu-open">
			<a href="<?PHP echo SITE_URL?>" target="blank" class="pure-menu-heading"><?PHP echo SITE_TITLE?></a>
			<ul>
                <li class="<?PHP echo ($menu_selected=='posts')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>posts">文章</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='tags')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>tags">文章類別</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='posts_gallery')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>posts_gallery">GALLERY</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='tags_gallery')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>tags_gallery">GALLERY類別</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='event')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>event">派對</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='calendar')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>calendar">行事曆</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='people')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>people">名人錄</a>
                </li>
                <li class="<?PHP echo ($menu_selected=='brand')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>brand">品牌錄</a>
                </li>
                <?PHP if($_SESSION[ADMIN_ACTIVE] == '1'):?>
                <li id="admin" class="<?PHP echo ($menu_selected=='member')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>member">會員</a>
                </li>                
                <li id="admin2" class="<?PHP echo ($menu_selected=='users')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>users">使用者</a>
                </li>                
                <?PHP endif;?>
                <li  class="<?PHP echo ($menu_selected=='banner')?'pure-menu-selected':''?> ">
                  	<a href="<?PHP echo ADMIN_URL?>banner?type=1">廣告</a>
                    <i class="icon-chevron-right icon-right"></i>
                    <ul class="pure-menu-children">
                        <li>
                        	<a href="<?PHP echo ADMIN_URL?>banner?type=1">背景</a>
                        </li>
                        <li>
                        	<a href="<?PHP echo ADMIN_URL?>banner?type=2">首頁</a>
                        </li>
                        <li>
                        	<a href="<?PHP echo ADMIN_URL?>banner?type=3">清單頁</a>
                        </li>
                        <li>
                        	<a href="<?PHP echo ADMIN_URL?>banner?type=4">圖片盒</a>
                        </li>
                        <li>
                        	<a href="<?PHP echo ADMIN_URL?>banner?type=5">側欄</a>
                        </li>
                    </ul>
                </li>                
                <li class="<?PHP echo ($menu_selected=='side')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>side">側欄模組</a>
                </li>              
                <li class="<?PHP echo ($menu_selected=='tags_all')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>tags_all">標籤管理</a>
                </li>                  
                <li id="edit" class="<?PHP echo ($menu_selected=='edit')?'pure-menu-selected':''?> ">
                    <a href="<?PHP echo ADMIN_URL?>users/edit_self/<?PHP echo $_SESSION[ADMIN_SESSION]?>">編輯個人資料</a>
                </li> 
				<li class=" menu-item-divided">
				    <a href="<?PHP echo ADMIN_URL?>logout">登出</a>
				</li>
			</ul>
		</div>
	</div>
