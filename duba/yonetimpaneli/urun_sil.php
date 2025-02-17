<?php
include '../baglanti.php';
session_name('admin_session');
session_start();
if (!isset($_SESSION['yonetici_id']) && !isset($_SESSION["kullanici_adi"])) {
    header("Location: admin-login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit();
}
$id = $_GET['id'];

function deleteDir($dirPath)
{
    if (!is_dir($dirPath)) {
        return false;
    }
    $files = array_diff(scandir($dirPath), array('.', '..'));
    foreach ($files as $file) {
        $filePath = $dirPath . DIRECTORY_SEPARATOR . $file;
        if (is_dir($filePath)) {
            deleteDir($filePath);
        } else {
            unlink($filePath);
        }
    }
    return rmdir($dirPath);
}

function cleanFileName($filename)
{
    $invalidChars = array("\\", "/", ":", "*", "?", "\"", "<", ">", "|");
    $cleanedFilename = str_replace($invalidChars, "", $filename);
    return $cleanedFilename;
}

$sql1 = "SELECT * FROM urunler WHERE urun_id = ?";
$stmt1 = mysqli_prepare($conn, $sql1);
mysqli_stmt_bind_param($stmt1, 'i', $id);
mysqli_stmt_execute($stmt1);
$result1 = mysqli_stmt_get_result($stmt1);

if (mysqli_num_rows($result1) > 0) {
    $row = mysqli_fetch_assoc($result1);
    $urunAdi = $row['urun_adi'];

    $urunAdi = str_replace(' ', '_', cleanFileName($urunAdi));

    $sql = "DELETE FROM urunler WHERE urun_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    if (mysqli_stmt_execute($stmt)) {
        $sql3 = "DELETE FROM urun_detaylari WHERE urun_id = ?";
        $stmt3 = mysqli_prepare($conn, $sql3);
        mysqli_stmt_bind_param($stmt3, 'i', $id);

        if (mysqli_stmt_execute($stmt3)) {
            $sql2 = "DELETE FROM anahtarlar WHERE urun_id = ? AND kullanilma_durumu = 0";
            $stmt2 = mysqli_prepare($conn, $sql2);
            mysqli_stmt_bind_param($stmt2, 'i', $id);

            $folderPath = "../images/games/" . $urunAdi;
            if (deleteDir($folderPath)) {
                header("Location: admin.php?delete=1");
            } else {
                header("Location: admin.php?delete=0&error=folder");
            }
            exit();
        }
    } else {
        header("Location: admin.php?delete=0&error=db");
        exit();
    }
} else {
    header("Location: admin.php?delete=2");
    exit();
}
