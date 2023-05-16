<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haberler</title>
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="signin.css">
    <style>
        body
        {
            background-color: #222831;
            font-family: 'Roboto';
            margin: 0;
        }
        
        .editform
        {
            background-image: linear-gradient(0deg ,#222831, #00ADB5 ,#222831);
            margin: auto;
            width: 700px;
            margin-top: 100px;
            border-radius: 40px;
        }

        .trait
        {
            width: 90%;
            border-color: linear-gradient(0deg ,#222831, #00ADB5 ,#222831);
            border-radius: 10px;
            border-color: #00ADB5;
            font-size: 20px;
            font-family: 'Roboto';
            margin: auto;
            margin-left: 25px;
            margin-top: 25px;
        }
    </style>
</head>
<body>

<aside id = "deneme">
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
        <a href="delnews.php">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            Haber Güncelle/Sil
        </a>
        <a class="exit" href="esignin.php">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
            Çıkış
        </a>
    
    
        <?php
            session_start();
            if (isset($_SESSION["deneme"])) {
    
                $upperad=$_SESSION["deneme"];
    
                echo "<h4 style=margin-left:30px;>Admin:  ".ucfirst($upperad)."</h4>";
            }
            else{
            }
        ?>  
    </aside>


    <div class="editform">
        <form name = "goforum" id = "goforum" method = "POST" action = "haber_connect.php">
            <input required = "required" style = "margin-top:35px" type="text" name ="haber_baslik" id = "haber_baslik" placeholder = " Haberin Başlığını Giriniz">
            <textarea class = "trait" required='required' name='h' class = 'inut' type='text' rows='10'></textarea>
            <!-- <input  type="text" required = "required" name ="haber" id = "haber" placeholder = " Haberin İçeriğini Giriniz"></input> -->
            <input  type="text" required = "required" name ="img" id = "img" placeholder = "Görsel Linkini Giriniz"></input>
            
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