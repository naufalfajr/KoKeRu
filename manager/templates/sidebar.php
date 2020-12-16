<?php
$nama = $_SESSION['nama'];
?>
<!------------------------------------------------------------ SIDEBAR ----------------------------------------------------------
            Muncul ketika tombol menu di click -->
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">
        <span class="material-icons">
            cleaning_services
        </span>
        KoKeRu</span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="./">Dashboard</a>
        <a class="mdl-navigation__link" href="print.php">Print</a>
        <a class="mdl-navigation__link" href="jobdesk.php">Jobdesk</a>
        <!-- account button di screen besar pindah ke navbar-->
        <div class="pls-margin-x pls-magin-y mdl-layout--small-screen-only">
            <button id="account-side" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                <span class="material-icons">account_circle</span>
                <span class="account-name"><?php echo $nama; ?></span>
            </button>
            <!-- list menu saat tombol di click -->
            <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="account-side">
                <!-- menu yang hanya digunakan pada fase development -->
                <li class="mdl-menu__item"><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
</div>