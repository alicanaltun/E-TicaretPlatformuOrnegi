<?php
$header_css = "default";
include 'ust.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<section>
    <script>
        $(document).ready(function() {
            updateResults();
            $(".filter").click(function() {
                var panel = $(".panel");
                var filter = $(".filter");
                var filterarrow = $(".filter-arrow");

                if (panel.is(":visible")) {
                    panel.slideUp("slow");
                    filter.css("border-bottom", "solid 1px #CF7650");
                    filterarrow.removeClass("filter-arrow-up");
                } else {
                    panel.slideDown("slow");
                    filter.css("border", "none");
                    filterarrow.addClass("filter-arrow-up");
                }
            });

            // Checkbox değişimlerini dinlemek için event listener ekleyin
            $("input[type='checkbox']").change(function() {
                updateResults();
            });

            function updateResults() {
                var selectedCategories = [];
                var selectedPlatforms = [];
                var selectedPriceRanges = [];

                // Kategori filtrelerini al
                $("input[name='category']:checked").each(function() {
                    selectedCategories.push($(this).val());
                });

                // Platform filtrelerini al
                $("input[name='platform']:checked").each(function() {
                    selectedPlatforms.push($(this).val());
                });

                // Fiyat aralığı filtrelerini al
                $("input[name='price']:checked").each(function() {
                    selectedPriceRanges.push($(this).val());
                });

                $.ajax({
                    url: 'filtreleme.php?search=<?php if (isset($_GET['search'])) echo  test_input($_GET['search']) ?>',
                    method: 'POST',
                    data: {
                        categories: selectedCategories,
                        platforms: selectedPlatforms,
                        priceRanges: selectedPriceRanges
                    },
                    success: function(data) {
                        $(".card-container").html(data);
                        if ($(".card-container").find('.card').length === 0) {
                            $('.not-found').show(); // Sonuç yoksa mesajı göster
                        } else {
                            $('.not-found').hide(); // Sonuç varsa mesajı gizle
                        }
                        adjustFooterPosition();
                    },
                    error: function() {
                        alert("Sonuçlar getirilirken hata oluştu.");
                    }
                });
            }

        });
    </script>

    <div class="filter">Filtreleme <span class="filter-arrow">></span></div>
    <div class="panel">

        <div class="type">
            <p class="field">Tür</p>
            <div class="box">
                <input type="checkbox" id="1" name="category" value="1">
                <label for="ryo">RYO</label><br>
                <input type="checkbox" id="2" name="category" value="2">
                <label for="simulasyon">Simülasyon</label><br>
                <input type="checkbox" id="3" name="category" value="3">
                <label for="spor">Spor</label>
        
            </div>
            <div class="box">
                <input type="checkbox" id="4" name="category" value="4">
                <label for="aksiyon">Aksiyon</label><br>
                <input type="checkbox" id="5" name="category" value="5">
                <label for="macera">Macera</label><br>
                <input type="checkbox" id="6" name="category" value="6">
                <label for="strateji">Strateji</label>
            </div>

            <div class="box">
                <input type="checkbox" id="7" name="category" value="7">
                <label for="yaris">Yarış</label><br>
                <input type="checkbox" id="8" name="category" value="8">
                <label for="gizlilik">Gizlilik</label><br>
                <input type="checkbox" id="9" name="category" value="9">
                <label for="korku">Korku</label>
            </div>

            <div class="box">
                <input type="checkbox" id="10" name="category" value="10">
                <label for="bulmaca">Bulmaca</label><br>
                <input type="checkbox" id="11" name="category" value="11">
                <label for="arcade">Arcade</label><br>
                <input type="checkbox" id="12" name="category" value="12">
                <label for="platform">Platform</label>
            </div>

            <div class="box">
                <input type="checkbox" id="13" name="category" value="13">
                <label for="gorsel_roman">Görsel Roman</label><br>
                <input type="checkbox" id="14" name="category" value="14">
                <label for="battle_royale">Battle Royale</label><br>
                <input type="checkbox" id="15" name="category" value="15">
                <label for="point_click">Point & Click</label>
            </div>

            <div class="box">
                <input type="checkbox" id="16" name="category" value="16">
                <label for="nisanci">Nişancı</label><br>
                <input type="checkbox" id="17" name="category" value="17">
                <label for="moba">MOBA</label><br>
                <input type="checkbox" id="18" name="category" value="18">
                <label for="e-spor">E-spor</label>
            </div>

            <div class="box">
                <input type="checkbox" id="19" name="category" value="19">
                <label for="kelime_oyunu">Kelime Oyunu</label><br>
                <input type="checkbox" id="20" name="category" value="20">
                <label for="egitici">Eğitici</label><br>
                <input type="checkbox" id="21" name="category" value="21">
                <label for="sandbox">Sandbox</label>
                
            </div>
        </div>

        <div class="platform">
            <p class="field">Platform</p>
            <div class="box">
                <input type="checkbox" id="playstation5" name="platform" value="playstation5">
                <label for="type">PlayStation®5</label><br>
                <input type="checkbox" id="xboxseriesx" name="platform" value="xboxseriesx">
                <label for="type">Xbox Series X</label><br>
                <input type="checkbox" id="steam" name="platform" value="steam">
                <label for="type">Steam</label>
            </div>
        </div>

        <div class="price-range">
            <p class="field">Fiyat Aralığı</p>
            <div class="box">
                <input type="checkbox" id="range-1" name="price" value="range-1">
                <label for="type">0-500TL</label><br>
                <input type="checkbox" id="range-2" name="price" value="range-2">
                <label for="type">500-1000TL</label><br>
                <input type="checkbox" id="range-3" name="price" value="range-3">
                <label for="type">1000-1500TL</label>
            </div>
        </div>

    </div>


    <p class="top-games">Tüm Oyunlar</p>
    <div class="card-container">

    </div>
    </div>
    <div class="not-found" style="display: flex; flex-direction: column; justify-content: center; align-items: center; display:none;">
        <h2 style="text-align: center; color: whitesmoke;">Sonuç Bulunamadı</h2>
        <p style="color:white; text-align:center;">Aramanla eşleşen herhangi bir sonuç bulunamadı.</p>
    </div>



</section>
<?php
include 'alt.php';
?>