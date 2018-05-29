
<div class="main_img" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="250">
	<img alt="" src="<?PHP echo ASSETS_URL;?>images/recipe_pic.jpg" /><span>RECIPES</span>
</div>
<div class="main_content">
	<div class="maintitle">
		<span>逛食譜</span>
	</div>
	<div class="content">
		<div class="type_select">
			<div class="select_btn">
				<p class="selected_p">
					<?php echo $filters[0]["title"] ?>
				</p>
			</div>
			<ul>
				<?php foreach ($filters as $key => $filter): ?>
					<li class="<?php echo ($key==0 && !isset($this->get["filter"]) || $this->get["filter"]== $filter["id"])?"active":""; ?>" filter-id="<?php echo $filter["id"] ?>">
						<a href="javascript:viod(0);">
							<p>
								<?php echo $filter["title"]; ?>
							</p>
						</a>
					</li>          
				<?php endforeach ?>
			</ul>
		</div>
		<div class="items">
			<?php foreach ($rs as $key => $row): ?>
				<div class="item <?php echo ($row["state"]=="商品"&&$row["count"]<=0)?"over":""; ?>" data-filter="<?php echo $row["filter_id"]; ?>">
					<a href="<?php echo SITE_URL; ?>recipes/detail/<?php echo $row["id"]; ?>">
						<div class="pic">
							<img alt="" src="<?PHP echo IMG_URL.$row["cover_img"];?>" />
							<div class="hover_bg">
								<?php if($row["state"]=="商品"&&$row["count"]<=0): ?>
									<span>發售完畢</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="p_title">
							<div class="pt">
								<?php echo $row["title"] ?>      
							</div>
						</div>
					</a>
				</div>				
			<?php endforeach;?>
		</div>
	</div>
</div>