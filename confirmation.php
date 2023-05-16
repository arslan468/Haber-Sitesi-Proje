<?php
    include("giris_connect.php");
    session_start();
    if(isset($_POST))
    {
        echo"ife girdi";

        $ad = trim($_POST['name']);
        $soyad = trim($_POST['surname']);
        $sifre = trim($_POST['password']);
        $sifre1 = md5($sifre);
        $command = $connection-> prepare("INSERT INTO user_data set user_name = ?, user_surname = ?, user_password = ?");
        $insert =$command->execute(array($ad,$soyad,$sifre1));
        if ($insert) 
        {
            $SESSION["usname"]=$ad;
            header("Location:esignin.php");            
        }
        else
        {
            echo("<h1>Error</h1>");
        }
    }
?>  