<?php
// koneksi database
require '../function.php';


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if 'judul' is set in the URL
if (!isset($_GET['judul']) || empty($_GET['judul'])) {
    die("Error: 'judul' parameter is missing in the URL.");
}

$judul = $_GET['judul'];

// Prepare statement
$stmt = $con->prepare("SELECT * FROM film WHERE judul = ?");
$stmt->bind_param("s", $judul);
$stmt->execute();
$queryFilm = $stmt->get_result();

if ($queryFilm->num_rows == 0) {
    die("No film found with the given title.");
}

$film = $queryFilm->fetch_assoc();

// Get the category
$kategori_id = $film['kategori_id'];
$stmt = $con->prepare("SELECT * FROM kategori WHERE id = ?");
$stmt->bind_param("i", $kategori_id);
$stmt->execute();
$queryKategori = $stmt->get_result();

if ($queryKategori->num_rows == 0) {
    die("No category found for the given film.");
}

$kategori = $queryKategori->fetch_assoc();

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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/global.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
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

                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <!-- Akhir Navbar -->

        <div class="main_2 clearfix mt-custom"> <!-- Added custom margin class -->

            <section id="movie-details" class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <img src="../adminpanel/image/<?php echo safe_htmlspecialchars($film['gambar']); ?>" class="card-img-top" alt="<?php echo safe_htmlspecialchars($film['judul']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo safe_htmlspecialchars($film['judul']); ?></h5>
                                    <p class="card-text">
                                        <strong>IMDB Score:</strong> <span class="badge bg-success"><?php echo safe_htmlspecialchars($film['rating']); ?></span><br>

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

    <?php require "../partials/footer.php"; ?>

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