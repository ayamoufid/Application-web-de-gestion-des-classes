<?php 

     require_once 'Connexion.php';

    class Typenote

    {
    	
	      private $conn;
  public function __construct()
    {
    $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }

	public function gettypenote($id_type)
	{
		$req = $this->conn->query('SELECT * FROM typenote WHERE ID_TYPE_NOTE = '.$id_type);
		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;
	}

	public function ajouter($nom_typenote)
	{
		$sql="INSERT INTO typenote(TYPE_NOTE) VALUES(?)";
		$req = $this->conn->prepare($sql);
		$req->execute(array($nom_typenote));
	}

	public function modifier($id_type, $nom_typenote)
	{
		$sql="UPDATE typenote SET TYPE_NOTE = ? WHERE ID_TYPE_NOTE = ?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($nom_typenote ,$id_type));

	
	}

	public function supprimer($id_type){

		$sql="DELETE FROM typenote WHERE ID_TYPE_NOTE = ?";
		$req= $this->conn->prepare($sql);
		$req->execute(array($id_type));
	}
	//existance d'un type ??????/
}
 //try{
 // $tn =new Typenote(); 
    // $tn->ajouter('Normal');
    // $tn->ajouter('Rattrapage');
    // $tn->ajouter('Devoir');
    // $tn->ajouter('Contrôle');
    // $tn->ajouter('Assiduité');
    // $tn->modifier(1,'normal');
   //$tn->supprimer(4);
  // $c=$tn->gettypenote(1);
   //print_r($c);
      // } catch (PDOException $e) {
 	  //   echo $e->getMessage();
    	
    //}

 ?>