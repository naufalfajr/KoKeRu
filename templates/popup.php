<?php
//session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}
$nama = $_SESSION['nama'];

if (isset($_POST['submit'])) {
    $countfiles = count($_FILES['bukti']['name']);
    $i = 0;
    if ($countfiles <= 5) {
        // Jalan terus sampai banyaknya file yg diupload atau 5
        while ($i < $countfiles) {
            $bukti = $_FILES['bukti']['name'][$i];
            $bukti_temp = $_FILES['bukti']['tmp_name'][$i];
            move_uploaded_file($bukti_temp, "bukti/$bukti");

            // Karena index file yg di upload mulai dari 0 tapi di db kita mulai dari 1
            $i++;

            // Masuk ke db kolom bukti ke i
            $query = "UPDATE trx SET bukti" . $i . " = '" . $bukti . "' WHERE nama_cs = '" . $nama . "' ";
            $create_bukti_query = mysqli_query($db, $query);

            $query_status = "UPDATE trx SET status = 1 WHERE nama_cs = '" . $nama . "' ";
            $create_status_query = mysqli_query($db, $query_status);

            if (!$create_bukti_query) {
                die("QUERY FAILED" . mysqli_error($db));
            }
        }
    } else {
        echo "HANYA BISA UPLOAD 5 FILE";
    }
}
?>

<!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
<section id="popup">
    <!-- dialog pertama yang muncul ketika tombol detail di click -->
    <dialog class="mdl-dialog" id="dialog-1">
        <h4 class="mdl-dialog__title">Bukti Kebersihan dan Kerapihan</h4>
        <div class="mdl-dialog__content">
            <!-- form submit gambar
                                Bisa multiple files -->
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mdl-textfield mdl-textfield--floating-label is-focused">
                    <input type="file" id="bukti" name="bukti[]" multiple class="mdl-textfield__input">
                    <label for="bukti" class="mdl-textfield__label">Select files:</label>
                </div>
                <div>
                    <button type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                        Submit</button>
                </div>
            </form>
            <!-- Thummbnail Gambar yang telah di upload
                                jika di click akan men-fire lightbox -->
            <div class="mdl-grid">
                <?php
                //Query untuk mengambil gambar. kondisi where belum sesai ruangan yang di clik
                $query = "SELECT * FROM trx WHERE nama_cs = '" . $nama . "'";
                $select_bukti = mysqli_query($db, $query);
                if (!$select_bukti) {
                    die("QUERY FAILED" . mysqli_error($db));
                }
                $row = mysqli_fetch_assoc($select_bukti);
                // echo gambar satu2
                for ($i = 1; $i <= 5; $i++) {
                    $bukti       = $row['bukti' . $i];
                ?>
                    <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                        <img alt="img" class="pls-img-200" onclick="fireLightBox()" src="bukti/<?php echo $bukti; ?>">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Close</button>
        </div>
    </dialog>
    <!-- Lightbox adalah gambar yang ditampilkan
                        menggunakan dialog(modal) -->
    <dialog class="mdl-dialog" id="lightBox">
        <div class="mdl-dialog__content">
            <img src="https://source.unsplash.com/random" alt="img">
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close-lightBox">Close</button>
        </div>
    </dialog>

    <!-- Filler,
                        Digunakan untuk mendemostrasikan dialog(modal)
                        jika belum ada foto yang di upload -->
    <dialog class="mdl-dialog" id="dialog_kosong">
        <h4 class="mdl-dialog__title">Bukti Kebersihan dan Kerapihan</h4>
        <div class="mdl-dialog__content">
            <form action="">
                <div class="mdl-textfield mdl-textfield--floating-label is-focused">
                    <input type="file" id="files" name="bukti" multiple class="mdl-textfield__input">
                    <label for="bukti" class="mdl-textfield__label">Select files:</label>
                </div>
                <div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                        Submit</button>
                </div>
            </form>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Close</button>
        </div>
    </dialog>
    <!-- endof filler -->
</section>