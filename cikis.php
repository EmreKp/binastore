<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<title>Çıkış yapılıyor...</title>
</head>
<body>
Çıkışınız yapılıyor. Ana sayfaya yönlendiriliyorsunuz...
<?php session_unset(); session_destroy();
header("Location: index.php"); ?>
</body>
</html>
