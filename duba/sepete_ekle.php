<?php
session_start();



// Ürün ID'sini al
$id = intval($_POST["id"]);
$platform = $_POST['platform'];

// Ürün ID'si 0'dan büyükse işleme devam et
if ($id > 0) {
    // Sepetin olup olmadığını kontrol et, yoksa oluştur
    if (!isset($_SESSION['sepet'])) {
        $_SESSION['sepet'] = array();
    }

    // Ürünü sepete ekle (örneğin, ürün ID'sini anahtar olarak kullanarak)
    $_SESSION['sepet'][$id] = $platform;

    // Sepetteki ürün sayısını hesapla
    $cartItemCount = count($_SESSION['sepet']);

    // Sonucu JSON formatında döndür
    echo json_encode(array("status" => "success", "cartItemCount" => $cartItemCount));
} else {
    // Ürün ID'si geçersizse veya 0 ise hata döndür
    echo json_encode(array("status" => "error", "message" => "Geçersiz ürün ID'si"));
}
?>
