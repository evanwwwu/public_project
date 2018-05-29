<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
	<?PHP
		//meta,js,css
		echo (isset($page_head))?$page_head:"";
	?>
</head>
<body class="index">
    <?PHP
        //mobile menu
        echo (isset($menu_mobile))?$menu_mobile:"";
    ?>
    <div id="viewport">
        <div id="closeMask"></div>
        <div id="wrapper">
            <?PHP
            //page top
            echo (isset($page_top))?$page_top:"";
            ?>
            <?PHP
            //menu main
            echo (isset($menu_main))?$menu_main:"";
            ?>
		<div class="innerWrapper">
			<div class="contact">
				<h3>聯絡我們</h3>
				<strong>東西全球文創集團</strong>
				<strong>WE WestEast </strong>
				<strong>Global Cultural Creativity Groups</strong>
				<div class="service">
					<ul>
						<li>媒體Media |</li>
						<li>出版Publishing |</li>
						<li>品牌行銷Branding |</li>
						<li>顧問經紀Agency |</li>
						<li>策展Curating</li>
					</ul>
				</div>
				<div class="info">
					<ul>
						<li>電話：+886 2 2754-8588</li>
						<li>傳真：+886 2 2702-2798</li>
						<li>地址：106 台北市敦化南路一段376號8樓之2<a href="https://maps.google.com.tw/maps?q=%E5%8F%B0%E5%8C%97%E5%B8%82%E6%95%A6%E5%8C%96%E5%8D%97%E8%B7%AF%E4%B8%80%E6%AE%B5376%E8%99%9F8%E6%A8%93%E4%B9%8B2&hl=zh-TW&ie=UTF8&sll=25.085406,121.561501&sspn=0.606327,1.056747&brcurrent=3,0x3442abf2b1d366ed:0x5d62b36fc2a1bb86,0,0x3442ac6b61dbbd9d:0xc0c243da98cba64b&hnear=106%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A4%A7%E5%AE%89%E5%8D%80%E6%95%A6%E5%8C%96%E5%8D%97%E8%B7%AF%E4%B8%80%E6%AE%B5376%E8%99%9F&t=m&z=17" class="map" target=_blank><img src="<?PHP echo SITE_URL?>assets/old/images/transparent.gif"/></a></li>
						<li>信箱：<a href="mailto:inquiry@@we-westeast.com<">inquiry@@we-westeast.com</a></li>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
            <?PHP
            //page footer
            echo (isset($page_footer))?$page_footer:"";
            ?>
            <div class="navigation">
                <a href="<?PHP echo SITE_URL?>ajax/article_page/2/<?PHP echo $tag_id;?>"></a>
            </div>
        </div>
    </div>
    <!-- end profile form -->
<?PHP echo $login_view;?>
    <script src="<?PHP echo SITE_URL?>assets/old/js/swipe.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/old/js/main.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/old/js/jquery.infinitescroll.js"></script>
    <script type="text/javascript" src="<?PHP echo SITE_URL?>ajax"></script>
    <script>
        $('#footer').removeClass('footerOpen');
        $(function(){
            if ($('.post_list ul li').length>0){
                $('.post_list ul').infinitescroll({
                    loading: {
                        finished: function(){$('#infscr-loading').remove();},
                        finishedMsg: "<em></em>",
                        img: "<?PHP echo SITE_URL?>assets/old/images/loading.gif",
                        msg: null,
                        msgText: "<em></em>",
                        selector: null,
                        speed: 'fast',
                        start: undefined
                    },
                    navSelector  : "div.navigation",
                    nextSelector : "div.navigation a:first",
                    itemSelector : "li",
                    debug        : false,
                    animate      : true,
                    extraScrollPx: 50, 
                    donetext     : "" ,
                    bufferPx     : 40,
                });
            };
        })
    </script>
</body>
</html>
