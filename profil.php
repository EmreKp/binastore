<?php $bag=mysqli_connect("localhost","root","1994","magaza");
if (!$bag) die("Bağlanamadı: ".mysqli_connect_error());
session_start();
if ($_SESSION["user"]!="") $nick=$_SESSION["user"];
if ($_GET["id"]!="") $id="userid=".$_GET["id"];
else $id="nick='".$nick."'";
$profil="SELECT * FROM kullanici WHERE ".$id;
$bak=mysqli_fetch_assoc(mysqli_query($bag,$profil));
$pnick=$bak["nick"];
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<title><?php if ($pnick!="") echo "Profil: ".$pnick; else echo "Hata"; ?> - E-Ticaret Mağazası</title>
<link rel="stylesheet" href="stil.css">
</head>
<body>
<?php if ($_SESSION["user"]!="") echo "\n<div style=\"float:right\"><a href=\"cikis.php\">Çıkış</a></div>\n<div>Merhaba, <b>".$nick."</b> | <a href=\"index.php\">Ana Sayfa</a> | <b>Profilim</b> | <a href=\"urunler.php\">Ürünlerim</a></div>\n";
//------------------
if ($pnick=="") echo "<div class=\"hata\">Kullanıcı bulunamadı.</div>";
else { 
  echo "<p class=\"nick\">".$pnick."</p>\n<p>";
  if ($bak["tanitim"]=="") echo "Profile hoşgeldiniz. Bu yazı otomatik olarak oluşturuldu.";
  else echo $bak["tanitim"]; echo "</p>";
  echo "<p><b>Adres:</b> ";
  if ($bak["adresgoster"]) echo $bak["adres"];
  else echo "<i>Kullanıcı, adresinin görüntülenmesini istemiyor.</i>";
  echo "</p>";
  echo "<p><b>Kayıt tarihi:</b> ".$bak["kayittarih"]."</p>";
  echo "<h3>Ürünleri</h3>\n";
  $urun="SELECT * FROM urunler WHERE satici=".$bak["userid"];
  $urunsec=mysqli_query($bag,$urun);
  while ($sec=mysqli_fetch_assoc($urunsec)) {
   echo "<p>".$sec["isim"]."</p>";
  } 
} ?>
<?php mysqli_close($bag); ?>
</body>
</html>
