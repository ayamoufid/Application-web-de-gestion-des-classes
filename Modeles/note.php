<?php 

     require_once 'Connexion.php';

    class Note
     {
    	
	    private $conn;
  public function __construct()
    {
    $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }

  public function existe_note_type_etu($id_c,$id_t,$cne)
	{
		      $sql="SELECT * FROM note WHERE ID_TYPE_NOTE=?  and ID_CLASSE=? and CNE=? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_t,$id_c,$cne));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}
  
   public function existe_note_dev_etu($id_c,$cne)
	{
		      $sql="SELECT AVG(NOTE) moy FROM note WHERE ID_TYPE_NOTE IS NULL  and ID_CLASSE=? and CNE=? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_c,$cne));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}
  
  
    public function existe_note_etu($id_c,$id_d,$cne)
	{
		      $sql="SELECT * FROM note WHERE ID_DEVOIR=?  and ID_CLASSE=? and CNE=? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_d,$id_c,$cne));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}

    public function note($id_d)
	{
		      $sql="SELECT * FROM note WHERE ID_DEVOIR=?  ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_d));
		$donnees = $req->fetchAll(PDO::FETCH_ASSOC);

		return $donnees;
	}
  

  public function get_note_ratt($id_c)
	{
		      $sql="SELECT n.CNE,e.NOM_ETUDIANT, e.PRENOM_ETUDIANT, n.NOTE FROM note n ,etudiant e WHERE  ID_TYPE_NOTE=1 and ID_CLASSE=? and e.CNE=n.CNE and n.NOTE<10 ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_c));
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);

		return $donnees;
	}



	public function getnote_etu($id_note,$id_c,$cne,$id_type)
	{
		      $sql="SELECT * FROM note WHERE ID_NOTE=? and  ID_TYPE_NOTE=? and ID_CLASSE=? and CNE=? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_note,$id_type,$id_c,$cne));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}
	public function getAllnote($id_c,$id_type)
	{
		      $sql="SELECT * FROM note WHERE   ID_TYPE_NOTE=? and ID_CLASSE=? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_type,$id_c));
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);

		return $donnees;
	}

	public function ajouter($id_c,$cne,$id_type,$note)
	{
		$sql="INSERT INTO note(CNE, ID_TYPE_NOTE, ID_CLASSE, NOTE) VALUES(?,?,?,?)";
		$req = $this->conn->prepare($sql);
		$req->execute(array($cne,$id_type,$id_c,$note));
	}

	public function ajouternotedevoir($id_c,$id_d,$cne,$note)
	{

		$sql="INSERT INTO note(CNE, ID_DEVOIR, ID_TYPE_NOTE,ID_CLASSE, NOTE) VALUES(?,?,?,?,?)";
		$req = $this->conn->prepare($sql);
		$req->execute(array($cne,$id_d,null,$id_c,$note));
	}

	public function modifier($id_note,$note)
	{
		$sql="UPDATE note SET note = ? WHERE ID_NOTE = ?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($note ,$id_note));	
	}


}
 

 ?>