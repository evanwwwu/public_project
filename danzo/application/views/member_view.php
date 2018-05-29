<div class="bg"></div>
<div class="member content">
	<div class="close_btn"></div>
	<div class="paper">
		<div class="pic">
			<img src="<?PHP echo IMG_URL?>upload/<?PHP echo $row["cover_img"] ?>" alt="">
			<div class="man">
				<div class="name"><?PHP echo $row["name"] ?></div>
				<div class="job_title"><?PHP echo lang("office".$row["office"]) ?></div>
				<div class="email"><a href="mailto:<?PHP echo $row["email"] ?>"><?PHP echo $row["email"] ?></a></div>
			</div>
		</div>
		<div class="detail">
			<div class="story">
				<?PHP echo $row["document"]; ?>
			</div>
			<ul class="education">
				<li class="title">EDUCATION</li>
				<?PHP foreach (json_decode($row["education"]) as $edu): ?>
				<li>
					<div class="school"><?PHP echo urldecode($edu->edu_school); ?></div>
					<div class="dep"><?PHP echo urldecode($edu->edu_dep); ?></div>
				</li>
				<?PHP endforeach; ?>
			</ul>
			<ul class="awards">
				<li class="title">AWARDS</li>
				<?PHP foreach (json_decode($row["awards"]) as $award): ?>
				<li>
					<div class="name"><?PHP echo urldecode($award->awards_name); ?></div>
					<div class="no"><?PHP echo urldecode($award->awards_no); ?></div>
				</li>
				<?PHP endforeach; ?>
			</ul>
			<ul class="exhibition"> 
				<li class="title">EXHIBITION</li>
				<?PHP foreach (json_decode($row["exhibition"]) as $exh): ?>
				<li><?PHP echo urldecode($exh->exh_name); ?></li>
				<?PHP endforeach; ?>
			</ul>
			<ul class="press">
				<li class="title">PRESS</li>
				<?PHP foreach (json_decode($row["press"]) as $press): ?>
				<li><?PHP echo urldecode($press->press_name); ?></li>
				<?PHP endforeach; ?>
			</ul>
		</div>
	</div>
</div>