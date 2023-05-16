<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="signin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hatalı Giriş</title>
    <style>
        h1
        {
            color: #00ADB5;
            margin-left:40%;
            opacity: 0.9;
        }
        div
        {   
            
            margin: auto;
            display:block;
        }
    </style>
</head>
<body>
    <?php
        session_start(); 
        include("giris_connect.php");
       
        if (isset($_POST)) 
        {
            $ad = trim($_POST['name']);
            $soyad = trim($_POST['surname']);
            $sifre = trim($_POST['password']);
            $sifrelisifre = md5($sifre);
            $com = $connection->prepare('SELECT * FROM user_data');
            $com->execute();
            while($bilgiler = $com->fetch(PDO::FETCH_ASSOC))
            {
                if ($bilgiler["user_name"] == $ad && $bilgiler["user_surname"] == $soyad && $bilgiler["user_password"] == $sifrelisifre )
                {
                    $_SESSION["deneme"] = $bilgiler["user_name"];
                    $_SESSION["surnamego"] = $bilgiler["user_surname"];
                    header("Location: aindex.php");
                    break;
                }
                else
                {
                    ?>
                    <div>
                        <h1 >Hatalı Giriş Yaptınız</h1>;
                    </div>
                    <?php
                }
            }
        }
    ?>
</body>
</html>