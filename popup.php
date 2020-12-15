<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}

require_once('functions/db_login.php');
$id_ruang = $_GET['idruang'];

?>

<!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
<!-- dialog pertama yang muncul ketika tombol detail di click -->
<!-- form submit gambar
            Bisa multiple files -->
    <form action="popup1.php?idruang=<?php echo $id_ruang; ?>" method="POST" enctype="multipart/form-data">
        <div class="mdl-textfield mdl-textfield--floating-label is-focused">
            <input type="file" id="bukti" name="bukti[]" multiple class="mdl-textfield__input">
            <label for="bukti" class="mdl-textfield__label">Select files:</label>
        </div>
        <div>
            <button type="submit" id="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                Submit</button>
        </div>
    </form>
    <!-- Thummbnail Gambar yang telah di upload
                jika di click akan men-fire lightbox -->
    <div class="mdl-grid">
        <?php
        //Query untuk mengambil gambar. kondisi where belum sesuai ruangan yang di clik
        $query = "SELECT * FROM trx WHERE idruang = '" . $id_ruang . "' AND tanggal = '2020-11-26' ";
        $select_bukti = mysqli_query($db, $query);
        if (!$select_bukti) {
            die("QUERY FAILED" . mysqli_error($db));
        }
        $row = mysqli_fetch_assoc($select_bukti);
        // echo gambar satu2
        for ($i = 1; $i <= 5; $i++) {
        ?>
            <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                <img alt="img" class="pls-img-200" onclick="loadLightBox('<?php echo $row['bukti' . $i]; ?>')" src="assets/img/<?php echo $row['bukti' . $i]; ?>">
            </div>
        <?php
        }
        ?>
    </div>