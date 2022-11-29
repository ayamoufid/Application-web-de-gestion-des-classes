<?php
session_start();
	require_once "../Modeles/Enseignant.php";
	require_once "../Modeles/Classe.php";

	$classe = new Classe();
	$ens = new Enseignant();
	$Enseignant=$ens ->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);

	if(isset($_POST['nom_cours']) and isset($_POST['semestre']) and isset($_POST['annee_univ']) and isset($_POST['nom_formation']))
	{
		try{
			$classe->ajouterClasse($_SESSION['enseignant']['ID_ENSEIGNANT'],$_POST['nom_cours'],$_POST['semestre'],$_POST['annee_univ'],$_POST['nom_formation']);
			
		   }
		catch( PDOException $e ){
			               echo  $e -> getMessage();
							}	
	}
	if (isset($_POST['btn1'])) 
	{
		
		header('location:../Controleurs/ClasseEnseignant.php');
		$message = "Classe ajoutee avec succes! ";
	}

	
	
	include '../Vues/FormulaireAjoutClasse.php';
?>