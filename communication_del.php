<!DOCTYPE html>
<?php
ob_start(); 
?>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
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



<div class="lookup animate-spin">
        <a class="top" href="#">
            <img style="width: 50px; height: 50px;" src="up.png" alt="">
        </a>
</div>




<div class="mt-11">
        <div class="mt-3  w-36 m-auto h-18 rounded-full p-3">
            <form method = "POST">
                <button class="hover:text-green-300 text-green-500 font-extrabold animate-bounce text-4xl text-center" type="submit" name="btnSil">Onayla</button>
            </form>
        </div>
        <div class="mt-3 transition-all hover:bg-gray-900 w-32 m-auto h-18 rounded-full p-3">
            <form method ="POST" action="feedback.php">
                    <input class="hover:text-green-300 text-green-500 font-extrabold text-4xl text-center" type="submit" name = "btngonder" id ="btnsignin" value = "İPTAL" class ="btnstyle">
            </form>
        </div>
    </div>






<div class=" container">  
        <?php
            
            include("zdbbaglanti_haber.php");
            $haberid = @$_GET["id"];
            $habercek = $connection->prepare("SELECT * FROM communication WHERE id=?");
            $habercek->execute(array($haberid));

            while ($cekim = $habercek->fetch(PDO::FETCH_ASSOC))
            {

                $id          = $cekim['id'];
                $haberbaslig = $cekim['guestName']; 
                $haber       = $cekim['guestGmail'];
                $name        = $cekim['subject'];
                $surname     = $cekim['message'];
                $time        = $cekim['time'];

                echo "
                    <div class='m-auto ml-80 '>
                        <div class='m-auto col-md-12'>
                            <h1 class = 'text-2xl text-orange-300 text-center mt-4'>Ad/Soyad: $haberbaslig</h1>
                        </div>
                        <div class='col-md-12'>
                            <h1 class = 'text-2xl text-orange-300 text-center mt-4'>E-mail: $haber</h1>
                        </div> 
                        <div class='col-md-12'>
                        <h1 class = 'text-2xl text-orange-300 text-center mt-4'>Mesajın yazıldığı tarih: $time</h1>
                        </div>  
                        <div class='col-md-12'>
                        <h1 class = 'text-2xl text-orange-500 text-center mt-4'>Mesajın Konusu: $name</h1>
                        </div>  
                        <div class='col-md-12'>
                        <h1 class = 'text-2xl text-orange-500 text-center mt-4'>Mesaj: $surname</h1>
                        </div> 

                    </div>
                ";
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
        $sql = $connection->prepare("DELETE FROM communication WHERE id=?"); 
        $sql->execute(array($haberid));
        header("Location: feedback.php");
    }


?>