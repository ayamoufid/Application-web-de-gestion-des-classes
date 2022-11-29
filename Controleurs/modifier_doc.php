<?php
session_start();
	require_once "../Modeles/document.php";
require_once "../Modeles/Enseignant.php";
require_once "../Modeles/Classe.php";

	$classe = new Classe();
	$ens = new Enseignant();
	$Enseignant=$ens ->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);

	    $document = new document();
if(isset($_POST['titre']) AND isset($_POST['categorie']) AND isset($_POST['Description']) ){

	 	
	    $document = new Document();
	
	 	$document->modifier_document($_GET['id_doc'],$_GET['idclasse'] ,$_POST['titre'] ,
	 		$_POST['Description'],$_POST['datemiseenligne'] , $_POST['categorie'] );
	
	$doc = $document->getDocumentClass($_GET['id_doc']);
	header('location:../Controleurs/DocumentsEns.php?idclasse='.$_GET['idclasse']);	
}
else{
	$c=$document->getDocument($_GET['id_doc']); 
	
}



	include '../Vues/ModifierDocument.php';
?>