<section>
	<article class="slideshow store_in">
		<div class="pic">
			<img src="<?PHP echo IMG_URL?>upload/<?PHP echo @$row["banner"]?>" />
		</div>
		<div class="content">
			<h2><?PHP echo @$row["title"]?></h2>
			<?PHP if(@$row["link"]!=""):?>
			<a href="<?PHP echo @$row["link"]?>" target="_blank"><?PHP echo @$row["link"] ?></a>
			<?PHP endif; ?>
			<?PHP if(@$row["phone"] !=""): ?>
			<div>
				<p>Tel.</p>
				<p><?PHP echo @$row["phone"]?></p>
			</div>
			<?PHP endif; ?>
			<?PHP if(@$row["address"] !=""): ?>
			<div>
				<p>Add.</p>
				<p><?PHP echo @$row["address"] ?></p>
			</div>
			<?PHP endif; ?>
			<?PHP if(@$row["open_time"] !=""): ?>
			<div>
				<p>營業時間</p>
				<p><?PHP echo @$row["open_time"] ?></p>
			</div>
			<?PHP endif; ?>
			<?PHP if(@$row["brand"] !=""): ?>
			<div>
				<p>廚具品牌</p>
				<p><?PHP echo @$row["brand"] ?></p>
			</div>
			<?PHP endif; ?>
		</div>
	</article>
	<article class="wrap main">
		<?PHP if(count($products)>0): ?>
		<div class="part store_in">
			<div class="title">
				<h1><span>FRANKE IN THE HOUSE</span></h1>
				<div class="line"></div>
			</div>
			<ul class="list side">
				<?PHP foreach ($products as $pro): ?>
				<?php $cr_num = 0; ?>
				<li class="product">
					<a href="<?PHP echo SITE_URL?>product/<?PHP echo $this->main_model->get_url($pro["main_id"]);?>/detail/<?PHP echo $pro["id"]?>" class="pic">
						<?PHP if(@$pro["cover_img"]!=""&&@$pro["cover_img"]!="null"):?>
						<?PHP $cr_num = count(json_decode($pro["cover_img"]));?>
						<?PHP foreach(json_decode($pro["cover_img"]) as $k=> $img):?>
						<img class="<?PHP echo ($k==0)?"active":""?>" src="<?PHP echo IMG_URL?>upload/<?PHP echo $img?>" />
						<?PHP endforeach;?>
						<?PHP endif;?>
					</a>
					<div class="words">
						<a href="<?PHP echo SITE_URL?>product/<?PHP echo $controller_addr?>/detail/<?PHP echo $pro["id"]?>" class="link"><?PHP echo $pro["product_no"]?><div class="line"></div></a>
						<div class="circle_part">
							<?PHP for($x=0;$x<$cr_num;$x++):?>
							<div class="circle <?PHP echo ($x==0)?"active":""?>"></div>
							<?PHP endfor;?>
						</div>
					</div>
				</li>
				<?PHP endforeach; ?>
			</ul>
		</div>
		<?PHP endif; ?>
		<div class="part">
			<div class="title">
				<h1><span><?PHP echo @$row["title"]?></span></h1>
				<div class="line"></div>
			</div>
			<div class="content store_in">
				<?PHP if(@$row["gallery_img"]!="null"):?>
				<div class="pic_part">
					<?PHP foreach(json_decode(@$row["gallery_img"]) as $k=>$img): ?>
					<div class="pic">
						<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $img?>" />
					</div>
					<?PHP endforeach; ?>
				</div>
				<?PHP endif; ?>
				<div class="word_part">
					<?PHP echo $row["content"] ?>
				</div>
			</div>
		</div>
	</article>
</section>