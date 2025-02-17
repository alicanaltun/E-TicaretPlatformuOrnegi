<?php
@session_start();

// Sepetteki ürün sayısını hesapla
$cartItemCount = isset($_SESSION['sepet']) ? count($_SESSION['sepet']) : 0;
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyunun Adresi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    if (isset($header_css) && $header_css == "game") {
        echo '<link rel="stylesheet" href="css/game-style-9.css" class="css">';
    } else if (isset($header_css) && $header_css == "sepet") {
        echo '<link rel="stylesheet" href="css/sepet-style-3.css" class="css">';
    } else {
        echo '<link rel="stylesheet" href="css/style-5.css" class="css">';
    }
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet " href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        window.onload = function() {
            var cartItemCount = <?php echo $cartItemCount; ?>;
            $("#cart").text(cartItemCount);
        };
    </script>

    

<style>

        .panel {
            height: 150px;
            width: 1525px;
            border: solid 1px #CF7650;
            border-radius: 4px;
            padding: 10px;
            display: none;
            transition: none;
        }

        .filter {
            width: 1525px;
            cursor: pointer;
            margin-top: 45px;
            padding: 5px 5px 5px 0;
            font-size: 21px;
            color: aliceblue;
            border-bottom: solid 1px #CF7650;
        }

        .type {
            width: 70%;
            height: 128px;
            float: left;
        }

        .field {
            color: #fff;
            border-bottom: 1px solid #fff;
            font-size: 18px;
        }

        label {
            color: #fff;
            margin-bottom: 10px;
        }

        .box {
            display: inline-block;
            width: 143px;
            height: 85px;
        }

        .platform {
            display: inline-block;
            width: 200px;
            height: 128px;
            margin-left: 40px;
        }

        .price-range {
            display: inline-block;
            width: 150px;
            height: 128px;
            margin-left: 40px;
        }

        input {
            cursor: pointer;
        }

        .filter-arrow {
            transition: transform 0.3s ease;
            position: absolute;
            margin-left: 5px;
        }

        .filter-arrow-up {
            transform: rotate(90deg);
        }

        .buttons i {
            font-size: 25px;
        }

        .buttons span {
            color: #ffffff;
            font-size: 17px;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <?php
    include 'baglanti.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: #162836; padding:0 4%;">
            </div>
            <div class="container-fluid">
                <a class="navbar-brand" href="./">
                    <img src="images/logo/duba-high-resolution-logo-transparent.svg" alt="Logo" width="100" height="100" class="d-inline-block align-text-top">
                </a>

                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./">Anasayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="oyunlar.php">Oyunlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="indirimler.php">İndirimler</a>
                        </li>
                    </ul>

                    <form id="searchForm" class="d-flex" action="oyunlar.php" method="POST">
                        <div class="search">
                            <span class="search-icon material-symbols-outlined">search</span>
                            <input class="search-input" type="search" id="searchInput" name="search" style="cursor: text;" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>" placeholder="Mağazada Arayın..">
                        </div>
                    </form>
                    <div class="menu">
                        <?php
                        if (isset($_SESSION["kullanici_id"])) {
                        ?>
                            <a href="hesabim.php" style="text-decoration: none;">
                                <div class="buttons">
                                    <i class="fa-solid fa-user" id="loginicon" style="color: #ffffff;"></i>
                                    <span>Hesabım</span>
                                </div>
                            </a>
                        <?php
                        } else {
                        ?>
                            <div class="buttons">
                                <a href="register.php" rel="noopener noreferrer"><button type="button" class="btn btn-outline-light">Kaydol</button></a>
                                <a href="login.php" rel="noopener noreferrer"><button type="button" class="btn btn-outline-light" style="margin-left: 10px;">Giriş Yap</button></a>

                            </div>
                        <?php
                        }
                        ?>

                        <div class="cart-icon" id="cartIcon">
                            <a href="sepet.php">
                                <span class="material-symbols-outlined" style="color: #ffff; font-size: 34px; margin-top: 13px;" id="cartIconSymbol">
                                    shopping_cart
                                </span>
                                <div class="circle">
                                    <span class="circle__content" style="color: #162836;" id="cart"></span>
                                </div>
                                <span>Sepet</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var cartIcon = document.querySelector('.cart-icon a');
                cartIcon.addEventListener("click", function(event) {
                    <?php
                    if (!isset($_SESSION["kullanici_id"])) {
                    ?>
                        alert("Sepete erişebilmek için önce giriş yapmalısınız.");
                        event.preventDefault();
                    <?php
                    }
                    ?>
                });
            });
        </script>

        <script>
            // Form submit olduğunda JavaScript ile URL'ye veriyi ekleyelim
        document.getElementById("searchForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Form submitini engelle
        var searchTerm = document.getElementById("searchInput").value;
        var url = "oyunlar.php?search=" + encodeURIComponent(searchTerm);
        window.location.href = url; // Yeni URL'ye yönlendir
    });

    document.addEventListener('DOMContentLoaded', function() {
            // Hesabım ikonu için
            var buttons = document.querySelector('.buttons');
            var loginIcon = document.getElementById('loginicon');

            buttons.addEventListener('mouseover', function() {
                loginIcon.style.color = '#CF7650'; // Turuncu renk
            });

            buttons.addEventListener('mouseout', function() {
                loginIcon.style.color = '#ffffff'; // Orijinal renk
            });

            // Sepet ikonu için
            var cartIcon = document.getElementById('cartIcon');
            var cartIconSymbol = document.getElementById('cartIconSymbol');

            cartIcon.addEventListener('mouseover', function() {
                cartIconSymbol.style.color = '#CF7650'; // Turuncu renk
            });

            cartIcon.addEventListener('mouseout', function() {
                cartIconSymbol.style.color = '#ffffff'; // Orijinal renk
            });
        });
        </script>
    </header>