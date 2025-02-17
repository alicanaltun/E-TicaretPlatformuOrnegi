<?php
include '../baglanti.php';
@session_start();
  if (!isset($_SESSION['kullanici_id']) && !isset($_SESSION["kullanici_adi"])) {
    header("Location: admin-login.php");
    exit();
  }

if(!isset($_GET['id'])){
    header("Location: admin.php");
    exit();
}
$id = $_GET['id'];

$sql1 = "SELECT urun_id FROM anahtarlar WHERE anahtar_id = $id";
$result = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $urun_id = $row["urun_id"];
}else{
    header("Location: admin.php");
    exit();
}

$sql = "DELETE FROM anahtarlar WHERE anahtar_id = $id";

if (mysqli_query($conn, $sql)) {
    header("Location: anahtarlar.php?id=$urun_id&delete=1");
    exit();
} else {
    header("Location: anahtarlar.php?id=$urun_id&delete=0");
    exit();
}



?>