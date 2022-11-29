<?php
session_start();
  require_once "../Modeles/Etudiant.php";
  require_once "../Modeles/Classe.php";
  require_once "../Modeles/Enseignant.php";
  require_once "../Modeles/seance.php";
  require_once "../Modeles/presence.php";

  $ens = new Enseignant();
  $Enseignant=$ens->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);
  $seance = new seance();
  $presence = new presence();
  
  $classe = new Classe();
  $c = $classe->getClasse($_GET['idclasse']);
 // $pr = $presence->getAbsenceClasse(6,$_SESSION['etudiant']['CNE']);
  $etu = new Etudiant();
  //$e = $etu->getLesEtudiants($_GET['idclasse']);
  //var_dump($_POST);
  if (isset($_POST['btn'])) 
  {
   if (isset($_POST['date_seance'])) 
    {
      // echo $_POST['date_seance'];
      $ids=$seance->getIds($_GET['idclasse'],$_POST['date_seance']);

      // $pr = $presence->getAbsenceClasse(13,$e[1]['CNE'],$_POST['date_seance']);
 }
}
 if(isset($ids['IDSEANCE']) and $ids['IDSEANCE']>0){
   $e = $etu->GETETUS($ids['IDSEANCE']);//$_GET['idseance']
 
}else {
   $etu = new Etudiant();
   $e = $etu->getLesEtudiants($_GET['idclasse']);

} include "../Vues/AbsencesEnseignant.php"; 

?>