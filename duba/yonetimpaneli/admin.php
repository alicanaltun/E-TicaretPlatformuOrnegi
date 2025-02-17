<?php
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ürünler Listesi</h3>
                        </div>
                        <?php
                        $sql = "SELECT 
                        urunler.urun_id, 
                        urunler.urun_adi, 
                        urunler.urun_fiyat, 
                        urunler.urun_indirimDurumu, 
                        COALESCE(satis_sayilari.satis_sayisi, 0) AS satis_sayisi,
                        COALESCE(anahtar_sayilari.anahtar_sayisi, 0) AS anahtar_sayisi     
                    FROM 
                        urunler 
                    LEFT JOIN (
                        SELECT 
                            urun_id, 
                            COUNT(*) AS satis_sayisi
                        FROM 
                            satis_detaylari 
                        GROUP BY 
                            urun_id
                    ) AS satis_sayilari
                    ON 
                        urunler.urun_id = satis_sayilari.urun_id
                    LEFT JOIN ( 
                        SELECT 
                            urun_id, 
                            COUNT(*) AS anahtar_sayisi
                        FROM 
                            anahtarlar
                        GROUP BY 
                            urun_id
                    ) AS anahtar_sayilari
                    ON 
                        urunler.urun_id = anahtar_sayilari.urun_id;
                    ";
                        $result = mysqli_query($conn, $sql);
                        ?>
                        <div class="card-body">
                        <?php
                            if ((isset($_GET['delete'])) && ($_GET['delete'] == 1)) {
                                echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Başarılı </h5>
                                Ürün başarıyla silindi.
                              </div>';
                            } else if ((isset($_GET['delete'])) && ($_GET['delete'] == 0)) {
                                echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Hata </h5>
                                Ürün silinirken bir hata oluştu.
                              </div>';
                            }else if((isset($_GET['delete'])) && ($_GET['delete'] == 2)){
                                echo '<div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Hata </h5>
                                Ürün bulunamadı.
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
                                            Bu ürünü silmek istiyor musunuz?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Sil</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                                        </div>
                                    </div>
                                </div>
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
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ürün Adı: activate to sort column ascending">Ürün Adı</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Ürün Fiyatı: activate to sort column ascending">Ürün Fiyatı</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="İndirim Durumu: activate to sort column ascending">İndirim Durumu</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Satış Sayısı: activate to sort column ascending">Satış Sayısı</th>
                                                    <th></th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Anahtar Sayısı: activate to sort column ascending">Anahtar Sayısı</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                        <tr role="row" class="odd">

                                                            <td><a href="urun_duzenle.php?id=<?php echo $row["urun_id"] ?>"><i class="fas fa-edit"></i></a></td>
                                                            <td tabindex="0" class="sorting_1"><?php echo $row["0"] ?></td>
                                                            <td><?php echo $row["1"] ?></td>
                                                            <td><?php echo $row["2"] ?></td>
                                                            <td><?php echo $row["3"] == 0 ? "Var" : "Yok"; ?></td>
                                                            <td><?php echo $row["4"] ?></td>
                                                            <td><a href="anahtarlar.php?id=<?php echo $row["urun_id"] ?>"><i class="fas fa-key"></i></a></td>
                                                            <td><?php echo $row["5"] ?></td>
                                                            <td><a href="#" class="delete-button" data-id="<?php echo $row["urun_id"] ?>" data-toggle="modal" data-target="#confirmDeleteModal"><i class="fas fa-trash-alt"></i></a></td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1">ID</th>
                                                    <th rowspan="1" colspan="1">Ürün Adı</th>
                                                    <th rowspan="1" colspan="1">Ürün Fiyatı</th>
                                                    <th rowspan="1" colspan="1">İndirim Durumu</th>
                                                    <th rowspan="1" colspan="1">Satış Sayısı</th>
                                                    <th rowspan="1" colspan="1"></th>
                                                    <th rowspan="1" colspan="1">Anahtar Sayısı</th>
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
                window.location.href = 'urun_sil.php?id=' + deleteId;
            }
        });
    });
</script>


<?php
include 'alt.php';
?>