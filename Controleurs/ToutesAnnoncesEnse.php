<?php 
session_start();
     require_once  "../Modeles/Annonce.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";
     require_once  "../Modeles/Enseignant.php";

try{
   
  $annonce=new Annonce();
    $ensg=new Classe();
     $cl_ens=$ensg->getClasseens($_SESSION['enseignant']['ID_ENSEIGNANT']);



   if (isset($_POST['enregistrer'])){
        if (isset($_POST['nom']) and isset($_POST['date']) and isset($_POST['description'])){
              $titre=$_POST['nom'];
              $date=$_POST['date'];
              $desc=$_POST['description'];
            $rps=$annonce->ajouter_annonce($titre,$date,$desc);
                   $id=$annonce->existe_annonce($titre,$date,$desc);

                 foreach ($_POST['classe'] as $key => $value) {
              $annonce->addAnnonceClasse($value,$id['ID_ANNONCE']); 
              header('location:ClasseEnseignant.php');
               }
               $erreur="Annonce ajouter";
        }else 
          $erreur="Veuillez remplir tous les champs";
    }


}catch(PDOException $e){
   echo $e;
}

    include '../Vues/TousAnnoncesEns.php';
 ?>