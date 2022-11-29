<?php 
session_start();
     require_once  "../Modeles/devoir.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";
     require_once  "../Modeles/depot.php";
try {
    

  $dev=new Devoir();
  $dep=new travail();
     

  if (isset($_GET['id_dev'])) {
   $_SESSION['id_devoir']=$_GET['id_dev'];  
        // header('location:Versionc.php');  
         } 
   $dept=$dep->affichertous($_SESSION['id_devoir']);
   $tab=$dev->getDevoir($_SESSION['id_devoir']);

} catch (Exception $e) {
    echo $e->getMessage();
}

   include '../Vues/VersionsDevoirsEns.php';
 ?>