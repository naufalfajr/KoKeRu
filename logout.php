<?php
session_start();
if (isset($_SESSION['nama'])) {
    unset($_SESSION['nama']);
    session_destroy();
}
header('Location: login.php');
