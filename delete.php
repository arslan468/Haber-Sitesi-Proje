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

<div class="lookup">
        <a class="top" href="#">
            <img style="width: 50px; height: 50px;" src="up.png" alt="">
        </a>
</div>




<div class="transition-all m-auto mt-10 w-1/2  rounded-full">
    <h1 class ="text-3xl text-zinc-300 text-center" >Bu haberi silmek istediğinize eminmisiniz <b style = "color:red;">!!!</h1>
    <form    method = "POST" class ="hover:bg-slate-800 rounded-full  text-center mt-2" action = "delnews.php">
            <input class= "text-center hover:text-4xl transition-all text-green-500 ml-2 text-2xl " type="submit" name = "btngonder"  value = "İPTAL">
    </form>
    <form method = "POST" class= "hover:bg-slate-800 rounded-full text-center mt-2 ">
        <button  type="submit" class = " hover:text-4xl transition-all text-3xl" name="btnSil">Sil</button>
    </form>
</div>






<div class="container m-auto">  
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
                    <div class='mt-5 w-full pl-10'>
                        <div class=''>
                            <h1 class='mt-5 text-3xl text-emerald-300 text-center'>
                            $haberbaslig
                            </h1>
                        </div>
                        <div class='mt-5'>
                            <img class='border-2 hover:border-3 hover:border-x-indigo-500 border-y-indigo-500 border-spacing-32 resim' src='$img'> 
                        </div>
                        <div class='col-md-6 mt-5 mb-5'>
                        <h3 id = 'icerik' class= 'text-violet-300 font-mono text-xl mt-8'>&nbsp;$haber</h3>
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