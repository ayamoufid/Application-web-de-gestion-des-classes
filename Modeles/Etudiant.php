 <?php 
   require_once 'Connexion.php';

class Etudiant
    {
    	private $conn;
        public function __construct()
      {
        $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }

      public	function ajouter_etu($CNE,$nom,$prenom,$email,$dnn,$mdp,$img)
    	{  
        $sql="INSERT INTO etudiant (CNE, NOM_ETUDIANT, PRENOM_ETUDIANT, EMAIL_ETUDIANT, DATEDENAISSANCE, PHOTO_ETUDIANT ,MOTDEPASSE_ETU) VALUES(?,?,?,?,?,?,?)";
     		 $req = $this->conn -> prepare($sql);
     	    $req->execute(array($CNE ,$nom ,$prenom ,$email ,$dnn,$img,$mdp));	
    	}
     
     public function modifier_etu($CNE ,$nom ,$prenom  ,$email ,$dnn ,$photo )
	{
		$sql="UPDATE  etudiant SET nom_etudiant = ? ,prenom_etudiant = ? ,email_etudiant = ? ,date_etudiant = ? ,photo_etudiant = ?   WHERE CNE = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($nom ,$prenom ,$email ,$dnn ,$photo ,$CNE));

	}
	public function modifier_mdp($cne, $mdp)
	{
		$sql="UPDATE  etudiant SET motdepasse_etu = ? WHERE CNE = ?";
		$req=$this->conn->prepare($sql);
		$req->execute(array($mdp,$cne));

	}
    
    public function supprimer_etu($CNE)
	{
		$sql="DELETE FROM etudiant WHERE CNE = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE));
	}

	public function existe($cne)
	{
		$sql ="SELECT * FROM etudiant WHERE CNE = ? ";
		$resulta = $this->conn->prepare($sql);
		$resulta->execute(array($cne));
		if($req = $resulta->FETCH(PDO::FETCH_ASSOC))
			return true;
		else
			return false;
	}

	public function getEtudiant($CNE)
	{
		$sql = "SELECT * FROM etudiant WHERE CNE = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE));
		$info_etu = $req->fetch(PDO::FETCH_ASSOC);

		return $info_etu;
	}
    public function GETETUS($ids)
    {
    	$sql = "SELECT * FROM  etudiant e JOIN assister a ON e.CNE=a.CNE WHERE IDSEANCE=? ";
    	$req=$this->conn->prepare($sql);
		$req->execute(array($ids));
		$infoetus = $req->fetchAll(PDO::FETCH_ASSOC);

		return $infoetus;
    }
	public function getLesEtudiants($idclasse)
	{
		$sql="SELECT * FROM  etudiant e JOIN demande d ON e.CNE=d.CNE WHERE ID_CLASSE=? and etat_demande=true ";
		$req=$this->conn->prepare($sql);
		$req->execute(array($idclasse));
		$infoetus = $req->fetchAll(PDO::FETCH_ASSOC);

		return $infoetus;
	}

	public function connecter_etu($email,$pw)
	{	
			$sql="SELECT * FROM etudiant WHERE email_etudiant ='$email' AND Motdepasse_etu ='$pw'";
			$req=$this->conn->query($sql);

			if($donnee = $req->FETCH(PDO::FETCH_ASSOC)){

				return $donnee['CNE'];

			}else{

				return false;
			}
	}

    }
    try {
    
  // $etu =new Etudiant(); 

 // $etu->ajouter_etu('Z3420','chacha','kawtar','chaimaa@gmail.com','2002-06-18','1236');
     //$et= $etu->getLesEtudiants(15);
 //    print_r($et);
 
   //if($etu->existe('abcd2')) { 
   //	echo"existe";
       //    }else
     //echo"n'existe pas";
 // $etd=$etu->connecter_etu('2490-2','12');
   //   print_r($et);
  // $etu->modifier_mdp('abcd3','abc12');

    //$etu->supprimer_etu('abcd2');
      } catch (PDOException $e) {
 	    echo "cc:".$e->getMessage();
    	
    }

 ?>