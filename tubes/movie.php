<?php
// koneksi database

include 'function.php';
$con = mysqli_connect("localhost", "root", "", "playshow2");
?>

<?php $queryFilm = mysqli_query($con, "SELECT id, judul, durasi, rating, kualitas, resolusi, kategori_id, gambar FROM  film "); ?>


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
    <title>Play Show | Movie</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
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

    <div class="main clearfix position-relative ">

        <?php require "partials/header.php"; ?>

        <div class="main_2 clearfix ">
            <section id="center" class="center_home">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">


                </div>
            </section>
        </div>
    </div>

    <section id="spec" class="p_3 bg_dark ">
        <div class="container-xl">
            <div class="row stream_1 text-center">
                <div class="col-md-12">
                    <h1 class="mb-0 text-white font_50 mt-5">Shows For You</h1>
                </div>
            </div>


            <div class="row spec_1 mt-4">
                <?php while ($data = mysqli_fetch_array($queryFilm)) { ?>
                    <div class="col-lg-2 pe-0 col-md-4">
                        <div class="spec_1im clearfix position-relative">
                            <div class="spec_1imi clearfix">
                                <a href="movie-detail.php?judul=<?php echo $data['judul']; ?>"><img src="adminpanel/image/<?php echo $data['gambar']; ?>" class="w-100" alt="abc"></a>
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
                        <h5 class="mb-0 text-uppercase"><a class="button" href="#"><i class="fa fa-youtube-play me-1"></i> BROWSE ALL MOVIES</a></h5>
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