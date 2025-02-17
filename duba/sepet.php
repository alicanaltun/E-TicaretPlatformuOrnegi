<?php
session_start();
if (!isset($_SESSION['kullanici_id']) && !isset($_SESSION["kullanici_adi"])) {
    header("Location: login.php");
    exit();
}

$header_css = "sepet";
include 'ust.php';

$user_id = $_SESSION['kullanici_id'];
$sql2 = "SELECT COUNT(*) FROM satislar JOIN
    kullanicilar ON satislar.kullanici_id = kullanicilar.kullanici_id
    WHERE kullanicilar.kullanici_id = $user_id";
$result = mysqli_query($conn, $sql2);
if ($result) {
    $row = mysqli_fetch_array($result);
    $count = $row[0];

    if ($count > 0) {
        $discountState = 0;
    } else {
        $discountState = 1;
    }
} else {
    "Error: " . mysqli_error($conn);
}



if (!isset($_SESSION['sepet'])) {
    $_SESSION['sepet'] = array();
}


$in = implode(",", array_keys($_SESSION['sepet']));
if (empty($in)) {
    $in = 0;
}

$sql = "SELECT * FROM urunler
JOIN urun_detaylari ON urunler.urun_id = urun_detaylari.urun_id
JOIN pegi ON pegi.pegi_id = urun_detaylari.pegi_id
JOIN kategoriler ON  urun_detaylari.kategori_id = kategoriler.kategori_id
WHERE urunler.urun_id IN ($in)";
$result = mysqli_query($conn, $sql);

$subtotal = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $urun_fiyat = $row["urun_fiyat"] ?? 0;
        $subtotal += $urun_fiyat;
    }
}
?>

<section>
    <div class="cart-container">
        <h3 class="description">Sepet</h3>
        <?php
        if (mysqli_num_rows($result) > 0) {
            mysqli_data_seek($result, 0);  // Reset result pointer to reuse the result set
            while ($row = mysqli_fetch_assoc($result)) {
                $urun_fiyat = $row["urun_fiyat"] ?? 0;
                $urun_indirimsizFiyat = $row["urun_indirimsizFiyat"] ?? 0;

                $formattedPrice = number_format($urun_fiyat, 2, ",", ".");
                $formattedDiscountPrice = number_format($urun_indirimsizFiyat, 2, ",", ".");
        ?>
                <div class="product" id="product_<?php echo $row["urun_id"]; ?>" data-price="<?php echo $urun_fiyat; ?>" data-discount-price="<?php echo $urun_indirimsizFiyat; ?>">
                    <img src="<?php echo $row["urun_logo"] ?>" class="logo" alt="">
                    <h3 class="info" id="name"><?php echo $row["urun_adi"] ?></h3>
                    <h3 class="info"><?php switch ($_SESSION['sepet'][$row["urun_id"]]) {
                                            case 'PS5':
                                                echo "PlayStation®5";
                                                break;
                                            case 'XBOX':
                                                echo "Xbox Series X";
                                                break;
                                            case 'STEAM':
                                                echo "Steam";
                                                break;
                                        }
                                        ?></h3>
                    <h3 class="info sale" id="sale" <?php if ($row["urun_indirimDurumu"] == 0) echo 'style="display: none;"' ?>><?php echo $formattedDiscountPrice ?> TL</h3>
                    <h3 class="info price" id="price"><?php echo $formattedPrice ?> TL</h3>
                    <button class="delete-button" onclick="deleteParent(this)">-</button>
                </div>
            <?php
            }
        }
            ?>
            <div class="emp" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h2 style="text-align: center; color: whitesmoke;">Sepetiniz Boş</h2>
                <p style="color:white">Sepetinizde hiç ürün bulunmamaktadır.</p>
            <?php
        
            ?>
            </div>

            <div class="purchase-container" <?php if ($subtotal == 0) echo 'style="display: none;"'; ?>>

                <h4 class="total" style="margin-bottom: 4px; <?php if ($discountState == 0) echo 'border-bottom: 2px solid #bdb6b6d7; padding-bottom: 8px;' ?>">Ara Toplam: <span style="float: right;margin-right:36px;"><span id="total">0</span></span></h4>
                <h4 class="description" style="margin-bottom: 4px; margin-top: 5px;<?php if ($discountState == 0) echo 'display: none;' ?>">Sepette %20 İndirim <span style="float: right;margin-right:36px;"><span id="discount">0</span></span></h4>
                <h3 class="total">Toplam: <span style="float: right;margin-right:36px;"><span id="total-price">0</span></span></h3>
                <button type="button" class="btn btn-outline-light" id="purchase" onclick="openModal()">Ödeme Yap</button>
                <div id="myModal" class="modal">
                    <button class="delete-button" onclick="closeModal()">x</button>
                    <div class="message" style="display: none;">
                        <p><span id="cart-total"></span> tutarındaki alışveriniz başarılı bir şekilde gerçekleşmiştir.
                            <a href="hesabim.php">Hesabım</a> sayfasındaki Satın Alma Geçmişi sekmesinden ürün kodlarına erişebilirsiniz.
                        </p>
                    </div>

                    <div class="credit-card-info">
                        <div class="field-container">
                            <label for="fullname">Ad Soyad:</label>
                            <input id="fullname" maxlength="20" type="text">
                        </div>
                        <div class="field-container">
                            <label for="cardnumber">Kredi Kartı Numarası:</label>
                            <input id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
                        </div>
                        <div class="field-container">
                            <label for="expirationdate">Son Geçerlilik Tarihi:</label>
                            <input id="expirationdate" type="text" pattern="[0-9]*" inputmode="numeric" placeholder="AA/YY" data-mask="00/00">
                        </div>
                        <div class="field-container">
                            <label for="securitycode">Güvenlik Kodu</label>
                            <input id="securitycode" type="password" pattern="[0-9]*" inputmode="numeric" data-mask="000">
                        </div>
                        <button type="button" class="btn btn-outline-light" id="purchase-w-credit-card" onclick="validateForm()" style="float: right;">Ödeme Yap</button>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#cardnumber').mask('0000 0000 0000 0000');
                        $('form').submit(function(e) {
                            if (!validateForm()) {
                                e.preventDefault();
                            }
                        });
                    });

                    var isPaymentCompleted = false;

                    function validateForm() {
                        var fullname = document.getElementById("fullname").value;
                        if (fullname.trim() === '') {
                            alert("Ad Soyad boş bırakılamaz.");
                            return false;
                        }

                        var cardNumber = document.getElementById("cardnumber").value;
                        if (cardNumber.trim() === '' || cardNumber.length < 19) {
                            alert("Kredi kartı numarası boş bırakılamaz ve 16 haneli olmalıdır.");
                            return false;
                        }

                        var expirationdate = document.getElementById("expirationdate").value;
                        if (expirationdate.trim() === '' || expirationdate.length < 5) {
                            alert("Son geçerlilik tarihi boş bırakılamaz.");
                            return false;
                        }

                        var securitycode = document.getElementById("securitycode").value;
                        if (securitycode.trim() === '' || securitycode.length < 3) {
                            alert("Güvenlik Kodu boş bırakılamaz.");
                            return false;
                        }

                        var newTotalPriceStr = $("#total-price").text().trim(); // Önce #total elementinin metnini alıyoruz
                        var formattednewTotalPriceStr = newTotalPriceStr.replace(".", "").replace(",", "."); // Virgül ve nokta arasındaki dönüşümü sağlıyoruz
                        var newTotalPrice = parseFloat(formattednewTotalPriceStr);
                        var discount = parseFloat($("#discount").text().replace(",", ".").replace(" TL", ""));

                        var discountStr = $("#discount").text().trim(); // Önce #total elementinin metnini alıyoruz
                        var formattedDiscountStr = discountStr.replace(/-/g, ''); // "-" karakterini kaldırıyoruz
                        formattedDiscountStr = formattedDiscountStr.replace(".", "").replace(",", "."); // Virgül ve nokta arasındaki dönüşümü sağlıyoruz
                        var discount = parseFloat(formattedDiscountStr);


                        var totalStr = $("#total").text().trim(); // Önce #total elementinin metnini alıyoruz
                        var formattedTotalStr = totalStr.replace(".", "").replace(",", "."); // Virgül ve nokta arasındaki dönüşümü sağlıyoruz
                        var total = parseFloat(formattedTotalStr);

                        $(".credit-card-info").css("display", "none");
                        $(".message").css("display", "block");
                        $(".cart-container .product").remove();
                        $("#total").text("0");
                        $("#total-price").text("0");
                        $("#discount").text("0");
                        $.ajax({
                            url: "sepeti_onayla.php",
                            type: "POST",
                            data: {
                                newTotalPrice: newTotalPrice,
                                discount: discount,
                                total: total
                            },
                            success: function(response) {
                                var data = JSON.parse(response);
                                if (data.status === "success") {
                                    isPaymentCompleted = true;
                                } else {
                                    console.error("Sepet boşaltılırken problem.");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                        return true;

                    }
                </script>
            </div>
            <div id="overlay" class="overlay"></div>
</section>

<script>

    function openModal() {
        document.getElementById("myModal").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }

    function closeModal() {
        if (isPaymentCompleted) {
            redirectToIndexPage();
        } else {
            document.getElementById("myModal").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    }

    function redirectToIndexPage() {
        window.location.href = "./";
    }

    function deleteParent(element) {
        var productID = element.parentElement.id.split("_")[1];
        var deletedProductPrice = parseFloat($(element).parent().data('price'));
        element.parentElement.remove();

        var temp = parseInt($("#cart").text());
        temp -= 1;
        $("#cart").text(temp);

        updateTotalPrice(-deletedProductPrice);
        updateDiscount();

        $.ajax({
            url: "sepetten_cikar.php",
            type: "POST",
            data: {
                id: productID,
            },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === "success") {

                } else {
                    console.error("Sepete ürün çıkarılırken bir hata oluştu.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function updateTotalPrice(removedPrice) {
        var currentTotalPrice = parseFloat($("#total-price").text().replace(",", ".").replace(" TL", ""));
        var newTotalPrice = currentTotalPrice + removedPrice;
        $("#total-price").text(newTotalPrice.toFixed(2).replace(".", ",") + " TL");
    }

    function updateDiscount() {
        var total = 0;

        $(".product").each(function() {
            var price = parseFloat($(this).data('price'));
            if (!isNaN(price)) {
                total += price;
            }
        });

        var discount = <?php echo $discountState == 1 ? "total * 0.2" : "0"; ?>;
        var lastTotal = total - discount;

        $("#total").text(formatCurrency(total) + " TL");
        $("#discount").text(discount > 0 ? "-" + formatCurrency(discount) + " TL" : "0 TL");
        $("#total-price").text(formatCurrency(lastTotal) + " TL");
        $("#cart-total").text(formatCurrency(lastTotal) + " TL");

        $("#purchase").prop("disabled", lastTotal === 0);

        // Hide or show purchase container based on total amount
        if (lastTotal === 0) {
            $(".purchase-container").hide();
            $(".emp").show();
        } else {
            $(".purchase-container").show();
            $(".emp").hide();
        }
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('tr-TR', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(amount);
    }

    $(document).ready(function() {
        updateDiscount();
    });
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<?php
include 'alt.php';
?>