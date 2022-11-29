<?php
session_start();
require_once '../Modeles/Etudiant.php';
require_once '../Modeles/Classe.php';


$etudiant = new Etudiant();

$Etudiant=$etudiant ->getEtudiant($_SESSION['etudiant']['CNE']);

$classe = new Classe();
$mesClasses = $classe->getClasseetu($_SESSION['etudiant']['CNE']);


include '../Vues/ClassesEtudiant.php';

?>