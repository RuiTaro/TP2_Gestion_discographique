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

	if(!empty($_GET['action']))
	{
		if($_GET['action'] == 'afficher')
		{
			$artist = Artist::findById($_GET['action']->id);

		}
		if($_GET['action'] == 'supprimer')
		{
			Artist::supprimerArtist($_GET['action']->id);
		}
	}

	îf (!empty($_POST['nom']))
	{
		$nom = $_POST['nom'];
		Artist::ajouterArtist($nom);
		echo "Vous avez insérer l'artiste n°".$monPdo->lastInsertId()."se nommant ".$nom;
	}
}
catch (PDOException $e)
{
	echo $e->getMessage();
}
?>