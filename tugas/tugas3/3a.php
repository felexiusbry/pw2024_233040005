<?php
echo "<h4> Menghitung Luas Lingkaran </h4>";
function MenghitungLuasLingkaran($i)
{
    echo "Jari-Jari = $i cm <br>";
    echo "Luas Lingkaran = " . (3.14 * $i * $i) . " cm²";
    return $i;
}

MenghitungLuasLingkaran(10);
echo "<hr>";

echo "<h4> Menghitung Luas Lingkaran </h4>";
function MenghitungKelilingLingkaran($i)
{
    echo "Jari-Jari = $i cm <br>";
    echo "Keliling Lingkaran  = " . (2 * 3.14 * $i) . " cm";
    return $i;
}

MenghitungKelilingLingkaran(20);
echo "<hr>";