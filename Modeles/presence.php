<?php

require_once 'Connexion.php';

class  presence
{

	       private $conn;

     public function __construct()
    {
        $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }

	public function getAbsence($CNE,$ID_SEANCE)
	{
		$sql="SELECT * FROM assister WHERE CNE = ?,IDSEANCE=?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE,$ID_SEANCE));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}

    public function getAbsenceclasse($CNE,$ID_CLASSE)
	{
	 $sql="SELECT * FROM assister a,seance s WHERE a.IDSEANCE = s.IDSEANCE  and a.CNE = ? and s.ID_CLASSE = ? and a.ETAT=true";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE,$ID_CLASSE));
		$donnees = $req->fetchAll(PDO::FETCH_ASSOC);

		return $donnees;
	}
	public function getAbsenceetat($ids,$CNE)
	{
	 $sql="SELECT ETAT FROM assister a,seance s WHERE a.IDSEANCE = s.IDSEANCE  and a.CNE = ? and s.IDSEANCE=? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE,$ids));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}

	   public function getAbsenceseance($idseance)
	 {
	 	$req = $this->conn->query("SELECT * FROM assister WHERE IDSEANCE = ".$idseance);
		$donnees = $req->fetchAll();
		return $donnees;
	}


	public function add($CNE,$IDSEANCE,$ETAT) 
	{
		$sql="INSERT INTO assister(CNE,IDSEANCE,ETAT) VALUES(?,?,?)";
		$req = $this->conn->prepare($sql);
		$req->execute(array($CNE,$IDSEANCE,$ETAT));

	}
	public function modifier($CNE,$IDSEANCE,$ETAT)
	{
		$sql="UPDATE assister SET ETAT=? WHERE CNE=?,IDSEANCE=?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($ETAT,$CNE,$IDSEANCE));

	}

	public function delete($IDSEANCE)
	{
		$sql="DELETE FROM assister WHERE IDSEANCE = ? ";
		$req = $this->conn->prepare($sql);
        $req->execute(array($IDSEANCE));
	}
	public function delete_etudiant($IDSEANCE,$CNE)
	{
		$sql="DELETE FROM assister WHERE IDSEANCE = ? ,CNE=? ";
		$req = $this->conn->prepare($sql);
        $req->execute(array($IDSEANCE,$CNE));
	}
	
	
}



?>