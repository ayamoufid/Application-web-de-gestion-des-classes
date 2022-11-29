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
  $etu = new Etudiant();
  $e = $etu->getLesEtudiants($_GET['idclasse']);
  if (isset($_POST['enregistrer']))
   {
    header('location:EnregistrerAbs.php?idclasse='.$_GET['idclasse']);
  }


  include "../Vues/NouvelleSeance.php";
  ?> 