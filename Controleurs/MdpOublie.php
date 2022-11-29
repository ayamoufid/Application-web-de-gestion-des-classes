<?php
session_start();
  require_once "../Modeles/Enseignant.php";
  require_once "../Modeles/Etudiant.php";

     $etu=new Etudiant();
     $ens=new Enseignant();


if(isset($_POST['email'])){
    $email=$_POST['email'];
   
    $rps=$etu->existe($email);
     if ($rps==false) { 
       $rps=$ens->existe_ens($email);
         if($rps!=false){
             $erreur=null;
            echo $rps;
         }else
              $erreur=" Email incorrecte";

     }else {
        $erreur=null;
           echo $rps;
      // mail($email,'change le mot de passe', "pour change le mot de passe veillez clique sur le lien <a herf='#'>cc<a>");
} }
 include "../Vues/MotDePasseOublie.php"; 
?>