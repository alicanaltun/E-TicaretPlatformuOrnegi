<?php
$header_css = "default";
include 'ust.php';
?>

<section>
    <div class="slider">
        <div class="bu-slider">
            <div class="bu-slider-items">
                <a href="urundetay.php?id=2" style="text-decoration: none;">
                <div class="bu-slider-item">
                    <img src="images/banner/EGS_EASPORTSFC24StandardEdition_EACanada_S1_2560x1440-f1772618b782ca975f0bbe33db3a88b3.jpeg" alt="EA SPORTS FC 24">
                    <h2>EA SPORTS FC 24</h2>
                    <p>Welcome to The World's Game</p>
                </div>
                </a>
                <a href="urundetay.php?id=7" style="text-decoration: none;">
                <div class="bu-slider-item" style="display: none;">
                    <img src="images/banner/maxresdefault.jpg" alt="ALAN WAKE II">
                    <h2>ALAN WAKE 2</h2>
                </div>
                </a>
                <a href="urundetay.php?id=12" style="text-decoration: none;">
                <div class="bu-slider-item" style="display: none;">
                    <img src="images/banner/c8287c5a-b29e-41b9-b6bd-863f1f001f32_2560x1440-e2d9f300a0b9b969c895bc423b63d4e5.jpeg" alt="REMNANT II">
                    <h2>REMNANT II</h2>
                </div>
                </a>
                <a href="urundetay.php?id=8" style="text-decoration: none;">
                <div class="bu-slider-item" style="display: none;">
                    <img src="images/banner/Share_Image_1920x1080_1920x1080-3ec6b92b109d6ebe190c7fd8da23b989.png" alt="Assassin's Creed Mirage">
                    <h2>Assassin's Creed Mirage</h2>
                </div>
                </a>
            </div>
            <div class="bu-slider-controls">
                <span onclick="moveSlider((currentIndex - 1 + slides.length) % slides.length)">&#10094;</span>
                <span onclick="moveSlider((currentIndex + 1) % slides.length)">&#10095;</span>
            </div>
        </div>


        <script>
            const buSliderItems = document.querySelector('.bu-slider-items');
            const slides = buSliderItems.querySelectorAll('.bu-slider-item');
            let currentIndex = 0;

            function moveSlider(newIndex) {
                slides[currentIndex].style.display = 'none';
                slides[newIndex].style.display = 'block';
                currentIndex = newIndex;
            }

            setInterval(() => {
                moveSlider((currentIndex + 1) % slides.length);
            }, 6000);
        </script>

    </div>
    <div class="banners">
        <a href="indirimler.php"><img src="images/banner/yilbasi_indirimi.png" alt="yil basi indirimi"></a>
        <a href="register.php"><img src="images/banner/banner.png" alt="yil basi indirimi" style="margin-top: 50px;"></a>
    </div>

    <p class="top-games">Popüler Oyunlar</p>
    <div class="card-container">
        <?php
        $sql = "SELECT * FROM urunler ORDER BY urun_gosterilmeSayisi DESC LIMIT 15";
        $result = mysqli_query($conn, $sql);

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
        ?>
    </div>
</section>
<?php
include 'alt.php';
?>