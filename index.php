<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}
$nama = $_SESSION['nama'];
require_once('functions/db_login.php');
$query_nama = " SELECT * FROM manager ";
$result = $db->query($query_nama);
$row_nama = $result->fetch_object();
if ($nama == $row_nama->nama_manager) {
    header('Location: manager/');
}
?>

<?php include("templates/header.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<?php include("templates/navbar.php") ?>

<!------------------------------------------------------------ SIDEBAR ----------------------------------------------------------
            Muncul ketika tombol menu burger di click -->
<?php include("templates/sidebar.php") ?>

<!------------------------------------------------------------ ISI ------------------------------------------------------------>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <main class="mdl-layout__content">
        <!-- content here -->
        <div class="page-content">
            <!-- bersisi card ruangan -->
            <section id="content-body">
                <div class="mdl-grid">
                    <?php
                    $query = "SELECT * FROM trx WHERE nama_cs = '" . $nama . "' AND tanggal = '".date("Y-m-d")."' ";
                    $select_all = mysqli_query($db, $query);
                    if (!$select_all) {
                        die("QUERY FAILED" . mysqli_error($db));
                    }
                    if (mysqli_num_rows($select_all) == 0) {
                        echo "<h2 class='text-center'> Maaf mas/mbak anda di phk</h2>";
                    } else {
                        while ($row = mysqli_fetch_assoc($select_all)) {
                    ?>
                            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                                <div class="mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title mdl-card--expand  <?php if ($row['status'] == 1) echo "pls-done" ?>">
                                        <div>
                                            <div class="mdl-card__title-text"> <?php echo $row['nama_ruang']; ?></div>
                                            <div class="mdl-card__subtitle-text">
                                                <?php if ($row['status'] == 1) {
                                                    echo "sudah";
                                                } else {
                                                    echo "belum";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        <span class="account-name"><?php echo $row['nama_cs']; ?></span>
                                    </div>
                                    <!-- Data untuk dikirimkan biar bisa identifikasi ruangan mana yg di klik -->
                                    <input type="hidden" name="ruangan" value="<?php echo $row['nama_ruang']; ?>">
                                    <div class="mdl-card__actions mdl-card--border">
                                        <button type="button" onclick="loadDynamicContentModal(<?php echo $row['idruang']; ?>)" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
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
        </div>
    </main>
</div>
<!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
<div class="modal fade" id="modal-mdl" role="dialog" style="overflow-y: auto;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="mdl-dialog">
                <h4 class="mdl-dialog__title">Bukti Kebersihan dan Kerapihan</h4>
                <div class="mdl-dialog__content">
                    <div id="demo-modal"></div>
                </div>
                <div class="mdl-dialog__actions">
                    <button type="button" class="mdl-button close" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="light-box" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img id="light-box-img" src="" alt="" style="max-width: 780px; max-height: 550px;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="mdl-button close" data-dismiss="modal" onclick="loadModal()">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include("templates/footer.php") ?>