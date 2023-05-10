<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="signin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt</title>
</head>
<body>

    <aside>
        <p style="font-size: 25px; color:#EEEEEE;"> Menü </p>
        <a href="aindex.php">
            <i class="fa fa-user-o" aria-hidden="true"></i>
            Anasayfa
        </a>
        <a href="bmynews.php">
            <i class="fa fa-laptop" aria-hidden="true"></i>
            Haberlerim
        </a>
        <a href="cnew_haber.php">
            <i class="fa fa-laptop" aria-hidden="true"></i>
            Yeni Haber Ekle
        </a>
        <a href="deditnews.php">
            <i class="fa fa-clone" aria-hidden="true"></i>
            Haberleri Düzenle
        </a>
        <a href="delnews.php">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            Haber Sil
        </a>
        <a class="exit" href="esignin.php">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
            Çıkış
        </a>
    
        <?php
            session_start();
            if (isset($_SESSION["deneme"])) {
    
                $upperad=$_SESSION["deneme"];
    
                echo "<h2 style=margin-left:40px;>Kullanıcı:  ".ucfirst($upperad)."</h2>";
            }
            else{
                echo "<p>YOK</p>";
            }
        ?>  
    </aside>

    <div class="anaforum">
        <form name = "goforum" id = "goforum" action="confirmation.php" method = "POST">
            <input style = "margin-top:35px" required="required" type="text" name ="name" id = "name" placeholder = " Ad">
            <input type="text" required="required" name ="surname" id = "surname" placeholder = " Soyad">
            <input type="password" required="required" name ="password" id = "password" placeholder = " Şifre">
            <input type="submit" name = "btngonder" id ="btnsignin" value = "Yeni Kullanıcı Oluştur" class ="btnstyle">
        </form>
    </div>
    
</body>
</html>