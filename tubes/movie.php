<?php
// koneksi database
$con = mysqli_connect("localhost", "root", "", "playshow2");

// query kategori
$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

// get film by judul film/menu search
if (isset($_GET['keyword'])) {
    $queryFilm = mysqli_query($con, "SELECT * FROM film WHERE judul LIKE '%$_GET[keyword]%'");
}

// get produk default
else {
    $queryProduk = mysqli_query($con, "SELECT * FROM judul");
}

$countData = mysqli_num_rows($queryProduk);


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
    <link rel="stylesheet" href="css/styleProduk.css" />

</head>

<body>
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../assets/logo2.png" alt="Logo" width="50" height="50" class="me-2" />
                Jo.<strong>Store</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto my-4" id="form-cari">
                    <input class="form-control me-2" type="text" placeholder="Cari Barang Anda" aria-label="Search" name="keyword" id="keyword" />
                    <button class="btn btn-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">Login User <i class="fa fa-sign-out fa-md" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Breadcrumb -->
    <div class="container">
        <nav aria-label="breadcrumb" style="background-color: #fff" class="mt-3">
            <ol class="breadcrumb p-3">
                <li class="breadcrumb-item active"><a href="../index.php" class="text-decoration-none text-muted"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
                        <a class="text-decoration-none" href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                            <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>

            <!-- Card Produk -->
            <div class="col-lg-9 mt-2">
                <h3 class="text-center fw-bold mb-2">Produk</h3>
                <div class="row" id="container">
                    <?php
                    if ($countData < 1) {
                    ?>
                        <!-- tampil alert ketika barang yang dicari tidak tersedia -->
                        <h4 class="text-center my-5">Produk yang anda cari tidak tersedia</h4>
                    <?php
                    }
                    ?>

                    <!--  -->
                    <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-md-4 mb-5 text-center">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="../adminpanel/image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                                    <p class="card-text mt-2">Rp.<?php echo $produk['harga']; ?></p>
                                    <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn btn-dark d-grid">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- CARD PRODUK -->
        </div>
    </div>
    <!-- Kategori List -->

    <!-- Footer -->
    <footer class="bg-dark text-white p-4" id="footer">
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-6 text-md-start text-center pt-2 pb-2">
                    <span>Copyright &copy;2023 | Created by <a href="#" class="text-decoration-none text-white fw-bold">Dzikri Setiawan</a> </span>
                </div>

                <div class="col-md-6 text-md-end text-center pt-2 pb-2">
                    <a href="https://instagram.com/dzikrisee" target="_blank" class="text-decoration-none">
                        <i class="fa fa-instagram fa-xl text-white " aria-hidden="true"></i>
                    </a>
                    <a href="https://twitter.com/dzikriseee#" target="_blank" class="text-decoration-none ms-1">
                        <i class="fa fa-twitter fa-xl text-white" aria-hidden="true"></i>
                    </a>
                    <a href="https://github.com/dzikrisee" target="_blank" class="text-decoration-none ms-1">
                        <i class="fa fa-github fa-xl text-white" aria-hidden="true"></i>
                    </a>

                </div>
            </div>
        </div>
    </footer>
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