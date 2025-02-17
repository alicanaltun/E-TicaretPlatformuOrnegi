<?php
include 'baglanti.php';
session_name('admin_session');
session_start();

if (isset($_SESSION['yonetici_id']) && isset($_SESSION["kullanici_adi"])){
    session_destroy();
    header("Location:admin-login.php");
    exit();
}
?>