<?php
session_start(); //// mengaktifkan session php
include "../koneksi.php"; //menyisipkan file koneksi.php

$judul = $_POST['judul']; //membuat $judul untuk menyimpan data yang telah diambil dari input bernama judul
$kategori = $_POST['kategori']; //membuat $kategori untuk menyimpan data yang telah diambil dari input bernama kategori
$isi = $_POST['isi']; //membuat $isi untuk menyimpan data yang telah diambil dari input bernama isi
$tanggal = date("Y-m-d"); //membuat $tanggal untuk menyimpan data tanggal 
$username = $_SESSION['username']; //membuat $_SESSION untuk menyimpan data username yang sedang login

$rand = rand(); //membuat angka acak antara 0 dan 1
$ekstensi =  array('png', 'jpg', 'jpeg', 'gif'); //$ekstensi menyimpan array ekstensi file
$filename = $_FILES['foto']['name']; //$filename menyimpan data files foto dan name 
$ukuran = $_FILES['foto']['size']; //$ukuran menyimpan data foto dan size
$ext = pathinfo($filename, PATHINFO_EXTENSION); //$ext untuk mengembalikan jalur informasi tentang file

$log_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'"); //$log_user untuk menyimpan query tampilkan data dari tb_user ketika username sama dengan $username


while ($row_user = mysqli_fetch_assoc($log_user)) {//perualgan untuk menampilkan data
    if ($row_user['username'] == $username) { //jika username yang ada pada database sama dengan username pengguna yang sedang login
        $id_user = $row_user['id_user']; //jika id user sama
        if (empty($filename)) { //jika $filename kosong 
            $sql = "INSERT INTO tb_artikel (id_user, kategori_artikel, judul_artikel, isi_artikel, tanggal_input, status) VALUES ('$id_user','$kategori','$judul','$isi','$tanggal','pending')"; //query untuk insert data
            $data = mysqli_query($koneksi, $sql); //$data untuk meneksekusi $koneksi dan query $sql
            if ($data) { //jika $data dieksekusi tampilkan halaman pengajuan_artikel.php
                header("location:pengajuan_artikel.php");
            }
        } else { //jika tidak
            $xx = $rand . '_' . $filename; //$xx menyimpan $rand _ $file_name
            move_uploaded_file($_FILES['foto']['tmp_name'], '../image/' . $rand . '_' . $filename); //pindahkan file yang sudah diupload 
            $sql = "INSERT INTO tb_artikel (id_user, kategori_artikel, judul_artikel, isi_artikel, tanggal_input, gambar, status) VALUES ('$id_user','$kategori','$judul','$isi','$tanggal','$xx','pending')"; //query untuk menambahkan data
            $data = mysqli_query($koneksi, $sql); //$data untuk meneksekusi $koneksi dan query $sql
            if ($data) { //jika $data dieksekusi tampilkan halaman pengajuan_artikel.php
                header("location:pengajuan_artikel.php");
            }
        }
    }
}
