<?php 
$msg=isset($msg)?$msg:"";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Naslov</title>
</head>
<body>
<?php 
echo $msg;
?>
<form action="" method="post">
ID: <br>
<input type="text" name="id" value><br>
Ime: <br>
<input type="text" name="ime"><br>
Prezime: <br>
<input type="text" name="prezime"><br>
Indeks: <br>
<input type="text" name="brIndeksa"><br>
<input type="submit" name="action" value="Update">
</form>
</body>
</html>