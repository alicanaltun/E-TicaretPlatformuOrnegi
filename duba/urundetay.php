<?php
$header_css = "game";
include 'ust.php';

// Ürün ID'sini al
$id = intval($_GET['id']);
// Ürünün sepete eklenip eklenmediğini kontrol et
$isInCart = isset($_SESSION['sepet'][$id]);

// JavaScript kodu içinde kullanmak üzere PHP değişkenini aktar
echo "<script>var isInCart = " . ($isInCart ? "true" : "false") . ";</script>";

// Ürün bilgilerini veritabanından al
$sql = "SELECT * FROM urunler
JOIN urun_detaylari ON urunler.urun_id = urun_detaylari.urun_id
JOIN pegi ON pegi.pegi_id = urun_detaylari.pegi_id
JOIN kategoriler ON  urun_detaylari.kategori_id = kategoriler.kategori_id
WHERE urunler.urun_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Veritabanından gelen veriyi kontrol et
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>
    <section>
        <div class="game">

            <div class="thumbnails">
                <h2 class="name"><?php echo $row["urun_adi"] ?></h2>

                <div class="thumbnail-area">
                    <div class="content">
                        <video src="<?php echo $row["urun_video1"] ?>" class="img-t" style="display: inline-block;" id="video-1" controls autoplay muted></video>
                        <img src="<?php echo $row["urun_img1"] ?>" class="img-t" id="img-1" alt="">
                        <img src="<?php echo $row["urun_img2"] ?>" class="img-t" id="img-2" alt="">
                        <img src="<?php echo $row["urun_img3"] ?>" class="img-t" id="img-3" alt="">
                    </div>
                </div>
                <div class="short-thumbnails">
                    <img src="<?php echo $row["urun_videothmb1"] ?>" id="video-1-t" class="thumbnail" alt="">
                    <img src="<?php echo $row["urun_img1"] ?>" width="241" height="135" id="img-1-t" class="thumbnail" alt="">
                    <img src="<?php echo $row["urun_img2"] ?>" width="241" height="135" id="img-2-t" class="thumbnail" alt="">
                    <img src="<?php echo $row["urun_img3"] ?>" width="241" height="135" id="img-3-t" class="thumbnail" alt="">
                </div>


            </div>

            <script>
                // Sayfa yüklendiğinde çalışacak JavaScript kodları
                $(document).ready(function() {
                    // Video elementini al
                    var videoElement = $("#video-1")[0];

                    // İlk thumbnail'ı göster
                    $("#video-1").show().addClass("active");

                    // Thumbnail'a tıklama olayı
                    $(".thumbnail").click(function() {
                        var clickedId = $(this).attr("id").replace("-t", "");
                        var isVisible = $("#" + clickedId).is(":visible");

                        // Aktif olan thumbnail'ı gizle
                        $(".img-t, video").removeClass("active");

                        // Tıklanan thumbnail'a göre görüntüleme
                        if (clickedId === "video-1" && !isVisible) {
                            $(".img-t").hide();
                            $("#video-1").show().addClass("active");
                            videoElement.play();
                        } else {
                            $(".img-t").hide();
                            $("#" + clickedId).show().addClass("active");
                            if (clickedId.startsWith("video-")) {
                                videoElement.play();
                            } else if (!videoElement.paused) {
                                videoElement.pause();
                            }
                        }
                    });
                });
            </script>

            <div class="gamebar">
                <img src="<?php echo $row["urun_logo"] ?>" class="logo" alt="game logo">
                <div class="score">
                    <a target="_blank" href="https://pegi.info/"><img src="<?php echo $row["pegi_img"] ?>" class="pegi" alt="pegi"></a>
                    <p><?php echo $row["pegi_aciklama"] ?></p>
                    <a target="_blank" href="<?php echo $row["urun_metascore_url"] ?>">
                        <div class="metacritic">
                            <div class="metascore" style='background-color:
                            <?php
                            $color;
                            $point = $row["urun_metascore"];
                            if ($point >= 75) {
                                $color = "#00CE7A";
                            } elseif ($point >= 50) {
                                $color = "#FFBD3F";
                            } else {
                                $color = "#FF6874";
                            }
                            echo $color ?>;'>
                                <span class="point"><?php echo $row["urun_metascore"] ?></span>
                            </div>
                            <img src="images/others/1280px-Metacritic_logo.svg-1.png" class="metacriticlogo" alt="">
                        </div>
                    </a>
                </div>
                <div class="platforms">
                    <p>Platform Seçiniz</p>
                    <form action="#" style="height: 213px;">
                        <?php
                        $platforms = ["ps5" => "PS5", "xbox" => "XBOX", "steam" => "STEAM"];
                        $firstChecked = false;
                        foreach ($platforms as $platform => $platformLabel) {
                            $disabled = $row["platform_$platform"] == 0 ? 'disabled' : '';
                            $opacity = $row["platform_$platform"] == 0 ? 'style="opacity: 0.5"' : '';
                            if ($row["platform_$platform"] == 1 && !$firstChecked) {
                                $firstChecked = true;
                                $checked = 'checked';
                            } else {
                                $checked = '';
                            }
                        ?>
                            <input type="radio" id="<?php echo $platform ?>" name="platform" value="<?php echo $platformLabel ?>" <?php echo $disabled ?> <?php echo $checked ?>>
                            <label for="<?php echo $platform ?>"><img src="images/others/<?php echo $platform ?>_logo.png" alt="" <?php echo $opacity ?>></label><br><br>
                        <?php } ?>
                    </form>
                </div>
                <?php
                $sql3 = "SELECT * FROM anahtarlar WHERE urun_id = ?  AND kullanilma_durumu = 0";
                $stmt3 = mysqli_prepare($conn, $sql3);
                mysqli_stmt_bind_param($stmt3, "i", $id);
                mysqli_stmt_execute($stmt3);
                $result3 = mysqli_stmt_get_result($stmt3);
                if (mysqli_num_rows($result3) > 0) {
                    $productState = 1;
                }else {
                    $productState = 0;
                }
                ?>
                <div class="purchase">
                    <span class="sale"><?php if ($row["urun_indirimDurumu"] == 1) echo number_format($row["urun_indirimsizFiyat"], 2, ",", ".") . ' TL' ?></span>
                    <span class="price"><?php echo number_format($row["urun_fiyat"], 2, ",", ".") . ' TL' ?></span>
                    <button type="button" class="btn btn-outline-light" style="margin-bottom: 14px; margin-top: 54px;" <?php if($productState == 0) echo 'disabled' ?> id="buy">Satın Al</button>
                    <button type="button" class="btn btn-outline-light" id="add-to-cart" <?php if($productState == 0) echo 'disabled' ?>><?php echo ($productState == 1) ? 'Sepete Ekle' : 'Tükendi'; ?></button>
                </div>
            </div>
        </div>

        <div class="description-box">
            <p class="description">Oyun Hakkında</p>
            <div style="white-space: pre-wrap;"><?php echo $row["urun_aciklama"] ?></div>
            
        </div>

        <div class="info-box">
            <p class="description" style="line-height: initial;">Oyun Bilgileri</p>
            <b>Tür: <span><?php echo $row["kategori_adi"] ?></span></b>
            <br>
            <b>Geliştirici: <span><?php echo $row["urun_gelistirici"] ?></span></b>
            <br>
            <b>Yayıncı: <span><?php echo $row["urun_yayinci"] ?></span></b>
            <br>
            <b>Çıkış Tarihi: <span><?php echo $row["urun_cikisTarihi"] ?></span></b>
        </div>
    </section>

    

    

<script>
    $(document).ready(function() {
        // Ürün sepete eklenmişse butonu devre dışı bırak
        if (isInCart) {
            $("#add-to-cart").prop("disabled", true);
            $("#add-to-cart").text("Sepete Eklendi");
        }

        // Kullanıcı butona tıkladığında yapılacaklar
        $("#add-to-cart").click(function() {
        // Seçilen platformu al
        var selectedPlatform = $("input[name='platform']:checked").val();
        
        // AJAX isteği
        $.ajax({
            url: "sepete_ekle.php", // İstek gönderilecek PHP dosyasının yolu
            type: "POST", // HTTP isteği türü (GET, POST, vb.)
            data: {
                id: <?php echo $id; ?>, // Ürün ID'sini JavaScript koduna ekle
                platform: selectedPlatform // Seçilen platformu ekle
            }, // Gönderilecek veri (örneğin, ürün ID ve platform)
            success: function(response) { // İstek başarılı olduğunda yapılacaklar
                var data = JSON.parse(response); // Yanıtı JSON'dan ayrıştır
                if (data.status === "success") {
                    var cartItemCount = data.cartItemCount; // Sepet sayacını güncelle
                    $("#cart").text(cartItemCount); // Sayacı güncelle
                    $("#add-to-cart").prop("disabled", true); // Butonu devre dışı bırak
                    $("#add-to-cart").text("Sepete Eklendi"); // Buton metnini güncelle
                } else {
                    console.error("Sepete ürün eklenirken bir hata oluştu.");
                }
            },
            error: function(xhr, status, error) { // İstek başarısız olduğunda yapılacaklar
                console.error(error); // Hata mesajını konsola yaz
            }
        });
    });

    $("#buy").click(function() {
        // Seçilen platformu al
        var selectedPlatform = $("input[name='platform']:checked").val();
        
        // AJAX isteği
        $.ajax({
            url: "sepete_ekle.php", // İstek gönderilecek PHP dosyasının yolu
            type: "POST", // HTTP isteği türü (GET, POST, vb.)
            data: {
                id: <?php echo $id; ?>, // Ürün ID'sini JavaScript koduna ekle
                platform: selectedPlatform // Seçilen platformu ekle
            }, // Gönderilecek veri (örneğin, ürün ID ve platform)
            success: function(response) { // İstek başarılı olduğunda yapılacaklar
                var data = JSON.parse(response); // Yanıtı JSON'dan ayrıştır
                if (data.status === "success") {
                    var cartItemCount = data.cartItemCount; // Sepet sayacını güncelle
                    $("#cart").text(cartItemCount); // Sayacı güncelle
                    $("#add-to-cart").prop("disabled", true); // Butonu devre dışı bırak
                    $("#add-to-cart").text("Sepete Eklendi"); // Buton metnini güncelle
                } else {
                    console.error("Sepete ürün eklenirken bir hata oluştu.");
                }
            },
            error: function(xhr, status, error) { // İstek başarısız olduğunda yapılacaklar
                console.error(error); // Hata mesajını konsola yaz
            }
        });
        window.location.href = "sepet.php";
    });
    });

    
</script>




<?php
}
include 'alt.php';
?>