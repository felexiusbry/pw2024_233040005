<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Play Show | About</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">


	<style>
		.main_about {
			background-image: url(img/series-4.png);
			background-position: center;
		}
	</style>
</head>

<body>

	<div class="main clearfix position-relative">
		<div class="main_1 clearfix position-absolute top-0 w-100">
			<section id="header">

				<?php require "partials/header.php"; ?>

			</section>

		</div>
		<div class="main_about clearfix">
			<section id="center" class="center_blog">
				<div class="container-xl">
					<div class="row center_o1">
						<div class="col-md-12">
							<h2 class="text-white">About Us</h2>
							<h6 class="mb-0 mt-3 fw-normal col_red"><a class="text-light" href="#">Home</a> <span class="mx-2 text-muted">/</span> About Us</h6>
						</div>
					</div>
				</div>
			</section>
		</div>

	</div>

	<section id="feature" class="p_3">
		<div class="container-xl">
			<div class="feature_1 row">
				<div class="col-md-6">
					<div class="feature_1l clearfix">
						<h5 class="col_red">SOME FEATURES AND </h5>
						<h1>THE BENEFITS OF USING BACKHOE TODAY</h1>
						<p>We are committed to providing our customers with super exceptional service while offering our employees the best training and a working environment in which they can excel best of all place for more than a half century.</p>
						<p>This company focus has been in place for more than a half century. We are committed to providing our customers with exceptional service while offering our employees the best training best of all and a working environment.</p>
						<div class="feature_1li1 row">
							<div class="col-md-6">
								<div class="feature_1li1l clearfix">
									<h4>Building Companies</h4>
									<p>Banks &amp; Financial Institutions face a challenging & dynamic environment with…</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="feature_1li1l clearfix">
									<h4>Other Companies</h4>
									<p>Banks &amp; Financial Institutions face a challenging & dynamic environment with…</p>
								</div>
							</div>
						</div>
						<p class="mb-0">We are committed to providing our customers with super exceptional service while offering our employees the best training and a working environment in which they can excel best of all place for more than a half century.</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="feature_1r clearfix">
						<div class="grid clearfix">
							<figure class="effect-jazz mb-0">
								<a href="#"><img src="img/Frame 1 (1).png" class="w-100" alt=""></a>
							</figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php require "partials/footer.php"; ?>


	<script>
		window.onscroll = function() {
			myFunction()
		};

		var navbar_sticky = document.getElementById("navbar_sticky");
		var sticky = navbar_sticky.offsetTop;
		var navbar_height = document.querySelector('.navbar').offsetHeight;

		function myFunction() {
			if (window.pageYOffset >= sticky + navbar_height) {
				navbar_sticky.classList.add("sticky")
				document.body.style.paddingTop = navbar_height + 'px';
			} else {
				navbar_sticky.classList.remove("sticky");
				document.body.style.paddingTop = '0'
			}
		}
	</script>

	<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>