<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Play Show | Contact</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/about.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">

	<style>
		.main_contact {
			background-image: url(img/fast.jpeg);
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
		<div class="main_contact clearfix">
			<section id="center" class="center_blog">
				<div class="container-xl">
					<div class="row center_o1">
						<div class="col-md-12">
							<h2 class="text-white">Contact</h2>
							<h6 class="mb-0 mt-3 fw-normal col_red"><a class="text-light" href="#">Home</a> <span class="mx-2 text-muted">/</span> Contact</h6>
						</div>
					</div>
				</div>
			</section>
		</div>

	</div>

	<section id="contact" class="p_3">
		<div class="container-xl">
			<div class="row contact_1 m-0 mb-5">
				<div class="col-md-4">
					<div class="contact_1i row">
						<div class="col-md-2">
							<div class="contact_1il">
								<span class="col_red fs-1"><i class="fa fa-building"></i></span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="contact_1ir">
								<h5>Univeritas Pasundan</h5>
								<h6 class="mb-0">Find Us</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact_1i row">
						<div class="col-md-2">
							<div class="contact_1il">
								<span class="col_red fs-1"><i class="fa fa-phone"></i></span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="contact_1ir">
								<h5>1-234-567-8900</h5>
								<h6 class="mb-0">Make a call</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact_1i row">
						<div class="col-md-2">
							<div class="contact_1il">
								<span class="col_red fs-1"><i class="fa fa-envelope-o"></i></span>
							</div>
						</div>
						<div class="col-md-10">
							<div class="contact_1ir">
								<h5>bryanqwertyas@gmail.com</h5>
								<h6 class="mb-0">Drop us a line</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row contact_2">
				<div class="col-md-6">
					<div class="contact_2l">
						<div class="blog_1d3i row">
							<div class="col-md-6">
								<div class="blog_1d3il">
									<input placeholder="Name" class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="blog_1d3il">
									<input placeholder="Enter Email" class="form-control" type="text">
								</div>
							</div>
						</div>
						<div class="blog_1d3i  row">
							<div class="col-md-12">
								<div class="blog_1d3il">
									<input placeholder="Your Phone" class="form-control mt-4" type="text">
								</div>
							</div>

						</div>
						<div class="blog_1d3i  row">
							<div class="col-md-12">
								<div class="blog_1d3il">
									<textarea placeholder="Write a Message" class="form-control form_text mt-4"></textarea>
									<h5 class="mt-4"><a class="button_1" href="#">Send Message </a></h5>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact_2r">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.548154224636!2d107.58747861421565!3d-6.891826295007834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e691ce89d674d3f%3A0xa93d5a6d2040e3d2!2sUniversitas%20Pasundan!5e0!3m2!1sen!2sid!4v1645680284159" height="420" style="border:0; width:100%;" allowfullscreen=""></iframe>
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

</body>

</html>