<?php 
      require_once 'Connexion.php';
   
   class travail{

        private $conn;

     public function __construct()
     {
             $base = new Connexion();
         $this->conn=$base->getPDO();
       }


     public function afficherversionetu($id_devoir,$CNE)
      {
            $sql = "SELECT * FROM depot WHERE ID_DEVOIR=? AND CNE=? order by DATE_DEPOT desc";
            $req1=$this->conn->prepare($sql);
            $req1->execute(array($id_devoir,$CNE));
             $donnees = $req1->fetchall(PDO::FETCH_ASSOC);
            return $donnees;
            
      }
      public function afficherversionetu1($id_devoir,$CNE)
      {
            $sql = "SELECT * FROM depot WHERE ID_DEVOIR=? AND CNE=? order by DATE_DEPOT desc limit 1";
            $req1=$this->conn->prepare($sql);
            $req1->execute(array($id_devoir,$CNE));
             $donnees = $req1->fetchall(PDO::FETCH_ASSOC);
            return $donnees;
            
      }


       public function afficherversion($id_devoir,$CNE,$date)
      {
            $sql = "SELECT * FROM depot WHERE  id_devoir = ? and CNE=? and DATE_DEPOT=? ";
            $req1=$this->conn->prepare($sql);
            $req1->execute(array($id_devoir,$CNE,$date));
             $donnees = $req1->fetchall(PDO::FETCH_ASSOC);
            return $donnees;
      }


      public function affichertous($id_devoir)
      {

          $req = $this->conn->query('SELECT DISTINCT  d.CNE ,NOM_ETUDIANT,PRENOM_ETUDIANT FROM depot d join etudiant e on  d.CNE=e.CNE   WHERE id_devoir = '.$id_devoir);
            $donnees = $req->fetchall(PDO::FETCH_ASSOC);

            return $donnees;

      }


      public function ajouterTravail($id_devoir,$cne,$doc)
        {

             $date=date('y-m-j h:m:s');
            $sql="INSERT INTO depot(CNE,ID_DEVOIR,DATE_DEPOT,DOCUMENT_DEPOT) VALUES(?,?,?,?)";
            $req = $this->conn->prepare($sql);

            $req->execute(array($cne,$id_devoir,$date,$doc) );
        echo "ajouter";
         }

      

      public function delete($id_devoir,$cne,$date)
      {
            $sql="DELETE FROM depot WHERE id_devoir = ? and CNE=? and DATE_DEPOT=? ";
            $req = $this->conn->prepare($sql);
            $req->execute(array($id_devoir,$cne,$date));
           return true;
      }

      
   }

  // try {
      
  //   $dev =new travail(); 
 //     $dev->ajouterTravail(3,'e123456788','Examen_Programmation_2017_2018.php');
//     $vrs=$dev->afficherversionetu(4,'abcd3');
//     print_r($vrs);echo '<br>';
//     // $vrs=$dev->afficherversion(4,'abcd3','2022-05-31 05:05:01');
//     print_r($vrs);echo '<br>';
//     // $vrs=$dev->affichertous(3);
// $vrs=$dev->afficherversionetu(3,'e123456788');
//        print_r($vrs);

//     // print_r($vrs);
//           echo "<br> ce tableau <br>";
//      for($i=0;$i<count($vrs);$i++)
//                echo $vrs[$i]['ID_DEVOIR'] .$vrs[$i]['CNE'].'<br>';
// $tab=$dev->afficherversionetu1(3,'e123456788');
//     print_r($tab);
//         } catch (PDOException $e) {
//             echo "cc:".$e->getMessage();
      
//      }

 ?>