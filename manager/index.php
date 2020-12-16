<?php include("templates/header.php") ?>

<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<?php include("templates/navbar.php") ?>

<!------------------------------------------------------------ SIDEBAR ----------------------------------------------------------
            Muncul ketika tombol menu di click -->
<?php include("templates/sidebar.php") ?>

<!------------------------------------------------------------ ISI ------------------------------------------------------------>
    <main class="mdl-layout__content">
        <!-- content here -->
        <div class="page-content">
            <!-- bersisi card ruangan -->
            <section id="content-body">
                <div class="mdl-grid">
                <?php
                    //include our login information
                    require_once('../functions/db_login.php');
                    //execute query
                    $tanggal = "2020-11-26";
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
                                <button type="button" onclick="loadDynamicContentModal(<?php echo $row->idruang; ?>)" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect">
                                Show Detail</button>
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
                <div class="modal-footer">
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