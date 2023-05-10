<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="news.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hatalı Giriş</title>
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
</body>
</html>

<?php
    session_start();
    include("zdbbaglanti_haber.php");

    if (isset($_SESSION["deneme"])) {
        $upperad=$_SESSION["deneme"];
        $editorad = ucfirst($upperad); 
    }
    else{
        $editorad = "---";
    }

    if (isset($_SESSION["surnamego"])) {
        $uppersoyad = $_SESSION["surnamego"];
        $editorsurname = ucfirst($uppersoyad);   
    }
    else{
        $editorsurname = "---";
    }

    if(isset($_POST))
    {
        $hbBaslik = trim($_POST['haber_baslik']);
        $haber = trim($_POST['haber']);

        $command = $connection->prepare("INSERT INTO haberbilgileri set haberBasligi = ?, haber = ?, editorname = ?, editorsurname = ?");
        $insert = $command->execute(array($hbBaslik,$haber,$editorad,$editorsurname));
        if ($insert)
        {
            echo "Eklendi";
        }
        else
        {
            echo "Olmadı";
        }
    }
?>