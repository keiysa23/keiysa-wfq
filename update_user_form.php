<?php
include 'koneksi.php';
// Ambil ID pengguna dari parameter URL
$user_id = isset($_GET['id']) ? $_GET['id'] : die('');


// Query untuk mengambil data pengguna berdasarkan ID
$query = "SELECT * FROM tamu WHERE data = $id";
$result = $koneksi->query($query);


if ($result->num_rows == 0) {
    die('ID Pengguna tidak ditemukan.');
}


// Ambil data pengguna
$user_data = $result->fetch_assoc();


// Tutup koneksi
$koneksi->close();
?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>


<body>


    <h2>Update User</h2>


    <form action="update_user.php" method="Post">
        <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']; ?>">


         
        <label for="tanggal">tanggal:</label>
        <input type="text" id="tanggal" name="tanggal" value="<?php echo $user_data['tanggal']; ?>" required><br>


        <label for="nama">nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $user_data['nama']; ?>" required><br>


        <label for="alamat">alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br>


        <label for="tujuan">tujuan:</label>
        <input type="text" id="tujuan" name="tujuan" value="<?php echo $user_data['tujuan']; ?>"><br>


        <label for="nope">nope:</label>
        <input type="date" id="nope" name="nope" value="<?php echo $user_data['nope']; ?>"><br>

        <label for="nokamar">nokamar:</label>
        <input type="date" id="nokamar" name="nokamar" value="<?php echo $user_data['nokamar']; ?>"><br>


        <input type="submit" value="Update User">
    </form>


</body>


</html>
