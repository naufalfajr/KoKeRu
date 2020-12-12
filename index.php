<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}
$nama = $_SESSION['nama'];
?>

<?php include("templates/header.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<?php include("templates/navbar.php") ?>

<!------------------------------------------------------------ SIDEBAR ----------------------------------------------------------
            Muncul ketika tombol menu burger di click -->
<?php include("templates/sidebar.php") ?>

<!------------------------------------------------------------ ISI ------------------------------------------------------------>
<main class="mdl-layout__content">
    <!-- content here -->
    <div class="page-content">
        <!-- Berisi nama gedung dan tanggal -->
        <section id="content-header">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp">
                    <h1 class="mdl-cell--hide-phone">Monitoring Kebersihan dan Kerapihan Ruang</h1>
                    <h2 class="">Gedung Bersama Maju</h2>
                    <h3 class="mdl-cell--hide-phone" id="date"></h3>
                </div>
            </div>
        </section>
        <!-- bersisi card ruangan -->
        <section id="content-body">
            <div class="mdl-grid">
                <?php
                require_once('functions/db_login.php');
                $query = "SELECT * FROM trx WHERE nama_cs = '" . $nama . "'";
                $select_all = mysqli_query($db, $query);
                if (!$select_all) {
                    die("QUERY FAILED" . mysqli_error($db));
                }
                if (mysqli_num_rows($select_all) == 0) {
                    echo "<h2 class='text-center'> Maaf mas/mbak anda di phk</h2>";
                } else {
                    while ($row = mysqli_fetch_assoc($select_all)) {
                        $namacs       = $row['nama_cs'];
                        $nama_ruang   = $row['nama_ruang'];
                        $status       = $row['status'];
                ?>
                        <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                            <div class="mdl-card mdl-shadow--2dp">
                                <div class="mdl-card__title mdl-card--expand  <?php if ($status == 1) echo "pls-done" ?>">
                                    <div>
                                        <div class="mdl-card__title-text"> <?php echo $nama_ruang ?></div>
                                        <div class="mdl-card__subtitle-text">
                                            <?php if ($status == 1) {
                                                echo "sudah";
                                            } else {
                                                echo "belum";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <span class="account-name"><?php echo $namacs ?></span>
                                </div>
                                <!-- Data untuk dikirimkan biar bisa identifikasi ruangan mana yg di klik -->
                                <input type="hidden" name="ruangan" value="<?php echo $nama_ruang; ?>">
                                <div class="mdl-card__actions mdl-card--border">
                                    <button id="show-dialog" type="submit" onclick="fireModal()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                        Update</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </section>

        <!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
        <?php include("templates/popup.php") ?>

    </div>
</main>

<?php include("templates/footer.php") ?>