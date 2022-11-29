<?php 
session_start();
     require_once  "../Modeles/Annonce.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";

try{
  $annonce=new Annonce();

$id_classe=$_GET['idclasse'];


   if (isset($_POST['ajouter'])){
        if (isset($_POST['nom'])  and isset($_POST['description'])){
              $titre=$_POST['nom'];
              $desc=$_POST['description'];
                    $date = new DateTime('');
                 $date= $date->format('Y-m-d H:i:s '); 
              $rps=$annonce->ajouter_annonce($titre,$date,$desc);
              $id=$annonce->existe_annonce($titre,$date,$desc);
              $annonce->addAnnonceClasse($_GET['idclasse'],$id['ID_ANNONCE']);
              header("refresh:1;location:AnnoncesEns.php?idclasse=".$_GET['idclasse']);
                      }else 
          $erreur="Veuillez remplir tous les champs";
    }
$tab=$annonce->getAllAnnonces($id_classe);
}catch(PDOException $e){
   echo $e;
}

    include '../Vues/AnnoncesEnseignant.php';
 ?>