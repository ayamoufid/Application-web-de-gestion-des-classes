<?php

  require_once "../Modeles/Enseignant.php";
  require_once "../Modeles/Etudiant.php";


if(isset($_POST['email'])&& isset($_POST['mdp'])){
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];

     $etu=new Etudiant();
     $ens=new Enseignant();


    $rps=$etu->connecter_etu($email,$mdp);
     if ($rps==false) { 
       $rps=$ens->connecter_ens($email,$mdp);
         if($rps!=false){
             $erreur=null;
              session_start();
            $erreur=null;
            $_SESSION['enseignant']=$ens->getEnseignant($rps);
             //print_r($_SESSION['enseignant']);
            header('location:ClasseEnseignant.php');
         }else
             $erreur="Email ou mot de passe incorrect";
     }else {
         session_start();
            $erreur=null;
            $_SESSION['etudiant']=$etu->getEtudiant($rps);
             //print_r($_SESSION['etudiant']['NOM_ETUDIANT']);
             header("location:ClassesEtudiant.php");
} }
include "../Vues/connection.php"; 
?>
