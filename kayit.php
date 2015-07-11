<?php $bag=mysqli_connect("localhost","root","1994","magaza");
if (!$bag) die("Bağlanamadı: ".mysqli_connect_error()); ?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<title>E-Ticaret Mağazası: Müşteri Kayıt Formu</title>
<link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Üye Kayıt Formu</h1>
<?php function suz($veri) {
  $veri=trim($veri); $veri=stripslashes($veri);
  $veri=htmlspecialchars($veri); return $veri; } //w3schools'tan alınma
$nick=suz($_POST["nick"]); $sifre=$_POST["sifre"];
$email=suz($_POST["email"]); $sif2=suz($_POST["sifr2"]); 
$ad=suz($_POST["ad"]); $soyad=suz($_POST["soyad"]);
$bio=suz($_POST["tanit"]); $adres=suz($_POST["adres"]);
$kayit="INSERT INTO kullanici (nick, sifre, email, ad, soyad, tanitim, adres) VALUES('".$nick."','".md5($sifre)."','".$email."','".$ad."','".$soyad."','".$bio."','".$adres."')"; 
//hepsi required olduğu için boş mu dolu mu kontrol etmeye gerek yok
$varmi="SELECT * FROM kullanici WHERE nick='".$nick."'";
$bak=mysqli_fetch_assoc(mysqli_query($bag,$varmi)); //kullanıcı adı daha önce var mı yok mu ona bakcaz
//$sayi=mysqli_fetch_assoc($varmi); //stackoverflowdan alınma muhakkak mysqli_fetch_assoc gerekiyormuş
if ($nick!="") {
  if ($bak["nick"]!="") echo "<div class=\"hata\">Bu kullanıcı adı zaten vardır.</div>\n";
  else if ($sifre!=$sif2) echo "<div class=\"hata\">İki şifrenin de aynı olması gerekiyor.</div>\n";
  else if (mysqli_query($bag,$kayit)) echo "<div class=\"bravo\">Başarıyla kayıt oldunuz. Mağazamıza hoşgeldiniz...</div>\n";
  else echo "<div class=\"hata\">Hata oluştu: ".mysqli_error()."</div>\n";
}
$izin="UPDATE kullanici SET adresgoster=1";
if ($_POST["adresgoster"]) mysqli_query($bag,$izin);
?>
<p>Bir müşterimiz veya satıcımız olmak için aşağıdaki formu doldurun. (Belirtilmediği hallerde boş alanlar zorunludur)</p>
<form method="post">
<div id="kayitform">
<p>Üye Adı: <input type="text" name="nick" required></p>
<p>E-posta: <input type="email" name="email" required></p>
<p>Şifre: <input type="password" name="sifre" required></p>
<p>Şifreyi tekrar girin: <input type="password" name="sifr2" required></p>
<hr>
<p>Tam adınız: <input type="text" name="soyad" placeholder="Soyadınız"> <input type="text" name="ad" placeholder="Adınız"></p>
<p>Hakkınızda kısa bir tanıtım yazısı: <input type="textarea" name="tanit" placeholder="Bu bölüm isteğe bağlıdır."></p>
<p>Adresiniz: <textarea name="adres" required></textarea></p>
<p><input type="checkbox" name="adresizin"> Adresim profilimde görüntülensin. </p>
<p class="kabul"><input type="checkbox" name="kabul" required> <a href="#" id="sart">Şartlar</a>ı okudum ve kabul ediyorum.</p>
<p id="sartlar">Kullanım şartları kısmı buraya gelecek. Bu bir formalite anlaşmadır.</p>
<p><input type="submit" value="Kayıt Ol"></p>
</div>
</form>
<script src="jquery-1.11.3.min.js"></script>
<script src="script.js"></script>
<?php mysqli_close($bag); ?>
</body>
</html>
