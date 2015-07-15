<?php
$bag=mysqli_connect("localhost","root","1994","magaza");
if (!$bag) die("Bağlanamadı: ".mysqli_connect_error());
session_start();
$nick=$_POST["nick"]; $sifre=$_POST["sifre"];
if ($nick!="") {
 $bak="SELECT * FROM kullanici WHERE nick='".$nick."'";
 $bk=mysqli_fetch_assoc(mysqli_query($bag,$bak));
 if ($bk["nick"]!=$nick) echo "<h2>Kullanıcı bulunamadı.</h2>";
 else if ($bk["sifre"]!=md5($sifre)) echo "<h2>Şifre yanlış</h2>";
 else $_SESSION["user"]=$nick;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
    </head>
    <body>
        
    </body>
</html>
