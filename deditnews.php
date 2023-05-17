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
    <title>Haber Güncelle</title>
    <script>
        $('a.top').click(function(){
        $(document.body).animate({scrollTop : 0},8000);
        return false;    });
        console.log("Haber");
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
            z-index: 1;
        }

        .lookup:hover
        {
            background-color:#676e79 ;
            transition: 0.5s;
        }

        .editform
        {
            background-image: linear-gradient(0deg ,#222831, #00ADB5 ,#222831);
            margin: auto;
            width: 800px;
            margin-top: 100px;
            border-radius: 40px;
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

    <!-- <div class="form">
        
        <input class = "inut" type="text" placeholder = "İD" id = "yazdir">
        <input class = "inut" type="text" placeholder = "Haber Başlığı" id = "baslik">
        <input class = "inut" type="text" placeholder = "Haber İçeriği">
        <input class = "inut" type="text" placeholder = "Editör İsim">
        <input class = "inut" type="text" placeholder = "Editör Soyad">
        <input class = "inut" type="text" placeholder = "Haberin Yazıldığı tarih">
    </div> -->

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
        <form id="goform" method='POST'>
            <?php
                ob_start();
                include("zdbbaglanti_haber.php");
                $degisken =  @$_GET["id"];
                $verileriCek = $connection->prepare("select * from haberbilgileri WHERE id=?");
                $verileriCek->execute(array($degisken));
                
                while($b = $verileriCek->fetch(PDO::FETCH_ASSOC))
                {

                    echo "<input required='required' name='hb'  class = 'inut' type='text' value='".$b["haberBasligi"]."'>";
                    echo "<textarea required='required' name='h' class = 'inut' type='text' rows='10'>".$b["haber"]."</textarea>";
                    echo "<input required='required' name='ad' class = 'inut' type='text' value='".$b["editorname"]."'>";
                    echo "<input required='required' name='soyad' class = 'inut' type='text' value='".$b["editorsurname"]."'>";
                    echo "<input required='required' name='zaman' class = 'inut' type='text' value='".$b["time"]."'>";
                    echo "<textarea required='required' name='link' class = 'inut' type='text' rows='3'>".$b["link"]."</textarea>";
                }
            ?>
            <button class="btnstyle" type="submit" name='btnUpdate'>Güncelle</button>
        </form>
        <?php
            if (isset($_POST["btnUpdate"])) {
                
                $haberb = trim($_POST['hb']);
                $haber = trim($_POST['h']);
                $editorad = trim($_POST['ad']);
                $editorsoyad = trim($_POST['soyad']);
                $zaman = trim($_POST['zaman']);
                $img = trim($_POST['link']);

                $query = $connection->prepare("UPDATE haberbilgileri SET haberBasligi=?, 
                    haber=?, editorname=?, editorsurname=?, time=?, link=? WHERE id=?");
                $query->execute(array($haberb,$haber,$editorad,$editorsoyad,$zaman,$img, $degisken));
                ob_end_clean();
                header("Location: delnews.php");
            }
            ?>
    </div>
</body>
</html>



