<?php $bag=mysqli_connect("localhost","root","1994","magaza");
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
<html>
<head><meta charset="utf-8">
<title>E-Ticaret Mağazası</title>
<link rel="stylesheet" href="stil.css">
</head>
<body><?php 
if ($_SESSION["user"]!="") echo "\n<div style=\"float:right\"><a href=\"cikis.php\">Çıkış</a></div>\n<div>Merhaba, <b>".$_SESSION["user"]."</b> | <a href=\"profil.php\">Profilim</a> | <a href=\"urunler.php\">Ürünlerim</a></div>\n";
else echo "\n<form method=\"post\">
<p>Kullanıcı adı: <input type=\"text\" name=\"nick\" required></p>
<p>Şifre: <input type=\"password\" name=\"sifre\" required></p>
<p><input type=\"submit\" value=\"Giriş yap\"> | <input type=\"button\" onclick=\"location.href='kayit.php'\" value=\"Kayıt ol\"></p>\n</form>\n";
?><h1>Mağazamıza hoşgeldiniz!</h1>
<?php if ($_GET["sil"]!="") {
  if ($_SESSION["user"]=="admin") {
    $sil="UPDATE urunler SET yayin=0 WHERE id=".$_GET["sil"];
    if (mysqli_query($bag,$sil)) echo "<div class=\"bravo\">Ürün yayından kaldırıldı.</div>";
    else echo "<div class=\"hata\">Ürünü silerken hata oluştu.</div>"; }
  else echo "<div class=\"hata\">Ürünü silme yetkisi, admine aittir.</div>";
?>
<p>İşte sizin için, yine sizden gelen ürünler burada. Keyifli alışverişler :)</p>
<!-- burası ürün alanı sonra ayarlanacak !-->
<?php $urunbak="SELECT * FROM urunler";
$sonuc=mysqli_query($bag,$urunbak);
while ($urun=mysqli_fetch_assoc($sonuc)) {
 $satbak="SELECT * FROM kullanici WHERE userid=".$urun["satici"];
 $satici=mysqli_fetch_assoc(mysqli_query($bag,$satbak));
 echo "<div class=\"urunac\">\n";
 echo "<p style=\"float:right\" class=\"fiyat\">".$urun["fiyat"]." TL &#x25BC;";
 if ($_SESSION["user"]=="admin") echo "<br><a href=\"?sil=".$urun["id"]."\">&#10060;</a></p>\n";
 echo "<p><a href=\"#\" class=\"urun\">".$urun["isim"]."</a></p>\n";
 echo "<div class=\"detay\">\n";
 if ($urun["resimadi"]!="") echo "<p class=\"urunresmi\"><img src=\"".$urun["resimadi"]."\"></p>";
 echo "<p>".$urun["detay"]."</p>\n";
 echo "<p><b>Satıcı:</b> <a href=\"profil.php?id=".$urun["satici"]."\">".$satici["nick"]."</a></p></div>\n";
 echo "</div>\n"; } ?>
<script src="jquery-1.11.3.min.js"></script>
<script src="script.js"></script>
<?php mysqli_close($bag); ?>
</body>
</html>
