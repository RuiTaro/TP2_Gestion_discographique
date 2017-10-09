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
include ('entity.class.php');
include ('artist.class.php');
include ('album.class.php');
include ('monpdo.php');

try
{
?>	
	<form method="POST" action="ModifArtiste.php">
		<label for = "nom">Saisir le nom d'un artiste à ajouter : </label><input type="text" name="nom" id="nom" placeholder="Saisissez le nom">
		<input type = "submit" name = "valider" value="Ajouter l'artiste">
	</form>
	<br>

<?php
	
	echo "<table>";
	$listArtist = Artist::getAll();
	foreach($listArtist as $lesArtist)
	{
		echo "<tr><td>".$lesArtist->id."</td>";
		echo "<td>".$lesArtist->nom."</td>";
		echo "<td> <a href = 'ModifArtiste.php'?action=afficher>Afficher</a> </td>";
		echo "<td> <a href = 'ModifArtiste.php'?action=supprimer>Supprimer</a> </td> </tr>";
	}
	echo "</table>";
}
catch (PDOException $e)
{
	echo $e->getMessage();
}
?>
