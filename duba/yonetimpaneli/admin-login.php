<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register-login-style.css" class="css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body style="background-color: rgba(17, 24, 39, 1);">
    <div style="display: block;">
        <div class="form-container-login">

            <img src="../images/logo/duba-high-resolution-logo-transparent.svg" alt="Logo" width="100" height="100" style="margin-left:70px;">
            <p class="title">Yönetici Girişi</p>
            <form class="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="input-group">
                    <label for="username">Kullanıcı Adı</label>
                    <input style="margin-bottom: 10px;" type="text" name="username" id="username" placeholder="" required>
                </div>
                <div class="input-group">
                    <label for="password">Şifre</label>
                    <input type="password" name="password" id="password" placeholder="" required>
                </div>
                <br>
                <button class="sign">Giriş yap</button>
            </form>
        </div>
    </div>
    <?php
    session_name('admin_session');
    session_start();
    if (isset($_SESSION['yonetici_id']) && isset($_SESSION["kullanici_adi"])) {
        header("Location: admin.php");
        exit();
    }

    include '../baglanti.php';

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = test_input($_POST["username"]);
		$password = test_input($_POST["password"]);

		$query = "SELECT sifre_salt FROM kullanicilar WHERE kullanici_adi = ?";
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$salt = $row["sifre_salt"];
			$hashed_password = crypt($password, '$6$' . $salt . '$');

			$sql = "SELECT * FROM yoneticiler LEFT JOIN kullanicilar ON yoneticiler.kullanici_id = kullanicilar.kullanici_id 
            WHERE kullanici_adi = ? AND sifre_hash = ? AND yoneticiler.yetki = 1";
			$stmt2 = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt2, "ss", $username, $hashed_password);
			mysqli_stmt_execute($stmt2);
			$result2 = mysqli_stmt_get_result($stmt2);
			if (mysqli_num_rows($result2) > 0) {
				$update_query = "UPDATE kullanicilar SET son_oturum_tarihi = NOW() WHERE kullanici_adi = ?";
				$update_stmt = mysqli_prepare($conn, $update_query);
				mysqli_stmt_bind_param($update_stmt, "s", $username);
				mysqli_stmt_execute($update_stmt);

				$row = mysqli_fetch_assoc($result2);
                
				$_SESSION["yonetici_id"] = $row["yonetici_id"];
				$_SESSION["kullanici_adi"] = $row["kullanici_adi"];
                $_SESSION["adsoyad"] = $row["ad"] . " " . $row["soyad"];
				header("Location: admin.php");
				exit;
			} else {
				echo "<script>alert('Kullanıcı adı veya şifre yanlış');</script>";
			}
		}
	}
    ?>

</body>

</html>