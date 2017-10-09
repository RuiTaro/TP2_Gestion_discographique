<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php
try
{
	include ('artist.class.php');
	include ('album.class.php');
	include ('monpdo.php');
	$monPdo = MonPdo::getInstance();
	$nom = $_POST['nom'];
	$art = "insert into artist (nom) values ('".$nom."')";
	$req = $monPdo->exec($art);
	echo "Vous avez insérer l'aritste n°".$monPdo->lastInsertId()."se nommant ".$nom;
}
catch (PDOException $e)
{
	echo $e->getMessage();
}

?>