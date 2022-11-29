<?php 
   require_once 'Connexion.php';

    class Annonce
    {
    	  private $conn;
     public function __construct()
    {
    $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }



    	public function ajouter_annonce($nom,$date,$description)
    	{
        $sql="INSERT INTO annonce (NOM_ANNONCE, DATE_ANNONCE, DESCRIPTION_ANNONCE) VALUES(?,?,?)";
		 $req = $this->conn->prepare($sql);
		 $rps=$req->execute(array($nom ,$date ,$description));
		 return $rps;
    	}



        public function modifier_annonce($id_annonce,$nom,$date,$description)
	    {
			$sql="UPDATE annonce 
			      SET NOM_ANNONCE=?, DATE_ANNONCE=?, DESCRIPTION_ANNONCE=?  
			      WHERE id_annonce = ? ";
			$req = $this->conn->prepare($sql);
			$req->execute(array($nom ,$date ,$description,$id_annonce ));
        }    


     public function supprimer_annonce($id_annonce)
	  {
		$sql="DELETE FROM annonce WHERE id_annonce = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_annonce));
	  }


	public function existe_annonce($nom,$date,$description)
	{
		$sql =  "SELECT ID_ANNONCE  FROM annonce  WHERE NOM_ANNONCE =? and DATE_ANNONCE=? and DESCRIPTION_ANNONCE=?";
    	$resulta = $this->conn->prepare($sql);
		$resulta->execute(array($nom,$date,$description));
		if($req=$resulta->fetch(PDO::FETCH_ASSOC))
		// if($req=$result->fetch_row())
			return $req;
		 else
			 return false;
	}



	public function getAnnonce($id_annonce)
	{
		$req = $this->conn->query('SELECT * FROM annonce WHERE id_annonce = '.$id_annonce);
		$info_annonce = $req->fetch(PDO::FETCH_ASSOC);
		return $info_annonce;
	}



	public function addAnnonceClasse($ID_CLASSE,$ID_ANNONCE) 
	{
		$sql="INSERT INTO concerner (ID_ANNONCE,ID_CLASSE) VALUES(?,?)";
		$req = $this->conn->prepare($sql);
		$req->execute(array($ID_ANNONCE,$ID_CLASSE));

	}


     public function deleteAnnonceClasse($id_annonce,$id_classe)
	{
		$sql="DELETE FROM concerner WHERE id_annonce = ? and id_classe = ?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_annonce,$id_classe));
	}
	public function getAllAnnonces($idclasse)
	{
		$req = $this->conn->prepare('SELECT * FROM annonce a,concerner c WHERE a.ID_ANNONCE=c.ID_ANNONCE and c.ID_CLASSE=?');
		$req->execute(array($idclasse));
	    $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $donnees;
	}
  }


  

?>
 
