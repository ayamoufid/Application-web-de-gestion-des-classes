<?php
session_start();
	require_once "../Modeles/Enseignant.php";
	require_once "../Modeles/Classe.php";
    require_once "../Modeles/Demande.php";


$classe = new Classe();
$ens = new Enseignant();
$demande = new Demande();
$Enseignant=$ens ->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);

try{
	if(isset($_POST['delete'])){
						$dm = $demande->getDemandeClasse($_GET['idclasse']);
						if(count($dm)==0){
								  $classe->delete_classe($_GET['idclasse']);
								  $lesClasses = $classe->getClasseens($_SESSION['enseignant']['ID_ENSEIGNANT']);
								  header('location:../Controleurs/ClasseEnseignant.php?idclasse='.$_GET['idclasse'].'&erreur='.$erreur);
								}
                        else{
								$erreur="Classe contient des etudiants";
								 header('location:../Controleurs/ClasseEnseignant.php?idclasse='.$_GET['idclasse'].'&erreur='.$erreur);
							}
				}
	}
catch(Exception $e){
						echo $e;
					}
if (isset($_POST['update'])) {
	 header('location:../Controleurs/ModifierClasse.php?idclasse='.$_GET['idclasse']);
   
}


include "../Vues/ClassesEnseignant.php";
?>