<?php

$conn = mysqli_connect("localhost", "root", "", "playshow2");


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        return false; // Username sudah terdaftar
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        return false; // Konfirmasi password tidak sesuai
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn) > 0; // Registrasi berhasil jika terdapat baris yang terpengaruh
}
