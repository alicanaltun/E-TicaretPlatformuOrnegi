<?php
ob_start(); 
include '../baglanti.php';
include 'ust.php';
include 'menu.php';

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
    $sql = "SELECT * FROM anahtarlar LEFT JOIN urunler ON anahtarlar.urun_id = urunler.urun_id  WHERE anahtar_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürün Anahtarı</h3>
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
                            <form action="anahtar_duzenle.php?id=<?php echo $id ?>" method="POST">
                                <label for="">Ürün Adı</label>
                                <input style="width: 26%;" type="text" class="form-control" value="<?php echo $row["urun_adi"] ?>" disabled> </br>
                                <label for="">Ürün Anahtarı</label>
                                <input type="text" class="form-control" name="anahtar_kodu" placeholder="Anahtar kodunu '####-####-####-####-####' şeklinde girmelisiniz." pattern=".{24,24}" required title="Girdiğiniz değer 24 karakter uzunluğunda olmalıdır." value="<?php echo $row["urun_anahtarKodu"] ?>" required> </br>
                                <label for="">Kullanılma Durumu</label>
                                <select class="form-control select2"  style="width: 100%;" disabled>
                                    <option <?php if ($row["kullanilma_durumu"] == 1) echo "selected" ?>>Kullanılmış</option>
                                    <option <?php if ($row["kullanilma_durumu"] == 0) echo "selected" ?>>Kullanılmamış</option>
                                </select> </br>
                                <button type="submit" class="btn btn-primary">Anahtar Düzenle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<?php
include 'alt.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_id = $_POST['urun_id'];
    $anahtar_kodu = $_POST['anahtar_kodu'];
    $anahtar_state = 1;


    $anahtar_kodu = trim($anahtar_kodu);

    if ($anahtar_kodu == "") {
        $anahtar_state = 0;
        echo '<script>alert("Anahtarlar eklenirken problem oluştu. Anahtar değeri şu anda boş.");</script>';
        exit;
    } else if (strlen($anahtar_kodu) != 24) {
        $anahtar_state = 0;
        echo '<script>alert("Anahtarlar eklenirken problem oluştu. Hatalı anhtar: ' . $anahtar_kodu . '");</script>';
        exit;
    }


    if ($anahtar_state == 1) {
        $sql_update = "UPDATE anahtarlar SET urun_anahtarKodu = '$anahtar_kodu' WHERE anahtar_id = $id";

        if (!mysqli_query($conn, $sql_update)) {
            echo '<script>alert("Anahtarlar eklenirken bir hata oluştu.");</script>';
            exit;
        }
        header("Location: anahtar_duzenle.php?id=$id&success=1");
        exit;
    } else {
        header("Location: anahtar_duzenle.php?id=$id&success=0");
        exit;
    }
}

ob_end_flush();
?>