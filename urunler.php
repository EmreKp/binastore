<?php $bag=mysqli_connect("localhost","root","1994","magaza");
if (!$bag) die("Bağlanamadı: ".mysqli_connect_error());
session_start(); 
$nick=$_SESSION["user"];
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<title>Ürünlerim - E-Ticaret Mağazası</title>
<link rel="stylesheet" href="stil.css">
</head>
<body>
<?php if ($_SESSION["user"]!="")  { echo "\n<div style=\"float:right\"><a href=\"cikis.php\">Çıkış</a></div>\n<div>Merhaba, <b>".$_SESSION["user"]."</b> | <a href=\"index.php\">Ana Sayfa</a> | <a href=\"profil.php\">Profilim</a> | <b>Ürünlerim</b></div>\n";
$idsec="SELECT * FROM kullanici WHERE nick='".$nick."'";
$id=mysqli_fetch_assoc(mysqli_query($bag,$idsec));
$isim=$_POST["isim"]; $fiyat=$_POST["fiyat"];
$detay=$_POST["detay"]; $satici=$id["userid"];
$resim=$_FILES["resim"]["tmp_name"];
if ($resim!="") { 
  $gonder=2;
  $turu=pathinfo($resim,PATHINFO_EXTENSION);
  $resmad=$_FILES["resim"]["name"];
  $dosya="resim/".$resmad;
  if ($turu!="jpg" || $turu!="gif" || $turu!="png" || $turu!="jpeg" || $turu!="bmp") { 
  echo "<div class=\"hata\">Resminizin türü geçerli değil.</div>"; $gonder=0; }
  else if ($_FILES["resim"]["size"]>2210000) {
  echo "<div class=\"hata\">Resminiz 2 MB'tan büyük olamaz.</div>"; $gonder=0; }
  else try { move_uploaded_file($resim,$dosya); 
  echo "<div class=\"bravo\">Resminiz eklendi.</div>"; }
  catch(Exception $e) { echo "<div class=\"hata\">Hata oluştu: ".$e->getMessage()."</div>"; $gonder=0; }
}
if ($isim!="" && $gonder!=0) {
 $ekle="INSERT INTO urunler (isim, fiyat, detay, satici, resimadi) VALUES ('".$isim."','".$fiyat."','".$detay."','".$satici."','".$resmad."')";
 if (mysqli_query($bag,$ekle)) echo "<div class=\"bravo\">Ürününüz eklendi.</div>";
 else echo "<div class=\"hata\">Hata oluştu: ".mysqli_error()."</div>";
} 
echo "<h1>Ürün Paneli</h1>
<h2>Ürün Ekleme</h2>
<p>Ürününüzün bilgilerini forma girin ve gönderin.</p>
<form method=\"post\" enctype=\"multipart/form-data\"><div id=\"urunform\">
<p><label>Ürünün Adı:</label> <input type=\"text\" name=\"isim\" required></p>
<p><label>Fiyat (TL):</label> <input type=\"text\" name=\"fiyat\" required></p>
<p><label>Açıklama:</label> <textarea name=\"detay\" placeholder=\"Ürününüzle ilgili açıklamalar...\" required></textarea></p>
<p><label>Resim (isteğe bağlı): </label><input type=\"file\" name=\"resim\" accept=\"image/*\"></p>
<p><input type=\"submit\" value=\"Ekle\"></p>
</div></form>"; }
else { echo "\n<form action=\"index.php\" method=\"post\">
<p>Kullanıcı adı: <input type=\"text\" name=\"nick\" required></p>
<p>Şifre: <input type=\"password\" name=\"sifre\" required></p>
<p><input type=\"submit\" value=\"Giriş yap\"> | <input type=\"button\" onclick=\"location.href='kayit.php'\" value=\"Kayıt ol\"></p>\n</form>\n";
echo "<div class=\"hata\">Üye girişi yapmanız gerekli.</div>\n"; }
mysqli_close($bag); ?>
</body>
</html>
