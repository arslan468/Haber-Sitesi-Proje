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
    <script>
        $('a.top').click(function(){
        $(document.body).animate({scrollTop : 0},8000);
        return false;    });

        var tableRows = document.getElementsByTagName('tr');

        for (var i = 0; i < tableRows.length; i += 1) {
        tableRows[i].addEventListener('mouseover', function(e){
        array("merhaba")
        }); 
        // or attachEvent, depends on browser
        }
    </script>
    <style>
        .lookup 
        {
            position: fixed;
            border-radius: 35px;
            width: 50px;
            height: 50px;
            top: 89%;
            left: 94%;
            transition: 0.5s;
        }

        .lookup:hover
        {
            background-color:#676e79 ;
            transition: 0.5s;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Cabin&family=Roboto:wght@100;500&family=Source+Sans+Pro:wght@700&display=swap');
    </style>
</head>
<body>

    <div class="lookup">
        <a class="top" href="#">
            <img style="width: 50px; height: 50px;" src="up.png" alt="">
        </a>
    </div>

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
            <td style = "color: #00ADB5;font-family: 'Roboto'; width:5px" id = "tablobaslik" >İD</td>
            <td style = "color: #00ADB5;font-family: 'Roboto'; width:70px" id = "tablobaslik" >Haber Başlığı</td>
            <td style = "color: #00ADB5;font-family: 'Roboto'; width:120px" id = "tablobaslik" >Haber İçeriği</td>
            <td style = "color: #00ADB5;font-family: 'Roboto'; width:50px" id = "tablobaslik" >Editör İsim</td>
            <td style = "color: #00ADB5;font-family: 'Roboto'; width:50px" id = "tablobaslik" >Editör Soyad</td>
            <td style = "color: #00ADB5;font-family: 'Roboto'; width:90px" id = "tablobaslik" >Haberin Yazıldığı Tarih</td>
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