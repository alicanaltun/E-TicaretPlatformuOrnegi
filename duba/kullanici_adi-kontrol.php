<?php
include 'baglanti.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];

    // Veritabanında kullanıcı adını kontrol et
    $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $response = array();
    if (mysqli_num_rows($result) > 0) {
        // Kullanıcı adı zaten kullanılıyor
        $response["exists"] = true;
    } else {
        $response["exists"] = false;
    }

    echo json_encode($response);
}
?>
