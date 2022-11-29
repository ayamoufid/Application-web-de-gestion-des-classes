<?php
require_once 'Connexion.php';

class  Demande
{
		  private $conn;
     public function __construct()
    {
    $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }
	

	public function getDemande($CNE , $id_classe)
	{
		$sql = "SELECT * FROM Demande WHERE CNE = ? AND ID_CLASSE = ?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE,$ID_CLASSE));
	    $donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}
	public function getDemandeClasse($id_classe)
	{
		$sql = "SELECT * FROM Demande WHERE ID_CLASSE = ? and ETAT_DEMANDE= 1";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_classe));
	    $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
		return $donnees;
	}
	public function getDemandeCl($id_classe)
	{
		$sql = "SELECT * FROM Demande WHERE ID_CLASSE = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_classe));
	    $donnees = $req->fetchAll(PDO::FETCH_ASSOC);
		return $donnees;
	}


	/*public function add($id_classe , $CNE,$ETAT_DEMANDE,$DATE_ACCEPTE)
	{
		$sql="INSERT INTO ? VALUES(?,?,?)";
		$req=$this->conn->prepare($sql);
		$req->execute(array($this->$id_classe , $CNE ,NOW()));	
	}*/


	public function delete($id_classe , $CNE)
	{
		$sql="DELETE FROM demande WHERE id_classe = ? AND CNE = ?";
		$req=$this->conn->prepare($sql);
     	$req->execute(array($id_classe , $CNE));
	}


	public function deleteClasse($id_classe){
		$sql="DELETE FROM demande WHERE ID_CLASSE = ? ";
		$req=$this->conn->prepare($sql);
		$req->execute(array($id_classe));
	}

	public function afficherdemande($id_enseignant,$id_classe)
	{
		$demandes = array();
		$sql = "SELECT  * FROM classe c
		        JOIN demande d ON d.id_classe = c.id_classe 
		        JOIN etudiant e ON e.CNE = d.CNE
		        WHERE c.id_enseignant = '$id_enseignant'
		        AND c.id_classe ='$id_classe' AND ETAT_DEMANDE is NULL ";
		$req = $this->conn->query($sql);
		while($data = $req->fetch()){
				$demandes[]=$data;
			}
			return $demandes;
	}
    
    public function envoyerdemande($cne, $id_classe)
    {
    	
        $sql = "INSERT INTO demande(CNE,ID_CLASSE,DATE_DEMANDE) VALUES (?,?,NOW())";
		$req = $this->conn->prepare($sql);
		$req->execute(array($cne, $id_classe));
    }

	public function modifierclasse($cne,$id_classe)
	{
		$date=date('y-m-j h:m:s');
	    $sql = "UPDATE demande SET  ETAT_DEMANDE=?,DATE_ACCEPTE=? WHERE id_classe = ? and cne= ?";
		$req=$this->conn->prepare($sql);
		$req->execute(array(1,$date,$id_classe,$cne));
     } 
      
     public function existe($cne)
	{
		$sql =  "SELECT * FROM etudiant WHERE CNE = '$cne' ";
		$resulta = $this->conn->query($sql);
		if($req=$resulta->fetch_row())
		{
			return true;
		}else
		{
			return false;
		}
	}
}
	try{
		$c = new Demande();
		//$c-> afficherdemande(1);
		//$c->envoyerdemande('abcd3',2);	
		//$c->modifierclasse('abcd3',2);
		//$c->delete(2,'abcd3');
		}
	catch(Exception $e){
		echo $e ->getMessage();
	}
?>