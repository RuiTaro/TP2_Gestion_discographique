<?php
try
{
	include ('artist.class.php');
	include ('album.class.php');
	include ('monpdo.php');
	echo "-----------Recherche avec id-----------"
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
	<title></title>
</head>
<body>
	<form method = "POST" action = "recherche.php">
		<label for = "id">Id à rechercher : </label><input type="text" name="id" id="id" placeholder="Saisissez l'id">
		<input type = "submit" name = "valider" value="Valider">
	</form>
	<br><br>
	----------Insertion d'un artiste-----------
	<form method="POST" action="insertion.php">
		<label for = "nom">Nom de l'artiste à insérer : </label><input type="text" name="nom" id="id" placeholder="Saisissez le nom">
		<input type = "submit" name = "valider" value="Valider">
	</form>
	<br><br>
	----------Suppression d'un artiste----------
	<form method="POST" action="supprimer.php">
		<label for = "id">Id de l'artiste à supprimer : </label><input type="text" name="id" id="id" placeholder="Saisissez l'id">
		<input type = "submit" name = "valider" value="Valider">
	</form>
</body>
</html>

<?php
	$req = "select * from artist";
	$monPdo = MonPdo::getInstance();
	$result = $monPdo->query($req);
	$lesObjClass = $result->fetchAll(PDO::FETCH_CLASS, "Artist");
	echo "<br>-----FETCH CLASS-----<br><br><table>";
	foreach($lesObjClass as $artist)
	{
		echo "<tr><td>".$artist->id."</td>";
		echo "<td>".$artist->nom."</td></tr>";
	}
	echo"</table><br><br>-----FETCH OBJET----- <br><br>";

	$lesObjObjet = $result->fetchAll(PDO::FETCH_OBJ);
	echo "<table>";
	foreach($lesObjObjet as $objt)
	{
		echo "<tr><td>".$objt->id."</td>";
		echo "<td>".$objt->nom."</td></tr>";
	}
	echo "</table>";



}
catch (PDOException $e)
{
	echo $e->getMessage();
}

?>