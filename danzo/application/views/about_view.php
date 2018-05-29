<section class="about">
	<article class="content">
		<img src="http://placehold.it/900x380" alt="" class="cover_img">
		<div class="title">
			“Torem ipsum dolor sit amet, consectetur adipiscing elit. Sed et dictipsum. 
			Etiam ornare quis neque quis suscipit. Aenean convallispurus vestilum et.”
		</div>
		<div class="info">
			Torem ipsum dolor sit amet, consectetur adipiscing elit. Sed et dictum ipsum. Etiam ornare quis neque quis suscipit. Aenean convallis rutrum urna, et posuere purus vestibulum et. Maecenas porttitor quis dolor et vulputate. Aenean egestas pellentesque neque, vel rhoncus lectus ultricies sit amet. Nulla facilisi. Praesent et mauris eget nisl euismod lnulla egestas, eu aliquam ante tristique. Etiam placerat iaculis ligula, vel aliquam mauris tristique vel.
			<br><br>
			Torem ipsum dolor sit amet, consectetur adipiscing elit. Sed et dictum ipsum. Etiam ornare quis neque quis suscipit. Aenean convallis rutrum urna, et posuere purus vestibulum et. Maecenas porttitor quis dolor et vulputate. Aenean egestas pellentesque neque, vel rhoncus lectus ultricies sit amet. Nulla facilisi. Praesent et mauris eget nisl euismod lnulla egestas, eu aliquam ante tristique. Etiam placerat iaculis ligula, vel aliquam mauris tristique vel.
		</div>
	</article>
	<article class="jobs">
		<div class="circle_title"><span>WHAT WE DO</span></div>
		<div class="options">
			<p>Product design <span class="line">/</span> Prodution <span class="line">/</span> Branding & Identity <span class="line">/</span> Packaging</p>
			<p>Commercials <span class="line">/</span> Print Production <span class="line">/</span> Design Consultancy</p>
		</div>
	</article>
	<article class="team">
		<div class="title">OUR TEAM</div>
		<div class="members">
			<div class="products">
				<div class="job_title"><?PHP echo strtoupper(lang("office1")) ?></div>
				<?PHP foreach ($members["product"] as $product): ?>
				<div class="user" data-url="<?PHP echo SITE_URL.$this->uri->segment(1)?>/member/detail/<?PHP echo $product["id"] ?>">
					<div class="face">
						<div class="img_face"><img src="<?PHP echo IMG_URL;?>upload/<?PHP echo $product["cover_img"] ?>" data-no-retina alt=""></div>
						<div class="height"></div>
					</div>
					<div class="name"><?PHP echo $product["name"] ?></div>
					<div class="job_title"><?PHP echo lang("office1") ?></div>
				</div>
				<?PHP endforeach; ?>
			</div>
			<div class="graphic">
				<div class="job_title"><?PHP echo strtoupper(lang("office2")) ?></div>
				<?PHP foreach ($members["graphic"] as $graphic): ?>
				<div class="user" data-url="<?PHP echo SITE_URL.$this->uri->segment(1)?>/member/detail/<?PHP echo $graphic["id"] ?>">
					<div class="face">
						<div class="img_face"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $graphic["cover_img"] ?>" alt=""></div>
						<div class="height"></div>
					</div>
					<div class="name"><?PHP echo $graphic["name"] ?></div>
					<div class="job_title"><?PHP echo lang("office2") ?></div>
				</div>
				<?PHP endforeach; ?>
			</div>
			<div class="sales">
				<div class="job_title"><?PHP echo strtoupper(lang("office3")) ?></div>
				<?PHP foreach ($members["sales"] as $sales): ?>
				<div class="user" data-url="<?PHP echo SITE_URL.$this->uri->segment(1)?>/member/detail/<?PHP echo $sales["id"] ?>">
					<div class="face">
						<div class="img_face"><img src="<?PHP echo IMG_URL?>upload/<?PHP echo $sales["cover_img"] ?>" alt=""></div>
						<div class="height"></div>
					</div>
					<div class="name"><?PHP echo $sales["name"] ?></div>
					<div class="job_title"><?PHP echo lang("office3") ?></div>
				</div>
				<?PHP endforeach; ?>
			</div>
		</div>
	</article>
	<article class="clients">
		<!-- <div class="svg_title">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" viewBox="0 0 940 280" >
				<text id="CLIENTs">
					<tspan x="0" y="245" stroke-linejoin="round" stroke-miterlimit="10" font-size="230">CLIENTs</tspan>
				</text>
			</svg>
		</div> -->
		<div class="title">CLIENTs</div>
		<div class="cororate">
			<div class="title">Corporate</div>
			<div class="info">China Trust <span class="line">/</span> </div>
		</div>
		<div class="cultural">
			<div class="title">Cultural institution</div>
			<div class="info">Kaohsiung Main Public Library <span class="line">/</span> Kaohsiung City Gov. Cultural Affairs <span class="line">/</span> The Pier-2 Art Center</div>
		</div>
	</article>
	<article id="popup">
	</article>
</section>