<?php
session_start();
require_once '../Modeles/Demande.php';
require_once '../Modeles/Classe.php';

$demande = new Demande();

try{if(isset($_POST['demande']))
  {
 
   $demande->envoyerdemande($_SESSION['etudiant']['CNE'],$_GET['idclasse']);
   if ($demande==true) {
	$message = "Demande envoye avec succes! ";
     } 
    else
    {
	$message = "Demande non envoye! ";
    }
}
}
catch(Exception $e){echo $e;}

//$dejaDemande=$demande->getDemandeCl($_GET['idclasse']);
header('Location:ToutesClassesEtu.php?idclasse='.$_GET['idclasse'].'&message='.$message);

include "../Vues/ToutesClassesEtu.php";
?>