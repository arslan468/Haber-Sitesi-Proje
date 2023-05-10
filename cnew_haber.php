<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haberler</title>
</head>
<body style = "    background-color: #222831;     font-family: 'Roboto';     margin: 0;">

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
        <form name = "goforum" id = "goforum" method = "POST" action = "haber_connect.php">
            <input required = "required" style = "margin-top:35px" type="text" name ="haber_baslik" id = "haber_baslik" placeholder = " Haberin Başlığını Giriniz">
            
            <input  type="text" required = "required" name ="haber" id = "haber" placeholder = " Haberin İçeriğini Giriniz"></input>
            <input type="submit" name = "btngonder" id ="btnsignin" value = "Haberi Yayınla" class ="btnstyle">
        </form>
        <!-- <div class="mb-3 habergiris">
        <textarea class="form-control" placeholder = " Haberin İçeriğini Giriniz" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div> -->
    </div>


    

    
</body>
</html>

<?php
        // session_start();
        // if (isset($_SESSION["deneme"])) {

        //     $upperad=$_SESSION["deneme"];

        //     echo "<h2 style=margin-left:40px;>Kullanıcı:  ".ucfirst($upperad)."</h2>";
        // }
        // else{
        //     echo "<p>YOK</p>";
        // }
?> 