<?php
session_start();



// Ürün ID'sini al
$id = intval($_POST["id"]);

// Ürün ID'si 0'dan büyükse işleme devam et
if ($id > 0) {
    if(isset($_SESSION['sepet'][$id]))
    unset($_SESSION['sepet'][$id]);

    $cartItemCount = count($_SESSION['sepet']);

    echo json_encode(array("status" => "success", "cartItemCount" => $cartItemCount));
} else {
    // Ürün ID'si geçersizse veya 0 ise hata döndür
    echo json_encode(array("status" => "error", "message" => "Geçersiz ürün ID'si"));
}
?>
