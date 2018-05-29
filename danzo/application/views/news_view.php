<section class="news">
	<div class="menu_title">press</div>
	<article>
		<?PHP foreach($rs as $row): ?>
		<div class="news_item" data-url="<?PHP echo SITE_URL.$this->uri->segment(1)?>/news/detail/<?PHP echo $row["id"] ?>">
			<a href="javascript:void(0);">
				<div class="top">
					<div class="cover_img <?PHP echo (@$row["cover_img"]!="")?"image":"" ?>">
						<?PHP if($row["cover_img"]!=""): ?>
						<img src="<?PHP echo IMG_URL;?>upload/<?PHP echo $row["cover_img"];?>">
						<?PHP endif; ?>
					</div>
					<div class="date"><span><?PHP echo strtoupper(date("M d",strtotime($row["create_date"]))) ?></span><br><span><?PHP echo date("Y",strtotime($row["create_date"])) ?></span></div>
				</div>
				<div class="info">
					<div class="title">
						<?PHP echo @$row["title"] ?>
					</div>
					<p><?PHP echo @$row["sub_title"] ?></p>
					<p><?PHP echo @$row["related"] ?></p>
				</div>
			</a>
		</div>
		<?PHP endforeach; ?>
	</article>
	<article id="popup">
	</article>
</section>