<?php
ob_start();
include '../baglanti.php';
include 'ust.php';
include 'menu.php';
require 'verot.net.php';

use Verot\Upload\Upload;

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id == null) {
    header("Location: admin.php");
    exit();
}
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

    $sql3 = "SELECT * FROM urunler
    JOIN urun_detaylari ON urunler.urun_id = urun_detaylari.urun_id
    JOIN pegi ON pegi.pegi_id = urun_detaylari.pegi_id
    JOIN kategoriler ON  urun_detaylari.kategori_id = kategoriler.kategori_id
    WHERE urunler.urun_id = $id";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result3);
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürün Düzenle</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if ((isset($_GET['success'])) && ($_GET['success'] == 1)) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Başarılı </h5>
                                Ürün başarıyla düzenlendi.
                              </div>';
                            } else if ((isset($_GET['success'])) && ($_GET['success'] == 0)) {
                                echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Hata </h5>
                                Ürün düzenlenirken bir hata oluştu.
                              </div>';
                            }
                            ?>
                            <form action="urun_duzenle.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                <label for="urun_adi">Ürün Adı</label>
                                <input type="text" class="form-control" name="urun_adi" placeholder="Ürün Adını Giriniz" value="<?php echo $row["urun_adi"] ?>" disabled></br>
                                <label for="urun_fiyat">Ürün Fiyatı</label>
                                <input type="number" class="form-control" name="urun_fiyat" placeholder="Ürün Fiyatını giriniz. Kuruş ayracı olarak nokta(.) veya virgül(,) kullanabilrisiniz." min="0" value="<?php echo $row["urun_fiyat"] ?>" step="0.01" required></br>
                                <label for="urun_indirimsizFiyat">Ürün İndirimsiz Fiyatı</label>
                                <input type="number" class="form-control" name="urun_indirimsizFiyat" placeholder="Eğer üründe indirim yoksa boş bırakınız." min="0" value="<?php echo $row["urun_indirimsizFiyat"] ?>" step="0.01"></br>
                                <label for="urun_aciklama">Ürün Açıklaması</label>
                                <textarea class="form-control" rows="12" placeholder="Ürün Açıklamasını Giriniz" name="urun_aciklama" required><?php echo $row["urun_aciklama"] ?></textarea> </br>
                                <label for="urun_metascore">Metascore Puanı</label>
                                <input type="number" class="form-control" name="urun_metascore" placeholder="Metascore puanını giriniz." min=0 value="<?php echo $row["urun_metascore"] ?>" required></br>
                                <label for="urun_metascore_url">Metascore URL</label>
                                <input type="text" class="form-control" name="urun_metascore_url" placeholder="Ürün Metascore sayfası linkini giriniz.(Zorunlu değildir)" value="<?php echo $row["urun_metascore_url"] ?>"></br>
                                <label for="platform_ps5">PlayStation®5</label>
                                <select class="form-control select2" name="platform_ps5" style="width: 100%;" required>
                                    <option value="1" <?php if ($row["platform_ps5"] == 1) echo "selected" ?>>Var</option>
                                    <option value="0" <?php if ($row["platform_ps5"] == 0) echo "selected" ?>>Yok</option>
                                </select> </br>
                                <label for="platform_xbox">Xbox Series X</label>
                                <select class="form-control select2" name="platform_xbox" style="width: 100%;" required>
                                    <option value="1" <?php if ($row["platform_xbox"] == 1) echo "selected" ?>>Var</option>
                                    <option value="0" <?php if ($row["platform_xbox"] == 0) echo "selected" ?>>Yok</option>
                                </select> </br>
                                <label for="platform_steam">Steam</label>
                                <select class="form-control select2" name="platform_steam" style="width: 100%;" required>
                                    <option value="1" <?php if ($row["platform_steam"] == 1) echo "selected" ?>>Var</option>
                                    <option value="0" <?php if ($row["platform_steam"] == 0) echo "selected" ?>>Yok</option>
                                </select> </br>
                                <label for="urun_img">Ürün Kapak Resmi</label>
                                <input type="file" class="form-control" name="urun_img" placeholder="Ürün Resmi" accept=".png"> </br>
                                <label for="urun_logo">Ürün Logosu</label>
                                <input type="file" class="form-control" name="urun_logo" placeholder="Ürün Resmi" accept=".png"> </br>
                                <label for="urun_video1">Ürün Video - 1</label>
                                <input type="file" class="form-control" name="urun_video1" placeholder="Ürün Videosu" accept=".mp4"> </br>
                                <label for="urun_videothmb1">Ürün Video Thumbnail</label>
                                <input type="file" class="form-control" name="urun_videothmb1" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png"> </br>
                                <label for="urun_img1">Ürün Resmi - 1</label>
                                <input type="file" class="form-control" name="urun_img1" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png"> </br>
                                <label for="urun_img2">Ürün Resmi - 2</label>
                                <input type="file" class="form-control" name="urun_img2" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png"> </br>
                                <label for="urun_img3">Ürün Resmi - 3</label>
                                <input type="file" class="form-control" name="urun_img3" placeholder="Ürün Resmi" accept=".jpg, .jpeg, .png"> </br>
                                <label for="kategori">Kategori</label>
                                <select class="form-control select2" name="kategori" style="width: 100%;" required>
                                    <option value="<?php echo $row["kategori_id"] ?>" selected><?php echo $row["kategori_adi"] ?></option>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            if ($rows['kategori_id'] == $row['kategori_id']) {
                                                continue;
                                            }
                                            echo '<option value="' . $rows["kategori_id"] . '">' . $rows["kategori_adi"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select> </br>
                                <label for="pegi">Pegi</label>
                                <select class="form-control select2" name="pegi" style="width: 100%;" required>
                                    <option value="<?php echo $row["pegi_id"] ?>" selected><?php echo $row["pegi_id"] ?></option>
                                    <?php
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($rows = mysqli_fetch_assoc($result1)) {
                                            if ($rows['pegi_id'] == $row['pegi_id']) {
                                                continue;
                                            }
                                            echo '<option value="' . $rows["pegi_id"] . '">' . $rows["pegi_id"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select> </br>
                                <label for="urun_gelistirici">Ürün Geliştiricisi</label>
                                <input type="text" class="form-control" name="urun_gelistirici" placeholder="Ürün geliştiricisi adını giriniz." value="<?php echo $row["urun_gelistirici"] ?>" required></br>
                                <label for="urun_yayinci">Ürün Yayıncısı</label>
                                <input type="text" class="form-control" name="urun_yayinci" placeholder="Ürün yayıncısı adını giriniz." value="<?php echo $row["urun_yayinci"] ?>" required></br>
                                <label for="urun_cikisTarihi">Ürün Çıkış Tarihi</label>
                                <input type="text" class="form-control" name="urun_cikisTarihi" placeholder="Ürün çıkış tarihini giriniz." value="<?php echo $row["urun_cikisTarihi"] ?>" required></br>
                                <button type="submit" class="btn btn-primary">Ürünü Düzenle</button>
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
    $urun_adi = isset($_POST['urun_adi']) ? $_POST['urun_adi'] : '';
    $kategori = intval($_POST["kategori"]);
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
    $urun_aciklama = mysqli_real_escape_string($conn, $_POST["urun_aciklama"]);
    $pegi = $_POST["pegi"];
    $urun_metascore = $_POST["urun_metascore"];
    $urun_metascore_url = $_POST["urun_metascore_url"];
    $platform_ps5 = intval($_POST["platform_ps5"]);
    $platform_xbox = intval($_POST["platform_xbox"]);
    $platform_steam = intval($_POST["platform_steam"]);

    
    $urun_dizin_adi = str_replace(" ", "_", cleanFileName($row["urun_adi"]));

    $dizin_adi = "../images/games/$urun_dizin_adi/";

    $file_state = false;
    if (file_exists($dizin_adi)) {
        $file_state = true;
    } else if (!file_exists($dizin_adi)) {
        mkdir($dizin_adi, 0777, true);
        $file_state = true;
    } else {
        echo '<script>alert("eror: Dizin bulunamadı.");</script>';
        exit();
    }

    if (isset($_FILES['urun_video1']['name']) && $_FILES['urun_video1']['name'] != '') {
        $video_name = $_FILES['urun_video1']['name'];
        $tmp_name = $_FILES['urun_video1']['tmp_name'];
        $error = $_FILES['urun_video1']['error'];

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
                echo '<script>alert("error: Video yüklenemedi.");</script>';
                exit();
            }
        }
    }





    if (isset($_FILES['urun_img']['name']) && $_FILES['urun_img']['name'] != '') {
        $img_state = false;
        if ($file_state === true) {
            $foo = new Upload($_FILES['urun_img']);
            if ($foo->uploaded) {
                $foo->image_convert = 'png';
                $foo->file_overwrite = true;
                $foo->file_new_name_body = 'img';
                $foo->process($dizin_adi);
                if ($foo->processed) {
                    $img = $foo->file_dst_pathname;
                    $img = substr($img, 3);
                    $img_state = true;
                } else {
                    echo '<script>alert("error: ' . $foo->error . '");</script>';
                    exit();
                }
            }
        }
    }

    if (isset($_FILES['urun_logo']['name']) && $_FILES['urun_logo']['name'] != '') {
        $logo_state = false;
        if ($file_state === true) {
            $foo = new Upload($_FILES['urun_logo']);
            if ($foo->uploaded) {
                $foo->image_convert = 'png';
                $foo->file_overwrite = true;
                $foo->file_new_name_body = 'logo';
                $foo->process($dizin_adi);
                if ($foo->processed) {
                    $logo = $foo->file_dst_pathname;
                    $logo = substr($logo, 3);
                    $logo_state = true;
                } else {
                    echo '<script>alert("error: ' . $foo->error . '");</script>';
                    exit();
                }
            }
        }
    }

    if (isset($_FILES['urun_videothmb1']['name']) && $_FILES['urun_videothmb1']['name'] != '') {
        $videothmb1_state = false;
        if ($file_state === true) {
            $foo = new Upload($_FILES['urun_videothmb1']);
            if ($foo->uploaded) {
                $foo->image_convert = 'png';
                $foo->file_overwrite = true;
                $foo->file_new_name_body = 'videothmb1';
                $foo->process($dizin_adi);
                if ($foo->processed) {
                    $videothmb1 = $foo->file_dst_pathname;
                    $videothmb1 = substr($videothmb1, 3);
                    $videothmb1_state = true;
                } else {
                    echo '<script>alert("error: ' . $foo->error . '");</script>';
                    exit();
                }
            }
        }
    }

    foreach (['urun_img1' => 'img1', 'urun_img2' => 'img2', 'urun_img3' => 'img3'] as $file_key => $new_name_body) {
        if (isset($_FILES[$file_key]['name']) && $_FILES[$file_key]['name'] != '') {
            $img_state = false;
            if ($file_state === true) {
                $foo = new Upload($_FILES[$file_key]);
                if ($foo->uploaded) {
                    $foo->image_convert = 'png';
                    $foo->file_overwrite = true;
                    $foo->file_new_name_body = $new_name_body;
                    $foo->process($dizin_adi);
                    if ($foo->processed) {
                        ${$new_name_body} = $foo->file_dst_pathname;
                        ${$new_name_body} = substr(${$new_name_body}, 3);
                        $img_state = true;
                    } else {
                        echo '<script>alert("error: ' . $foo->error . '");</script>';
                        exit();
                    }
                }
            }
        }
    }

    $video_upload_path = isset($video_upload_path) ? $video_upload_path : '';

    if (($file_state === true)) {
        $sql2 = "START TRANSACTION;
        UPDATE urunler SET urun_fiyat = $urun_fiyat, urun_indirimDurumu = $urun_indirimDurumu, urun_indirimsizFiyat = $urun_indirimsizFiyat WHERE urun_id = $id;
        
        UPDATE urun_detaylari SET kategori_id = $kategori, pegi_id = $pegi, urun_metascore = $urun_metascore,
        urun_metascore_url = '$urun_metascore_url', platform_ps5 = $platform_ps5, platform_xbox = $platform_xbox, platform_steam = $platform_steam,
        urun_aciklama = '$urun_aciklama', urun_gelistirici = '$urun_gelistirici', urun_yayinci = '$urun_yayinci', urun_cikisTarihi = '$urun_cikisTarihi'
        WHERE urun_id = $id;

        COMMIT;";
        if (mysqli_multi_query($conn, $sql2)) {
            $url = "Location: urun_duzenle.php?id=" . $id . "&success=1";
            header($url);
        } else {
            echo '<script>alert("error : ' . mysqli_error($conn) . '");</script>';
        }
    } else {
        $url = "Location: urun_duzenle.php?id=" . $id . "&success=0";
        header($url);
    }
}
ob_end_flush();
?>