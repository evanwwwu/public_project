<div class="bg"></div>
<div class="content news">
	<div class="close_btn"></div>
	<?PHP if(@$row["content_img"]!=""): ?>
	<div class="cover_img"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo @$row["content_img"] ?>" alt=""></div>
	<?PHP endif; ?>
	<div class="info">
		<div class="title"><?PHP echo @$row["title"] ?></div>
		<div class="date"><span>Date:</span><?PHP echo date("M. d Y",strtotime($row["create_date"])) ?></div>
		<div class="detail">
			<?PHP echo @$row["content"] ?>
		</div>
	</div>
</div>