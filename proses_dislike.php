<?php
session_start(); // mengaktifkan session php
include "../koneksi.php"; //menyisipkan file koneksi.php

$id = $_GET['id']; //membuat variabel $id untuk menyimpan data id yang sudah didapatkan
$username = $_SESSION['username']; //variabel $username untuk menyimpan nama user yang sedang login
$log_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'"); // membuat varibel $log_user untuk menyimpan query tampilkan data dari tb_user ketika username sama dengan $username

while ($row_user = mysqli_fetch_assoc($log_user)) { //perulangan untuk menampilkan data
    if ($row_user['username'] == $username) { //jika username yang ada pada database sama dengan username pengguna yang sedang login
        $id_user = $row_user['id_user']; //jika id user sama
        $sql = mysqli_query($koneksi, "INSERT INTO tb_rating (id_artikel, id_user, rating) VALUES ('$id','$id_user','2')"); //membuat variabel $sql untuk menyimpan query insert
        if ($sql) { //jika $sql dieksekusi tampilkan halaman itu sendiri
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
