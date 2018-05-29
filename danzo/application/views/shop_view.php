<section class="shop">
	<article class="taiwan">
		<h3 class="area"><span><?PHP echo $rs[0]["name_".$this->uri->segment(1)] ?></span></h3>
		<div class="all">
			<?PHP if(count($rs[0]["stores"]["online"])>0): ?>
			<div class="online">
				<p class="title">online store::</p>
				<div class="shops">
					<?PHP foreach($rs[0]["stores"]["online"] as $online): ?>
					<div class="item"><span class="name"><?PHP echo $online["title"] ?></span>&nbsp;<a href="<?PHP echo $online["link"] ?>" class="link" target="_block"><?PHP echo $online["link"] ?></a></div>
					<?PHP endforeach; ?>
				</div>
			</div>
			<?PHP endif; ?>
			<?PHP if(count($rs[0]["stores"]["local"])>0): ?>
			<div class="store">
				<p class="title">store::</p>
				<?PHP foreach($rs[0]["stores"]["local"] as $local): ?>
				<div class="shops">
					<div class="item">
						<div class="name"><?PHP echo @$local["title"] ?></div>
						<div class="addr"><?PHP echo @$local["address"] ?></div>
						<div class="phone"><?PHP echo @$local["phone"] ?></div>
					</div>
				</div>
				<?PHP endforeach; ?>
			</div>
			<?PHP endif; ?>
		</div>
	</article>
	<article class="unverse">
		<h3 class="area"><span>UNIVERSE</span></h3>
		<div class="countrys">
			<?PHP for ($s=1;$s<count($rs);$s++): ?>
			<div class="country">
				<div class="store">
					<p class="title"><?PHP echo @$rs[$s]["name"]; ?> ::</p>
					<?PHP if (count($rs[$s]["stores"]["local"])>0): ?>
					<div class="shops">
						<?PHP foreach ($rs[$s]["stores"]["local"] as $key => $local): ?>
						<div class="item">
							<div class="name"><?PHP echo @$local["title"] ?></div>
							<div class="addr"><?PHP echo @$local["address"] ?></div>
							<div class="phone"><?PHP echo @$local["phone"] ?></div>
						</div>
						<?PHP endforeach; ?>
					</div>
					<?PHP endif; ?>
				</div>
				<?PHP if (count($rs[$s]["stores"]["online"])>0): ?>
				<div class="online">
					<p class="title">online store::</p>
					<div class="shops">
						<?PHP foreach ($rs[$s]["stores"]["online"] as $key => $online): ?>
						<div class="item"><span class="name"><?PHP echo $online["title"] ?></span>&nbsp;<a href="<?PHP echo $online["link"] ?>" class="link" target="_block"><?PHP echo $online["link"] ?></a></div>
						<?PHP endforeach; ?>
					</div>
				</div>
				<?PHP endif; ?>
			</div>
			<?PHP endfor; ?>
		</div>
	</article>
</section>