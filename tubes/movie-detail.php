<?php
// koneksi database
include 'function.php';
$con = mysqli_connect("localhost", "root", "", "playshow2");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$judul = htmlspecialchars($_GET['judul']);
$queryFilm = mysqli_query($con, "SELECT * FROM film WHERE judul='$judul'");
$queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE judul='$judul'");

if (!$queryFilm || !$queryKategori) {
    die("Query failed: " . mysqli_error($con));
}

$film = mysqli_fetch_array($queryFilm);
$kategori = mysqli_fetch_array($queryKategori);

if (!$film) {
    die("No film found with the given title.");
}

// Function to safely use htmlspecialchars
function safe_htmlspecialchars($value)
{
    return $value !== null ? htmlspecialchars($value) : '';
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
        body {
            background-color: #000;
            /* Set the background color to black */
        }

        .card {
            background-color: #333;
            /* Set card background to dark gray for contrast */
            color: #fff;
            /* Set text color to white for readability */
        }

        .mt-custom {
            margin-top: 5rem;
            /* Custom margin for extra spacing */
        }
    </style>
</head>

<body>

    <div class="main clearfix position-relative ">

        <?php require "partials/header.php"; ?>

        <div class="main_2 clearfix mt-custom"> <!-- Added custom margin class -->

            <section id="movie-details" class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <img src="adminpanel/image/<?php echo safe_htmlspecialchars($film['gambar']); ?>" class="card-img-top" alt="<?php echo safe_htmlspecialchars($film['judul']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo safe_htmlspecialchars($film['judul']); ?></h5>
                                    <p class="card-text">
                                        <strong>IMDB Score:</strong> <span class="badge bg-success"><?php echo safe_htmlspecialchars($film['rating']); ?></span><br>
                                        <strong>Category:</strong> <span class="badge bg-danger"><?php echo safe_htmlspecialchars($film['kategori_id']); ?></span>
                                    </p>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-youtube-play me-1"></i> Watch Trailer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

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