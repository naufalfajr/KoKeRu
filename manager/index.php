<?php include("templates/header.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<?php include("templates/navbar.php") ?>

<!------------------------------------------------------------ SIDEBAR ----------------------------------------------------------
            Muncul ketika tombol menu di click -->
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
                //include our login information
                require_once('../functions/db_login.php');
                //execute query
                $tanggal = "2020-12-04";
                $query = " SELECT * FROM trx WHERE tanggal='".$tanggal."'";
                $result = $db->query($query);
                if (!$result) {
                    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
                }
                while ($row = $result->fetch_object()) {
            ?>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand <?php echo ($row->status == 1) ? "pls-done":""; ?>">
                            <div>
                                <div class="mdl-card__title-text"><?php echo $row->nama_ruang; ?></div>
                                <div class="mdl-card__subtitle-text" id="status"><?php echo ($row->status == 0) ? "Belum" : "Sudah"; ?></div>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <?php echo $row->nama_cs; ?>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="show-dialog" type="button" onclick="fireModal()" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect">Show
                                Detail</button>
                        </div>
                    </div>
                </div>
            <?php 
                }
                $result->free();
                $db->close();
            ?>
            </div>
        </section>

        <!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
        <?php include("templates/popup.php") ?>

    </div>
</main>

<?php include("templates/footer.php") ?>