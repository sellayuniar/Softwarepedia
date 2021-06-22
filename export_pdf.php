<?php

//Jika download plugin mpdf dengan composer (versi baru)
require_once "../mpdf_v8.0.3-master/vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();

//Menggabungkan dengan file koneksi yang telah dibuat
include '../koneksi.php'; 

$nama_dokumen = 'Rating'; 

// mengaktifkan penyimpanan output buffer 
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
</head>

<body>
    <style type="text/css">
      /* memodifikasi tampilan body, tag table dan tag a */
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    /* akhir modifikasi */
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel"); //untuk menggenerate file exc
    header("Content-Disposition: attachment; filename=Ratings.xls"); //untuk memberi name file excel
    include "../koneksi.php"; //menyisipkan file koneksi.php
     // ob_flush();
    $ratinglike = "";
    $jumlahlike = null;
     //Query SQL untuk menghitung rating like
    $sqllike = "SELECT id_artikel, COUNT(*) as 'total' from tb_rating  WHERE rating = 1 GROUP by id_artikel LIMIT 0,10";
    $hasillike = mysqli_query($koneksi, $sqllike);
    //Query SQL untuk menghitung rating dislike
    $sqldislike = "SELECT id_artikel, COUNT(*) as 'total' from tb_rating  WHERE rating = 2 GROUP by id_artikel LIMIT 0,10";
    $hasildislike = mysqli_query($koneksi, $sqldislike);
    ?>
    <center>
        <h1>Jumlah Rating Aplikasi <br /> Softwarepedia</h1> <!-- membuat teks  -->
    </center>

    <table border="1"> <!-- membuat tabel  -->
        <tr>
            <th>ID Artikel</th>
            <th>Judul Artikel</th>
            <th>Like</th>
        </tr>
        <?php
        while ($datalike = mysqli_fetch_assoc($hasillike)) {//perulangan untuk menampilkan data
        ?>
            <tr>
                <?php
                $id_artikellike = $datalike['id_artikel'];
                $sqlartikellike = mysqli_query($koneksi, "SELECT * FROM tb_artikel");
                while ($dataartikellike = mysqli_fetch_assoc($sqlartikellike)) {//perulangan untuk menampilkan data
                    if ($dataartikellike['id_artikel'] == $id_artikellike) { //jika id_artikel sama dengan $id_artikellike
                ?>
                        <td><?php echo $dataartikellike['id_artikel'] ?></td> <!--print id_artikel -->
                        <td>
                            <?php echo $dataartikellike['judul_artikel'] ?> <!-- print judul_artikel  -->
                        </td>
                    <?php
                    }
                    ?>

                <?php } ?>
                <td><?php echo $datalike['total'] ?></td><!-- print total like -->
            </tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <table border="1"> <!--membuat tabel  -->
        <tr>
           <!--membuat hader tabel  -->
            <th>ID Artikel</th>
            <th>Judul Artikel</th>
            <th>Disike</th>
        </tr>
        <?php
        while ($datadislike = mysqli_fetch_assoc($hasildislike)) {//perulangan untuk menampilkan data
        ?>
            <tr>
                <?php
                $id_artikeldislike = $datadislike['id_artikel'];
                $sqlartikeldislike = mysqli_query($koneksi, "SELECT * FROM tb_artikel");
                while ($dataartikeldislike = mysqli_fetch_assoc($sqlartikeldislike)) {//perulangan untuk menampilkan data
                    if ($dataartikeldislike['id_artikel'] == $id_artikeldislike) {//jika id_artikel sama dengan 
                ?>
                        <td><?php echo $dataartikeldislike['id_artikel'] ?></td> <!--print id artikel  -->
                        <td>
                            <?php echo $dataartikeldislike['judul_artikel'] ?><!-- print judul artikel -->
                        </td>
                    <?php
                    }
                    ?>

                <?php } ?>
                <td><?php echo $datadislike['total'] ?></td>  <!-- print total disklike  -->
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));//untuk menulis file html
$mpdf->Output("" . $nama_dokumen . ".pdf", 'D'); //outuput $nama_dokumen dan eksteksi .pdf
$db1->close();
?>