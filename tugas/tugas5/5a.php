<?php 
$student = [
  
            ["nama" => "Siluman Kukang",
              "npm" => "233040001",
              "email" => "kukang@gmail.com ",
              "jurusan" => "Teknik Informatika",  
              "gambar" => "1"         
            ],
            ["nama" => "Kambing Gunung",
              "npm" => "233040029",
              "email" => "mmbeee@gmail.com ",
              "jurusan" => "Kedokteran",
              "gambar" => "2"
            ],
            ["nama" => "Lontong Tengkurep",
              "npm" => "233040035",
              "email" => "maudibalikjugasamaaja@gmail.com ",
              "jurusan" => "Teknik Sipil",  
              "gambar" => "3"           
            ],
            ["nama" => "Kesatria Lunak",
              "npm" => "233040017",
              "email" => "tidakgagahtapilunak@gmail.com ",
              "jurusan" => "Hukum",
              "gambar" => "4"
            ],
            ["nama" => "Jerapah Terbang",
              "npm" => "233040036",
              "email" => "leherpanjangbersayap@gmail.com ",
              "jurusan" => "Teknik Mesin",
              "gambar" => "5"
            ],
            ["nama" => "Buaya Jingkrak",
              "npm" => "233040006",
              "email" => "untungbukanbuayadarat@gmail.com ",
              "jurusan" => "Perencanaan Wilayah dan Kota",
              "gambar" => "6"
            ],
            ["nama" => "Banteng Loncat",
              "npm" => "233040009",
              "email" => "nocommentperbantengan@gmail.com ",
              "jurusan" => "Teknologi Pangan",
              "gambar" => "7"
            ],
            ["nama" => "Sop Pinguin",
              "npm" => "233040105",
              "email" => "kejamamat@gmail.com ",
              "jurusan" => "Teknik Industri",
              "gambar" => "8"
            ],
             ["nama" => "Lele Breakdance",
              "npm" => "233040125",
              "email" => "udahlenturdarilahir@gmail.com ",
              "jurusan" => "Teknik Lingkungan",
              "gambar" => "9"
            ],
            ["nama" => "Mangga Berduri",
              "npm" => "233040002",
              "email" => "mampuskaubukanya@gmail.com ",
              "jurusan" => "Sistem Informasi",
              "gambar" => "10"
            ]

            ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <style>
    @font-face {
        font-family: "Rubik";
        src: url(font/Rubik-Regular.woff);
    }
    
    .container {
        
        width: 500px;
        height: 2500px;
        background-color: salmon;
        padding: 5px;
        border: 2px solid black;
    }

    h1 {
        font-family: "Rubik";
    }
  </style>
</head>
<body>
    <div class="container"> 
        <h1>Daftar Mahasiswa</h1>
            <?php foreach ($student as $students) : ?>
                <ul>
                    <img src="https://randomuser.me/api/portraits/men/<?= $students['gambar'] ?>.jpg" width="150" height="150">
                    <li>Nama : <?= $students["nama"]; ?></li>
                    <li>NPM : <?= $students["npm"]; ?></li>
                    <li>Email : <?= $students["email"]; ?></li>
                    <li>Jurusan : <?= $students["jurusan"]; ?></li>
                </ul>
            <?php endforeach; ?>
    </div>
</body>
</html> 