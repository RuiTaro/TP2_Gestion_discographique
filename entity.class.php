<?php
abstract class Entity
{
	private $id;
	private $nom;

	public function __construct($id=null, $nom=null)
	{
		if($id!=null && $nom!=null)
		{
			$this->id = $id;
			$this->nom = $nom;
		}
	}
	public function __get($propriete)
	{
		switch ($propriete)
		{
			case 'id' : return $this->id; break;
			case 'nom' : return $this->nom; break;
		}
			
	}
	public function __set($propriete, $value)
	{
		switch ($propriete)
		{
			case 'id' : $this->id =$value; break;
			case 'nom' : $this->nom =$value; break;
		}
	}

	public function __tostring()
	{
		return $this->id. " ". $this->nom;
	}
}