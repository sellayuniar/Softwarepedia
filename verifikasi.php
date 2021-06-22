<?php
session_start(); // mengaktifkan session php
include "../koneksi.php"; //menyisipkan file koneksi.php

$verifikasi = $_GET['id']; //$verifikasi menyimpan data id yang telah didapat

$data = mysqli_query($koneksi, "UPDATE tb_artikel SET status = 'verified' WHERE id_artikel = $verifikasi"); //query update data

if ($data === TRUE) {//jika $data sama dengan benar maka tampilkan halaman pengajuan_artikel.php
    header("location:pengajuan_artikel.php");
}
