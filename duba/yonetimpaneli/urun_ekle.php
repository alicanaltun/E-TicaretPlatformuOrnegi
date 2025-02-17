<?php
ob_start();
include '../baglanti.php';
include 'ust.php';
include 'menu.php';
require 'verot.net.php';

use Verot\Upload\Upload;
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ürünler</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Ürünler</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <?php
    







    $sql = "SELECT * FROM kategoriler";
    $result = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM pegi";
    $result1 = mysqli_query($conn, $sql1);
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürün Ekle</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if ((isset($_GET['success'])) && ($_GET['success'] == 1)) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Başarılı </h5>
                                Ürün başarıyla eklendi.
                              </div>';
                            } else if ((isset($_GET['success'])) && ($_GET['success'] == 0)) {
                                echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Hata </h5>
                                Ürün eklenirken bir hata oluştu.
                              </div>';
                            }
                            ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="urun_adi">Ürün Adı</label>
                                <input type="text" class="form-control" name="urun_adi" placeholder="Ürün Adını Giriniz" required> </br>
                                <label for="urun_fiyat">Ürün Fiyatı</label>
                                <input type="number" class="form-control" name="urun_fiyat" placeholder="Ürün Fiyatını giriniz. Kuruş ayracı olarak nokta(.) veya virgül(,) kullanabilrisiniz." min="0" step="0.01" required> </br>
                                <label for="urun_indirimsizFiyat">Ürün İndirimsiz Fiyatı</label>
                                <input type="number" class="form-control" name="urun_indirimsizFiyat" placeholder="Eğer üründe indirim yoksa boş bırakınız." min="0" step="0.01"> </br>
                                <label for="urun_aciklama">Ürün Açıklaması</label>
                                <textarea class="form-control" rows="12" placeholder="Ürün Açıklamasını Giriniz" name="urun_aciklama" required></textarea> </br>
                                <label for="urun_metascore">Metascore Puanı</label>
                                <input type="number" class="form-control" name="urun_metascore" placeholder="Metascore puanını giriniz." min=0 required> </br>
                                <label for="urun_metascore_url">Metascore URL</label>
                                <input type="text" class="form-control" name="urun_metascore_url" placeholder="Ürün Metascore sayfası linkini giriniz.(Zorunlu değildir)"> </br>
                                <label for="platform_ps5">PlayStation®5</label>
                                <select class="form-control select2" name="platform_ps5" style="width: 100%;" required>
                                    <option value="1" selected>Var</option>
                                    <option value="0">Yok</option>
                                </select> </br>
                                <label for="platform_xbox">Xbox Series X</label>
                                <select class="form-control select2" name="platform_xbox" style="width: 100%;" required>
                                    <option value="1" selected>Var</option>
                                    <option value="0">Yok</option>
                                </select> </br>
                                <label for="platform_steam">Steam</label>
                                <select class="form-control select2" name="platform_steam" style="width: 100%;" required>
                                    <option value="1" selected>Var</option>
                                    <option value="0">Yok</option>
                                </select> </br>
                                <label for="urun_img">Ürün Kapak Resmi</label>
                                <input type="file" class="form-control" name="urun_img" placeholder="Ürün Resmi" accept=".png" required> </br>
                                <label for="urun_logo">Ürün Logosu</label>
                                <input type="file" class="form-control" name="urun_logo" placeholder="Ürün Resmi" accept=".png" required> </br>
                                <label for="urun_video1">Ürün Video - 1</label>
                                <input type="file" class="form-control" name="urun_video1" placeholder="Ürün Videosu" accept=".mp4, .webm, .avi, .flv" required> </br>
                                <label for="urun_videothmb1">Ürün Video Thumbnail</label>
                                <input type="file" class="form-control" name="urun_videothmb1" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png" required> </br>
                                <label for="urun_img1">Ürün Resmi - 1</label>
                                <input type="file" class="form-control" name="urun_img1" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png" required> </br>
                                <label for="urun_img2">Ürün Resmi - 2</label>
                                <input type="file" class="form-control" name="urun_img2" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png" required> </br>
                                <label for="urun_img3">Ürün Resmi - 3</label>
                                <input type="file" class="form-control" name="urun_img3" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png" required> </br>
                                <label for="kategori">Kategori</label>
                                <select class="form-control select2" name="kategori" style="width: 100%;" required>
                                    <option value="" selected disabled>Kategori Seçiniz</option>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row["kategori_id"] . '">' . $row["kategori_adi"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select> </br>
                                <label for="pegi">Pegi</label>
                                <select class="form-control select2" name="pegi" style="width: 100%;" required>
                                    <option value="" selected disabled>Pegi Seçiniz</option>
                                    <?php
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row = mysqli_fetch_assoc($result1)) {
                                            echo '<option value="' . $row["pegi_id"] . '">' . $row["pegi_id"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select> </br>
                                <label for="urun_gelistirici">Ürün Geliştiricisi</label>
                                <input type="text" class="form-control" name="urun_gelistirici" placeholder="Ürün geliştiricisi adını giriniz."> </br>
                                <label for="urun_yayinci">Ürün Yayıncısı</label>
                                <input type="text" class="form-control" name="urun_yayinci" placeholder="Ürün yayıncısı adını giriniz."> </br>
                                <label for="urun_cikisTarihi">Ürün Çıkış Tarihi</label>
                                <input type="date" class="form-control" name="urun_cikisTarihi" placeholder="Ürün çıkış tarihini giriniz."> </br>
                                <button type="submit" class="btn btn-primary">Ürün Ekle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var selectedCategory = document.querySelector('select[name="kategori"]').value;
        if (selectedCategory === '') {
            event.preventDefault(); 
        }
    });
</script>

<?php
include 'alt.php';
function cleanFileName($filename) {
    $invalidChars = array("\\", "/", ":", "*", "?", "\"", "<", ">", "|");
    $cleanedFilename = str_replace($invalidChars, "", $filename);
    return $cleanedFilename;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_adi = $_POST["urun_adi"];
    $kategori = $_POST["kategori"];
    $urun_gelistirici = $_POST["urun_gelistirici"];
    $urun_yayinci = $_POST["urun_yayinci"];
    $urun_cikisTarihi = $_POST["urun_cikisTarihi"];
    $urun_fiyat = $_POST["urun_fiyat"];
    $urun_indirimsizFiyat = $_POST["urun_indirimsizFiyat"];
    if ($urun_indirimsizFiyat == "") {
        $urun_indirimDurumu = 0;
        $urun_indirimsizFiyat = 'NULL';
    } else if ($urun_indirimsizFiyat > 0) {
        $urun_indirimDurumu = 1;
    }
    $urun_aciklama = $_POST["urun_aciklama"];
    $pegi = $_POST["pegi"];
    $urun_metascore = $_POST["urun_metascore"];
    $urun_metascore_url = $_POST["urun_metascore_url"];
    $platform_ps5 = $_POST["platform_ps5"];
    $platform_xbox = $_POST["platform_xbox"];
    $platform_steam = $_POST["platform_steam"];

    
    enum Aylar: string {
        case Ocak = 'Ocak';
        case Şubat = 'Şubat';
        case Mart = 'Mart';
        case Nisan = 'Nisan';
        case Mayıs = 'Mayıs';
        case Haziran = 'Haziran';
        case Temmuz = 'Temmuz';
        case Ağustos = 'Ağustos';
        case Eylül = 'Eylül';
        case Ekim = 'Ekim';
        case Kasım = 'Kasım';
        case Aralık = 'Aralık';
    
        public static function fromNumber(int $month): self {
            return match($month) {
                1 => self::Ocak,
                2 => self::Şubat,
                3 => self::Mart,
                4 => self::Nisan,
                5 => self::Mayıs,
                6 => self::Haziran,
                7 => self::Temmuz,
                8 => self::Ağustos,
                9 => self::Eylül,
                10 => self::Ekim,
                11 => self::Kasım,
                12 => self::Aralık,
                default => throw new InvalidArgumentException('Geçersiz ay numarası'),
            };
        }
    }

    try {
        $dateTime = new DateTime($urun_cikisTarihi);
        $day = $dateTime->format('d');
        $monthNumber = (int)$dateTime->format('m');
        $year = $dateTime->format('Y');

        $monthName = Aylar::fromNumber($monthNumber)->value;

        $formattedDate = "$day $monthName $year";
    } catch (Exception $e) {
        echo "Tarih dönüştürme hatası: " . $e->getMessage();
        exit();
    }


    $video_name = $_FILES['urun_video1']['name'];
    $tmp_name = $_FILES['urun_video1']['tmp_name'];
    $error = $_FILES['urun_video1']['error'];

    
    $urun_dizin_adi = str_replace(" ", "_", cleanFileName($_POST["urun_adi"]));

    $dizin_adi = "../images/games/$urun_dizin_adi/";

    $file_state = false;
    if (!file_exists($dizin_adi)) {
        if (mkdir($dizin_adi, 0777, true)) {
            $file_state = true;
        } else {
            echo '<script>alert("eror: Dizin oluşturulurken bir hata oluştu.");</script>';
            exit();
        }
    } else {
        echo '<script>alert("eror: Belirtilen dizin zaten mevcut.");</script>';
        exit();
    }

    $video1_state = false;
    if (($file_state == true) && $error === 0) {
        $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

        $video_ex_lc = strtolower($video_ex);

        $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

        if (in_array($video_ex_lc, $allowed_exs)) {

            $new_video_name = 'video1' . '.' . $video_ex_lc;
            $video_upload_path = $dizin_adi . $new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);
            $video1_state = true;
            $video_upload_path = substr($video_upload_path, 3);
        } else {
            echo '<script>alert("eror: Video yüklenemedi.");</script>';
            exit();
        }
    }

    $img_state = false;
    if ($file_state === true) {
        $foo = new Upload($_FILES['urun_img']);
        if ($foo->uploaded) {
            $foo->image_convert = 'png';
            $foo->file_new_name_body = 'img';
            $foo->process($dizin_adi);
            if ($foo->processed) {
                $img = $foo->file_dst_pathname ;
                $img = substr($img, 3);
                $img_state = true;
            } else {
                echo '<script>alert("error : ' . $foo->error . '");</script>';
                exit();
            }
        }
    }

    $logo_state = false;
    if ($file_state === true) {
        $foo = new Upload($_FILES['urun_logo']);
        if ($foo->uploaded) {
            $foo->image_convert = 'png';
            $foo->file_new_name_body = 'logo';
            $foo->process($dizin_adi);
            if ($foo->processed) {
                $logo = $foo->file_dst_pathname ;
                $logo = substr($logo, 3);
                $logo_state = true;
            } else {
                echo '<script>alert("error : ' . $foo->error . '");</script>';
                exit();
            }
        }
    }

    $videothmb1_state = false;
    if ($file_state === true) {
        $foo = new Upload($_FILES['urun_videothmb1']);
        if ($foo->uploaded) {
            $foo->image_convert = 'png';
            $foo->file_new_name_body = 'videothmb1';
            $foo->process($dizin_adi);
            if ($foo->processed) {
                $videothmb1 = $foo->file_dst_pathname ;
                $videothmb1 = substr($videothmb1, 3);
                $videothmb1_state = true;
            } else {
                echo '<script>alert("error : ' . $foo->error . '");</script>';
                exit();
            }
        }
    }



    $img1_state = false;
    if ($file_state === true) {
        $foo = new Upload($_FILES['urun_img1']);
        if ($foo->uploaded) {
            $foo->image_convert = 'png';
            $foo->file_new_name_body = 'img1';
            $foo->process($dizin_adi);
            if ($foo->processed) {
                $img1 = $foo->file_dst_pathname ;
                $img1 = substr($img1, 3);
                $img1_state = true;
            } else {
                echo '<script>alert("error : ' . $foo->error . '");</script>';
                exit();
            }
        }
    }

    $img2_state = false;
    if ($file_state === true) {
        $foo = new Upload($_FILES['urun_img2']);
        if ($foo->uploaded) {
            $foo->image_convert = 'png';
            $foo->file_new_name_body = 'img2';
            $foo->process($dizin_adi);
            if ($foo->processed) {
                $img2 = $foo->file_dst_pathname ;
                $img2 = substr($img2, 3);
                $img2_state = true;
            } else {
                echo '<script>alert("error : ' . $foo->error . '");</script>';
                exit();
            }
        }
    }

    $img3_state = false;
    if ($file_state === true) {
        $foo = new Upload($_FILES['urun_img3']);
        if ($foo->uploaded) {
            $foo->image_convert = 'png';
            $foo->file_new_name_body = 'img3';
            $foo->process($dizin_adi);
            if ($foo->processed) {
                $img3 = $foo->file_dst_pathname ;
                $img3 = substr($img3, 3);
                $img3_state = true;
            } else {
                echo '<script>alert("error : ' . $foo->error . '");</script>';
                exit();
            }
        }
    }
    if (($file_state === true) && ($img_state === true) && ($logo_state === true) && ($img1_state === true) && ($img2_state === true) && ($img3_state === true) && ($video1_state === true) && ($videothmb1_state === true)) {
        $sql2 ="START TRANSACTION;
        INSERT INTO urunler (urun_adi, urun_fiyat, urun_indirimDurumu, urun_indirimsizFiyat, urun_img) VALUES
        ('$urun_adi', $urun_fiyat, $urun_indirimDurumu, $urun_indirimsizFiyat, '$img');
        SET @urun_id = LAST_INSERT_ID();
        
        INSERT INTO urun_detaylari (urun_id, kategori_id, pegi_id, urun_metascore, urun_metascore_url, platform_ps5, platform_xbox, platform_steam, urun_logo, urun_img1, urun_img2, urun_img3, urun_video1, urun_videothmb1, urun_aciklama, urun_gelistirici, urun_yayinci, urun_cikisTarihi) VALUES
        (@urun_id, $kategori, $pegi, $urun_metascore, '$urun_metascore_url', 
        $platform_ps5, $platform_xbox, $platform_steam, '$logo', 
        '$img1', '$img2', '$img3', '$video_upload_path', '$videothmb1', 
        '$urun_aciklama', '$urun_gelistirici', '$urun_yayinci', '$formattedDate');

        COMMIT;";
        if (mysqli_multi_query($conn, $sql2)) {
            header("Location: urun_ekle.php?success=1");
        } else {
            echo '<script>alert("error : ' . mysqli_error($conn) . '");</script>';
        }
    } else {
        header("Location: urun_ekle.php?success=0");
    }
}
ob_end_flush();
?>