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
    $sql1 = "SELECT urun_adi FROM urunler WHERE urun_id = $id";
    $result1 = mysqli_query($conn, $sql1);
    $rows = mysqli_fetch_assoc($result1);

    $sql = "SELECT * FROM anahtarlar WHERE urun_id = $id";
    $result = mysqli_query($conn, $sql);
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
                            if ((isset($_GET['delete'])) && ($_GET['delete'] == 1)) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Başarılı </h5>
                                Anahtar başarıyla silindi.
                              </div>';
                            } else if ((isset($_GET['delete'])) && ($_GET['delete'] == 0)) {
                                echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Hata </h5>
                                Anahtar silinirken bir hata oluştu.
                              </div>';
                            }
                            ?>
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteLabel">Silme İşlemi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bu anahtarı silmek istiyor musunuz?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Sil</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="">Ürün Adı</label>
                                <input style="width: 26%;" type="text" class="form-control" value="<?php echo $rows["urun_adi"] ?>" disabled>
                            </div>
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th></th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Anahtar ID: activate to sort column descending">Anahtar ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Anahtar Kodu: activate to sort column ascending">Anahtar Kodu</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Kullanılma Durumu: activate to sort column ascending">Kullanılma Durumu</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <tr role="row" class="odd">
                                                            <td><a href="anahtar_duzenle.php?id=<?php echo $row["anahtar_id"] ?>"><i class="fas fa-edit"></i></a></td>
                                                            <td tabindex="0" class="sorting_1"><?php echo $row["anahtar_id"] ?></td>
                                                            <td><?php echo $row["urun_anahtarKodu"] ?></td>
                                                            <td><?php echo $row["kullanilma_durumu"] == 1 ? "Kullanılmış" : "Kullanılmamış"; ?></td>
                                                            <td><a href="#" class="delete-button" data-id="<?php echo $row["anahtar_id"] ?>" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fas fa-trash-alt"></i></a></td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1">Anahtar ID</th>
                                                    <th rowspan="1" colspan="1">Anahtar Kodu</th>
                                                    <th rowspan="1" colspan="1">Kullanılma Durumu</th>
                                                    <th rowspan="1" colspan="1"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteId = null;

        document.querySelectorAll('.delete-button').forEach(function(button) {
            button.addEventListener('click', function() {
                deleteId = this.getAttribute('data-id');
            });
        });

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            if (deleteId) {
                window.location.href = 'anahtar_sil.php?id=' + deleteId;
            }
        });
    });
</script>


<?php
include 'alt.php';
ob_end_flush();
?>