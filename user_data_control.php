<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hatalı Giriş</title>
    <style>
        h1
        {
            color: #00ADB5;
            margin-left:40%;
            opacity: 0.9;
        }
        div
        {   
            
            margin: auto;
            display:block;
        }
    </style>
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
    <?php
        session_start(); 
        include("giris_connect.php");
       
        if (isset($_POST)) 
        {
            $ad = trim($_POST['name']);
            $soyad = trim($_POST['surname']);
            $sifre = trim($_POST['password']);
            $com = $connection->prepare('SELECT * FROM user_data');
            $com->execute();
            while($bilgiler = $com->fetch(PDO::FETCH_ASSOC))
            {
                if ($bilgiler["user_name"] == $ad && $bilgiler["user_surname"] == $soyad && $bilgiler["user_password"] == $sifre )
                {
                    $_SESSION["deneme"] = $bilgiler["user_name"];
                    $_SESSION["surnamego"] = $bilgiler["user_surname"];
                    header("Location: aindex.php");
                    break;
                }
                else
                {
                    ?>
                    <div>
                        <h1 >Hatalı Giriş Yaptınız</h1>;
                    </div>
                    <?php
                }
            }
        }
    ?>
</body>
</html>