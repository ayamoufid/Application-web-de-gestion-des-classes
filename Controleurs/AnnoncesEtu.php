<?php 
session_start();
     require_once  "../Modeles/Annonce.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";

try{
  $annonce=new Annonce();



$id_classe=$_GET['idclasse'];

   $tab=$annonce->getAllAnnonces($_GET['idclasse']);

// print_r($tab);
}catch(PDOException $e){
   echo $e;
}

    include '../Vues/AnnoncesEtudiant.php';
 ?>