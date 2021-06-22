<?php
include "../koneksi.php"; //untuk menyisipkan file koneksi.php
include "../layout/header.php"; //untuk menyisipkan file header.php

$id = $_GET['id']; //membuat variabel id untuk mengambil data id

$data = mysqli_query($koneksi, "SELECT * FROM tb_artikel WHERE id_artikel = '$id'"); //Membuat $data untuk menyimpan query untuk menyeleksi data yang sesuai dengan id

while ($row = mysqli_fetch_assoc($data)) { //perulangan untuk menampilkan datas
?>

    <div class="row justify-content-center mt-5"> <!-- membuat baris dengan konten rata tengah -->
    <div class="col-md-8"> <!-- membuat kolom dengan ukuran medium 8 -->
      <div class="card"> <!-- membuat tampilan card -->
        <div class="card-header bg-transparent mb-0"> <!-- membuat card header  -->
            <div class="happy"> <!-- memanggil font -->
            <div class="rata-tengah"> <!-- membuat konten rata tengah -->
            <h2><?php echo $row['judul_artikel'] ?></h2> <!-- menampilakan judul artikel -->
            </div>
            </div>
            
            <div class="rata-tengah"> <!-- membuat konten rata-tengah -->
            <span>  Penulis <?php //menampilkan nama user yang membuat artikel
                                $data_user = mysqli_query($koneksi, "select * from tb_user");
                                while ($row_user = mysqli_fetch_assoc($data_user)) {
                                if ($row['id_user'] == $row_user['id_user']) {
                                echo ucfirst($row_user['username']);
                                  }
                                }
                                ?>
                            </span> <br>
            <span><?php echo $row['tanggal_input'] ?></span><br> <!-- menampilkan tanggal input -->
            <span class="badge bg-dark"><?php echo ucfirst($row['kategori_artikel']) ?></span> <!-- menampilkan kategori artikel -->
        </div>
        </div>
        <br>
        
        <div class="card-body"> <!-- membuat tampilan card body -->
        <div class="container ml-auto mr-auto"> <!-- untuk menampung tampilkan boostrap  -->
           <div class="rata-tengah"> <!-- membuat konten rata tengah -->
            <?php if (empty($row['gambar'])) { //jika gambar kosong tampilkan gambar dari https://i.stack.imgur.com/y9DpT.jpg
            ?>
                <img src="https://i.stack.imgur.com/y9DpT.jpg" class="img-fluid" /> 
            <?php
            } else { //jika tidak tampilkan gambar dari folder gambar
            ?>
                <img src="../image/<?php echo $row['gambar'] ?>" class="img-fluid" />
            <?php
            } ?>
            </div>
        </div>
        
        <br>
       
        <div class="container"> <!--menampung tampilan -->
            <p class="text-justify"> <!--membuat konten rata tengah  -->
                <?php echo $row['isi_artikel'] ?> <!-- menampilkan data isi artikel -->
            </p>
        </div>
        <hr>
    </div>
  </div>
</div>
</div>

    <div class="container col-8 mb-5"> <!-- untuk menampung tampilan -->
        <p>
            <b>
                <?php 
                $id_artikel = $row['id_artikel'];
                $result = mysqli_query($koneksi, "SELECT * FROM tb_rating WHERE id_artikel = '$id_artikel' AND rating = '1'");
                $row_rating = mysqli_num_rows($result);
                ?>
                <?php echo $row_rating . " Orang menyukai ini" ?> <!-- tampilkan banyak user yang menyukai artikel -->
            </b>
        </p>
        <p>
            <?php
            //jika sudah login 
            if (isset($_SESSION['username'])) { 
                $username = $_SESSION['username'];
                $sql_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");
                while ($row_user_rating = mysqli_fetch_assoc($sql_user)) {
                    if ($row_user_rating['username'] == $username) {
                        $id_user = $row_user_rating['id_user'];
                        $sql_artikel = mysqli_query($koneksi, "SELECT * FROM tb_rating WHERE id_artikel = '$id_artikel' AND id_user = '$id_user'");

                        if (mysqli_num_rows($sql_artikel) == 0) { //jika belum memasukan rating tampilkan button like dan dislike
            ?>
                            <a class="btn btn-primary" href="proses_like.php?id=<?php echo $row['id_artikel'] ?>">
                                <i class="fas fa-heart"></i>
                                Like
                            </a>
                            <a class="btn btn-danger" href="proses_dislike.php?id=<?php echo $row['id_artikel'] ?>">
                                <i class="fas fa-heart-broken"></i>
                                Dislike
                            </a>
                            <?php
                        } else { //jika tidak tampikan isian like atau dislike yang telah dimasukan
                            while ($row_rating = mysqli_fetch_assoc($sql_artikel)) {
                                if (empty($row_rating['rating'])) {
                                    // 
                                } elseif ($row_rating['rating'] == 1) {
                            ?>
                                    <a class="btn btn-primary" href="">
                                        <i class="fas fa-heart"></i>
                                        Liked
                                    </a>
                                <?php
                                } elseif ($row_rating['rating'] == 2) {
                                ?>
                                    <a class="btn btn-danger" href="">
                                        <i class="fas fa-heart-broken"></i>
                                        Disliked
                                    </a>
                <?php
                                }
                            }
                        }
                    }
                }
            } else { //jika tidak tampilkan ikon like dan dislike. Ketika mengeklik akan diarahkan ke halaman register.php
                ?>
                <a class="btn btn-primary" href="../register.php">
                    <i class="fas fa-heart"></i>
                    Like
                </a>
                <a class="btn btn-danger" href="../register.php">
                    <i class="fas fa-heart-broken"></i>
                    Dislike
                </a>
            <?php
            }
            ?>
        </p>
    </div>
   
<?php
}
include("../layout/footer.php"); //menyisipkan file layout.php
?>