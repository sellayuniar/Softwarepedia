<?php
// mengaktifkan session php
session_start();
include "../koneksi.php"; //menyisipkan file koneksi.php

$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data pengguna dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from tb_user where username='$username' and password='$password' and role='user'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = "user";
    $_SESSION['status'] = "login";
    header("location:../index.php?pesan=sukses");
} else {
    header("location:../index.php?pesan=gagal");
}
