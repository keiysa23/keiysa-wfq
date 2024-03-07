<?php
include "koneksi.php";
// buat session start

//panggil koneksi database
if($_SERVER['REQUEST_METHOD']=="POST") {
@$pass = md5($_POST['password']);
@$username =mysqli_escape_string($koneksi, $_POST['username']);
@$password =mysqli_escape_string($koneksi, $pass);

$login =mysqli_query($koneksi, "SELECT * FROM tuser where username = '$username' and password = '$password' and status = 
'aktif' ");

$data = mysqli_fetch_array($login);
//uji jika username dan password ditemukan/sesuai
if($data){
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];
    $_SESSION['status'] = $data['status'];


    
    // arahkan ke halaman admin
    header('location:admin.php');
}else{
    echo "<script>
          alert('Login gagal. Periksa kembali username dan password anda');
          
          document.location='index.php';
    </script>";
}

}
?>