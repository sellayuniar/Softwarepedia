<?php
// mengaktifkan session php
session_start();
include "../koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from tb_user where username='$username' and password='$password' and role='admin'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    $_SESSION['role'] = "admin";
    header("location:../index.php?pesan=sukses"); 
} else {
    header("location:../index.php?pesan=gagal");
}
