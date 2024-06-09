<?php

session_start();

// Buat koneksi ke database
require 'function.php';

// Periksa koneksi
if ($con->connect_error) {
	die("Koneksi gagal: " . $con->connect_error);
}

// Periksa apakah pengguna sudah login sebelumnya
if (isset($_SESSION["login"])) {
	header("Location: adminpanel/admin.php");
	exit;
}

// Inisialisasi pesan kesalahan
$error = '';

// Periksa apakah data username dan password telah dikirimkan melalui form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['username']) && isset($_POST['password'])) {
		// Mengambil data dari form login
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Periksa apakah username dan password tidak kosong
		if (!empty($username) && !empty($password)) {
			// Melakukan query ke database
			$query = "SELECT * FROM user WHERE username = '$username'";
			$result = $con->query($query);

			if ($result && $result->num_rows == 1) {
				// Login berhasil
				$row = $result->fetch_assoc();
				$username = $row['username'];

				// Set session untuk username
				$_SESSION['username'] = $username;

				// Tambahkan pesan alert-success
				$success_message = "Login berhasil. Selamat datang, $username!";

				// Redirect ke halaman utama
				header("Location: adminpanel/admin.php");
				exit(); // Tambahkan exit() setelah header() untuk menghentikan eksekusi script
			} else {
				// Login gagal
				$error = "Username atau password salah.";
			}
		} else {
			// Jika salah satu atau kedua bidang input kosong
			$error = "Mohon lengkapi semua bidang.";
		}
	}
}

// Tutup koneksi ke database
$con->close();


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
	<link href="css/account.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>

	<style>
		.main_account {
			background-image: url(img/fast.jpeg);
			background-position: center;
		}
	</style>

</head>

<body>

	<div class="main clearfix position-relative">

		<div class="main_1 clearfix position-absolute top-0 w-100">

			<?php require "partials/header.php"; ?>

		</div>

		<div class="main_account clearfix">
			<section id="center" class="center_blog">
				<div class="container-xl">
					<div class="row center_o1">
						<div class="col-md-12">
							<h2 class="text-white">Account</h2>
							<h6 class="mb-0 mt-3 fw-normal col_red"><a class="text-light" href="index.php">Home</a> <span class="mx-2 text-muted">/</span> Account</h6>
						</div>
					</div>
				</div>
			</section>
		</div>

	</div>

	<section id="account" class="p_3 d-flex align-items-center" style="min-height: 100vh;">
		<div class="container-xl">
			<form id="loginForm" method="post" action="login.php">
				<div class="row justify-content-center">
					<div class="col-md-6">
						<div class="account_1l">
							<h2>Login</h2>
							<!-- cek username / password -->
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
								<?php if (isset($error) && empty($_POST['username']) && empty($_POST['password'])) : ?>
									<div class="alert alert-danger mt-1" role="alert">
										Mohon isi semua bidang!
									</div>
								<?php elseif (isset($error)) : ?>
									<div class="alert alert-danger mt-1" role="alert">
										Username atau password salah!
									</div>
								<?php endif; ?>
							<?php endif; ?>
							<!-- cek username / password -->



							<div>
								<label for="username" class="form-label textForm"></label>
								<input type="text" name="username" id="username" class="form-control mt-4 bg-transparent rounded-0" placeholder="Full Name" type="text">
							</div>

							<div class="input-group input-group-merge mt-3">
								<label for="password" class="form-labe textForml"></label>
								<input type="password" id="password" name="password" class="form-control rounded-0 border-end-0" placeholder="Enter your password">
							</div>
							<div class="d-grid login">
								<h6 class="text-uppercase text-center mt-4" id="loginButton"><a class="button_1 d-block">LOGIN</a></h6>

							</div>
							<h6 class="icon_line text-center mt-4 fw-normal">Or</h6>
							<p class="text-center mt-3">Belum punya akun ? Silahnkan daftar terlebih dahulu</p>
							<ul class="text-center mb-0">
								<li class="d-inline-block"><a class="button_1" href="register.php"><i class="fa fa-user-plus fs-3 align-middle me-1"></i> Daftar </a></li>
								<li class="d-inline-block ms-2"><a class="button_2" href="#"><i class="fa fa-google-plus fs-3 align-middle me-1"></i> with Google+</a></li>
							</ul>
						</div>
					</div>
				</div>

			</form>
		</div>

	</section>




	<?php require "partials/footer.php"; ?>



	<script>
		document.getElementById("loginButton").addEventListener("click", function() {
			document.getElementById("loginForm").submit();
		});
	</script>

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