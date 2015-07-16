<?php $bag=mysqli_connect("localhost","root","1994","magaza");
if (!$bag) die("Bağlanamadı: ".mysqli_connect_error());
session_start(); 
$urunsec="SELECT * FROM urunler WHERE id=".$_GET["id"];
$urunbak=mysqli_query($bag,$urunsec);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Düzenle</title>
    </head>
    <body>
    <?php while ($sec)
        echo "<input type=\"text\" value=\"".
    ?>
    </body>
</html>
