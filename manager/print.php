<?php include("templates/header_print.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<?php include("templates/navbar.php") ?>

<!------------------------------------------------------------ SIDEBAR ----------------------------------------------------------
Muncul ketika tombol menu di click -->
<?php include("templates/sidebar.php") ?>

<!------------------------------------------------------------ ISI ------------------------------------------------------------>
<?php
@$tanggal = $_POST['tanggal'];
@$status = $_POST['pilihanStatus'];
$tglSekarang = date('Y-m-d');
?>

<main class="mdl-layout__content">
    <!-- content here -->
    <div class="page-content">
        <section id="content-header"></section>
        <!-- Terdiri dari dua kolom -->
        <section id="content-body">
            <div class="mdl-grid">
                <!-- Kolom pertama berisi form untuk filter laporan harian -->
                <div class="mdl-cell mdl-cell--2-col text-center">
                    <form action="" method="POST" name="print" class="d-print-none">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <label for="tanggal" class="mdl-textfield__label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="mdl-textfield__input" value="<?php if (isset($tanggal)) {
                                                                                                                    echo $tanggal;
                                                                                                                } else {
                                                                                                                    echo $tglSekarang;
                                                                                                                } ?>">
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label margin-bottom">
                            <label for="pilihanStatus" class="mdl-textfield__label">Pilih Status</label>
                            <select name="pilihanStatus" id="pilihanStatus" class="mdl-textfield__input">
                                <option value="semua" selected <?php if (isset($status) && $status == "semua") echo 'selected="true"'; ?>>SEMUA</option>
                                <option value="belum" <?php if (isset($status) && $status == "belum") echo 'selected="true"'; ?>>BELUM</option>
                                <option value="sudah" <?php if (isset($status) && $status == "sudah") echo 'selected="true"'; ?>>SUDAH</option>
                            </select>
                        </div>
                        <div class="mdl-grid button">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mdl-cell mdl-cell--12-col">
                                Tampil</button>
                        </div>
                    </form>
                    <div class="mdl-grid d-print-none">
                        <button id="demo-menu-lower-left" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mdl-cell mdl-cell--12-col">
                            Export
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-left">
                            <button onclick="window.print()" class="mdl-menu__item mdl-menu__item--full mdl-cell mdl-cell--12-col">PDF</button>
                            <button onclick="exportTableToExcel('tableData','Laporan Harian <?php echo $tanggal; ?>')" class="mdl-menu__item mdl-menu__item--full mdl-cell mdl-cell--12-col">Excel</button>
                        </ul>
                    </div>
                </div>
                <!-- Kolom kedua berisi priview dari laporan harian yang akan di print -->
                <div class="mdl-cell mdl-cell--10-col mdl-shadow--2dp text-center">
                    <div class="card-body">
                        <div id="laporanHarian">
                            <h2>Laporan Harian Pembersihan Ruangan</h2>
                            <h3>Tanggal <?php if (isset($tanggal)) {
                                            echo date('d-m-Y', strtotime($tanggal));
                                        } else {
                                            echo date('d-m-Y', strtotime($tglSekarang));
                                        }?></h3>
                            <br>
                            <table class="table table-striped table-bordered dataTable" style="border: 1;" name="tableData" id="tableData">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruang</th>
                                    <th>Nama CS</th>
                                    <th>Status</th>
                                </tr>
                                <!-- PHP CETAK TABEL -->
                                <?php
                                //Include Informasi database
                                require_once('../functions/db_login.php');
                                if (isset($_POST['tanggal']) && isset($_POST['pilihanStatus'])) {
                                    if ($status == "semua") {
                                        $query = "SELECT * FROM trx WHERE tanggal = '$tanggal'";
                                    } elseif ($status == "sudah") {
                                        $query = "SELECT * FROM trx WHERE tanggal = '$tanggal' AND status = 1";
                                    } elseif ($status == "belum") {
                                        $query = "SELECT * FROM trx WHERE tanggal = '$tanggal' AND status = 0";
                                    }
                                } else {
                                    $query = "SELECT * FROM trx WHERE tanggal = '$tglSekarang'";
                                }
                                $result = $db->query($query);
                                if (!$result) {
                                    die("Could not query the database: <br/>" . $db->error . "<br>Query: " . $query);
                                }
                                $i = 1;
                                while ($row = $result->fetch_object()) {
                                    echo '<tr>';
                                    echo '<td>' . $i++ . '</td>';
                                    echo '<td>' . $row->nama_ruang . '</td>';
                                    echo '<td>' . $row->nama_cs . '</td>';
                                    if ($row->status == 1) {
                                        echo '<td>SUDAH</td>';
                                    } else {
                                        echo '<td>BELUM</td>';
                                    }
                                    echo '</tr>';
                                }
                                $result->free();
                                $db->close();
                                ?>
                                <!-- PHP END CETAK TABEL -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
</div>
<?php include("templates/footer_print.php") ?>
