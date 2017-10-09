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
	$id = $_POST['id'];
	$art = "delete from artist where id = ".$id;
	$req = $monPdo->exec($art);
}
catch (PDOException $e)
{
	echo $e->getMessage();
}
?>