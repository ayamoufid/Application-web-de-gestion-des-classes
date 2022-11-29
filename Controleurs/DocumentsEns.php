<?php
session_start();
require_once '../Modeles/document.php';

require_once '../Modeles/Classe.php';
$err=0;

$classe = new Classe();
$Classe=$classe->getClasse($_GET['idclasse']);
  $document = new Document();
    if(isset($_POST['titre']) AND isset($_POST['Categorie']) AND isset($_POST['description']) AND 
  isset($_POST['datemiseenligne'])){
   
               $document=new Document();
                $document->ajouter_document($_GET['idclasse'],$_POST['titre'],$_POST['description'],
                  $_POST['datemiseenligne'],' ',$_POST['Categorie']);
              
               //$target="../Controleurs/devoirs/".$_FILES['doc']['name'];
               //move_uploaded_file($_FILES['doc']['tmp_name'],$target);
              // echo "fichier ajouter";
              }
//else echo "n'est pas ajouter";
  

$document = new document();
$documents=$document->afficherDocument($_GET['idclasse']);

 $tab=$document->getDocumentClass($_GET['idclasse']);
 
include'../Vues/DocumentsEnseignant.php';
?>