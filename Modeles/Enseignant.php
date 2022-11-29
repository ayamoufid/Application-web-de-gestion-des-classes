<?php
  require_once 'Connexion.php';

class Enseignant
{
		
	  private $conn;
  public function __construct()
    {
     $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }

	  public function getEnseignant($id_enseignant)
	{
		$sql = "SELECT * FROM Enseignant WHERE ID_ENSEIGNANT = ?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_enseignant));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}
	public function existe_ens($email)
	{
		$sql =  "SELECT * FROM enseignant WHERE email = ?";
		$resulta = $this->conn->prepare($sql);
		$resulta->execute(array($email));
		if($req=$resulta->fetch(PDO::FETCH_ASSOC))
		{
			return true;
		}else
		{
			return false;
		}
	}


	public function ajouter_ens($nom ,$prenom ,$mdp ,$email ,$dnn,$img )
	{	
   
		$sql = "INSERT INTO enseignant (nom ,PRENOM ,Motdepasse ,EMAIL ,DATEDENAISSANCE,PHOTO) VALUES (:nom ,:prenom ,:mdp ,:email ,:dnn,:img);";
		$req = $this->conn->prepare($sql);
		$req->execute(array('nom'=>$nom,'prenom'=>$prenom,'mdp'=>$mdp,'email'=>$email,'dnn'=>$dnn,'img'=>$img));	
	}

	public function modifier_ens($id_enseignant ,$nom ,$prenom ,$email ,$dnn ,$photo)
	{
		$sql="UPDATE  enseignant SET nom = ?,prenom = ?,email = ?,DATEDENAISSANCE = ?,photo = ? WHERE id_enseignant = ?";
		$req=$this->conn->prepare($sql);
		$req->execute(array($nom ,$prenom ,$email ,$dnn ,NULL,$id_enseignant));

	}

	public function supprimer_ens($id_enseignant)
	{
		$sql="DELETE FROM enseignant WHERE id_enseignant = ?";
		$req=$this->conn>prepare($sql);
		$req->execute(array($id_enseignant));
	}


  public function connecter_ens($email,$pw)
	{	
			$sql="SELECT * FROM enseignant WHERE EMAIL='$email' AND motdepasse='$pw'";
			$req=$this->conn->query($sql);

			if($donnee = $req->FETCH(PDO::FETCH_ASSOC)){

 				return $donnee['ID_ENSEIGNANT'];

			}else{

				return false;
			}
	}
	public function modifier_mdp($id_enseignant, $mdp)
	{
		$sql="UPDATE  enseignant SET motdepasse = ?WHERE id_enseignant = ?";
		$req=$this->conn->prepare($sql);
		$req->execute(array($mdp ,$id_enseignant));

	}
}
	 try {
    
    $ens =new Enseignant(); 
    //$ens->ajouter_ens('chaimaa','chaimaa','chaimaa','chaimaa@hotmail.fr','1975-03-29');
    //  $es=$ens->getEnseignant(3);
    //  print_r($es);
    //  $es=$ens->connecter_ens('ddff@GMAIL.jj','12');
    //   print_r($es);
    // $ens->modifier_mdp(9,'abc12');
    //$ens->modifier_ens(9,'KaWTAR','aya','12','aya@GMAIL.jj','2001-11-05',' ');

       } catch (PDOException $e) {
 	     echo "cc:".$e->getMessage();
    	
    }

  ?>