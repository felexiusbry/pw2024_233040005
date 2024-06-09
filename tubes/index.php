<?php
// koneksi database

include 'function.php';
?>

<?php $queryFilm = mysqli_query($con, "SELECT id, judul, durasi, rating, kualitas, resolusi, kategori_id, gambar FROM  film LIMIT 6"); ?>


<?php

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");


if (isset($_GET['kategori'])) {
	$queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
	$kategoriId = mysqli_fetch_array($queryGetKategoriId);

	// query produk
	$queryFilm = mysqli_query($con, "SELECT * FROM film WHERE kategori='$kategoriId[id]'");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Play Show</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

	<style>
		.spec_1im {
			position: relative;
		}

		.spec_1imi {
			position: relative;
		}

		.spec_1imi1l a {
			display: flex;
			align-items: center;
			text-decoration: none;
		}

		.spec_1imi1r {
			display: flex;
			align-items: center;
			justify-content: flex-end;
		}

		.rating {
			background-color: green;
			/* Adjust as needed */
			color: white;
			padding: 8px;
			display: inline-block;
			text-align: center;
			line-height: 1;
			border-radius: 50%;
		}

		.spec_1im1 {
			background-color: #333;
			/* Adjust as needed */
			padding: 10px;
			/* Adjust as needed */
			margin-top: 0px;
			/* Add margin to separate from the image */
			color: white;
		}

		.spec_1imi1l,
		.spec_1imi1r {
			padding-top: 10px;
		}
	</style>

</head>

<body>

	<div class="main clearfix position-relative">

		<?php require "partials/header.php"; ?>

		<div class="main_2 clearfix">
			<section id="center" class="center_home">
				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="images/hero1.jpg" class="d-block w-100" alt="...">
							<div class="carousel-caption d-md-block">
								<h5 class="text-white-50 release ps-2 fs-6">NEW RELEASES</h5>
								<h1 class="font_80 mt-4">World War II: From the Frontlines
									<h6 class="text-white"><span class="rating d-inline-block rounded-circle me-2 col_green">6.1</span> <span class="col_green">IMDB SCORE</span> <span class="col_red">Documentary, Action</span></h6>
									<p class="mt-4">Through vividly enhanced archival footage and voices from all sides of the conflict, this docuseries brings WWII to life like never before.</p>
									<h5 class="mb-0 mt-4 text-uppercase"><a class="button" href="#"><i class="fa fa-youtube-play me-1"></i> Watch Trailer</a></h5>
							</div>
						</div>
						<div class="carousel-item">
							<img src="images/hero2.jpg" class="d-block w-100" alt="...">
							<div class="carousel-caption d-md-block">
								<h5 class="text-white-50 release ps-2 fs-6">NEW RELEASES</h5>
								<h1 class="font_80 mt-4">Captain America: The First Avenger<br>
									<h6 class="text-white"><span class="rating d-inline-block rounded-circle me-2 col_green">7.3</span> <span class="col_green">IMDB SCORE</span> <span class="col_red">Action</span></h6>
									<p class="mt-4">Certain but she but shyness why cottage. Guy the put instrument sir entreaties affronting.</p>
									<h5 class="mb-0 mt-4 text-uppercase"><a class="button" href="#"><i class="fa fa-youtube-play me-1"></i> Play Movie</a></h5>
							</div>
						</div>
						<div class="carousel-item">
							<img src="images/hero3.jpg" class="d-block w-100" alt="...">
							<div class="carousel-caption d-md-block">
								<h5 class="text-white-50 release ps-2 fs-6">NEW RELEASES</h5>
								<h1 class="font_80 mt-4">Antman
									<h6 class="text-white"><span class="rating d-inline-block rounded-circle me-2 col_green">8.2</span> <span class="col_green">IMDB SCORE</span> <span class="col_red">Action</span></h6>
									<p class="mt-4">Armed with a super-suit with the astonishing ability to shrink in scale but increase in strength, cat burglar Scott Lang must embrace his inner hero and help his mentor, Dr. Hank Pym, pull off a plan that will save the world.</p>
									<h5 class="mb-0 mt-4 text-uppercase"><a class="button" href="#"><i class="fa fa-youtube-play me-1"></i> Watch Trailer</a></h5>
							</div>
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</section>
		</div>

	</div>

	<section id="stream" class="p_3">
		<div class="container-xl">
			<div class="row stream_1">
				<div class="col-md-12">
					<h6 class="col_red">ONLINE STREAMING</h6>
					<h1 class="mb-0">Watch Shows Online</h1>
				</div>
			</div>
			<div class="row stream_2 mt-4">
				<div class="col-md-3 pe-0">
					<div class="stream_2im clearfix position-relative">
						<div class="stream_2im1 clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#"><img src="img/money heist.png" class="w-100" alt="abc"></a>
								</figure>
							</div>
						</div>
						<div class="stream_2im2 position-absolute w-100 h-100 p-3 top-0  clearfix">
							<h6 class="font_14 col_red">ACTION, DRAMA</h6>
							<h4 class="text-white">Money Heist</h4>
							<h6 class="font_14 mb-0 text-white"><a class="text-white me-1 font_60 align-middle lh-1" href="#"><i class="fa fa-play-circle"></i></a> SEASON 1 - 2020</h6>
						</div>
					</div>
				</div>
				<div class="col-md-3 pe-0">
					<div class="stream_2im clearfix position-relative">
						<div class="stream_2im1 clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#"><img src="img/memory.png" class="w-100" alt="abc"></a>
								</figure>
							</div>
						</div>
						<div class="stream_2im2 position-absolute w-100 h-100 p-3 top-0  clearfix">
							<h6 class="font_14 col_red">ACTION</h6>
							<h4 class="text-white">Memory</h4>
							<h6 class="font_14 mb-0 text-white"><a class="text-white me-1 font_60 align-middle lh-1" href="#"><i class="fa fa-play-circle"></i></a> SEASON 1 - 2020</h6>
						</div>
					</div>
				</div>
				<div class="col-md-3 pe-0">
					<div class="stream_2im clearfix position-relative">
						<div class="stream_2im1 clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#"><img src="img/batman.png" class="w-100" alt="abc"></a>
								</figure>
							</div>
						</div>
						<div class="stream_2im2 position-absolute w-100 h-100 p-3 top-0  clearfix">
							<h6 class="font_14 col_red">ACTION</h6>
							<h4 class="text-white">Batman</h4>
							<h6 class="font_14 mb-0 text-white"><a class="text-white me-1 font_60 align-middle lh-1" href="#"><i class="fa fa-play-circle"></i></a> SEASON 1 - 2020</h6>
						</div>
					</div>
				</div>
				<div class="col-md-3 pe-0">
					<div class="stream_2im clearfix position-relative">
						<div class="stream_2im1 clearfix">
							<div class="grid clearfix">
								<figure class="effect-jazz mb-0">
									<a href="#"><img src="img/moonknight.png" class="w-100" alt="abc"></a>
								</figure>
							</div>
						</div>
						<div class="stream_2im2 position-absolute w-100 h-100 p-3 top-0  clearfix">
							<h6 class="font_14 col_red">ACTION, DRAMA</h6>
							<h4 class="text-white">Moon Knight</h4>
							<h6 class="font_14 mb-0 text-white"><a class="text-white me-1 font_60 align-middle lh-1" href="#"><i class="fa fa-play-circle"></i></a> SEASON 1 - 2020</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="exep" class="p_3 bg-light">
		<div class="container-xl">
			<div class="row exep1">
				<div class="col-md-6">
					<div class="exep1l">
						<div class="grid clearfix">
							<figure class="effect-jazz mb-0">
								<a href="#"><img src="img/service-banner.jpg" class="w-100" alt="abc"></a>
							</figure>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="exep1r">
						<h1 class="mb-0">Best pick for hassle-free streaming experience.</h1>
						<div class="exep1ri row mt-4">
							<div class="col-md-2">
								<div class="exep1ril">
									<span class="font_60"><i class="fa fa-suitcase lh-1 col_red"></i></span>
								</div>
							</div>
							<div class="col-md-10">
								<div class="exep1rir">
									<h5 class="fs-4">Access while traveling</h5>
									<p class="mb-0">Keep access to your entertainment content while roaming the world.Pick from thousands.</p>
								</div>
							</div>
						</div>
						<div class="exep1ri row mt-4">
							<div class="col-md-2">
								<div class="exep1ril">
									<span class="font_60"><i class="fa fa-desktop lh-1 col_red"></i></span>
								</div>
							</div>
							<div class="col-md-10">
								<div class="exep1rir">
									<h5 class="fs-4">Stream with no interruptions</h5>
									<p class="mb-0">Keep access to your entertainment content while roaming the world.Pick from thousands.</p>
								</div>
							</div>
						</div>
						<div class="exep1ri row mt-4">
							<div class="col-md-2">
								<div class="exep1ril">
									<span class="font_60"><i class="fa fa-lock lh-1 col_red"></i></span>
								</div>
							</div>
							<div class="col-md-10">
								<div class="exep1rir">
									<h5 class="fs-4">Stay secure at all times</h5>
									<p class="mb-0">Keep access to your entertainment content while roaming the world.Pick from thousands.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="spec" class="p_3 bg_dark">
		<div class="container-xl">
			<div class="row stream_1 text-center">
				<div class="col-md-12">
					<h6 class="text-white-50">FIND ANYWHERE ELSE</h6>
					<h1 class="mb-0 text-white font_50">Shows For You</h1>
				</div>
			</div>


			<div class="row spec_1 mt-4">
				<?php while ($data = mysqli_fetch_array($queryFilm)) { ?>
					<div class="col-lg-2 pe-0 col-md-4">
						<div class="spec_1im clearfix position-relative">
							<div class="spec_1imi clearfix">
								<a href="pages/movie-detail.php?judul=<?php echo $data['judul']; ?>"><img src="adminpanel/image/<?php echo $data['gambar']; ?>" class="w-100" alt="abc"></a>
							</div>
						</div>
						<div class="spec_1im1 clearfix mt-2">
							<div class="row m-0 w-100 h-100 clearfix">
								<div class="col-md-9 col-9 p-0">
									<div class="spec_1imi1l pt-2">
										<h6 class="mb-0 font_14 d-inline-block">
											<a class="bg-black d-block text-white" href="#">
												<span class="pe-2 ps-2"><?php echo $data['resolusi']; ?></span>
												<span class="bg-white d-inline-block text-black span_2"><?php echo $data['kualitas']; ?></span>
											</a>
										</h6>
									</div>
								</div>
								<div class="col-md-3 col-3 p-0">
									<div class="spec_1imi1r pt-2">
										<h6 class="text-white">
											<span class="rating d-inline-block rounded-circle me-2 col_green"><?php echo $data['rating']; ?></span>
										</h6>
									</div>
								</div>
							</div>
							<h6 class="text-light fw-normal font_14 mt-3"><?php echo $data['durasi']; ?> min
								<span class="span_1 pull-right d-inline-block">PG13</span>
							</h6>
							<h5 class="mb-0 fs-6"><a class="text-white" href="#"><?php echo $data['judul']; ?></a></h5>
						</div>
					</div>
				<?php } ?>




				<div class="row spec_1 text-center mt-5">
					<div class="col-md-12">
						<h5 class="mb-0 text-uppercase"><a class="button" href="movie.php"><i class="fa fa-youtube-play me-1"></i> BROWSE ALL MOVIES</a></h5>
					</div>
				</div>
			</div>
	</section>

	<section id="testim" class="p_3 pb-5">
		<div class="container-xl">
			<div class="row stream_1 text-center">
				<div class="col-md-12">
					<h6 class="text-uppercase col_red">Testimonials</h6>
					<h1 class="mb-0 font_50">Trusted by tech experts and <br> real users</h1>
				</div>
			</div>
			<div class="row testim_1 mt-4">
				<div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
						<button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
					</div>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="testim_1i row">
								<div class="col-md-6">
									<div class="testim_1i1 text-center p-4 pt-5 pb-5 bg_dark rounded">
										<img src="img/Photo by Bewakoof.com Official.png" alt="abc" class="rounded-circle">
										<h4 class="col_red mt-3">Ahmad Saputra</h4>
										<h6 class="fw-normal text-muted">Software Engineer</h6>
										<span class="font_60 text-white"><i class="fa fa-quote-left"></i></span>
										<p class="text-light">"Desain yang menarik dan responsif, sangat memudahkan pengguna dalam mencari dan menonton film favorit mereka."</p>
										<span class="col_red">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="testim_1i1 text-center p-4 pt-5 pb-5 bg_dark rounded">
										<img src="img/Photo by Anna Shvets.png" alt="abc" class="rounded-circle">
										<h4 class="col_red mt-3">Lina Maharani</h4>
										<h6 class="fw-normal text-muted">Digital Marketer</h6>
										<span class="font_60 text-white"><i class="fa fa-quote-left"></i></span>
										<p class="text-light">"Platform yang sempurna untuk menonton film terbaru dengan kualitas gambar dan suara yang luar biasa."</p>
										<span class="col_red">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="testim_1i row">
								<div class="col-md-6">
									<div class="testim_1i1 text-center p-4 pt-5 pb-5 bg_dark rounded">
										<img src="img/Photo by Gregory Hayes.png" alt="abc" class="rounded-circle">
										<h4 class="col_red mt-3">Rudi Pratama</h4>
										<h6 class="fw-normal text-muted">Kritikus Film</h6>
										<span class="font_60 text-white"><i class="fa fa-quote-left"></i></span>
										<p class="text-light">"Antarmuka yang ramah pengguna dan koleksi film yang selalu up-to-date, sangat direkomendasikan."</p>
										<span class="col_red">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="testim_1i1 text-center p-4 pt-5 pb-5 bg_dark rounded">
										<img src="img/Photo by reham youssef.png" alt="abc" class="rounded-circle">
										<h4 class="col_red mt-3">Siti Rahmawati</h4>
										<h6 class="fw-normal text-muted">Desainer Grafis</h6>
										<span class="font_60 text-white"><i class="fa fa-quote-left"></i></span>
										<p class="text-light">"Fitur streaming yang lancar dan kualitas HD membuat pengalaman menonton jadi lebih menyenangkan."</p>
										<span class="col_red">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="contact_h" class="p_3 bg-light">
		<div class="container-xl">
			<div class="row contact_h_1">
				<div class="col-md-6">
					<div class="contact_h_1l">
						<div class="grid clearfix">
							<figure class="effect-jazz mb-0">
								<a href="#contact_h"><img src="img/card.png" class="w-100" alt="abc"></a>
							</figure>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact_h_1r bg-white">
						<h3>Feel Free to Contact Us</h3>
						<p class="mb-3">Distinctively exploit optimal alignments for intuitive coordinate business applications technologies</p>
						<input class="form-control mt-3" placeholder="Name" type="text">
						<input class="form-control mt-3" placeholder="Phone" type="text">
						<input class="form-control mt-3" placeholder="Email" type="text">
						<h6 class="mb-0 mt-4"><a class="button_1 d-block text-center" href="#">REQUEST FOR SUBMIT</a></h6>
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