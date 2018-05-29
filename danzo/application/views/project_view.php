<section class="product">
	<?PHP foreach($type as $key=>$ty): ?>
	<article class="product_type">
		<div class="type"><?php echo @$ty["title"]; ?></div>
		<div class="items">
			<?PHP foreach($ty["rs"] as $pro=>$row): ?>
			<div class="item">
				<a href="<?PHP echo SITE_URL.$this->uri->segment(1)?>/project/detail/<?php echo $row["id"] ?>">
					<div class="cover_img"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo @$row["cover_img"] ?>" alt=""></div>
					<div class="name"><?PHP echo @$row["title"] ?></div>
				</a>
			</div>
			<?PHP endforeach; ?>
		</div>
	</article>
	<?PHP endforeach; ?>
</section>