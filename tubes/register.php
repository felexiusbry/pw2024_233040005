<?php
require 'function.php';


// Pesan default
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pengecekan apakah username dan password kosong
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Mohon isi semua bidang.";
    } else {
        // Pengecekan apakah password 1 dan password 2 cocok
        if ($_POST['password'] !== $_POST['password2']) {
            $error = "Konfirmasi password tidak sesuai.";
        }
        // Registrasi jika tidak ada kesalahan
        if (registrasi($_POST) > 0) {
            $message = "User baru berhasil ditambahkan!";
?>
            <meta http-equiv="refresh" content="1; url=login.php" />
<?php
        } else {
            echo mysqli_error($conn);
        }
    }
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
    <link href="css/account.css" rel="stylesheet">
    <link href="css/contact.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/06244ba418.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>


    <style>
        .main_account {
            background-image: url(img/hero1.jpg);
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
                            <h6 class="mb-0 mt-3 fw-normal col_red"><a class="text-light" href="#">Home</a> <span class="mx-2 text-muted">/</span> Account</h6>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <section id="account" class="p_3 d-flex align-items-center" style="min-height: 100vh;">
        <div class="container-xl">
            <form id="registerForm" method="post" action="">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="account_1l">
                            <h2>Create Account</h2>

                            <!-- Alert -->
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
                                <?php if (isset($error) && (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2']))) : ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        Mohon isi semua bidang!
                                    </div>
                                <?php elseif (isset($error)) : ?>
                                    <div class="alert alert-danger mt-2" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!-- Alert -->

                            <div>
                                <!-- Alert -->
                                <?php if (!empty($message)) : ?>
                                    <div class="alert alert-success mt-2" role="alert">
                                        <?php echo $message; ?>
                                    </div>
                                <?php endif; ?>
                                <!-- Alert -->
                            </div>

                            <div>
                                <label for="username" class="form-label textForm"></label>
                                <input type="text" name="username" id="username" class="form-control mt-4 bg-transparent rounded-0" placeholder="Full Name" type="text">
                            </div>

                            <div class="input-group input-group-merge mt-3">
                                <label for="password" class="form-labe textForml"></label>
                                <input type="password" id="password" name="password" class="form-control rounded-0 border-end-0" placeholder="Enter your password">
                            </div>

                            <div class="input-group input-group-merge mt-3">
                                <label for="password2" class="form-labe textForml"></label>
                                <input type="password" id="password2" name="password2" class="form-control rounded-0 border-end-0" placeholder="Ulangi Password">
                            </div>
                            <div class="d-grid login">
                                <h6 class="text-uppercase text-center mt-4" id="registerButton"><button type="submit" name="register" class="button_1 d-block">REGISTER</button></h6>


                            </div>
                            <h6 class="icon_line text-center mt-4 fw-normal">Or</h6>
                            <p class="text-center mt-3">Sudah punya akun ? Silahkan Login</p>
                            <ul class="text-center mb-0">
                                <li class="d-inline-block"><a class="button_1" href="login.php"><i class="fa-solid fa-right-to-bracket fs-3 align-middle me-1"></i> Login</a></li>
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
        // Perhatikan penyesuaian ID di sini
        document.getElementById("registerButton").addEventListener("click", function() {
            document.getElementById("registerForm").submit();
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