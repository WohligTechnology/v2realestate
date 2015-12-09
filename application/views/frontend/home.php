<body data-offset="62" data-spy="scroll" data-target=".navbar" onload="initialize()">
	<!-- ===== PAGE LOADER GRAPHIC ===== -->
	<!--
    <div id="pageloader">
        <div class="loader-img">
            <img alt="loader" src="<?php echo base_url('frontassets/img/loader.gif');?>" /> </div>
    </div>
-->

	<section id="homes">
		<!-- ======================================= -->
		<!-- ========== START PARALLAX SLIDER ========== -->
		<!-- ======================================== -->
		<!-- SlidesJS Required: Start Slides -->
		<!-- The container is used to define the width of the slideshow -->


		<div id="slides">
			<div class="slides-container">
				<div class="parallax img-overlay3" style="background-image:url(<?php echo base_url('frontassets/img/slider/skyscrapers.jpg');?>)" data-stellar-background-ratio="0.2">
					<div class="img-overlay-solid" style="background-color:rgba(60,62,71,0.3);"></div>
					<div class="caption text-center">
<!--						<div class="color-white text-center weight-300 large-caption " style="margin-top: -150px">Are you ready to be</div>-->
						<div class="logo-img"><img src="<?php echo base_url('frontassets/img/logo.png');?>" alt="VIIREALESTATE"></div>
						<div class=" text-center weight-800 super-large-caption vlogo head-h2">
							<h2 class="weight-800">v<span class="two">2 </span>REAL ESTATE PVT. LTD.</h2></div>
<!--						<h4 class="color-white text-center weight-600 uppercase " style="letter-spacing: 1px;">Find out all about us</h4>-->
						<a href="#about" class="scrollto btn btn-primary btn-outline btn-lg rounded" style="margin-top: 10px"><i class="fa fa-chevron-down" style="font-size: 16px"></i></a>
					</div>
				</div>
				<div class="parallax img-overlay3" style="background-image:url(<?php echo base_url('frontassets/img/slider/skyscrapers.jpg');?>)" data-stellar-background-ratio="0.2">
					<div class="img-overlay-solid" style="background-color:rgba(60,62,71,0.3);"></div>
					<div class="caption">
				<div class=" text-center weight-800 super-large-caption vlogo head-h2">
                        <div class="logo-img"><img src="<?php echo base_url('frontassets/img/logo.png');?>" alt="VIIREALESTATE"></div>
							<h2 class="weight-800">v<span class="two">2 </span>REAL ESTATE PVT. LTD.</h2></div>
						<br/>
						<div class="text-center"><a href="#portfolio" class="scrollto btn btn-white btn-outline" style="margin-top: 10px">Our Projects</a><a href="#about" class="scrollto btn btn-primary btn-outline" style="margin-top: 10px">About Us</a><a href="#contact" class="scrollto btn btn-white btn-outline" style="margin-top: 10px">Contact</a>
						</div>
					</div>
				</div>
			</div>
			<nav class="slides-navigation">
				<a href="#" class="next"><i class="fa fa-angle-right"></i></a>
				<a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
			</nav>
		</div>


		<!-- End SlidesJS Required: Start Slides -->
		<!-- ======================================= -->
		<!-- ========== END PARALLAX SLIDER ========== -->
		<!-- ======================================== -->
	</section>

	<!-- ======================================== -->
	<!-- =========== START ABOUT SECTION ============ -->
	<!-- ======================================== -->
	<section id="about" class="pad-left">
		<div class="fullwidth-section" style="background-color: #fff">
			<div class="container">
				<div class="abt-width">
					<div class="row" style="margin-bottom: 60px;">

						<div class="col-md-8 col-md-offset-2 text-center pdn">
							<h1 class="weight-800 kill-top-margin uppercase">About Us</h1>
							<!--							<h4 class="weight-400"> V2 REAL ESTATE PVT. LTD. is one of the fastest-growing Mumbai-based Real Estate Company.</h4>-->

						</div>
					</div>
					<!-- ========== START ICON FEATURES BOX ========== -->
					<div class="row">
						<div class="col-md-8">
							<div class="about-cont">
								<p>
									<b>V2 REAL ESTATE PVT. LTD.</b> is one of the fastest-growing Mumbai-based Real Estate Company which is conducting activities of real estate acquisition &amp; leasing. V2 Real Estate Pvt. Ltd. gives on lease prime real estate to MNCs, Consulates, Indian Corporate houses, Indian &amp; Foreign Banks &amp; Industrial houses in India’s Leading Commercial Complexes, I. T. Parks, Custom-made Warehouses, Prime Showroom spaces.</p>

								<p>V2 Real Estate Pvt. Ltd. has country-wide real estate operations and serving to multiple projects. It caters customised commercial properties to its clients and boasts of providing real-estate solutions to MNCs, Consulates, Indian Corporate houses, Banks (Indian &amp; foreign) &amp; Industrial houses.</p>

								<p>V2 Real Estate Pvt. Ltd. is renowned for strong solution-centric project execution, inhouse project management team and strategic tie-ups &amp; association with various professional agencies and brand partners. V2 Real Estate Pvt. Ltd. is associated with many national &amp; international brands as its ESTEEMED CLIENTS. V2 Real Estate Pvt. Ltd. is also having strategic partnership with India’s leading Logistic Company.
								</p>
							</div>
<!--
							<div class="pull-right">
								<a href="<?php echo site_url('/site/aboutus') ?>" class="weight-600">
                               Read More <span class="weight-500">>></span>
                            </a>
							</div>
-->
						</div>
						<div class="col-md-4 clear">
							<figure class="text-center">
								<img class="img-responsive" src="<?php echo base_url('frontassets/img/standalone_building/ML_Towers_Day.JPG');?>">
							</figure>
						</div>
					</div>
				</div>
			</div>
			<!-- END ICON FEATURES BOX -->
		</div>
	</section>
	<!-- ======================================== -->
	<!-- =========== START PORTFOLIO SECTION ============= -->
	<!-- ======================================== -->
	<section id="portfolio" class="container pad-left">
		<div class="fullwidth-section kill-bottom-padding">
			<div class="container">
				<div class=" abt-width">
				<div class="row" style="margin-bottom: 40px;">
					<div class="col-md-8 col-md-offset-2 text-center pdn wdy">
						<h1 class="weight-800 kill-top-margin uppercase">Projects</h1>

						<h4 class="weight-400">Have a look at what we've been up to. View some of our best work.</h4>
					</div>
				</div>

<div class="row">
  <ul class="nav nav-tabs project-tab  nav-justified">
		<?php foreach ($project as $key => $row) {
    ?>
    <li <?php if ($key == 0) {
    echo 'class="active"';
}
    ?> ><a data-toggle="tab" href="#project<?php echo $row->id;
    ?>"><i class="fa <?php echo $row->icon;
    ?>"></i> <?php echo $row->name;
    ?> </a></li>
		<?php

}
        ?>
  </ul>
  <div class="tab-content">
<?php foreach ($project as $key2 => $row) {
    ?>

    <div id="project<?php echo $row->id;
    ?>" class="tab-pane fade in <?php if ($key2 == 0) {
    echo 'active in';
}
    ?>">
     			<div id="project<?php echo $row->id;
    ?>" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner central-warehouse" role="listbox">
		<?php foreach ($row->images as $key => $image) {
    ?>

		<div class="item <?php if ($key == 0) {
    echo 'active';
}
    ?>">
	    <a href="<?php echo site_url("website/project?id=$row->id") ?>" on-click="">
				<img alt="loader" class="full-image" src="<?php echo base_url("uploads/$image->image");
    ?>" />
	    </a>
    </div>

		<?php
}
    ?>

  </div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#project<?php echo $row->id;
    ?>" role="button" data-slide="prev">
<!--    <span class="fa fa" aria-hidden="true"></span>-->
   <i class="fa fa-angle-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#project<?php echo $row->id;
    ?>" role="button" data-slide="next">
<!--    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
     <i class="fa fa-angle-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>

<?php
} ?>

  </div> <!-- Tab Content End -->
</div> <!-- Row End -->
				<!-- END ISOTOPE SCRIPT -->

		</div>
	</div>
        </div>
	</section>
	<!-- ======================================== -->
	<!-- =========== END PORTFOLIO SECTION ============= -->
	<!-- ======================================== -->


	<!-- ======================================== -->
	<!-- =========== START CONTACT SECTION ============= -->
	<!-- ======================================== -->
	<section id="contact" class="pad-left">
		<div class="fullwidth-section">
			<!--			<div class="parallax img-overlay4" style="background-image: url('img/slider/newyork.jpg');?>')" data-stellar-background-ratio="0.3"></div>-->
			<div class="img-overlay-solid" style="background-color:rgba(60,62,71,0.7);"></div>
			<div class="container">
				<div class="cont-width">
					<div class="row" style="margin-bottom: 20px;">
						<div class="col-md-6 col-md-offset-3 text-center">

							<h1 class="weight-800 kill-top-margin uppercase color-white">Contact Us</h1>
							<h4 class="color-white weight-400">Our support is top notch so please don't hesitate to contact us if you need some help.</h4>
						</div>
					</div>
					<!-- START FORM WRAPPER -->

					<div class="row">
						<div class="col-md-8 col-md-offset-2 ">
							<form action='<?php echo site_url('json/sendContact');?>' class="contactForm" method="post" role="form">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Your Name*</label>
											<input class="form-control" name="name" id="name" placeholder="" type="text" />
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Your Email*</label>
											<input class="form-control" name="email" id="email" placeholder="" type="email" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Comment*</label>
											<textarea class="form-control" id="message" name="message" placeholder="" rows="8"></textarea>
										</div>
										<div class="text-center">
											<br/>
											<button class="btn btn-primary btn-round submitForm" type="button">Send Message
											</button>
											<br>
											<div class="formmessage error" style="color:#CE0000;font-size: 14px;">Please fill out all required fields.</div>
											<div  class="formmessage success" style="color:#D4AE70;font-size: 14px;">Your form has been submitted.</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END FORM WRAPPER -->
			</div>
		</div>
		<!-- ======================================== -->
		<!-- ============= START MAP DISPLAY ============= -->
		<!-- ======================================== -->

		<div class="fullwidth-section" style="background-color: #F5F5F5">
			<div class="container">
				<div class="abt-width">
					<div class="row" style="margin-bottom: 20px">
						<div class="col-md-8 col-md-offset-2 text-center pdn">
							<h1 class="weight-800 kill-top-margin uppercase">Find us on the map</h1>
							<h4 class="weight-400">Call us, email us or stop by the office, we're always here for you!</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="map-wrapper">
								<div id="maps">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.155785457462!2d72.82063059999999!3d18.924497400000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7d1ec1fde5d67%3A0x4e34c6cf4eaf0073!2sArcadia+Building!5e0!3m2!1sen!2sin!4v1437828303453" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<div class="col-md-4 mid-made">
							<h4 class="uppercase weight-700" style="margin-top: 20px">Drop by the office</h4>
							<p><strong class="color-primary text-upper">V2 Real Estate Private Limited</strong>
								<br>802, Arcadia,
								<br> NCPA Road,
								<br> Nariman Point,
								<br> Mumbai - 400 021.
								<hr/>
								<h4 class="uppercase weight-700">Give us a shout</h4>
								<p><a href="mailto:v2re.contact@gmail.com" class="weight-700">v2re.contact@gmail.com</a>
									<br/>Telphone No :- 022 22884506
									<br/>Telphone No :- 022 22884546
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ======================================== -->
		<!-- ================ END MAP DISPLAY =========== -->
		<!-- ======================================== -->
	</section>
	<!-- ======================================== -->
	<!-- =========== END CONTACT SECTION ============= -->
	<!-- ======================================== -->



	<!-- ================================================== -->
	<!-- ============= START SCROLL TO TOP SCRIPT ============= -->
	<!-- ================================================== -->
	<div class="scrollup">
		<a class="scrolltotop" href="#"><i class="fa fa-angle-double-up"></i></a>
	</div>
	<!-- ================================================== -->
	<!-- ============== END SCROLL TO TOP SCRIPT ============== -->
	<!-- ================================================== -->

	<!-- ===================================== -->
	<!-- ========== START JQUERY SCRIPTS ========== -->
	<!-- ===================================== -->

	<!-- ==================================== -->
	<!-- ========== END JQUERY SCRIPTS ========== -->
	<!-- ==================================== -->
<script>
$(document).ready(function() {
	$(".formmessage.error").hide();
	$(".formmessage.success").hide();
		$(".submitForm").click(function( ) {
			var name = $(".contactForm #name").val();
			var email  = $(".contactForm #email").val();
			var message  = $(".contactForm #message").val();
			console.log(name);
			console.log(email);
			console.log(message);

			if(name && email && message && name != "" && email != "" && message != "")
			{
				console.log("click");
					$.getJSON("<?php echo site_url('json/sendContact'); ?>",{name:name,email:email,message:message},function(data) {
						console.log(data);
					});
					$(".formmessage.error").hide();
					$(".formmessage.success").hide();
					$(".formmessage.success").show();
			}
			else {
				$(".formmessage.error").hide();
				$(".formmessage.success").hide();
				$(".formmessage.error").show();
			}
			return false;
		});
});
</script>

</body>

</html>
