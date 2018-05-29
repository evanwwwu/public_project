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
	<div id="langPopup">
		<p>PLEASE SELECT YOUR LANGUAGE:</p>
		<div class="button">
			<a href="#">中文</a>
			<span>/</span>
			<a href="#">English</a>
		</div>
	</div>
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
				<div class="search_result index">
					<div class="result_text"><span><?PHP echo $_GET['key']?></span>的搜尋結果：</div>
					<div id="related_info" class="related_info">
						<ul class="tabs">
							<li class=""><a href="#related_article">相關文章(<span><?PHP echo $post['search_total']?></span>)</a></li>
							<li class=""><a href="#related_party">相關派對(<span><?PHP echo $event['search_total']?></span>)</a></li>
							<li class=""><a href="#related_gallery">相關圖片(<span><?PHP echo $img['search_total']?></span>)</a></li>
						</ul>
						<div class="tab_container">
							<div id="related_article" class="tab_content">
								<ul>
									<?PHP foreach($post['data'] as $data):?>
									<?PHP if (isset($data['img_title'])):?>
									<li class="banner" id="<?PHP echo $data['id']?>">
                                        <a <?PHP echo ($data['link']!='')?"href='".SITE_URL . "adclick/?url=" . $data['link'] . "&ad=" . $data['id']."'":""?> target="_blank"><img src="<?PHP echo SITE_URL . 'upload/' . $data['img_title']?>" border="0"></a>
									</li>
									<?PHP else:?>
									<li>
										<div class="img">
											<a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0"></a>
										</div>
										<div class="info content">
											<!-- <span class="categories"><?PHP echo $data['tags'];?></span> -->
											<h2><a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo str_replace($_GET['key'],'<spen style="color:#ed1c24;">'.$_GET['key'].'</spen>',$data['post_title']);?></a></h2>
											<div class="date">
												<span><?PHP echo $data['display_date']?></span>| by <a href="<?PHP echo SITE_URL.'search?key='.$data['author']?>"><?PHP echo $data['author']?></a>
											</div>
											<p>
												<?PHP echo str_replace($_GET['key'],'<spen style="color:#ed1c24;">'.$_GET['key'].'</spen>',$data['brief']);?>
											</p>
											<a href="<?PHP echo SITE_URL . 'article/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
										</div>
										<div class="clear">
										</div>
									</li>
									<?PHP endif;?>
									<?PHP endforeach;?>
								</ul>
							</div>
							<div id="related_party" class="tab_content">
								<ul>
									<?PHP foreach($event['data'] as $data):?>
									<?PHP if (isset($data['img_title'])):?>
									<li class="banner" id="<?PHP echo $data['id']?>">
                                        <a <?PHP echo ($data['link']!='')?"href='".SITE_URL . "adclick/?url=" . $data['link'] . "&ad=" . $data['id']."'":""?> target="_blank"><img src="<?PHP echo SITE_URL . 'upload/' . $data['img_title']?>" border="0"></a>
									</li>
									<?PHP else:?>
									<li>
										<div class="img">
											<a href="<?PHP echo SITE_URL . 'event/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><img src="<?PHP echo SITE_URL . 'upload/' . $data['cover_img']?>" border="0"></a>
										</div>
										<div class="info">
											<!-- <span class="categories"><?PHP echo $data['tags'];?></span> -->
											<h2><a href="<?PHP echo SITE_URL . 'event/' . $data['post_name']?>" title="<?PHP echo $data['post_title'];?>"><?PHP echo str_replace($_GET['key'],'<spen style="color:#ed1c24;">'.$_GET['key'].'</spen>',$data['post_title']);?></a></h2>
											<div class="date">
												<span><?PHP echo $data['display_date']?></span>| @<a href="#"><?PHP echo $data['location']?></a>| by <a href="#"><?PHP echo $data['author']?></a>
											</div>
											<p>
												<?PHP echo str_replace($_GET['key'],'<spen style="color:#ed1c24;">'.$_GET['key'].'</spen>',$data['brief']);?>
											</p>
											<a href="<?PHP echo SITE_URL . 'event/' . $data['post_name']?>" class="readMore">閱讀全文 »</a>
										</div>
										<div class="clear">
										</div>
									</li>
									<?PHP endif;?>
									<?PHP endforeach;?>
								</ul>
							</div>
							<div id="related_gallery" class="tab_content">
								<ul>
									<?PHP foreach($img['data'] as $data):?>
									<li style="text-align:center">
										<a href="<?PHP echo SITE_URL .'upload/'.$data['post_title']?>">
											<img src="<?PHP echo SITE_URL . 'upload/' . $data['post_title']?>">
											<p style="text-align:center"><?PHP echo	str_replace($_GET['key'],'<spen style="color:#ed1c24;">'.$_GET['key'].'</spen>',$data['meta_value']);?></p>
										</a>
									</li>
									<?PHP endforeach;?>
								</ul>
								<!-- <div class="loadMore"><a href="#">LOAD MORE <span>16</span>/532</a></div> -->
							</div>
						</div>
					</div>
					<div class="goTop">
						<a href="#"><img src="<?php echo SITE_URL?>assets/old/images/transparent.gif">Top</a>
					</div>
				</div>
				<?PHP
                //page aside
				echo (isset($aside))?$aside:"";
				?>
				<div class="clear">
				</div>
			</div>
			<?PHP
            //page footer
			echo (isset($page_footer))?$page_footer:"";
			?>
		</div>
	</div>

<?PHP echo $login_view;?>
	<!-- log in form -->

	<!-- end log in form -->

	<!-- register form -->
	
	<!-- end register form -->


	<!-- end register success form -->

	<!-- forgot pass form -->
	
	<!-- end forgot pass form -->

	<!-- profile form -->
	
	<!-- end profile form -->

	<!-- edit profile form -->
	
	<!-- end profile form -->
	<script src="<?PHP echo SITE_URL?>assets/old/js/magnific.js"></script>
    <script src="<?PHP echo SITE_URL?>assets/old/js/main.js"></script>
	<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src='//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</body>
</html>