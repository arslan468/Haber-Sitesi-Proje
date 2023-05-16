<?php
    try {
        $connection = new PDO("mysql:host=localhost;dbname=haber", "root", "");
    } catch (\Throwable $th) {
        echo "<h1>Bağlanamadı hata: ".$th."</h1>";
    }
?>