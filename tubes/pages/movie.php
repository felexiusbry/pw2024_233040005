<?php
// koneksi database
$con = mysqli_connect("localhost", "root", "", "playshow2");

// query kategori
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// get film by judul film/menu search
if (isset($_GET['keyword'])) {
    $queryFilm = mysqli_query($con, "SELECT * FROM film WHERE judul LIKE '%$_GET[keyword]%'");
}

// get film by kategori
else if (isset($_GET['kategori'])) {
    $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE judul='$_GET[kategori]'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);

    // query film
    $queryFilm = mysqli_query($con, "SELECT * FROM film WHERE kategori_id='$kategoriId[id]'");
}

// get film default
else {
    $queryFilm = mysqli_query($con, "SELECT * FROM film");
}

$countData = mysqli_num_rows($queryFilm);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PlayShow | Movie</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />

    <!-- Link CSS  -->
    <link rel="stylesheet" href="../css/stylefilm.css" />

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>

    <style>
        .navbar {
            background-color: black !important;
        }

        .navbar .nav-link,
        .navbar .navbar-brand,
        .navbar .navbar-toggler-icon {
            color: white !important;
        }

        .navbar .nav-link:hover,
        .navbar .navbar-brand:hover {
            color: gray !important;
        }

        .dropdown-menu {
            background-color: black;
            border: none;
        }

        .dropdown-menu .input-group {
            background-color: black;
        }

        .dropdown-menu .form-control {
            background-color: black;
            color: white;
        }

        .dropdown-menu .btn {
            background-color: black;
            color: white;
        }

        .dropdown-menu .fa-search {
            color: white;
        }
    </style>

</head>

<body>
    <!-- Awal Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md navbar-light" id="navbar_sticky">
            <div class="container-xl">
                <a class="navbar-brand fs-2 p-0 fw-bold text-white m-0 me-5" href="index.php"><img src="../img/Logo PlayShow.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-0">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">About </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="movie.php"> Movie </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../contact.php">Contact</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav mb-0 ms-auto">
                        <form class="d-flex ms-auto my-4" id="form-cari">
                            <input class="form-control me-2" type="text" placeholder="Cari Movie" aria-label="Search" name="keyword" id="keyword" />
                            <button class="btn btn-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- Akhir Navbar -->

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #fff" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item active"><a href="../index.php" class="text-decoration-none text-muted"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Movie</li>
            </ol>
        </nav>
    </div>
    <!-- Akhir Breadcrumb -->

    <!-- Kategori List -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-5 mt-2">
                <h3 class="fw-bold">Kategori</h3>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a class="text-decoration-none" href="movie.php?kategori=<?php echo $kategori['judul']; ?>">
                            <li class="list-group-item"><?php echo $kategori['judul']; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>

            <!-- Card film -->
            <div class="col-lg-9 mt-2">
                <h3 class="text-center fw-bold mb-2">List Movie</h3>
                <div class="row" id="container">
                    <?php
                    if ($countData < 1) {
                    ?>
                        <!-- tampil alert ketika barang yang dicari tidak tersedia -->
                        <h4 class="text-center my-5">Movie yang anda cari tidak tersedia</h4>
                    <?php
                    }
                    ?>

                    <!--  -->
                    <?php while ($film = mysqli_fetch_array($queryFilm)) { ?>
                        <div class="col-md-4 mb-5 text-center">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="../adminpanel/image/<?php echo $film['gambar']; ?>" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $film['judul']; ?></h4>
                                    <p class="card-text mt-2">Rating : <?php echo $film['rating']; ?></p>
                                    <a href="movie-detail.php?judul=<?php echo $film['judul']; ?>" class="btn btn-dark d-grid">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- CARD film -->
        </div>
    </div>
    <!-- Kategori List -->

    <!-- Footer -->
    <?php require "../partials/footer.php"; ?>
    <!-- Akhir Footer -->

    <!-- Script Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="ajax/ajax.js"></script>
    <!-- Script Ajax -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>


</body>

</html>