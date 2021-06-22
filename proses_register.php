<?php
// mengaktifkan session php
session_start();
//menyisipkan file koneksi.php
include "koneksi.php";

//mendapatkan dara dari method post
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// query untuk memasukan data
$sql = mysqli_query($koneksi, "INSERT INTO tb_user (email, username, password, role) VALUES ('$email','$username','$password','user')"); 

if ($sql) { //jika sql diekseskusi tampilkan file login_pengguna php
    
    header("location:pengguna/login_pengguna.php"); 
}else{ //jika tidak tampilkan gagal
    echo "gagal";
}
