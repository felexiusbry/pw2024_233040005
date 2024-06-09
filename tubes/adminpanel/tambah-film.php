<?php
require "koneksi.php";

$query = mysqli_query($con, "SELECT a.*, b.judul AS nama_kategori FROM film a JOIN kategori b ON a.kategori_id = b.id");
$jumlahFilm = mysqli_num_rows($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Script Sweet Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navbar -->
    <?php require "partials/navbar.php"; ?>
    <!-- Navbar -->

    <div class="container mt-5">
        <!-- breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="admin.php" class="text-decoration-none text-muted"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Film
                </li>
            </ol>
        </nav>
        <!-- breadcrumb -->

        <!-- tambah film -->
        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Film</h3>

            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                <div>
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control" required>
                </div>

                <div>
                    <label for="durasi">Durasi</label>
                    <input type="number" class="form-control" name="durasi" required>
                </div>
                <div>
                    <label for="rating">Rating</label>
                    <input type="text" class="form-control" name="rating" required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                        while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['judul']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="kualitas">kualitas</label>
                    <input type="text" class="form-control" name="kualitas" required>
                </div>
                <div>
                    <label for="resolusi">resolusi</label>
                    <input type="text" class="form-control" name="resolusi" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary mt-2" name="simpan">Simpan</button>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $judul = htmlspecialchars($_POST['judul']);
                $kategori_id = htmlspecialchars($_POST['kategori']);
                $durasi = htmlspecialchars($_POST['durasi']);
                $rating = htmlspecialchars($_POST['rating']);
                $kualitas = htmlspecialchars($_POST['kualitas']);
                $resolusi = htmlspecialchars($_POST['resolusi']);

                $target_dir = "image/";
                $nama_file = basename($_FILES["gambar"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES['gambar']['size'];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if ($judul == '' || $kategori_id == '' || $durasi == '' || $rating == '' || $kualitas == '' || $resolusi == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Judul, Kategori, Durasi, Rating, Kualitas, dan Resolusi wajib diisi
                    </div>
                    <?php
                } else {
                    if ($nama_file != '') {
                        if ($image_size > 500000) {
                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 500kb
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Format File harus jpg, png, atau gif
                                </div>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $new_name);

                                // query insert to film table
                                $queryTambah = mysqli_query($con, "INSERT INTO film (kategori_id, judul, durasi, rating, kualitas, resolusi, gambar) 
                                        VALUES ('$kategori_id', '$judul', '$durasi', '$rating', '$kualitas', '$resolusi', '$new_name')");

                                if ($queryTambah) {
                                ?>
                                    <script>
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'success',
                                            title: 'Film Berhasil ditambahkan',
                                            showConfirmButton: false,
                                            timer: 2000
                                        })
                                    </script>

                                    <meta http-equiv="refresh" content="2; url=film.php" />
            <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }
                }
            }
            ?>