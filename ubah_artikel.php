<?php
include "../koneksi.php"; //menyisipkan file koneksi.php
include "../layout/header.php"; //menyisipkan file header.php

$id_artikel = $_GET['id']; //$id_artikel untuk menyimpan id yang telah didapat

$sql = mysqli_query($koneksi, "SELECT * FROM tb_artikel WHERE id_artikel = '$id_artikel'"); //query untuk menampilkan data

while ($row = mysqli_fetch_assoc($sql)) {//perulangan untuk menampilkan data
?>
   <div class="row justify-content-center mt-5"> <!-- untuk menampilkan baris rata tengah-->
    <div class="col-md-8"> <!-- membuat tampilan layar medium  -->
      <div class="card"> <!--membuat tampilan card -->
        <div class="card-header bg-transparent mb-0"> <!--membuat tampilan card-header dengan background transparan dan margin bottom 0 -->
                <div class="happy">  <!-- memanggil font happy-->
                <div class="rata-tengah">  <!--membuat konten rata-tengah -->
                    <h1>Ubah <span class="font-weight-bold text-primary"> Artikel </span></h1> <!--membuat text -->
                 </div>
                </div>
                </div>
                
            <br>
            <div class="card-body">  <!-- membuat tampilan card-body -->
                <div class="col-10 container mr-auto ml-auto"> <!-- membuat kolom ukuran 10 -->
                    <form action="proses_ubah_artikel.php" method="POST" enctype="multipart/form-data"> <!-- membuat form dengan method post dan ketika file di submit akan mengeksekusi halaman proses_ubah_artikel.php -->
                       
                        <div class="form-group mt-2"> <!--ntuk mengelompokkan isi form  -->
                        <div class="raleway">  <!-- memanggil font -->
                            <label>Foto :</label> <!-- membuat label -->
                             <?php 
                        if ($row['gambar'] == null || $row['gambar'] == '') { ////jika gambar kosong tampilkan gambar dari link https://i.stack.imgur.com/y9DpT.jpg
                        ?>
                             <img src="https://i.stack.imgur.com/y9DpT.jpg" width="100" /> 
                        <?php
                        } else { //jika tidak tampilkan gambar dari folder gambar
                        ?>
                            <img src="../image/<?php echo $row['gambar'] ?>" width="300" class="img-fluid" />
                        <?php
                        }
                        ?>
                        <br> 
                        <br>
                        
                            <input type="file" name="foto" class="form-control btn btn-info"> <!-- membuat input type file -->
                            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>  <!--  membuat paragraf berwarna merah-->
                        </div>
                        </div>
                        <div class="form-group"> <!--ntuk mengelompokkan isi form  -->
                        <div class="raleway"> <!-- memanggil font -->
                            <label for="judulartikel">Judul Artikel</label>   <!-- membuat label -->
                            <input type="hidden" class="form-control" name="id" value="<?php echo $row['id_artikel'] ?>">  <!-- membuat input type hidden -->
                            <input type="text" class="form-control" id="judulartikel" name="judul" value="<?php echo $row['judul_artikel'] ?>"> <!--membuat input type text dan menampilkan text judul artikel  -->
                        </div>
                        </div>
                        <br>
                        <div class="form-group"> <!-- untuk mengelompokkan isi form -->
                        <div class="raleway">  <!-- memanggil font -->
                            <label for="kategoriartikel">Kategori Artikel</label>  <!-- membuat label  -->
                            <select class="form-control" id="kategoriartikel" name="kategori"><!-- membuat dropdown -->
                                <option value="<?php echo $row['kategori_artikel'] ?>"><?php echo ucfirst($row['kategori_artikel']) ?></option> <!-- pilihan dropdown yang menampilkan data kategori_artikel -->
                                <option value="windows">Windows</option> <!-- pilihan dropdown windows -->
                                <option value="ios">iOS</option>  <!-- pilihan dropdown pilih iOs -->
                                <option value="android">Android</option> <!-- pilihan dropdown kategori -->
                            </select>
                        </div>
                        </div>
                        <br>
                        <div class="form-group"> <!--untuk mengelompokkan isi form  -->
                        <div class="raleway"> <!-- memanggil font -->
                            <label for="isi">Isi Artikel</label> <!-- membuat label-->
                            <textarea class="form-control ckeditor" id="ckedtor" name="isi" rows="8"><?php echo $row['isi_artikel'] ?></textarea> <!-- membuat text area dan menampilkan data isi artikel -->
                            <script>
                                CKEDITOR.replace('isi');
                            </script>
                        </div>
                        </div>
                        <div class="form-group mt-4"> <!-- untuk mengelompokkan isi form -->
                        <div class="raleway"> <!-- memanggil font -->
                            <button type="submit" class="btn btn-success">Ubah <i class="bi bi-cursor-fill"></i></button> <!--membuat button tambah  -->
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
include("../layout/footer.php"); //menyisipkan file footer.php
?>