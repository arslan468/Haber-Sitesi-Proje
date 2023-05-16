<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haberler</title>
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="position.css">
    
    <style>
        body
        {
            background-color: #222831;
            font-family: 'Roboto';
            margin: 0;
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



</body>
</html>