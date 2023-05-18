<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="news.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Giriş</title>
</head>
<body>
    <div class="anaforum">
        <form name = "goforum" id = "goforum" action="user_data_control.php" method = "POST">
            <input type="text" required="required" name ="name" id = "name" placeholder = " Ad" style = "margin-top:35px" >
            <input type="text" required="required" name ="surname" id = "surname" placeholder = " Soyad">
            <input type="password" name ="password" required="required" id = "password" placeholder = " Şifre">

            <input  type="submit" name = "btngonder" id ="btnsignin" value = "Giriş" class ="btnstyle">
        </form> 
        <form action="guest.php">
            <input style = "color:#3fff38;" type="submit" name = "btnNewuser" id = "btnNewuser" value = "Misafir Girişi Yap" class = "btnstyle">
        </form>
        <form action="esignup.php">
            <input type="submit" name = "btnNewuser" id = "btnNewuser" value = "Hesap Oluştur" class = "btnstyle">
        </form>
    </div>
</body>
</html>
