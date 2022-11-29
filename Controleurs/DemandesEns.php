<?php
session_start(); 
require_once "../Modeles/Etudiant.php";

require_once "../Modeles/Enseignant.php";

require_once "../Modeles/Demande.php";

 
    $ens = new Enseignant();
	$demand = new Demande();
	$etu = new Etudiant();
    
	//$etud = $etu->getEtudiant($_SESSION['etudiant']['CNE']);

	if(isset($_POST['accept']))
	{
		$demand->modifierclasse($_POST['cne'],$_GET['idclasse']);
        //if($b == true){
            //$demand->delete(5,$cne);
        //}
		header('location:DemandesEns.php?idclasse='.$_GET['idclasse']);
    }
    elseif (isset($_POST['refuse'])) 
    {
    	$demand->delete($_GET['idclasse'],$_POST['cne']);
    	header('location:DemandesEns.php?idclasse='.$_GET['idclasse']);
    }
    $lesdemandes=$demand->afficherdemande($_SESSION['enseignant']['ID_ENSEIGNANT'],$_GET['idclasse']);
    
    
include '../Vues/DemandesEnseignant.php';
?>