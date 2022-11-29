<?php 
   require_once 'Connexion.php';

    class Devoir
    {
    	  private $conn;

       public function __construct()
         {
       $base = new Connexion();
	    $this->conn=$base->getPDO();
	  }


    	function ajouter_devoir($id_classe,$titre,$enonce,$dernierdelai,$format)
    	{
    		 // $date=date_format($dernierdelai,'y-m-j h:m');
         $sql="INSERT INTO DEVOIR (ID_CLASSE,TITRE,ENONCE,DERNIERDELAIDEDEPOT,FORMATDEMANDE) 
               VALUES(?,?,?,?,?)";
		 $req = $this->conn->prepare($sql);
		 $req->execute(array($id_classe,$titre,$enonce,$dernierdelai,$format));
    	}
     

       public function modifier_devoir($id_devoir,$titre,$enonce,$dernierdelai,$format)
	   {
		$sql="UPDATE devoir 
			  SET TITRE = ? ,ENONCE = ? ,DERNIERDELAIDEDEPOT = ? ,FORMATDEMANDE  = ?  
			  WHERE ID_DEVOIR=?";
		$req = $this->conn->prepare($sql);
		$req->execute(array($titre,$enonce,$dernierdelai,$format,$id_devoir));
	   }


       public function supprimer_devoir($id_devoir)
	   {
		$sql="DELETE FROM devoir WHERE ID_DEVOIR= ? ";
		$req = $this->conn->prepare($sql);
		$req->execute(array($id_devoir));
	   }

 
	public function existe_devoir($id_devoir)
	{
		$sql =  "SELECT * FROM devoir WHERE ID_DEVOIR= $id_devoir";
		$resulta = $this->conn->query($sql);
		if($req=$resulta->fetch(PDO::FETCH_ROW))
			return true;
		else
			return false;
	}

	public function existe_titre($titre)
	{
		$sql =  "SELECT * FROM devoir WHERE TITRE=?";
		$resulta = $this->conn->prepare($sql);
		$resulta->execute(array($titre));
		if($req=$resulta->fetch(PDO::FETCH_ASSOC))
			return true;
		else
			return false;
	}



	public function getDevoir($id_devoir)
	{
		$req = $this->conn->query('SELECT  * FROM devoir WHERE ID_DEVOIR= '.$id_devoir);
		$info_dv = $req->fetch(PDO::FETCH_ASSOC);
		return $info_dv;
	}


	public function getLesDevoirs($id_devoir)
	{
		$req = $this->conn->query('SELECT * FROM devoir ');
	    $donnee = $req->FETCH(PDO::FETCH_ASSOC);
	    return $donnee;
	}


	
    public function getDevoirClass($id_classe)
    {
    	$sql="SELECT  * 
		      FROM devoir  
		      WHERE  ID_CLASSE = ? order by DERNIERDELAIDEDEPOT DESC ";
		$req=$this->conn->prepare($sql);
		$req->execute(array($id_classe));
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);
            return $donnees;
		
    }
    }

    //   try {
     
 
    // $dev =new devoir(); 
   // $dev->ajouter_devoir(2,'php','ex1','2022-06-12','.pdf');
    // $tab =$dev->getDevoir(23);
    // print_r($tab);
  //   $dev->modifier_devoir(4,2,'tp','tp1','2022-05-12','.doc');
  // //    $tab =$dev->getDevoirClass(2);
  //   // $dev->supprimer_devoir(1);
  // // print_r($tab);
  //  // $etu->delete(3);
 
     //    } catch (PDOException $e) {
 	   //   echo "cc:".$e->getMessage();
    	
     // }

 ?>