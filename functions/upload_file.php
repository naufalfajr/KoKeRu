<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: ../login.php');
}

require_once('db_login.php');
$nama = $_SESSION['nama'];
$id_ruang = $_GET['idruang'];

if (isset($_POST['submit'])) {
    $countfiles = count($_FILES['bukti']['name']);
    $i = 0;
    if ($countfiles <= 5) {
        // Jalan terus sampai banyaknya file yg diupload atau 5
        $query_status = "UPDATE trx SET status = 1 WHERE nama_cs = '" . $nama . "' AND idruang= '" . $id_ruang . "' AND tanggal = '".date("Y-m-d")."' ";
        $create_status_query = mysqli_query($db, $query_status);
        while ($i < $countfiles) {
            $bukti = $_FILES['bukti']['name'][$i];
            $bukti_temp = $_FILES['bukti']['tmp_name'][$i];
            move_uploaded_file($bukti_temp, "../assets/img/$bukti");

            // Karena index file yg di upload mulai dari 0 tapi di db kita mulai dari 1
            $i++;

            // Masuk ke db kolom bukti ke i
            $query = "UPDATE trx SET bukti" . $i . " = '" . $bukti . "' WHERE idruang = '" . $id_ruang . "' AND tanggal = '".date("Y-m-d")."'";
            $create_bukti_query = mysqli_query($db, $query);

            if (!$create_bukti_query) {
                die("QUERY FAILED" . mysqli_error($db));
            }
        }
    } else {
        echo "HANYA BISA UPLOAD 5 FILE";
    }
    header('Location: ../');
}
?>