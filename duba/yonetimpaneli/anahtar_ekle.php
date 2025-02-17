<?php
ob_start(); 
include '../baglanti.php';
include 'ust.php';
include 'menu.php';
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
    $sql1 = "SELECT urun_id, urun_adi FROM urunler";
    $result = mysqli_query($conn, $sql1);

    /*$sql = "SELECT * FROM anahtarlar WHERE urun_id = $id";
    $result = mysqli_query($conn, $sql);*/
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürün Anahtar Listesi</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if ((isset($_GET['success'])) && ($_GET['success'] == 1)) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Başarılı </h5>
                                Anahtarlar başarıyla eklendi.
                              </div>';
                            } else if ((isset($_GET['success'])) && ($_GET['success'] == 0)) {
                                echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Hata </h5>
                                Anahtarlar eklenirken bir hata oluştu.
                              </div>';
                            }
                            ?>
                            <form action="anahtar_ekle.php" method="POST" enctype="multipart/form-data">
                                <select class="form-control select2" name="urun_id" style="width: 100%;" required>
                                    <option value="" selected disabled>Ürün Seçiniz</option>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row["urun_id"] . '">' . $row["urun_adi"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select> </br>
                                <label for="anahtar_kodlari">Anahtar Kodları</label>
                                <textarea class="form-control" rows="12" placeholder="Anahtar kodlarını '####-####-####-####-####' şeklinde girmelisiniz. Eğer birden çok kod girecekseniz kodları virgül(,) ile ayırınız." name="anahtar_kodlari" required></textarea> </br>
                                <button type="submit" class="btn btn-primary">Anahtar Ekle</button>
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
        var selectedUrun = document.querySelector('select[name="urun_id"]').value;
        if (selectedUrun === '') {
            event.preventDefault(); 
        }
    });
</script>


<?php
include 'alt.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_id = $_POST['urun_id'];
    $anahtar_kodlari = $_POST['anahtar_kodlari'];
    $anahtar_kodlari_array = explode(',', $anahtar_kodlari);
    $anahtar_state = 1;

    foreach ($anahtar_kodlari_array as $anahtar_kodu) {
        $anahtar_kodu = trim($anahtar_kodu);

        if($anahtar_kodu == "") {
            $anahtar_state = 0;
            echo '<script>alert("Anahtarlar eklenirken problem oluştu. Boş anahtarlar var. Metnin sonunda fazladan virgül varsa siliniz.");</script>';
            exit;
        }else if (strlen($anahtar_kodu) != 24) {
            $anahtar_state = 0;
            echo '<script>alert("Anahtarlar eklenirken problem oluştu. Hatalı anhtar: ' . $anahtar_kodu . '");</script>';
            exit;
        }
    }

    if ($anahtar_state == 1) {
        foreach ($anahtar_kodlari_array as $anahtar_kodu) {
            $anahtar_kodu = trim($anahtar_kodu);
            $sql_insert = "INSERT INTO anahtarlar (urun_id, urun_anahtarKodu) VALUES ($urun_id, '$anahtar_kodu')";

            if (!mysqli_query($conn, $sql_insert)) {
                echo '<script>alert("Anahtarlar eklenirken bir hata oluştu.");</script>';
                exit;
            }
        }
        header("Location: anahtar_ekle.php?success=1");
        exit;
    } else {
        header("Location: anahtar_ekle.php?success=2");
        exit;
    }
}

ob_end_flush();
?>