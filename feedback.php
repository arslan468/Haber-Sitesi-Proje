<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin İletişim</title>
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="position.css">
    
    <style>
        .sil
        {
            color:#eeeeee;
            text-decoration: none;
            transition: 0.5s;
        }

        .sil:hover
        {
            color:green;
            transition: 0.5s;
            text-decoration: none;
        }

        .tablo
        {
            color: #00ADB5;
            font-family: 'Roboto';
        }

        body
        {
            background-color: #222831;
            font-family: 'Roboto';
            margin: 0;
        }

        .resim
        {
            border-radius:25px;
            width: 500px;
            height: 345px;
            transition: 0.5s;
        }

        .resim:hover
        {
            border-radius:25px;
            width: 500px;
            height: 345px;
            transition: 0.5s;
            opacity: 0.5;
        }

        .pozisyon
        {
            margin: right;
            padding-top: 10px;
            padding-left:130px;
        }

        .border
        {
            border-radius:25px;
            border-color:#00ADB5;
        }

        .lookup 
        {
            position: fixed;
            border-radius: 35px;
            width: 50px;
            height: 50px;
            top: 89%;
            left: 94%;
            transition: 0.5s;
            z-index: 1;
        }

        .lookup:hover
        {
            background-color:#676e79 ;
            transition: 0.5s;
        }

        .spotify
        {
            position: fixed;
            width:250px;
            height:900px;
            top:12%;
            left:86%;
            
        }

    </style>
    <script>
        $('a.top').click(function(){
        $(document.body).animate({scrollTop : 0},8000);
        return false;    });
        console.log("Haber");
    </script>
</head>
<body>

<div class="lookup">
        <a class="top" href="#">
            <img style="width: 50px; height: 50px;" src="up.png" alt="">
        </a>
</div>

<div class="spotify">
    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWXoHqNlfcLJb?utm_source=generator&theme=0" width="100%" height="680" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
</div>

<aside id = "deneme">
        <p style="font-size: 25px; color:#EEEEEE;"> Menü </p>
        <a href="aindex.php">
            <i class="fa fa-user-o" aria-hidden="true"></i>
            Anasayfa
        </a>
        <a href="cnew_haber.php">
            <i class="fa fa-laptop" aria-hidden="true"></i>
            Yeni Haber Ekle
        </a>
        <a href="delnews.php">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            Haber Güncelle/Sil
        </a>
        <a href="feedback.php">
            <i class="fa fa-laptop" aria-hidden="true"></i>
            Gelen Mesajlar
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

<div class="anaforum1">
        <table class="table table-dark table-striped">
        <tr>
            <td class = "tablo" style = "width:5px" id = "tablobaslik" >İD</td>
            <td class = "tablo" style = "width:70px" id = "tablobaslik" >Ad/Soyad</td>
            <td class = "tablo" style = "width:120px" id = "tablobaslik" >Mail Hesabı</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Konu</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Mesaj</td>
            <td class = "tablo" style = "width:90px" id = "tablobaslik" >Yazıldığı Tarih</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Tamamla</td>
        </tr>
        <?php 
            include("zdbbaglanti_haber.php");
            function deneme(int $id = null)
            {
                echo "<h1>".id."</h1>";
            }
            //Bir mySQL sorgusu ile tüm üyeler tablosunu bir değişkene atıyoruz.
            $verileriCek = $connection->prepare("select * from communication");
            $verileriCek->execute(); 
            $seri  = 0;
            //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
            while ($b=$verileriCek->fetch(PDO::FETCH_ASSOC)){

                $seri += 1;
                    
                //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
                $id = $b['id'];
                $haberBaslig = substr($b['guestName'],0,60);
                $haber = substr($b['guestGmail'],0,60); 
                $name = $b['subject'];
                $surname = substr($b['message'],0,30);
                $time = $b['time'];
                
                    
                //Tablonun ikinci satırına denk gelen bu alanda gerekli yerlere bu değişkenleri giriyoruz. 
                echo "<tr id = $seri onmouseover='gettID(".$b["id"].")' >
                    <td id = d1>$id</td>
                    <td id = d2 myBtn>$haberBaslig</td>
                    <td id = d3>$haber</td>
                    <td id = d4>$name</td>
                    <td id = d5>$surname</td>
                    <td id = d6>$time</td>
                    
                    <td id = d6><a class = 'sil' href='communication_del.php?id=".$id."'>Tamamla</a></td>
                </tr>";
            }
    ?>    
    </table>
    </div>
    <script src="deneme.js"></script>

    
</body>
</html>