<?php 
session_start();
     require_once  "../Modeles/devoir.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";
     require_once  "../Modeles/depot.php";
     require_once  "../Modeles/note.php";

try {
   
  $dep=new travail();
  $note=new note();
  $dev=new Devoir();
     
      if(isset($_POST['btn'])){
         $id_classe=$_GET['idclasse'];
         $id=$_GET['id'];
                if(isset($_POST['titre']) AND isset($_POST['date']) and isset($_POST['format']) and isset($_POST['ennonce']) ){
                       $titre=$_POST['titre'];
   
                      	$dernierdelai=$_POST['date'];
               //  if ($dernierdelai>date(format)) {
              
                      	$format=$_POST['format']; 
                      	$enonce=$_POST['ennonce'];
                      	$dev->modifier_devoir($id,$titre,$enonce,$dernierdelai,$format);

                       // }else 
                       //  $erreur="le delai est nvalide";
                       header('location:DevoirsEns.php?idclasse='.$_GET['idclasse']);
                  

          }else 
                  $erreur="Veuillez remplir tous les champs";
            }
            } catch (Exception $e) {
    echo $e;
}
   

$id_classe=$_GET['idclasse'];

   $tab=$dev->getDevoirClass($_GET['idclasse']);
   $d=$dev->getDevoir($_GET['id']);
    
   include '../Vues/DevoirsEnseignant.php';
 ?>