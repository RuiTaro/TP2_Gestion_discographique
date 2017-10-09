<?php
class Album extends Entity
{
	/*private $id;
	private $nom;*/
	private $annee;
	private $genre;

	public function __construct($id=null, $nom=null, $annee=null, $genre=null)
	{
		if($id=null && $nom=null && $annee=null && $genre=null)
		{
			parent::__construct($id,$nom);
			/*$this->id = $id;
			$this->nom = $nom;*/
			$this->annee = $annee;
			$this->genre = $genre;
		}
		
	}

	public function __get($propriete)
	{
		switch ($propriete)
			{
				case 'id' : return $this->id; break;
				case 'nom' : return $this->nom; break;
				case 'annee' : return $this->annee; break;
				case 'genre' : return $this->genre; break;
			}
	}
	public function __set($propriete, $value)
	{
		switch ($propriete)
		{
			case'id' : $this->id =$value; break;
			case 'nom' : $this->nom =$value; break;
			case 'annee' : $this->annee =$value; break;
			case 'genre' : $this->genre =$value; break;
		}
	}

	/*public function __tostring()
	{
		return $this->id. " ". $this->nom. " ". $this->annee. " ". $this->genre;
	}*/

	public static function getAll()
	{
		$sql = "SELECT * FROM album";
		$resultat = MonPdo::getInstance()->query($sql);
		$lesAlbum = $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Album");
		return $lesAlbum;
	}

	public static function ajouterAlbum($nom)
	{
		$monPdo = MonPdo::getInstance();
		$art = "insert into album (nom,annee,genre) values ('".$nom."','".$annee."','".$genre."')";
		$req = $monPdo->exec($art);
	}

	public static function supprimerArtist($id)
	{
		$monPdo = MonPdo::getInstance();
		$art = "delete from album where id = ".$id;
		$req = $monPdo->exec($art);
	}

	public static function findById($id)
	{
		$req = "select * from album where id = ".$id;
		$monPdo = MonPdo::getInstance();
		$result = $monPdo->query($req);
		$final = $result->fetchAll(PDO::FETCH_CLASS|PDO_FETCH_PROPS_LATE, "Album");
		return $final;
	}
}

