<section class="contact">
	<div>
		<article class="info">
			<div class="en <?PHP echo ($this->uri->segment(1)=="tw")?"hide":""?>">
				<div class="danzo">DANZO STUDIO co. ltd.</div>
				<div class="address">
					<p>No 27, Aly 53, Ln 12, Sec 3, Bade Rd,</p>
					<p>Songshan Dist., Taipei City 10558</p>
					<p>Taiwan (R.O.C.)</p>
				</div>
				<div class="bottom">	
					<div class="mail">E-mail  info@danzostudio.com</div>
					<div class="phone">Phone  +886 2 2577 5575</div>
				</div>
			</div>
			<div class="tw <?PHP echo ($this->uri->segment(1)=="en")?"hide":""?>">
				<div class="danzo">蛋造設計有限公司</div>
				<div class="address">
					<p>10558 台北市松山區八德路三段12巷53弄27號</p>
				</div>
				<div class="bottom">	
					<div class="mail">連絡信箱 info@danzostudio.com</div>
					<div class="phone">電話 02 2577 5575</div>
				</div>
			</div>
		</article>
		<article class="map" id="map">

		</article>
	</div>
</section>

<script type="text/javascript">

google.maps.event.addDomListener(window, 'load', initialize);
function initialize() {
	var mapOptions = {
		center: new google.maps.LatLng(25.0458644,121.551806),
		zoom: 18,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles:[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":40}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-10},{"lightness":30}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":60}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]}]
	};
	var map = new google.maps.Map(document.getElementById("map"),mapOptions);
	var marker_image = {
		url: "<?PHP echo ASSETS_URL?>images/map_icon@2x.png",
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(12, 37),
		scaledSize: new google.maps.Size(24,37)
	};
	var main_Position = new google.maps.LatLng(25.0458644,121.551806);
	var marker = new google.maps.Marker({
		position: main_Position,
		map: map,
		optimized: false,
		size: new google.maps.Size(20, 32),
		icon: marker_image
	});
}
</script>