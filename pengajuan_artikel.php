<?php
include "../koneksi.php"; //menyisipkan file header.php
include "../layout/header.php"; //menyisipkan file koneksi.php

$data = mysqli_query($koneksi, "select * from tb_artikel order by id_artikel DESC "); //menampilkan data dari tb_artikel diurutkan dari angka id_artikel terbesar
$username = $_SESSION['username']; //membuat variabel username untuk menyimpan user yang sudah login
$log_admin = mysqli_query($koneksi, "select * from tb_user where username='$username' and role='admin' "); //membuat variabel $log_admin untuk menampilkan data dari tb_user dengan role admin
$log_user = mysqli_query($koneksi, "select * from tb_user where username='$username' and role='user'"); //membuat variabel $log_user untuk menampilkan data dari tb_user dengan role user

?>

<div class="container"> <!--untuk menampung tampilan  -->
  <div class="row justify-content-center mt-5"> <!-- membuat baris dengan konten rata tengah  -->
    <div class="col-md-12"> <!-- membuat kolom medium dengan ukuran 12  -->
      <div class="card"> <!-- membuat tampilan card -->
        <div class="card-header bg-transparent mb-0"> <!-- membuat tampilan card-header  -->
            <div class="rata-tengah"> <!-- membuat konten rata tengah -->
            <div class="happy"> <!-- memanggil font -->
                <h1>Pengajuan <span class="font-weight-bold text-primary"> Artikel</h1> <!-- membuat teks  -->
            </div>
            </div>
        </div>
            
         
            
            <div class="card-body"> <!-- membuat tampilan card-bdoy -->
                <?php if ($_SESSION['role'] == 'user') { //jika role sama dengan user
                ?>   
                
                <br>
                <div class="rata-kiri"> <!-- conten rata kiri -->
                    <a class="btn btn-success" href="tambah_artikel.php">
                       <i class="bi bi-plus-circle"></i> Tambah Artikel
                    </a> <!-- membuat button tambah artikel -->
                </div>
                <?php
                } ?>
            
       
        
        <div class="table-responsive"> <!-- membuat tabel responsive -->
        <table class="table"> <!-- membuat tabel -->
            <?php if ($_SESSION['role'] == 'admin') { //jika role sama dengan admmin
            ?>
                <thead class="bg-primary text-white" > <!-- membuat header tabel warna biru dengan text putih -->
                    <tr> 
                    <!-- membuat header tabel-->
                        <th scope="col">No</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
            <?php } ?>
            <?php
            $no = 1; // membuat varibel $no = 1
            ?>
            <tbody>
                <?php
                while ($row_admin = mysqli_fetch_assoc($log_admin)) { //perulangan untuk menampikan data jika login sebagai admin
                    if ($row_admin['role'] == 'admin') { //jika role admin
                        while ($data_artikel = mysqli_fetch_assoc($data)) {//perulangan untuk menampilkan data
                ?>
                            <tr> <!-- membuat baris -->
                                <td><?php echo $no++ ?></td> <!-- membuat kolom dengan isi no  -->
                                <td>
                                    <?php //untuk menampilkan username pembuat artikel
                                    $data_user = mysqli_query($koneksi, "select * from tb_user");
                                    while ($row_user = mysqli_fetch_assoc($data_user)) {
                                        if ($data_artikel['id_user'] == $row_user['id_user']) {
                                            echo ucfirst($row_user['username']);
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?php 
                                        if ($data_artikel['gambar'] == null || $data_artikel['gambar'] == '') { //jika gambar kosong tampilkan gambar dari link https://i.stack.imgur.com/y9DpT.jpg
                                        ?>
                                            <img src="https://i.stack.imgur.com/y9DpT.jpg" width="100" class="img-fluid"/>
                                        <?php
                                        } else { //jika tidak tampilkan gambar dari folder gambar
                                        ?>
                                            <img src="../image/<?php echo $data_artikel['gambar'] ?>" width="100" class="img-fluid" />
                                        <?php
                                        }
                                        ?> 
                                </td>
                                <td><?php echo $data_artikel['judul_artikel'] ?></td> <!--menampilkan data judul artikel  -->
                                <td><?php echo $data_artikel['kategori_artikel'] ?></td> <!-- menampilkan data kategori artikel -->
                                <td><?php echo substr($data_artikel['isi_artikel'], 0, 300) . "..." ?></td> <!-- menampilkan isi artikel dari karakter 0 sampai dengan 300 -->
                                <td><?php echo $data_artikel['tanggal_input'] ?></td> <!--menampilkan data tanggal input  -->
                                <td><?php echo $data_artikel['status'] ?></td> <!--menampilkan status artikel  -->
                                <td>
                                    <?php
                                    if ($data_artikel['status'] == 'pending') { //jika status sama dengan pending
                                    ?>
                                        <a class="btn btn-sm btn-primary" href="/pages/verifikasi.php?id=<?php echo $data_artikel['id_artikel'] ?>"> <i class="bi bi-check-lg"></i> Verifikasi</a> <!-- membuat link ke file verifikasi.php -->
                                        <a class="btn btn-sm btn-danger" href="/pages/tolak.php?id=<?php echo $data_artikel['id_artikel'] ?>"> <i class="bi bi-x-lg"></i>Tolak</a> <!-- membuat link ke file tolak.php  -->
                                    <?php
                                    } else {//jika tidak tampilkan teks -
                                    ?>
                                        -
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm text-white" href="/pages/detail_artikel.php?id=<?php echo $data_artikel['id_artikel'] ?>"><i class="bi bi-eye-fill text-white"></i>Lihat</a> <!-- membuat link readmore -->
                                </td>
                            </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <table class="table"> <!-- membuat tabel  -->
            <?php if ($_SESSION['role'] == 'user') { //jika role sama dengan user
            ?>
                <thead class="bg-primary text-white"> <!--membuat header tabel warna biru dengan text putih  -->
                    <tr> 
                    <!-- membuat header tabel -->
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
            <?php } ?>
            <tbody>
                <?php
                while ($row_user = mysqli_fetch_assoc($log_user)) { //perulangan untuk nampilkan data sesuai dengan user yang sedang login
                    if ($row_user['role'] == 'user') {//
                        while ($data_artikel = mysqli_fetch_assoc($data)) {
                            if ($data_artikel['id_user'] == $row_user['id_user']) {
                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td> <!-- mrmbust kolom yang menampilkan variabel $no -->
                                    <td>
                                        <?php 
                                        if ($data_artikel['gambar'] == null || $data_artikel['gambar'] == '') {//jika gambar kosong tampilkan gambar dari link https://i.stack.imgur.com/y9DpT.jpg
                                        ?>
                                            <img src="https://i.stack.imgur.com/y9DpT.jpg" width="100" class="img-fluid" />
                                        <?php 
                                        } else { //jika tidak tampilkan gambar dari folder gambar
                                        ?>
                                            <img src="../image/<?php echo $data_artikel['gambar'] ?>" width="100" class="img-fluid" />
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $data_artikel['judul_artikel'] ?></td> <!-- menampikan data judul artikel -->
                                    <td><?php echo $data_artikel['kategori_artikel'] ?></td> <!-- menampilkan data kategori artikel -->
                                    <td><?php echo substr($data_artikel['isi_artikel'], 0, 300) ?></td> <!-- menampilkan isi artikel dari karakter 0 sampai dengan 300  -->
                                    <td><?php echo $data_artikel['tanggal_input'] ?></td> <!-- menampilkan tanggal input  -->
                                    <td><?php echo $data_artikel['status'] ?></td> <!-- menampikan data status artikel  -->
                                    <td>
                                        <?php
                                        if ($data_artikel['status'] == 'pending') { //jika status sama dengan pending
                                        ?>
                                            <a class="btn btn-sm btn-primary" href="/pages/ubah_artikel.php?id=<?php echo $data_artikel['id_artikel'] ?>"> <i class="bi bi-pencil-square"></i> Ubah</a> <!-- membuat link ke file ubah_artikel.php -->
                                            <a class="btn btn-sm btn-danger" href="/pages/hapus_artikel.php?id=<?php echo $data_artikel['id_artikel'] ?>"><i class="bi bi-trash-fill"></i>Hapus</a> <!-- membuat link ke file hapus_artikel.php -->
                                        <?php
                                        } else { //jika tidak
                                        ?>
                                            <a class="btn btn-sm btn-primary " href="/pages/ubah_artikel.php?id=<?php echo $data_artikel['id_artikel'] ?>"> <i class="bi bi-pencil-square"></i> Ubah</a> <!-- membuat link ke file ubah_artikel.php -->
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm text-white" href="/pages/detail_artikel.php?id=<?php echo $data_artikel['id_artikel'] ?>"><i class="bi bi-eye-fill text-white"></i>Lihat</a> <!-- membuat link ke file detail_artikel.php -->
                                    </td>
                                </tr>
                <?php
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php
    include("../layout/footer.php"); //menyisipkan file footer.php
    ?>