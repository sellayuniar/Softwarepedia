<?php
include "../koneksi.php"; //menyisipkan file koneksi.php
include "../layout/header.php"; //menyisipkan file header.php
//Inisialisasi nilai variabel awal
$ratinglike = "";
$jumlahlike = null;
//Query SQL untuk menampilkan data
$sqllike = "SELECT id_artikel, COUNT(*) as 'total' from tb_rating  WHERE rating = 1 GROUP by id_artikel LIMIT 0,10";
$hasillike = mysqli_query($koneksi, $sqllike); //$hasildislike untuk menyimpan $koneksi dan query $sqllike
while ($datalike = mysqli_fetch_array($hasillike)) {//perulangan untuk menampilkan data
    $idartikellike = $datalike['id_artikel']; //$ratinglike menyimpan $datalike yang berisi id_artikel
    $sql_artikellike = mysqli_query($koneksi, "SELECT * FROM tb_artikel WHERE id_artikel = '$idartikellike'"); //query untuk menampilkan data id artikel dengan data yang sesuai data $idartikellike

    while ($id_artlike = mysqli_fetch_assoc($sql_artikellike)) {
        //Mengambil nilai rating dari database
        $ratlike = $id_artlike['judul_artikel'];
        $ratinglike .= "'$ratlike'" . ", ";
    }
    //Mengambil nilai total dari database
    $jumlike = $datalike['total'];
    $jumlahlike .= "$jumlike" . ", ";
}
//Inisialisasi nilai variabel awal
$ratingdislike = "";
$jumlahdislike = null;
//Query SQL untuk menampilkan data
$sqldislike = "SELECT id_artikel, COUNT(*) as 'total' from tb_rating  WHERE rating = 2 GROUP by id_artikel LIMIT 0,10";
$hasildislike = mysqli_query($koneksi, $sqldislike); //$hasildislike untuk menyimpan $koneksi dan query $sqllike
while ($datadislike = mysqli_fetch_array($hasildislike)) {//perulangan untuk menampilkan data
    $idartikeldislike = $datadislike['id_artikel'];//$ratinglike menyimpan $datalike yang berisi id_artikel
    $sql_artikeldislike = mysqli_query($koneksi, "SELECT * FROM tb_artikel WHERE id_artikel = '$idartikeldislike'"); //query untuk menampilkan data id artikel dengan data yang sesuai data $idartikeldislike

    while ($id_artdislike = mysqli_fetch_assoc($sql_artikeldislike)) {
        //Mengambil nilai rating dari database
        $ratdislike = $id_artdislike ['judul_artikel'];
        $ratingdislike .= "'$ratdislike'" . ", ";
    }
    //Mengambil nilai total dari database
    $jumdislike = $datadislike['total'];
    $jumlahdislike .= "$jumdislike" . ", ";
}
?>
<div class="container p-3"> <!-- untuk menampung elemen tampilan  -->
    <div class="container p-3"> <!-- untuk menampung elemen tampilan -->
        <div class="row mb-3"> <!-- untuk membuat bari dengan margin bawah 3 -->
            <div class="col-12"> <!-- untuk membuat kolom dengan ukuran 12  -->
            <div class="rata-tengah"> <!-- membuat konten rata tengah -->
            <div class="happy"> <!-- memanggil font -->
                <h1 text-align="center">Rating Artikel</h1> <!-- membuat teks -->
            </div>
            </div>
            </div>
            <div class="col-10"> <!-- membuat kolom dengan ukuran 10  --> 
            <div class="rata-kanan"> <!-- membuat konten rata-kanan -->
                <br>
                <a class="btn btn-success btn-sm" href="export_excel.php"><i class="bi bi-file-earmark-spreadsheet-fill"></i> Export Excel</a> <!-- membuat link menuju file export_excel.php -->
                <a class="btn btn-danger btn-sm" href="export_pdf.php"> <i class="bi bi-file-earmark-pdf-fill"></i>Export PDF</a> <!-- membuat link menuju file export_pdf.php  -->
           
            </div>
            </div>
        </div>
        
        <div class="row mb-5"> <!-- membuat baris dengan margin bottom 5 -->
            <div class="col-9 container mr-auto ml-auto"> <!-- membuat kolom dengan ukuran 9 -->
                <div>
                    <canvas id="myChartlike"></canvas> <!-- membuat canvas  -->
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-5"> <!-- membuat baris dengan margin top 5 -->
            <div class="col-9 container mr-auto ml-auto"> <!-- membuat kolom dengan ukuran 9 -->
                <div>
                    <canvas id="myChartdislike"></canvas> <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctxlike = document.getElementById('myChartlike').getContext('2d');
    var chartlike = new Chart(ctxlike, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $ratinglike; ?>],
            datasets: [{
                label: 'Like Terbanyak',
                backgroundColor: ['rgb(26, 188, 156)', 'rgb(230, 126, 34)', 'rgb(231, 76, 60)', 'rgb(142, 68, 173)', 'rgb(44, 62, 80)', 'rgb(230, 126, 34)', 'rgb(211, 84, 0)', 'rgb(189, 195, 199)', 'rgb(52, 73, 94)', 'rgb(243, 156, 18)', 'rgb(155, 89, 182)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahlike; ?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctxdislike = document.getElementById('myChartdislike').getContext('2d');
    var chartdislike = new Chart(ctxdislike, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $ratingdislike; ?>],
            datasets: [{
                label: 'Dislike Terbanyak',
                backgroundColor: ['rgb(26, 188, 156)', 'rgb(230, 126, 34)', 'rgb(231, 76, 60)', 'rgb(142, 68, 173)', 'rgb(44, 62, 80)', 'rgb(230, 126, 34)', 'rgb(211, 84, 0)', 'rgb(189, 195, 199)', 'rgb(52, 73, 94)', 'rgb(243, 156, 18)', 'rgb(155, 89, 182)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $jumlahdislike; ?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?php
include("../layout/footer.php"); //menyisipkan file footer.php
?>