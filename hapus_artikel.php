<?php
session_start(); // mengaktifkan session php
include "../koneksi.php"; //menyisipkan file koneksi.php

$hapus = $_GET['id']; //membuat variabel $hapus untuk menyimpan id

$data = mysqli_query($koneksi, "DELETE FROM tb_artikel WHERE id_artikel = $hapus"); //membuat query delete

if ($data === TRUE) { //jika hapus data berhasil tampilkan halaman pengajuan artikel
    header("location:pengajuan_artikel.php");
}
