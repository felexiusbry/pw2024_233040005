function hapus($id)
(
    $conn = koneks();

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id ="
    $id");
    return mysqli_affected_rows($conn);
)