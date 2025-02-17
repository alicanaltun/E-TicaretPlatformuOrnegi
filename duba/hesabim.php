<?php
include 'baglanti.php';
session_start();
if (!isset($_SESSION['kullanici_id']) && !isset($_SESSION["kullanici_adi"])) {
    header("Location: login.php");
    exit();
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/hesabim.css" class="css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet " href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <section>
        <?php
        $sql = "SELECT * FROM kullanicilar WHERE kullanici_id = " . $_SESSION['kullanici_id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-3 d-flex flex-column justify-content-center align-items-center vh-100">
                    <div class="sectionDivs" style="margin-top: -500px;"><button id="geri">
                            <p><i class="fa-solid fa-arrow-left" style="color: white;font-size: 30px;"></i></p>
                        </button></div>
                    <div class="sectionDivs"><button id="hesapBilgileri">
                            <p>Hesap İşlemleri</p>
                        </button></div>
                    <div class="sectionDivs"><button id="sifreVeGüvenlik">
                            <p>Şifre ve Güvenlik</p>
                        </button></div>
                    <div class="sectionDivs"><button id="satınAlımGeçmişi">
                            <p>Satın Alma Geçmişi</p>
                        </button>
                    </div>
                </div>

                <div class="col-sm-9 ">
                    <div style="display: block;" id="hesapİşlemleri">
                        <br><br><br>
                        <h3>Hesap Bilgileri</h3>
                        <p>Kullanıcı Adı</p>
                        <input class="form-control " type="text " value="<?php echo $row['kullanici_adi'] ?>" readonly>
                        <br>
                        <p>Eposta Adresi</p>
                        <input class="form-control " type="text" value="<?php echo $row['email'] ?>" readonly>
                        <br>

                        <br><br><br>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST["ad"]) && isset($_POST["soayd"]) && isset($_POST["adres"])) {
                                $ad = test_input($_POST["ad"]);
                                $soyad = test_input($_POST["soayd"]);
                                $adres = test_input($_POST["adres"]);

                                if ($ad == "" || $soyad == "" || $adres == "") {
                                    echo "<script>alert('Lütfen tüm alanları doldurunuz');</script>";
                                } else {
                                    $user_id = $_SESSION["kullanici_id"];
                                    $query1 = "UPDATE kullanicilar SET ad = ?, soyad = ?, adres = ? WHERE kullanici_id = $user_id";
                                    $stmt = mysqli_prepare($conn, $query1);
                                    mysqli_stmt_bind_param($stmt, "sss", $ad, $soyad, $adres);
                                    mysqli_stmt_execute($stmt);
                                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                                        echo "<script>alert('Kişisel bilgileriniz güncellendi');</script>";
                                        header("refresh: 0; url=hesabim.php");
                                        exit();
                                    } else {
                                        echo "<script>alert('Kişisel bilgiler güncellenmedi');</script>";
                                    }
                                }
                            }
                        }

                        ?>

                        <h3>Kişisel Bilgiler</h3>
                        <form action="" method="POST">
                            <label for="ad">
                                <p>Adınız</p>
                            </label>
                            <input class="form-control " type="text" name="ad" value="<?php echo $row['ad'] ?>" required>
                            <br>
                            <label for="soyad">
                                <p>Soyadınız</p>
                            </label>
                            <input class="form-control " type="text" name="soayd" value="<?php echo $row['soyad'] ?>" required>
                            <br>
                            <label for="adres">
                                <p>Adres Bilgileri</p>
                            </label>
                            <input class="form-control " type="text" name="adres" value="<?php echo $row['adres'] ?>" required>
                            <br>
                            <button id="adresOnay" type="submit" class="btn btn-primary">Düzenle</button>
                        </form>

                    </div>


                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["mevcutsifre"]) && isset($_POST["yenisifre"]) && isset($_POST["yenisifretekrar"])) {
                            $mevcutSifre = trim($_POST["mevcutsifre"]);
                            $yeniSifre = trim($_POST["yenisifre"]);
                            $yeniSifreTekrar = trim($_POST["yenisifretekrar"]);

                            if ($mevcutSifre == "" || $yeniSifre == "" || $yeniSifreTekrar == "") {
                                echo "<script>alert('Lütfen tüm alanları doldurunuz');</script>";
                            } else if ($yeniSifre != $yeniSifreTekrar) {
                                echo "<script>alert('Şifreler eşleşmiyor');</script>";
                            } else {
                                $user_id = $_SESSION["kullanici_id"];
                                $query = "SELECT sifre_hash, sifre_salt FROM kullanicilar WHERE kullanici_id = $user_id";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $salt = $row["sifre_salt"];
                                    $hashed_password = crypt($mevcutSifre, '$6$' . $salt . '$');

                                    $sql = "SELECT * FROM kullanicilar WHERE kullanici_id = $user_id AND sifre_hash = '$hashed_password'";
                                    $result1 = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result1) > 0) {
                                        $newhashed_password = crypt($yeniSifre, '$6$' . $salt . '$');
                                        $update_query = "UPDATE kullanicilar SET sifre_hash = '$newhashed_password' WHERE kullanici_id = $user_id";
                                        if (mysqli_query($conn, $update_query)) {
                                            echo "<script>alert('Şifreniz güncellendi');</script>";
                                            echo "<script>window.location.href = 'hesabim.php';</script>";
                                            exit();
                                        } else {
                                            echo "<script>alert('Şifre güncelleme hatası');</script>";
                                        }
                                    } else {
                                        echo "<script>alert('Mevcut şifrenizi yanlış girdiniz');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Kullanıcı bulunamadı');</script>";
                                }
                            }
                        }
                    }
                    ?>

                    <div id="şifreİşlemleri">
                        <br><br><br>
                        <h3>Şifrenizi Değiştirin</h3>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <label for="mevcutsifre" style="color:whitesmoke;">
                                <p>Mevcut Şifre</p>
                            </label>
                            <input id="mevcutŞifre" name="mevcutsifre" class="form-control input-lg" type="password" required>
                            <br><br>
                            <label for="yenisifre">
                                <p>Yeni Şifre</p>
                            </label>
                            <input id="yeniŞifre" name="yenisifre" class="form-control input-lg" type="password" pattern=".{8,}" required title="Şifreniz en az 8 karakter olmalıdır." required>
                            <br><br>
                            <label for="yenisifretekrar">
                                <p>Yeni Şifre Tekrar</p>
                            </label>
                            <input id="yeniŞifreOnay" name="yenisifretekrar" class="form-control input-lg" type="password" required>
                            <br>
                            <button id="şifreSubmit" type="submit" class="btn btn-primary">Değişiklikleri Kaydet</button>
                            <br>
                        </form>

                        <br><br><br>
                        <h3>Her Yerden Çıkış Yap </h3>
                        <p>Diğer tüm tarayıcılar, telefonlar, konsollar veya diğer cihazlar da dahil olmak üzere Duba hesabınızın
                            kullanıldığı her yerden çıkış yapın</p>
                        <button class="btn btn-primary" type="button" id="cıkıs">Diğer Oturumları Kapat</button>
                    </div>

                    <div id="geçmişİslemleri">
                        <th scope="row"></th>
                        <br><br><br><br><br><br>
                        <?php
                        $user_id = $_SESSION["kullanici_id"];
                        $query = "SELECT
                        `duba`.`satislar`.`satisTarihi` AS `satisTarihi`,
                        `duba`.`urunler`.`urun_adi` AS `urun_adi`,
                        `duba`.`satis_detaylari`.`platform`  AS `platform`,
                        `duba`.`urunler`.`urun_fiyat` AS `urun_fiyat`,
                        `duba`.`anahtarlar`.`urun_anahtarKodu` AS `urun_anahtarKodu`
                      FROM `duba`.`kullanicilar`
                      JOIN `duba`.`satislar` ON `duba`.`kullanicilar`.`kullanici_id` = `duba`.`satislar`.`kullanici_id`
                      JOIN `duba`.`satis_detaylari` ON `duba`.`satislar`.`satislar_id` = `duba`.`satis_detaylari`.`satislar_id`
                      JOIN `duba`.`anahtarlar` ON `duba`.`satis_detaylari`.`anahtar_id` = `duba`.`anahtarlar`.`anahtar_id`
                      JOIN `duba`.`urunler` ON `duba`.`anahtarlar`.`urun_id` = `duba`.`urunler`.`urun_id`
                      WHERE
                        `duba`.`kullanicilar`.`kullanici_id` = $user_id ORDER BY `duba`.`satislar`.`satisTarihi` DESC;";
                        ?>
                        <h3>Satın Alma Geçmişi</h3>
                        <br><br>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Oyun Adı</th>
                                    <th scope="col">Platform</th>
                                    <th scope="col">Fiyat</th>
                                    <th scope="col">Kod</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    $i = 1;  // Move the variable declaration outside the loop
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo date('d.m.Y', strtotime($row[0])); ?></td>
                                            <td><?php echo $row[1]; ?></td>
                                            <td><?php
                                                switch ($row[2]) {
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
                                                ?></td>
                                            <td><?php echo number_format($row[3], 2, ",", ".") . ' TL'; ?></td>
                                            <td><?php echo $row[4]; ?></td>
                                        </tr>
                                <?php
                                        $i++;
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>Satın aldığınız ürün yok</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <br><br><br>
                    </div>
                </div>




            </div>
        </div>
        </div>


        </div>
        </div>
        </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#hesapBilgileri').click(function() {
                    let hesap = $('#hesapİşlemleri');
                    hesap.fadeIn();
                    let sifre = $('#şifreİşlemleri');
                    sifre.css('display', 'none');
                    let satınalma = $('#geçmişİslemleri');
                    satınalma.css('display', 'none');
                    let ödeme = $('#ödemeİşlemleri');
                    ödeme.css('display', 'none');
                });
                $('#sifreVeGüvenlik').click(function() {
                    let hesap = $('#hesapİşlemleri');
                    hesap.css('display', 'none');
                    let sifre = $('#şifreİşlemleri');
                    sifre.fadeIn();
                    let satınalma = $('#geçmişİslemleri');
                    satınalma.css('display', 'none');
                    let ödeme = $('#ödemeİşlemleri');
                    ödeme.css('display', 'none');
                });
                $('#satınAlımGeçmişi').click(function() {
                    let hesap = $('#hesapİşlemleri');
                    hesap.css('display', 'none');
                    let sifre = $('#şifreİşlemleri');
                    sifre.css('display', 'none');
                    let satınalma = $('#geçmişİslemleri');
                    satınalma.fadeIn();
                    let ödeme = $('#ödemeİşlemleri');
                    ödeme.css('display', 'none');
                });
                $('#ödemeYöntemi').click(function() {
                    let hesap = $('#hesapİşlemleri');
                    hesap.css('display', 'none');
                    let sifre = $('#şifreİşlemleri');
                    sifre.css('display', 'none');
                    let satınalma = $('#geçmişİslemleri');
                    satınalma.css('display', 'none');
                    let ödeme = $('#ödemeİşlemleri');
                    ödeme.fadeIn();


                });
                $('#şifreSubmit').click(function() {
                    var yeniSifre = $('#yeniŞifre').val();
                    var yeniSifreOnay = $('#yeniŞifreOnay').val();

                    if (yeniSifre == yeniSifreOnay) {
                        $("#Kontrol").text("Şifre Başarıyla değiştirildi");
                    } else {
                        $("#Kontrol").text("Şifreler Uyuşmuyor veya Mevcut Şifre Yanlış");
                    }

                    $("#Kontrol").fadeIn();

                    setTimeout(function() {
                        $("#Kontrol").fadeOut();
                    }, 2000);
                });


                $('#cıkıs').click(function() {
                    $.ajax({
                        url: "cikis_yap.php",
                        type: "POST",
                        data: {},
                        success: function(response) {
                            var data = JSON.parse(response);
                            if (data.status === "success") {
                                console.log("Çıkış başarılı.");
                                window.location.href = "index.php";
                            } else {
                                console.error("Çıkış yapılırken problem.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });




                $('#kullaniciAd').click(function() {
                    $("#adKontrol").fadeIn();

                    setTimeout(function() {
                        $("#adKontrol").fadeOut();
                    }, 2000);
                });

                $('#adresOnay').click(function() {
                    $("#adresKontrol").fadeIn();

                    setTimeout(function() {
                        $("#adresKontrol").fadeOut();
                    }, 2000);
                });


            });

            $(document).ready(function() {
                $('#geri').click(function(e) {
                    e.preventDefault(); // Varsayılan tıklama işlemini engelle
                    history.back(); // Geri git
                });
            });
        </script>

        </script>


    </section>
</body>

</html>