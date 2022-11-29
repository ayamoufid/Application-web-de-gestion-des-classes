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
                if(isset($_POST['titre']) AND isset($_POST['date']) and isset($_POST['format']) and isset($_POST['ennonce']) ){
                       $titre=$_POST['titre'];
                     
                      if ($dev->existe_titre($titre)) {
                         $erreur="Ce titre est deja utilise"; 
                       } else {
                      	$dernierdelai=$_POST['date'];
                      	$format=$_POST['format']; 
                      	$enonce=$_POST['ennonce'];
                      	$dev->ajouter_devoir($_GET['idclasse'],$titre,$enonce,$dernierdelai,$format);
                       }


                  }else 
                  $erreur="Veuillez remplir tous les champs";
                   }

      if(isset($_GET['id_s'])){
                           $dept=$dep->affichertous($_GET['id_s']);
                           $c=$note->note($_GET['id_s']);
                           
                  if (count($dept)==0 and count($c)==0){
                            $dev->supprimer_devoir($_GET['id_s']); 
                            $err1="Le devoir est supprime!!";  
                         }else 
                             $err2="Impossible de supprimer ce devoir";
                            ?>
                         
                          <?php   
                 }  
} catch (Exception $e) {
    echo $e;
}
   $tab=$dev->getDevoirClass($_GET['idclasse']);

   include '../Vues/DevoirsEnseignant.php';
 ?> 