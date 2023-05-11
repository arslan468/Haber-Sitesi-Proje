<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="signin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haber Sil</title>
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
    <div class="anaforum1">
        <table class="table table-dark table-striped">
        <tr>
            <td>İD</td>
            <td>Haber Başlığı</td>
            <td>Haber İçeriği</td>
            <td>Editör İsim</td>
            <td>Editör Soyad</td>
            <td>Haberin Yazıldığı Tarih</td>
        </tr>
        <?php 
            include("zdbbaglanti_haber.php");
            //Bir mySQL sorgusu ile tüm üyeler tablosunu bir değişkene atıyoruz.
            $verileriCek = $connection->prepare("select * from haberbilgileri");
            $verileriCek->execute();
            //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
            while ($b=$verileriCek->fetch(PDO::FETCH_ASSOC)){
                    
                //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
                $id = $b['id'];
                $haberBaslig = $b['haberBasligi'];
                $haber = $b['haber'];
                $name = $b['editorname'];
                $surname = $b['editorsurname'];
                $time = $b['time'];
                
                    
                //Tablonun ikinci satırına denk gelen bu alanda gerekli yerlere bu değişkenleri giriyoruz. 
                echo "<tr>
                    <td>$id</td>
                    <td>$haberBaslig</td>
                    <td>$haber</td>
                    <td>$name</td>
                    <td>$surname</td>
                    <td>$time</td>
                </tr>";
                    
            }
                    
    ?>
                    
    </table>
    </div>
</body>
</html>