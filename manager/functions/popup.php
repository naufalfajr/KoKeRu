<!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
<?php

require_once('../../functions/db_login.php');
$id_ruang = $_GET['idruang'];

?>

<!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
<!-- dialog pertama yang muncul ketika tombol detail di click -->
    <!-- Thummbnail Gambar yang telah di upload
                jika di click akan men-fire lightbox -->
    <div class="mdl-grid">
        <?php
        //Query untuk mengambil gambar. kondisi where belum sesuai ruangan yang di clik
        $query = "SELECT * FROM trx WHERE idruang = '" . $id_ruang . "' AND tanggal = '".date("Y-m-d")."' ";
        $select_bukti = mysqli_query($db, $query);
        if (!$select_bukti) {
            die("QUERY FAILED" . mysqli_error($db));
        }
        $row = mysqli_fetch_assoc($select_bukti);
        // echo gambar satu2
        for ($i = 1; $i <= 5; $i++) {
        ?>
            <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <img alt="img" class="pls-img-200" onclick="loadLightBoxManager('<?php echo $row['bukti' . $i]; ?>')" src="../assets/img/<?php echo $row['bukti' . $i]; ?>">
            </div>
        <?php
        }
        ?>
    </div>