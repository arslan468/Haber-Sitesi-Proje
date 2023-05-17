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

<div class=" container py-3 mt-5">
  <!-- Card Start -->
  
        <?php
            include("zdbbaglanti_haber.php");
            $habercek = $connection->prepare("SELECT * FROM haberbilgileri");
            $habercek->execute();

            while ($data=$habercek->fetch(PDO::FETCH_ASSOC))
            {
                $id =  $data['id'];
                $haberbaslig = substr($data['haberBasligi'],0,200); 
                $haber = substr($data['haber'],0,900);
                $name = $data['editorname'];
                $surname = $data['editorsurname'];
                $time = $data['time'];
                $img = $data['link'];
                $views = $data['views'];

                echo 
                "
                <div class='border mt-5 p-5 bg-dark text-light card'>
                    <div class='row'>
                        <div class='col-md-7 px-3'>
                            <div class='card-block px-6'>
                                <h4 class='text-info card-title'> $haberbaslig</h4>
                                <p class='card-text'>$haber</p><br>
                                <a href='detay.php?id=".$id."' class='btn btn-secondary'>Haberi Oku</a>
                            </div>
                        </div>

                        <div class='col-md-5'>
                            <div class='carousel-item active'>
                                <a href='detay.php?id=".$id."'> <img class='d-block resim' src='$img'></a>
                                <p class='pozisyon  card-text'><small class='text-secondary'>$name $surname- $time - </small></p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        ?>
    </div>
  </div>
</body>
</html>


<!-- <div class="col-md-7 px-3">
        <div class="card-block px-6">
          <h4 class="text-info card-title">Horizontal Card with Carousel - Bootstrap 4 </h4>
          <p class="card-text">
            The Carousel code can be replaced with an img src, no problem. The added CSS brings shadow to the card and some adjustments to the prev/next buttons and the indicators is rounded now. As in Bootstrap 3
          </p>
          <p class="card-text">Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images Made for usage, commonly searched for. Fork, like and use it. Just move the carousel div above the col containing the text for left alignment of images</p>
          <br>
          ekleme
          
          <a href="#" class="btn btn-secondary">Haberi Oku</a>

        </div>
      </div>
      <div class="col-md-5">
        <div class="carousel-item active">
              
              <p class="pozisyon  card-text"><small class="text-secondary">Mehmet Alp Arslan - 2023-05-16 21:04:53 - </small></p>
        </div> -->