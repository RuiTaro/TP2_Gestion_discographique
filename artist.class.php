<?php
	class Artist extends Entity
	{
		/*private $id;
		private $nom;*/
		private $lesAlbums;

		public function __construct($id=null, $nom=null)
		{
			if($id!=null && $nom!=null)
			{
				parent::__construct($id,$nom);
				/*$this->id = $id;
				$this->nom = $nom;*/
				$this->lesAlbums=array();
			}
		}

		public function __get($propriete)
		{
			switch ($propriete)
			{
				case 'id' : return $this->id; break;
				case 'nom' : return $this->nom; break;
				case 'lesAlbums' : return $this->lesAlbums; break;
			}
			
		}
		public function __set($propriete, $value)
		{
			switch ($propriete)
			{
				case 'id' : $this->id =$value; break;
				case 'nom' : $this->nom =$value; break;
				case 'lesAlbums' : $this->lesAlbums = $value; break;
			}
		}

		public function AjouteAlbum($album)
		{
			$this->lesAlbums[]=$album;
		}

		/*public function __tostring()
		{
			return $this->id. " ". $this->nom;
		}*/

		public static function getAll()
		{
			$sql = "SELECT * FROM artist";
			$resultat = MonPdo::getInstance()->query($sql);
			$lesArtist = $resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Artist");
			return $lesArtist;
		}

		public static function ajouterArtist($nom)
		{
			$monPdo = MonPdo::getInstance();
			$art = "insert into artist (nom) values ('".$nom."')";
			$req = $monPdo->exec($art);
		}

		public static function supprimerArtist($id)
		{
			$monPdo = MonPdo::getInstance();
			$art = "delete from artist where id = ".$id;
			$req = $monPdo->exec($art);
		}

		public static function findById($id)
		{
			$req = "select * from artist where id = ".$id;
			$monPdo = MonPdo::getInstance();
			$result = $monPdo->query($req);
			$final = $result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Artist");
			return $final;
		}
	}
?>