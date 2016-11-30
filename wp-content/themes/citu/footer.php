<section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="logo logo-white hide-sm-tablet"></div>
				<div class="social-links show-sm-tablet">
					<span>
						<a href="<?php echo get_option('abv_options_theme')['soc_f'] ?>" class="subs-icon fb"></a>
						<a href="<?php echo get_option('abv_options_theme')['soc_vk'] ?>" class="subs-icon in"></a>
						<a href="<?php echo get_option('abv_options_theme')['soc_inst'] ?>" class="subs-icon insta"></a>
					</span>
				</div>
			</div>
			<div class="col-md-6 col-md-offset-1 footer-central-text">
				<div class="">
					<p>2016 ConnectIT! Ukraine,  LLC. All rights reserved | <a href="#">Privacy Policy</a></p>
					<a href="<?php echo AbvFunctions::add_protocol_to_link(get_option('abv_options_theme')['email'],'email') ?>" class="footer-mail">
						<?php echo get_option('abv_options_theme')['email'] ?>
					</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="social-links hide-sm-tablet">
					<span>
						<a href="<?php echo get_option('abv_options_theme')['soc_f'] ?>" class="subs-icon fb"></a>
						<a href="<?php echo get_option('abv_options_theme')['soc_vk'] ?>" class="subs-icon in"></a>
						<a href="<?php echo get_option('abv_options_theme')['soc_inst'] ?>" class="subs-icon insta"></a>
					</span>
				</div>
			</div>
		</div>
	</div>
</section><!-- footer section end-->
<section class="cellar">
	<span>made by <a href="#">nest</a></span>
</section><!-- cellar section end-->

<?php wp_footer(); ?>
<script type="text/javascript">
	var map;
	function initMap() {
	  map = new google.maps.Map(document.getElementById('map'), {
	    center: {lat: -34.397, lng: 150.644},
	    zoom: 8,
		  scrollwheel: false,
		  navigationControl: false,
		  mapTypeControl: false,
		  scaleControl: false,
		  scaleControl: false,
		  streetViewControl: false,
		  rotateControl: false
	  });
	}
    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvg6ly2yFkg4LMQfvvJJzRiuLcSDdU2ms&callback=initMap">
    </script>
</body>
</html>
