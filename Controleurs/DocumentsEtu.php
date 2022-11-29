<?php
session_start();
require_once '../Modeles/document.php';

require_once '../Modeles/Classe.php';

//$id_classe=$_GET['id'];
$classe = new Classe();
$Classe=$classe->getClasse(1);
	$document = new Document();
if(isset($_POST['CATEGORIE'])){
    //if (isset($_FILES['doc'])) {
     // $nomf=$_FILES['doc']['name'];
               $document=new Document();
          $document->getcategorie();
}else{
  if(isset($_POST['TYPE'])){
 $document=new Document();
          

          $document->gettype();

}
}

 $document = new Document();
 $documents=$document->afficherDocument($_GET["idclasse"]);

 $tab=$document->getDocumentClass($_GET["idclasse"]);
 
include'../Vues/DocumentsEtudiant.php';
?>