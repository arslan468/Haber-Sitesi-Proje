<!DOCTYPE html>
<?php
ob_start(); 
?>
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
        @import url('https://fonts.googleapis.com/css2?family=Cabin&family=Roboto:wght@100;500&family=Source+Sans+Pro:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cabin&family=Roboto:wght@100;500&family=Source+Sans+Pro:wght@700&display=swap');
        body
        {
            background-color: #222831;
            font-family: 'Roboto';
            margin: 0;
        }

        .resim
        {
            display: flex;
            margin: auto;
            border-radius:25px;
            width: 800px;
            height: 445px;
        }


        .pozisyon
        {
            margin: right;
            padding-top: 10px;
            padding-left:180px;
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
            left:3%;
            z-index: -1;
        }

        #geridon
        {
            position: fixed;
            top:0px;
            font-family: 'Roboto';
            color: #393E46;
            background-color: #00ADB5;
            width: 200px;
            height: 70px;
            border-radius: 0px 30px 30px 0px;
        }

        #geridon a 
        {
            font-size: 22px;
            color: #393E46;
            display: block;
            padding: 15px;
            font-family: 'Roboto';
            padding-left: 30px;
            text-decoration: none;
            transition: 1s;
            -webkit-tap-highlight-color:transparent;
        }

        #geridon a:hover
        {
            padding: 30px;
            font-size: 30px;
            transition: 2s;
        }

        .orta
        {
            margin-left: 180px;
        }

        #icerik
        {
            font-family: 'Cabin', sans-serif;
            font-family: 'Roboto', sans-serif;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .iletisim
        {
            width: 100%;
            height: 600px;
            background-color: #393E46;
        }

        #baslik
        {
            text-align: center;
            color: white;
            padding-top: 10px;
            
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




<div class="anaforum">
    <h1 class ="text-light m-3 mt-5 p-3" >Bu haberi silmek istediğinize eminmisiniz <b style = "color:red;">!!!</h1>
    <form    method = "POST" action = "delnews.php">
            <input style="color:green;" type="submit" name = "btngonder" id ="btnsignin" value = "İPTAL" class ="btnstyle">
    </form>
    <form method = "POST">
        <button type="submit" name="btnSil">Sil</button>
            <!-- <input style="color:red;" type="submit" name = "btnsil" id ="btnsignin" value = "SİL" class ="btnstyle"> -->
    </form>
</div>






<div class=" container">  
        <?php
            
            include("zdbbaglanti_haber.php");
            $haberid = @$_GET["id"];
            $habercek = $connection->prepare("SELECT * FROM haberbilgileri WHERE id=?");
            $habercek->execute(array($haberid));

            while ($cekim = $habercek->fetch(PDO::FETCH_ASSOC))
            {

                $id          = $cekim['id'];
                $haberbaslig = $cekim['haberBasligi']; 
                $haber       = $cekim['haber'];
                $name        = $cekim['editorname'];
                $surname     = $cekim['editorsurname'];
                $time        = $cekim['time'];
                $img         = $cekim['link'];
                $views       = $cekim['views'];
                
                $views+=1;

                echo "
                    <div class='row mt-5'>
                        <div class='col-md-12 orta'>
                            <h1 class='text-info mx-auto p-2'>
                            $haberbaslig
                            </h1>
                        </div>
                        <div class='col-md-12'>
                            <img class='border border-info img-fluid resim' src='$img'> 
                        </div>
                        <div class='col-md-3'></div>
                        <div class='col-md-6 mt-5 mb-5'>
                        <h3 id = 'icerik' class='text-light'>
                                  &nbsp;$haber
                        </h3>
                        </div> 
                        <div class='col-md-3'></div>
                    </div>

                ";
                $goruntu = $connection->prepare("UPDATE haberbilgileri SET views=? WHERE id=$id");
                $goruntu->execute(array($views));
            }
        ?>
    </div>
  </div>

</body>
</html>


<?php
    if(isset($_POST["btnSil"]))
    {
        echo "<h1>girdi</h1>";
        echo $haberid;
        $sql = $connection->prepare("DELETE FROM haberbilgileri WHERE id=?"); 
        $sql->execute(array($haberid));
        header("Location: delnews.php");
    }

    if(isset($_POST["btnUser"]))
    {
        include("giris_connect.php");
        $table = $connection->prepare("INSERT INTO communication set guestName = ?, guestGmail = ?, subject=?, message=?");
        $gonder = $table->execute(array($_POST['ad'], $_POST['mail'], $_POST['konu'], $_POST['mesaj']));

        if($gonder)
        {
            echo
            "<script>
                alert('Mesajınız Ulaştı En Kısa Sürede Size Dönüş Yapacağız');
            </scri>";
        }
        else
        {

        }
    }
?>