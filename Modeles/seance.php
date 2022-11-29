<?php 
   require_once 'Connexion.php';

    class Seance
    {
       private $conn;
        public function __construct()
    {
    $base = new Connexion();
         $this->conn=$base->getPDO();
       }
     function ajouter_seance($id_classe,$dateseance)
     {
         $sql="INSERT INTO seance (id_classe, dateseance) VALUES(?,?)";
           $req = $this->conn->prepare($sql);
           $req->execute(array($id_classe ,$dateseance));
     }
        public function modifier_seance($idseance,$id_classe,$dateseance)
         {
               $sql="UPDATE seance 
                     SET id_classe = ? ,dateseance = ?  
                     WHERE idseance = ? ";
               $req = $this->conn->prepare($sql);
               $req->execute(array($id_annonce ,$id_classe ,$dateseance));
        }
    
    public function supprimer_seance($idseance)
     {
          $sql="DELETE FROM seance WHERE idseance = ? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($idseance));
     }

     public function existe_seance($idseance)
     {
          $sql =  "SELECT * 
                     FROM seance 
                     WHERE idseance = $idseance";
          $result = $this->conn->query($sql);
          if($req=$result->fetch_row())
               return true;
          else
               return false;
     }
     public function getSeance($idseance)
     {
          $req = $this->conn->query('SELECT * FROM seance WHERE idseance = '.$idseance);
          $info_seance = $req->fetch(PDO::FETCH_ASSOC);
          return $info_seance;
     }
       public function get_seance($id_c)
     {
          $sql="SELECT * FROM seance WHERE ID_CLASSE=? ";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_c));
          $donnees = $req->fetch(PDO::FETCH_ASSOC);

          return $donnees;
     }
       public function getIds($id_c,$dt)
     {
                              $dt = new DateTime($dt);
                              $dte= $dt->format('Y-m-d H:i:s'); 
          $sql="SELECT DISTINCT IDSEANCE FROM seance WHERE ID_CLASSE=? and DATESEANCE=?";
          $req = $this->conn->prepare($sql);
          $req->execute(array($id_c,$dte));
          $donnees = $req->fetch(PDO::FETCH_ASSOC);
          return $donnees;
     }
  }

 ?>