<?php
        if(isset($_POST))
        {
            include("giris_connect.php");
    
    
            $table = $connection->prepare("INSERT INTO communication set guestName = ?, guestGmail = ?, subject=?, message=?");
            $gonder = $table->execute(array($_POST['ad'], $_POST['mail'], $_POST['konu'], $_POST['mesaj']));
    
            if($gonder)
            {
                header("Location:detay.php");
                
            }
            else
            {
    
            }
        }
?>