<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir

    $id = $_POST['id'];
    $name = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tujuan = $_POST['tujuan'];
    $nope = $_POST['nope'];
    $nokamar = $_POST['nokamar'];


    // Validasi data (tambahkan validasi sesuai kebutuhan)
    // Query untuk memperbarui data pengguna
    $query = "UPDATE tamu SET nama='$name', alamat='$alamat', tujuan='$tujuan', nope='$nope',
    nokamar='$nokamar' WHERE id='$id'";


    if ($koneksi->query($query) === TRUE) {
        header("Location:admin.php");
        die();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }


    // Tutup koneksi
    $koneksi->close();
}