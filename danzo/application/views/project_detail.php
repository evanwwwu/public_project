<section class="product_detail">
	<article class="menu_left">
		<?PHP foreach($type as $k=>$t): ?>
		<div class="type">
			<div class="type_name"><?PHP echo $t["title"] ?></div>
			<ul class="sub_menu">
				<?PHP foreach($t["rs"] as $pro): ?>
				<li class="<?PHP echo ($pro["id"]==$row["id"])?"active":"" ?>"><a href="<?PHP echo SITE_URL.$this->uri->segment(1) ?>/project/detail/<?PHP echo $pro["id"] ?>"><?PHP echo $pro["title"] ?></a></li>
				<?PHP endforeach; ?>
			</ul>
		</div>
		<?PHP endforeach; ?>
	</article>
	<article class="content">
		<div class="gallerys fotorama"  data-loop="true"  data-autoplay="7000"  data-arrows="false" data-maxwidth="100%">
			<?PHP if(@$row["gallery_img"]!=""): ?>
			<?PHP foreach(json_decode($row["gallery_img"]) as $img): ?>
			<img src="<?PHP echo IMG_URL;?>upload/<?PHP echo $img ?>" alt="">
			<?PHP endforeach; ?>
			<?PHP endif; ?>
		</div>
		<div class="text">
			<div class="title">Landscape</div>
			<div class="detail">
				<?PHP echo @$row["content"] ?>
			</div>
		</div>
	</article>
	<article class="des">
		<?PHP if($row["formats"]!=""): ?>
		<?PHP foreach(json_decode($row["formats"]) as $formats): ?>
		<div class="format">
			<div class="title"><?PHP echo $formats->formats_title ?></div>
			<div class="info"><?PHP echo nl2br(urldecode($formats->formats_content)) ?></div>
		</div>
		<?PHP endforeach; ?>
		<?PHP endif; ?>
	</article>
	<div class="back_btn">
		<a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/project">
			<img src="<?PHP echo ASSETS_URL?>images/m_back.png" alt="project_list">
			<span>back to project list</span>
		</a>
	</div>
</section>