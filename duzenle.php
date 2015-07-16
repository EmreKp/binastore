<?php $bag=mysqli_connect("localhost","root","1994","magaza");
if (!$bag) die("Bağlanamadı: ".mysqli_connect_error());
session_start(); 
if (isset($_POST["submit"])) {
 $isim=$_POST["isim"]; $fiyat=$_POST["fiyat"];
 $detay=$_POST["detay"];
 $edit="UPDATE urunler SET isim='".$isim."', fiyat=".$fiyat.", detay='".$detay."' WHERE id=".$_GET["id"];
 if (mysqli_query($bag,$edit) $editoldu=1;
 else $editoldu=0; }
$urunsec="SELECT * FROM urunler WHERE id=".$_GET["id"];
$urunbak=mysqli_query($bag,$urunsec);
$sec=mysqli_fetch_assoc($urunbak);
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8" />
<title>Düzenle</title>
</head>
<body>
<?php 
if ($editoldu==1) echo "<div class=\"bravo\">Ürününüz düzenlendi.</div>";
else echo "<div class=\"hata\">Düzenlemede hata oluştu.</div>";
?>
<form method="post">
<?php echo "<p>Ürünün ismi:<br><input type=\"text\" name=\"isim\" required value=\"".$sec["isim"]."\"></p>";
echo "<p>Fiyat:  <input type=\"text\" name=\"fiyat\" required value\"".$sec["fiyat"]."\"></p>";
echo "<p>Ürünün detayı:<br><textarea name=\"detay\">".$sec["detay"]."\"></p>";
echo "<p><input type=\"submit\" value=\"Gönder\"></p>"; ?>
</form>
<?php mysqli_close($bag); ?>
</body>
</html>
