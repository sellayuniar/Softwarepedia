<?php
include("layout/header.php"); //untuk menyisipkan file header.php

?>
<div class="container"> <!--untuk menampung elemen tampilan  -->
  <div class="row justify-content-center mt-5"> <!-- untuk menampilkan baris rata kiri kanan-->
    <div class="col-md-4"> <!-- membuat tampilan layar medium  -->
      <div class="card">  <!--membuat tampilan card -->
        <div class="card-header bg-transparent mb-0"> <!--membuat tampilan card-header dengan background transparan dan margin bottom 0 -->
        <div class="happy"> <!-- memanggil font happy-->
          <h3 class="text-center"><i class="bi bi-person-circle"></i> Silahkan <span class="font-weight-bold text-primary">Mendaftar</span></h3> <!--membuat text  -->
        </div>
        </div>
        <div class="card-body"> <!--membuat card-body untuk tampilan isi form login -->
          <form action="proses_register.php" method="POST"> <!--membuat form dengan method post dan ketika file di submit akan mengeksekusi halaman proses_register.php -->
            <div class="form-group"> <!-- untuk mengelompokkan isi form -->
              <div class="Staatliches-Regular"> <!--memanggil font staatlices-regular -->
              <label for="email"> Email</label> <!--membuat label email -->
              <input type="text" name="email" class="form-control" placeholder="masukan email anda"> <!--membuat input type text -->
            </div>
            </div>
            <br>
            <div class="form-group"> <!-- untuk mengelompokkan isi form -->
             <div class="Staatliches-Regular"> <!--memanggil font staatlices-regular -->
              <label for="username"> Username</label> <!--membuat label username-->
              <input type="text" name="username" class="form-control" placeholder="masukan username anda"> <!--membuat input type text -->
            </div>
            </div>
            <br>
            <div class="form-group"> <!-- untuk mengelompokkan isi form -->
              <div class="Staatliches-Regular">  <!--memanggil font staatlices-regular -->
              <label for="Password"> Password </label> <!--membuat label password -->
              <input type="password" name="password" class="form-control" placeholder="masukan password anda"> <!--  membuat input type password-->
            </div>
            </div>
            <br>
            <div class="form-group">  <!-- untuk mengelompokkan isi form -->
              <input type="submit" class="btn btn-primary btn-block" value="daftar"> <!-- membuat input type submit dengan nama daftar-->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include("layout/footer.php"); //untuk menyisipkan file footer.php
?>