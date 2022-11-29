<?php
session_start();
	require_once "../Modeles/Enseignant.php";
	require_once "../Modeles/Classe.php";

	$classe = new Classe();
	$ens = new Enseignant();
	$Enseignant=$ens ->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);

	 if(isset($_POST['nom_cours']) and isset($_POST['semestre']) and isset($_POST['annee_univ']) and isset($_POST['nom_formation']))
{
	$classe -> modifierclasse($_GET['idclasse'], $_POST['nom_cours'], $_POST['semestre'], $_POST['annee_univ'], $_POST['nom_formation']);
	
	$lesClasses = $classe->getClasseens($_SESSION['enseignant']['ID_ENSEIGNANT']);
	header('location:../Controleurs/ClasseEnseignant.php');
}
else{

	$c = $classe -> getClasse($_GET['idclasse']);
}



	include '../Vues/FormulaireModifClasse.php';
?>