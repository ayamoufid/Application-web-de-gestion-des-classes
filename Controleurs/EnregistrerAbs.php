<?php
session_start();
  require_once "../Modeles/Etudiant.php";
  require_once "../Modeles/Classe.php";
  require_once "../Modeles/Enseignant.php";
  require_once "../Modeles/seance.php";
  require_once "../Modeles/presence.php";

  $ens = new Enseignant();
  $Enseignant=$ens->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);
  $etu = new Etudiant();
  $e = $etu->getLesEtudiants($_GET['idclasse']);
  $seance = new seance();
  $presence = new presence();
  if (isset($_POST['enregistrer']))
   {
    echo "hi1";
       if (isset($_POST['date_seance']) and isset($_POST['present'])) 
    { echo "hi2";
                               $dt = new DateTime($_POST['date_seance']);
                               $dte= $dt->format('Y-m-d H:i:s'); 
         $s=$seance->ajouter_seance($_GET['idclasse'],$_POST['date_seance']);
         $ids=$seance->getIds($_GET['idclasse'],$dte);
         print_r($_POST['present']);
    foreach ($_POST['present'] as $key => $value) 
    {
      $p=$presence->add($key,$ids['IDSEANCE'],$value);
    }
    
    header('location:AbsencesEns.php?idclasse='.$_GET['idclasse']);
  }
}


  include "../Vues/NouvelleSeance.php";
?>