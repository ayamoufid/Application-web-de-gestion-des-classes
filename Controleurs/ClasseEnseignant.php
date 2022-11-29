<?php
session_start();
require_once '../Modeles/Enseignant.php';
require_once '../Modeles/Classe.php';


$ens = new Enseignant();
$Enseignant=$ens->getEnseignant($_SESSION['enseignant']['ID_ENSEIGNANT']);

$classe = new Classe();
$enseignant = $classe->getClasseens($_SESSION['enseignant']['ID_ENSEIGNANT']);

include '../Vues/ClassesEnseignant.php';

?>