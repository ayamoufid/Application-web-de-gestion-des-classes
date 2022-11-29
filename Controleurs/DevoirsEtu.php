<?php 
session_start();
     require_once  "../Modeles/devoir.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";


  $dev=new Devoir();

   $tab=$dev->getDevoirClass($_GET['idclasse']);

   include '../Vues/DevoirsEtudiant.php';
 ?>