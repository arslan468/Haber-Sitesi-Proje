<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="news.css">
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="position.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haber Sil</title>
    <script>
        $('a.top').click(function(){
        $(document.body).animate({scrollTop : 0},8000);
        return false;    });
        console.log("Haber");
    </script>
    <style>
        /* html{scroll-behavior: smooth;} */
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
        
        .guncelle
        {
            color:#eeeeee;
            text-decoration: none;
            transition: 0.5s;
        }

        .guncelle:hover
        {
            color:#00ADB5;
            transition: 0.5s;
            text-decoration: none;
        }

        .sil
        {
            color:#eeeeee;
            text-decoration: none;
            transition: 0.5s;
        }

        .sil:hover
        {
            color:red;
            transition: 0.5s;
            text-decoration: none;
        }

        .tablo
        {
            color: #00ADB5;
            font-family: 'Roboto';
        }

        

        @import url('https://fonts.googleapis.com/css2?family=Cabin&family=Roboto:wght@100;500&family=Source+Sans+Pro:wght@700&display=swap');
    </style>
     <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<body>

    <div class="lookup">
        <a class="top" href="#">
            <img style="width: 50px; height: 50px;" src="up.png" alt="">
        </a>
    </div>

    <!-- <form class = "form" action="">
        <input class = "inut" type="text" placeholder = "İD" id = "yazdir" name = "id">
        <input class = "btnstyle" type="submit" value = "Seçili Haberi Sil">
    </form> -->


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
            <td class = "tablo" style = "width:70px" id = "tablobaslik" >Haber Başlığı</td>
            <td class = "tablo" style = "width:120px" id = "tablobaslik" >Haber İçeriği</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Editör İsim</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Editör Soyad</td>
            <td class = "tablo" style = "width:90px" id = "tablobaslik" >Haberin Yazıldığı Tarih</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Güncelle</td>
            <td class = "tablo" style = "width:50px" id = "tablobaslik" >Sil</td>
        </tr>
        <?php 
            include("zdbbaglanti_haber.php");
            function deneme(int $id = null)
            {
                echo "<h1>".id."</h1>";
            }
            //Bir mySQL sorgusu ile tüm üyeler tablosunu bir değişkene atıyoruz.
            $verileriCek = $connection->prepare("select * from haberbilgileri");
            $verileriCek->execute(); 
            $seri  = 0;
            //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
            while ($b=$verileriCek->fetch(PDO::FETCH_ASSOC)){

                $seri += 1;
                    
                //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
                $id = $b['id'];
                $haberBaslig = substr($b['haberBasligi'],0,60);
                $haber = substr($b['haber'],0,60); 
                $name = $b['editorname'];
                $surname = $b['editorsurname'];
                $time = $b['time'];
                
                    
                //Tablonun ikinci satırına denk gelen bu alanda gerekli yerlere bu değişkenleri giriyoruz. 
                echo "<tr id = $seri onmouseover='gettID(".$b["id"].")' >
                    <td id = d1>$id</td>
                    <td id = d2 myBtn>$haberBaslig</td>
                    <td id = d3>$haber</td>
                    <td id = d4>$name</td>
                    <td id = d5>$surname</td>
                    <td id = d6>$time</td>
                    <td id = d6><a class = 'guncelle' href='deditnews.php?id=".$id."'>Güncelle</a></td>
                    <td id = d6><a class = 'sil' href='delete.php?id=".$id."'>Sil</a></td>
                </tr>";
            }
    ?>    
    </table>
    </div>
    <script src="deneme.js"></script>
</body>
</html>

