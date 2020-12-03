<?php //require_once('functions/db_login.php') 
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
                    <h3 class="mdl-cell--hide-phone">Hari Kamis Tanggal 12 Nopember 2020 Jam 7.11 WIB</p>
                </div>
            </div>
        </section>
        <!-- bersisi card ruangan -->
        <section id="content-body">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand pls-done">
                            <div>
                                <div class="mdl-card__title-text">R.123</div>
                                <div class="mdl-card__subtitle-text">Sudah</div>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <span class="account-name">Doni Hermawan</span>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="show-dialog" type="button" onclick="fireModal()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Update</button>
                        </div>
                    </div>
                </div>
                <!-- More filler card -->
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand pls-done">
                            <div>
                                <div class="mdl-card__title-text">R.124</div>
                                <div class="mdl-card__subtitle-text">Sudah</div>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <span class="account-name">Doni Hermawan</span>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="show-dialog" type="button" onclick="fireModal()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Update</button>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <div>
                                <div class="mdl-card__title-text">R.125</div>
                                <div class="mdl-card__subtitle-text">Belum</div>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <span class="account-name">Doni Hermawan</span>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <button id="show-dialog" type="button" onclick="fireModalKosongDemo()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Update</button>
                        </div>
                    </div>
                </div>
                <!-- end of filler card -->
            </div>
        </section>

        <!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
        <?php include("templates/popup.php") ?>

    </div>
</main>

<?php include("templates/footer.php") ?>