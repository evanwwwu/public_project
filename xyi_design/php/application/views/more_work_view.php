
<?PHP foreach($works as $key=>$rows):?>
<?PHP if(count($rows)==1):?>
<div class="part">
	<ul class="clearfix">
		<li class="item w1 year" style="cursor:auto;">
			<img src="<?PHP echo SITE_URL?>assets/images/work_year.jpg" />
			<h1><span><?PHP echo $key?></span></h1>
		</li>
		<li class="item w1 count1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[0]['url']?>'">
			<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[0]['cover_img']?>" />
			<div class="hover">
				<div style="height:100%;width:100%;display:table;">
					<!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
					<h1><span><?PHP echo $rows[0]['title']?></span></h1>
				</div>
			</div>
		</li>
	</ul>
</div>
<?PHP else:?>
<div class="part">
	<ul class="clearfix">
		<?PHP
		$total = count($rows);
		if($total<=5){
			$rem = abs($total-5)%4;
		}else{
			$rem = abs($total-5)%4;
			$rem = 4-$rem;
		}
		?>
		<li class="item w1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[0]['url']?>'">
			<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[0]['cover_img']?>" />
			<div class="hover">
				<div style="height:100%;width:100%;display:table;">
					<!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
					<h1><span><?PHP echo $rows[0]['title']?></span></h1>
				</div>
			</div>
		</li>
		<li class="item w1" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[1]['url']?>'">
			<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[1]['cover_img']?>" />
			<div class="hover">
				<div style="height:100%;width:100%;display:table;">
					<!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
					<h1><span><?PHP echo $rows[1]['title']?></span></h1>
				</div>
			</div>
		</li>
		<li class="item year">
			<img src="<?PHP echo SITE_URL?>assets/images/work_year.jpg" />
			<h1><span><?PHP echo $key?></span></h1>
		</li>
		<?PHP for($k=2;$k<count($rows);$k++):?>
		<li class="item" onclick="location='<?PHP echo SITE_URL.$this->uri->segment(1)?>/work/post/<?PHP echo $rows[$k]['url']?>'">
			<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $rows[$k]['cover_img']?>" />
			<div class="hover">
				<div style="height:100%;width:100%;display:table;">
					<!-- <img src="<?PHP echo SITE_URL?>assets/images/work_hover2.png" /> -->
					<h1><span><?PHP echo $rows[$k]['title']?></span></h1>
				</div>
			</div>
		</li>
		<?PHP endfor;?>
		<?PHP for($r=0;$r<$rem;$r++):?>
		<li class="item">
			<img src="<?PHP echo SITE_URL?>assets/images/work_p.jpg" />
		</li>
		<?PHP endfor;?>
	</ul>
</div>
<?PHP endif;?>
<?PHP endforeach;?>