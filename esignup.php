<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="signin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt</title>
</head>
<body>
    <div class="anaforum">
        <form name = "goforum" id = "goforum" action="confirmation.php" method = "POST">
            <input style = "margin-top:35px" required="required" type="text" name ="name" id = "name" placeholder = " Ad">
            <input type="text" required="required" name ="surname" id = "surname" placeholder = " Soyad">
            <input type="password" required="required" name ="password" id = "password" placeholder = " Şifre">
            <input type="submit" name = "btngonder" id ="btnsignin" value = "Yeni Kullanıcı Oluştur" class ="btnstyle">
        </form>
    </div>
</body>
</html>