<?php
session_start();
require_once '../Modeles/Etudiant.php';
require_once '../Modeles/Classe.php';
require_once '../Modeles/Demande.php';



$etudiant = new Etudiant();
$Etudiant=$etudiant ->getEtudiant($_SESSION['etudiant']['CNE']);

$classe = new Classe();

$lesClasses = $classe->ToutesClasses($_SESSION['etudiant']['CNE']);


include '../Vues/ToutesClassesEtu.php';

?>