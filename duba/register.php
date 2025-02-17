<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register-login-style.css" class="css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .input-group {
            position: relative;
        }

        .input-group input {
            padding-right: 30px;
        }

        .input-group .status-icon {
            position: absolute;
            right: 10px;
            top: 58%;
            transform: translateY(-50%);
            font-size: 30px;
            transition: opacity 0.3 ease, color 0.3s ease;
        }

        .status-icon {
            display: none;
            opacity: 0;
        }

        .status-icon.visible {
            display: inline;
            opacity: 1;
        }

        .status-icon.valid {
            color: #CF7650;
        }

        .status-icon.invalid {
            color: aliceblue;
        }
    </style>
</head>

<body style="background-color: rgba(17, 24, 39, 1);">
    <div style="display: block;">
        <div class="form-container-register">
            <img src="images/logo/duba-high-resolution-logo-transparent.svg" alt="Logo" width="100" height="100" style="margin-left:70px;">
            <p class="title">Üye ol</p>
            <form class="form" onsubmit="return hataForm()" method="post">
                <div class="input-group">
                    <label for="username">Kullanıcı Adı</label>
                    <input style="margin-bottom: 10px;" type="text" name="username" id="username" placeholder="" pattern=".{3,}" required title="Kullanıcı adı en az 3 karakter olmalıdır." required oninput="checkUsername()">
                    <i id="usernameStatus" class="status-icon fas"></i>
                </div>
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input style="margin-bottom: 10px;" type="email" name="email" id="email" placeholder="" required>
                </div>
                <div class="input-group">
                    <label for="password">Şifre</label>
                    <input style="margin-bottom: 10px;" type="password" name="password" id="password" placeholder="" pattern=".{8,}" required title="Şifreniz en az 8 karakter olmalıdır." required>
                </div>
                <div class="input-group">
                    <label for="password">Şifre Tekrar</label>
                    <input style="margin-bottom: 10px;" type="password" name="onaylaPassword" id="onaylaPassword" placeholder="" required>
                </div>
                <div id="passwordHata"></div>
                <div class="forgot">
                    <a rel="noopener noreferrer" href="login.php">Zaten hesabınız var mı?</a>
                </div>
                <button class="sign">Kayıt ol</button>
            </form>
            <?php
            session_start();
            if (isset($_SESSION['kullanici_id']) && isset($_SESSION["kullanici_adi"])){
                header("Location: ./");
                exit();
            }


            include 'baglanti.php';
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["username"]);
                $email = test_input($_POST["email"]);
                $password = test_input($_POST["password"]);
                $repassword = test_input($_POST["onaylaPassword"]);

                // Veritabanında kullanıcı adını kontrol et
                $query = "SELECT * FROM kullanicilar WHERE kullanici_adi = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    // Kullanıcı adı zaten kullanılıyor
                    echo "<script>alert('Bu kullanıcı adı zaten mevcut.');</script>";
                } else {
                    $query = "SELECT * FROM kullanicilar WHERE email = ?";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if (mysqli_num_rows($result) > 0) {
                        // E-mail zaten kullanılıyor
                        echo "<script>alert('Bu e-mail zaten kullanılıyor.');</script>";
                    } else {
                        // Kullanıcı adı mevcut değilse, yeni kullanıcı oluştur
                        if ($password == $repassword) {
                            $salt = bin2hex(random_bytes(32));
                            $hashed_password = crypt($password, '$6$' . $salt . '$');

                            $sql = "INSERT INTO kullanicilar (kullanici_adi, email, sifre_salt, sifre_hash, kayit_tarihi) VALUES (?, ?, ?, ?, NOW())";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $salt, $hashed_password);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            // Kayıt işlemi başarılı, ana sayfaya yönlendir
                            echo "<script>alert('Hesabınız Oluşturuldu.'); window.location = 'login.php';</script>";
                        } else {
                            echo "<script>alert('Şifreler eşleşmiyor.');</script>";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    <script>
        function checkUsername() {
            var username = document.getElementById("username").value;
            var usernameStatus = document.getElementById("usernameStatus");

            if (username.length >= 3) { // Kullanıcı adının uzunluğunu kontrol et
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "kullanici_adi-kontrol.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.exists) {
                            usernameStatus.className = "status-icon material-symbols-outlined invalid visible";
                            usernameStatus.textContent = "cancel";
                        } else {
                            usernameStatus.className = "status-icon material-symbols-outlined valid visible";
                            usernameStatus.textContent = "check_circle";
                        }
                    }
                };
                xhr.send("username=" + encodeURIComponent(username));
            } else {
                usernameStatus.className = "status-icon material-symbols-outlined invalid visible";
                usernameStatus.textContent = "cancel";
            }
            // Input boşsa icon gizle
            if (username.length === 0) {
                usernameStatus.className = "status-icon material-symbols-outlined";
                usernameStatus.style.display = "none";
            } else {
                usernameStatus.style.display = "inline";
            }
        }
        function hataForm() {
            var password = document.getElementById("password").value;
            var onaylaPassword = document.getElementById("onaylaPassword").value;
            var passwordHata = document.getElementById("passwordHata");

            if (password !== onaylaPassword) {
                alert('Şifreler eşleşmiyor!');
                return false; // Formu gönderme
            } else {
                passwordHata.innerHTML = ""; // Hata mesajını temizle
                return true;
            }
        }
    </script>

</body>

</html>