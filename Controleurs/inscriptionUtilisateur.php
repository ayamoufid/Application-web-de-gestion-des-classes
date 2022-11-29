<?php
session_start();
  require_once "../Modeles/Enseignant.php";
  require_once "../Modeles/Etudiant.php";
$err=0;
if(isset($_POST['type'])){

     if($_POST['type']=='Etudiant'){

        if(empty($_POST['cne'])){
            
           $error="cne oublier ";  
           $err=1;   

        }else  if(preg_match("/^[a-zA-Z]([0-9]{9})$/",$_POST['cne'])){
         
            $cne=$_POST['cne'];
       }else{   
            $error="Veuillez remplir correctement tous les champs";  
            $err=1;
              }
                              }
     
   if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['pw1']) and isset($_POST['pw2']) and isset($_POST['dt'])){

    
        $pw1=$_POST['pw1'];
        $pw2=$_POST['pw2'];
        $Email=$_POST['email'];
        $Nom=$_POST['nom'];
        $Prenom=$_POST['prenom'];
        $date=$_POST['dt'];
        $nomf=$_FILES['image']['name'];
       

         if($pw1==$pw2){
                          $mdp=$pw1;

                      } else{ $err=1;
                          $error="mot de passe incorrect";  
                            }

         if(!filter_var($Email, FILTER_VALIDATE_EMAIL))   {
                          $error="Veuillez remplir correctement tous les champs";  
                          $err=1;
            
                     }else $email=$Email;


          if (!preg_match("/^[a-zA-Z-' ]*$/",$Nom)) {
                         $error="Veuillez remplir correctement tous les champs";  
                         $err=1;

                     }else  $nom=$Nom;


         if (!preg_match("/^[a-zA-Z-' ]*$/",$Prenom) ) {
                          $error="Veuillez remplir correctement tous les champs";  
                          $err=1;

                      }else  $prenom=$Prenom;
    
 if($err==0){
    try{
         if($_POST['type']=='Etudiant'){

               $etu=new Etudiant();
                 $etu->ajouter_etu($cne,$nom,$prenom,$email,$date,$mdp,$nomf);
               $target="Photo/".basename($_FILES['image']['name']);
               move_uploaded_file($_FILES['image']['tmp_name'], $target);
      
          }else{
               $ens=new Enseignant();
              $ens->ajouter_ens($nom ,$prenom ,$mdp ,$email ,$date,$nomf );
               $target="Photo/".basename($_FILES['image']['name']);
               move_uploaded_file($_FILES['image']['tmp_name'], $target);
         
               }  header('location:connectionUtilisateur.php');
               $error="inscription avec succes";
    

       }catch(PDOException $e){
                $error="vous etes deja inscrit";
                              } 
          }
      }
  }

 include "../Vues/inscription.php";

  ?>