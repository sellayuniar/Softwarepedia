<?php
include("layout/header.php");  //menyisipkan file header.php
include "koneksi.php";//menyisipkan file koneksi.php
$data = mysqli_query($koneksi, "select * from tb_artikel where status = 'verified' order by id_artikel DESC"); //membuat variabel $data yang menyimpan query untuk menampilkan data dari tb_artikel ketika statusnya verified diurutkan dari angka id_artikel terbesar
?>
<div class="container mb-5"> <!-- untuk menampung tampilan boostrap dan memiliki margin bawah 5 -->
    <?php
    while ($data_artikel = mysqli_fetch_assoc($data)) {//perulangan untuk menampilkan data
    ?>
       <div class="card mb-4 mt-4"> <!-- membuat tampilan card  -->
            <!-- <a href="#!"><img class="card-img-top" src="$" /></a> -->
            <div class="card-body"> <!-- membuat tampilan card-body  -->
                <div class="row"> <!-- membuat baris -->
                    <div class="col-4"> <!-- membuat kolom dengan ukuran 4 -->
                        <?php if (empty($data_artikel['gambar'])) {//jika gambar kosong tampilkan gambar dari link https://i.stack.imgur.com/y9DpT.jpg
                        ?>
                            <img src="https://i.stack.imgur.com/y9DpT.jpg" class="img-fluid" width="100%" /> 
                        <?php
                        } else {//jika tidak tampilkan gambar dari folder gambar
                        ?>
                            <img src="../image/<?php echo $data_artikel['gambar'] ?>" class="img-fluid" width="100%" /> 
                        <?php
                        } ?>
                    </div>
                    <div class="col-8"> <!-- membuat kolom dengan ukuran 8 -->
                        <div class="happy"> <!-- memanggil font -->
                        <h2 class="card-title"><?php echo $data_artikel['judul_artikel'] ?></h2> <!--menampikan data judul artikel  -->
                        </div>
                         <div class="small text-muted"> <!-- membuat tampilan text -->
                            Penulis <?php //menampilkan username user yang membuat artikel
                                    $data_user = mysqli_query($koneksi, "select * from tb_user");
                                    while ($row_user = mysqli_fetch_assoc($data_user)) {
                                        if ($data_artikel['id_user'] == $row_user['id_user']) {
                                            echo ucfirst($row_user['username']);
                                        }
                                    }
                                    ?> 
                            <br>
                            <?php echo $data_artikel['tanggal_input'] ?> <!-- menampilkan tanggal input  -->
                            <h6>
                                <span class="badge bg-info"> 
                                    <?php echo ucfirst($data_artikel['kategori_artikel']) ?> <!-- menampilkan data kategori artikel -->
                                </span>
                            </h6>
                        </div>
                        
                        <p class="card-text"><?php echo substr($data_artikel['isi_artikel'], 0, 300) . "..." ?></p> <!--  menampilkan isi artikel dari karakter 0 sampai dengan 300-->
                        <a class="btn btn-primary" href="/pages/detail_artikel.php?id=<?php echo $data_artikel['id_artikel'] ?>">Read more <i class="bi bi-arrow-right"></i> </a> <!-- membuat link readmore  -->
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php
include("layout/footer.php"); //menyisipkan file footer.php
?>