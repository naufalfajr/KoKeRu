<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}
$nama = $_SESSION['nama'];
?>
<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">
            <span class="material-icons">
                cleaning_services
            </span>
            KoKeRu</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation -->
        <nav class="mdl-navigation">
            <!-- account button 
                        Di screen kecil pindah ke sidebar-->
            <div class="pls-margin-x mdl-layout--large-screen-only">
                <button id="account" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <span class="material-icons">account_circle</span>
                    <span class="account-name"><?php echo $nama; ?></span>
                </button>
                <!-- list menu saat tombol di click -->
                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="account">
                    <!-- menu yang hanya digunakan pada fase development -->
                    <li class="mdl-menu__item"><a href="manager/">Ganti Akun (dev only)</a></li>
                    <li class="mdl-menu__item"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>