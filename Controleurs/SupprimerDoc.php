<?php 
 session_start();    
 require_once "../Modeles/Document.php";
 require_once "../Modeles/Enseignant.php";
 require_once "../Modeles/Classe.php";

try { 
      $doc=new Document();

     $id_classe=$_GET['id_classe'];
      if (isset($_GET['idclasse'])) {
          $supp=$doc->supprimer_document($_GET['idclasse']);
          if(!$supp){
                   $err="le document n'est pas supprimer";
          }
      }
       header('location:../CONTROLEURS/ajouterdoc.php?idclasse='.$_GET['id_classe']);
  

 }catch(PDOException $e){
               echo $e;
          }     
