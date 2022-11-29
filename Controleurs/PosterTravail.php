<?php
session_start();
    require_once "../Modeles/Enseignant.php";
  require_once "../Modeles/depot.php";
  require_once "../Modeles/devoir.php";
  
  
  $d=$_SESSION['id'];
 $f=new Devoir();
 $form=$f->getDevoir($_SESSION['id']);
  if (isset($_POST['importer'])){     
    if (isset($_FILES['fichier'])) {
      $nomf=$_FILES['fichier']['name'];
          
               $etu=new travail();
               $etu->ajouterTravail($_SESSION['id'],$_SESSION['etudiant']['CNE'],$nomf);
               $target="../Controleurs/devoirs/".$_FILES['fichier']['name'];
               move_uploaded_file($_FILES['fichier']['tmp_name'],$target);
               echo "fichier ajouter";
               
               header('location:Versionc.php?idclasse='.$_GET['idclasse'].'&id='.$d);
}else echo "n'est pas ajouter";
print_r($_FILES['fichier']);
}
include '../Vues/poster.php';
?> 