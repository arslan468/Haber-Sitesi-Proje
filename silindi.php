<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        echo
        "
            <div>
            <h1 >HABER SİLİNDİ</h1>;
            </div>
        ";
        header("Refresh: 1; url=http://localhost/Haber%20Sitesi%20Proje/delnews.php");
    ?>
</body>
</html>