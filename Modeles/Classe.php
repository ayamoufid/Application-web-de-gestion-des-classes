<?php
      
      require_once 'Connexion.php';
      require_once '../Modeles/document.php';
      require_once '../Modeles/devoir.php';
      require_once '../Modeles/Demande.php';
      require_once '../Modeles/Annonce.php';
      require_once '../Modeles/presence.php';
 
     class Classe 
     {
	      private $conn;  
           public function __construct()
            {
                $base = new Connexion();
	         $this->conn=$base->getPDO();
	  }
     	
     	public function ajouterClasse($id_enseignant, $nomclasse, $semestre, $anneeuniv, $nomformation)
	{
		$sql = "INSERT INTO classe (id_enseignant, nomclasse, semestre, anneeuniv, nomformation) VALUES (?,?,?,?,?)";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_enseignant, $nomclasse, $semestre, $anneeuniv, $nomformation));
	}
    

     public function getClasse($id_classe)
	{
	    $sql = "SELECT * FROM classe WHERE id_classe = ?";
	    $req = $this->conn->prepare($sql);
		$req->execute(array($id_classe));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

	    return $donnees;
	}


	public function modifierclasse($id_classe, $nomclasse, $semestre, $annee_univ, $nom_formation)
	{
	    $sql = "UPDATE  classe SET  nomclasse=?, semestre=?, anneeuniv=?, nomformation=? WHERE id_classe = ?";
		$req=$this->conn->prepare($sql);
		$req->execute(array( $nomclasse, $semestre, $annee_univ, $nom_formation,$id_classe));
    }  
          


            public function getClasseens($id_enseignant)
	{
	    $classe = array();
		$sql = "SELECT * FROM classe WHERE id_enseignant='$id_enseignant'";
		$req = $this->conn->query($sql);
		while($donnes = $req->fetch()){
				$classe[]=$donnes;
			}
			return $classe;
	}
	    


        public function getAllClasse()
	{
		$lesClasses = array();
		$sql = "SELECT * FROM classe ";
	    $req = $this->conn->query($sql);
	    while($donnees = $req->fetch()){
	    	$lesClasses[]=$donnees;}
	    return $lesClasses;
	}
	public function ToutesClasses($cne){//Toutes les classes sauf les classes acceptes

		$lesClasses = array();
       $sql = " SELECT * FROM classe where ID_CLASSE not in (select ID_CLASSE from demande where CNE = ? and ETAT_DEMANDE = true)";
       $req= $this->conn->prepare($sql);
       $req -> execute(array($cne));
       while($res = $req->fetch())
		    { 
	    	    $lesClasses[]=$res;
	    	}
	        return $lesClasses;
	}

         public function getClasseetu($CNE)
	      {
	      	$mesClasses = array();
		    $sql="SELECT  * FROM classe c  JOIN  demande d ON c.ID_CLASSE = d.ID_CLASSE WHERE CNE=? and ETAT_DEMANDE=true ";
		    $req=$this->conn->prepare($sql);
		    $req->execute(array($CNE));
		    while($donees = $req->fetch())
		    {
	    	    $mesClasses[]=$donees;
	    	}
	        return $mesClasses;
	     }

    public function delete_classe($id)
    {
    	$sql="DELETE FROM classe WHERE id_classe = ? ";
		$req=$this->conn->prepare($sql);
     	$req->execute(array($id));
    }
	 public function supprimer_classe($id)
	{
		
		try {
			$document = new document();
			$sql="SELECT * FROM document WHERE ID_CLASSE='$id'";
			$result = $this->conn->query($sql);
			while($value = $result->fetch())
			{
				$document->supprimer_document($value['ID_DOCUMENT']);
			}
			}catch (Exception $e) {}

		try{
			$presence = new presence();
			$sql="SELECT * FROM presence WHERE ID_CLASSE='$id'";
			$result = $this->conn->query($sql);
			while($value = $result->fetch())
			{
				$presence->delete($value['IDSEANCE']);
			}
			}catch (Exception $e) {}


			try{
			$demande= new Demande();
			$demande->deleteClasse($id);
			} catch (Exception $e) {}

		try{
			$devoir = new devoir();
			$sql="SELECT * FROM devoir WHERE ID_CLASSE='$id'";
			$resultat = $this->conn->query($sql);

			while($value = $resultat->fetch()){

				$devoir->supprimer_devoir($value['ID_DEVOIR']);
			}
			}catch (Exception $e) {}

		try{
			$publier = new Annonce();
			$sql="SELECT * FROM Annonce WHERE ID_CLASSE='$id'";
			$res = $this->conn->query($sql);
			while($value = $res->fetch()){
				$publier->deleteAnnonceClasse($value['ID_ANNONCE'],$id);
			}
		    }catch (Exception $e){}

		try{
			$sql="DELETE FROM classe WHERE ID_CLASSE=?";
			$req = $this->conn->prepare($sql);
			$req->execute(array($id));
			}catch (Exception $e) {}
	} 
     }

    try {
    
    $etu =new Classe();
    //$etu-> ExisteEtu('abc3');
    //$e = $etu->ExisteEtu('abc3');
    //print_r($e);
   // $etu->delete_classe(21);
  // $etu->ajouterClasse(4,'Thermodynamique',1,'2020','Physique');
  //   $et= $etu->getEtudiant('abcd3');
  //   print_r($et);
 //$etu->modifierclasse(6, 'Analyse3', 2, '2020', 'Mathematiques');
   //if($etu->existe('abcd2')) { 
   //	echo"existe";
         //  }else
    // echo"n'existe pas";
 // $etd=$etu->connecter_etu('2490-2','12');
   //   print_r($et);
  //  $etu->modifier_mdp('abcd3','abc12');

   
      } catch (PDOException $e) {
 	    echo "cc:".$e->getMessage();
    	
    }

  ?>