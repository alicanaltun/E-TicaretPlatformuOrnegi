<?php
include 'baglanti.php'; // Veritabanı bağlantısını sağlayan dosya

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryFilterQuery = '';
    $platformFilterQuery = '';
    $priceFilterQuery = '';

    if (isset($_POST['categories'])) {
        $categories = $_POST['categories'];
        if (!empty($categories)) {
            $categoryFilterQuery = 'kategori_id IN (' . implode(',', array_map('intval', $categories)) . ')';
        }
    }


    if (isset($_POST['platforms'])) {
        $platforms = $_POST['platforms'];
        if (!empty($platforms)) {
            $platformOptions = [];
            foreach ($platforms as $option) {
                switch ($option) {
                    case 'playstation5':
                        $platformOptions[] = "platform_ps5 = 1";
                        break;
                    case 'xboxseriesx':
                        $platformOptions[] = "platform_xbox = 1";
                        break;
                    case 'steam':
                        $platformOptions[] = "platform_steam = 1";
                        break;
                }
            }
            $platformFilterQuery = '(' . implode(' AND ', $platformOptions) . ')';
        }
    }

    if (isset($_POST['priceRanges'])) {
        $priceRanges = $_POST['priceRanges'];
        if (!empty($priceRanges)) {
            $priceConditions = [];
            foreach ($priceRanges as $range) {
                switch ($range) {
                    case 'range-1':
                        $priceConditions[] = "urun_fiyat BETWEEN 0 AND 500";
                        break;
                    case 'range-2':
                        $priceConditions[] = "urun_fiyat BETWEEN 500 AND 1000";
                        break;
                    case 'range-3':
                        $priceConditions[] = "urun_fiyat BETWEEN 1000 AND 1500";
                        break;
                }
            }
            $priceFilterQuery = '(' . implode(' OR ', $priceConditions) . ')';
        }
    }

    $filterQueries = array_filter([$categoryFilterQuery, $platformFilterQuery, $priceFilterQuery]);
    $finalFilterQuery = !empty($filterQueries) ? implode(' AND ', $filterQueries) : '';
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = test_input($_GET['search']);
        $sql = "SELECT * FROM urunler LEFT JOIN urun_detaylari ON urunler.urun_id = urun_detaylari.urun_id
            WHERE ";
        if ($finalFilterQuery !== '') {
            $sql .= "$finalFilterQuery AND ";
        }
        if (isset($_GET['indirim']) && $_GET['indirim'] !== '') {
            $sql .= " AND urun_indirimDurumu = 1 ";
        }
        $sql .= "urun_adi LIKE CONCAT('%', ?, '%')  ORDER BY urun_gosterilmeSayisi DESC";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $searchTerm);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else if (empty($_GET['search']) && !$finalFilterQuery == '') {
        $sql = "SELECT * FROM urunler LEFT JOIN urun_detaylari ON urunler.urun_id=urun_detaylari.urun_id WHERE $finalFilterQuery ";
        if (isset($_GET['indirim']) && $_GET['indirim'] !== '') {
            $sql .= " AND urun_indirimDurumu = 1 ";
        }
        $sql .= " ORDER BY urun_gosterilmeSayisi DESC";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM urunler ";
        if (isset($_GET['indirim']) && $_GET['indirim'] !== '') {
            $sql .= " WHERE urun_indirimDurumu = 1 ";
        }
        $sql .= " ORDER BY urun_gosterilmeSayisi DESC";
        $result = mysqli_query($conn, $sql);
    }



    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
            <a href="urundetay.php?id=<?php echo $row["urun_id"] ?>">
                <div class="card">
                    <img src="<?php echo $row["urun_img"] ?>" alt="<?php echo $row["urun_adi"] ?>">
                    <span class="name"><?php echo $row["urun_adi"] ?></span>
                    <span class="sale"><?php if ($row["urun_indirimDurumu"] == 1) echo number_format($row["urun_indirimsizFiyat"], 2, ",", ".") . ' TL' ?></span>
                    <span class="price"><?php echo number_format($row["urun_fiyat"], 2, ",", ".") . ' TL'  ?></span>
                </div>
            </a>
<?php
        }
    }
}else {
    if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
        header("Location: ./");
        exit;
    }
}

?>