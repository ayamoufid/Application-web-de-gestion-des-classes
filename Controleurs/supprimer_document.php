<?php 
     
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/document.php";
     require_once  "../Modeles/Enseignant.php";

try { 
      $doc=new Document();
    
 $id_classe=$_GET['idclasse'];
      if (isset($_GET['id_doc'])) {
          $supp=$doc->supprimer_document($_GET['id_doc']);
          if(!$supp){
                   $err="le document n'est pas supprimer";
          }
          header("location:DocumentsEns.php?idclasse=".$id_classe);
    
      }


 }catch(PDOException $e){
               echo $e;
          }     


          