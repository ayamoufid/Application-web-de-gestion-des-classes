<?php 
   require_once 'Connexion.php';

    class Document
    {
    	  private $conn;

      public function __construct()
    {
        $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }


    	public function ajouter_document($id_classe,$titre,$description,$datemiseenligne,$type,$categorie)
    	{
         $sql="INSERT INTO document(ID_CLASSE,TITRE_DOCUMENT,DESCRIPTION_DOCUMENT,DATEDEMISEENLIGNE,TYPE_DOCUMENT,CATEGORIE_DOCUMENT) VALUES(?,?,?,?,?,?)";
		   $req = $this->conn->prepare($sql);
		   $req->execute(array($id_classe,$titre,$description,$datemiseenligne,$type,$categorie));
    	}
     

        public function modifier_document($id_document,$id_classe,$titre,$description,$datemiseenligne,$categorie)
	   {
		$sql="UPDATE document 
			  SET ID_CLASSE = ? ,TITRE_DOCUMENT = ? ,DESCRIPTION_DOCUMENT = ? ,DATEDEMISEENLIGNE = ? ,CATEGORIE_DOCUMENT = ?  
			  WHERE id_document = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_classe,$titre,$description,$datemiseenligne,$categorie,$id_document));
	   }


       public function supprimer_document($id_document)
	   {
		$sql="DELETE FROM document WHERE id_document = ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_document));
		if ($req) {
			  return true;
		}else 
		    return false;
	   }


	   public function existe_document($id_document)
	{
		$sql =  "SELECT * FROM document WHERE id_document = $id_document";
		$resulta = $this->conn->query($sql);
		if($req=$resulta->fetch_row())
			return true;
		else
			return false;
	}



	    public function getDocument($id_document)
	{   
		$sql='SELECT * FROM document WHERE id_document = ?';
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_document));
		$info_dc = $req->fetch(PDO::FETCH_ASSOC);
		return $info_dc;
	}


	   public function getLesDocuments($id_document)
	{
		$req = $this->conn->query('SELECT * FROM document ');
	    $Donnees = $req->FETCH_ASSOC();
	    return $Donnees;
	}

   
     public function getDocumentClass_CAT($id_classe)
    {
    	$sql="SELECT  *  FROM document  WHERE  ID_CLASSE = ? order by CATEGORIE ";
		$req=$this->conn->prepare($sql);
		$req->execute(array($id_classe,$catg));
		$Donnees = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $Donnees;
    }

      public function getDocumentClass($id_classe)
    {
    	$sql="SELECT  *  FROM document  WHERE  ID_CLASSE = ? ";
		$req=$this->conn->prepare($sql);
		$req->execute(array($id_classe));
		$Donnees = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $Donnees;
    }

    public function afficherDocument($id_document){
    	$sql="SELECT  *  FROM document  WHERE  id_document = ? ";
		$req=$this->conn->prepare($sql);
		$req->execute(array($id_document));
		$Donnees = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $Donnees;

    }

	   public function gettype()
	{
		$req=$bdd->prepare("select  TYPE from
document  WHERE  id_document = ? group by type");
$req->execute(array());
$Donnees = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $Donnees;

}
 public function getcategorie()
	{
		$req=$bdd->prepare("select CATEGORIE from
document  WHERE  id_document = ? group by 	CATEGORIE");
$req->execute(array());
$Donnees = $req->fetchAll(PDO::FETCH_ASSOC);
	    return $Donnees;

}
 
	}
?>