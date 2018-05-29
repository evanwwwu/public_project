<div class="detail"  data-mid="<?php echo $row["id"]; ?>" data-pid="<?php echo $row["pid"]; ?>" data-count="<?php echo $row["count"];?>" >
	<div class="pic">
		<img alt="" src="<?PHP echo IMG_URL.$row["main_img"];?>" />
	</div>
	<div class="content_div">
		<div class="top_div">
			<div class="title">
				<div class="t1">
					<?php echo $row["title"] ?>
				</div>
				<div class="t2">
					<?php echo $row["sub_title"] ?>
				</div>
			</div>
			<div class="detail_close"></div>
		</div>
		<div class="text">
			<?php echo $row["info"]; ?>
		</div>
		<table class="mid_list">
			<tr>
				<td class="price" data-price="<?php echo $row["price"]; ?>" data-unit="<?php echo $row["unit"]; ?>" data-unittext="<?php echo $row["unit_text"]; ?>" data-ship="<?php echo $row["ship_type"] ?>">
					<span><?php echo "$".$row["price"]."/".$row["unit"].$row["unit_text"]; ?></span>
				</td>
				<td class="n">
					訂購數量
				</td>
				<td class="count">
					<input name="qty" min="0" type="number" />
				</td>
				<td class="unit">
					<?php echo $row["unit_text"]; ?>
				</td>
			</tr>
		</table>
		<div class="bottom_div">
			<div class="info_btn">
				<div class="attest_btn" data-img="<?php echo IMG_URL.$row["record_img"]; ?>">
					<img alt="" src="<?PHP echo ASSETS_URL;?>images/attest_icon.png" />
				</div>
				<div class="btn">
					<span>食材介紹</span>
				</div>
				<div class="add_cart <?php echo ($row["count"]<$row["unit"])?"over":""; ?>">
					<?php if ($row["count"]>=$row["unit"]): ?>
						<span>放進購物車</span>
						<div class="icon">
							<img alt="" src="<?PHP echo ASSETS_URL;?>images/add_bag.png" />
						</div>
					<?php else: ?>
						<span>缺貨</span>
					<?php endif; ?>
				</div>
				<div class="info">
					<?php echo $row["content"]; ?>
				</div>
			</div>
			<div class="add_cart <?php echo ($row["count"]<$row["unit"])?"over":""; ?>">
				<?php if ($row["count"]>=$row["unit"]): ?>
					<span>放進購物車</span>
					<div class="icon">
						<img alt="" src="<?PHP echo ASSETS_URL;?>images/add_bag.png" />
					</div>
				<?php else: ?>
					<span>缺貨</span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
