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
	$id = $_POST['id'];
	$req = "select * from artist where id =".$id;
	$monPdo = MonPdo::getInstance();
	$result = $monPdo->query($req);

	$lesObjClass = $result->fetchAll(PDO::FETCH_CLASS, "Artist");
	echo "<table>";
	foreach($lesObjClass as $artist)
	{
		echo "<tr><td>".$artist->id."</td>";
		echo "<td>".$artist->nom."</td></tr>";
	}
}
catch (PDOException $e)
{
	echo $e->getMessage();
}

?>