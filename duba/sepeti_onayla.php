<?php
session_start();
include 'baglanti.php';

$newTotalPrice = $_POST["newTotalPrice"];
$discount = $_POST["discount"];
$total = $_POST["total"];

if ($newTotalPrice > 0) {
    $user_id = $_SESSION['kullanici_id'];
    $sql = "START TRANSACTION;

    -- Satislar tablosuna kayıt ekleme
    INSERT INTO satislar (kullanici_id, araToplam, indirim, toplam, satisTarihi) VALUES ($user_id, $total, $discount, $newTotalPrice, NOW());
    SET @satis_id = LAST_INSERT_ID();";

    $arr = $_SESSION['sepet'];

    foreach ($arr as $key => $value) {
        // Her urun için uygun bir anahtar_id bul
        $anahtar_sql = "SELECT anahtar_id FROM anahtarlar WHERE urun_id = $key AND kullanilma_durumu = 0 LIMIT 1";
        $anahtar_result = mysqli_query($conn, $anahtar_sql);

        if ($anahtar_result && mysqli_num_rows($anahtar_result) > 0) {
            $row = mysqli_fetch_assoc($anahtar_result);
            $temp_anahtar_id = $row['anahtar_id'];

            // Anahtar_id ile satis_detaylari tablosuna ekleme yap
            $sql .= "INSERT INTO satis_detaylari (satislar_id, urun_id, platform, anahtar_id) VALUES (@satis_id, $key, '$value', $temp_anahtar_id); ";

            // Anahtarın kullanıldığını işaretlemek için anahtarlar tablosunu güncelle
            $sql .= "UPDATE anahtarlar SET kullanilma_durumu = 1 WHERE anahtar_id = $temp_anahtar_id; ";
        } else {
            // Eğer uygun bir anahtar_id bulunamazsa işlemi geri alabiliriz veya bir hata mesajı gösterebiliriz
            mysqli_query($conn, "ROLLBACK;");
            die("Urun ID $key için uygun bir anahtar bulunamadı.");
        }
    }

    $sql .= "COMMIT;";
    $result = mysqli_multi_query($conn, $sql);

    if ($result) {
        $cartItemCount = count($_SESSION['sepet']);
        if (isset($_SESSION['sepet']))
            $_SESSION['sepet'] = array();
        echo json_encode(array("status" => "success", "cartItemCount" => $cartItemCount));
    } else {
        // İşlem başarısız, hata ayıklama
        echo json_encode(array("status" => "error", "message" => "Geçersiz işlem"));
    }
}
