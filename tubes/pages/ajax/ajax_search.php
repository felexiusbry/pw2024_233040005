<?php
// koneksi database
require '../../function.php';


// cek apakah parameter keyword ada
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // query film berdasarkan keyword
    $queryfilm = mysqli_query($con, "SELECT * FROM film WHERE judul LIKE '%$keyword%'");

    // cek jumlah hasil query
    $jumlahfilm = mysqli_num_rows($queryfilm);

    // looping hasil query
    while ($film = mysqli_fetch_array($queryfilm)) {
        // tampilkan hasil pencarian
        echo '<div class="col-md-4 mb-5 text-center">';
        echo '<div class="card h-100">';
        echo '<div class="image-box">';
        echo '<img src="../adminpanel/image/' . $film['gambar'] . '" class="card-img-top" alt="">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">' . $film['judul'] . '</h4>';
        echo '<p class="card-text mt-2"> Rating : ' . $film['rating'] . '</p>';
        echo '<a href="movie-detail.php?judul=' . $film['judul'] . '" class="btn btn-dark d-grid">Detail</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    if ($jumlahfilm == 0) {
        echo '<h4 class="text-center my-5">Movie yang anda cari tidak tersedia</h4>';
    }
}
