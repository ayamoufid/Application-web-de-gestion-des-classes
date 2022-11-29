<?php 
session_start();
     require_once  "../Modeles/Annonce.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";

try{
$annonce=new Annonce();
$id_classe=2;
 if (isset($_GET['id'])) {
            

    $id_classe=2;//$_GET['id_classe'];
    $id=$_GET['id'];

  if (isset($_POST['ajouter'])){
        if (isset($_POST['nom'])  and isset($_POST['description'])){
              $titre=$_POST['nom'];
            
              $desc=$_POST['description'];
                 $date = new DateTime('');
                 $date= $date->format('Y-m-d:TH:i'); 
            $rps=$annonce->modifier_annonce($id,$titre,$date,$desc);
         header("location:AnnoncesEns.php?idclasse=".$_GET['idclasse']);
        }else 
          $erreur="Veuillez remplir tous les champs";
    }
   }
 if (isset($_GET['id_s'])) {
    $annonce->deleteAnnonceClasse($_GET['id_s'],$_GET['idclasse']);
    $annonce->supprimer_annonce($_GET['id_s']);
   
     header("location:AnnoncesEns.php?idclasse=".$_GET['idclasse']);
}

$ann=$annonce->getAnnonce($id);

$tab=$annonce->getAllAnnonces($_GET['idclasse']);


}catch(PDOException $e){
   echo $e;
}

    include '../Vues/AnnoncesEnseignant.php';
 ?>