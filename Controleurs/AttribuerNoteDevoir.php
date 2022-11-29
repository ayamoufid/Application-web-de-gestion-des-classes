<?php 
session_start();
     require_once  "../Modeles/devoir.php";
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";
     require_once  "../Modeles/depot.php";
     require_once  "../Modeles/note.php";
try {
 $id_classe=$_GET['idclasse'];  
 
  $dev=new Devoir();
  $dep=new travail();
  $note=new note();
  $etud=new Etudiant();   
 if (isset($_GET['etu'])) {
   $_SESSION['etu']=$_GET['etu'];  
     header('location:AttribuerNoteDevoir.php?idclasse='.$_GET['idclasse']);   
   } 
    
         $dept=$dep->affichertous($_SESSION['id_devoir']); 
         $tvrs=$dep->afficherversionetu($_SESSION['id_devoir'],$_SESSION['etu']);
         $tab=$dev->getDevoir($_SESSION['id_devoir']);
         $vrs=$dep->afficherversionetu1($_SESSION['id_devoir'],$_SESSION['etu']);
         $info=$etud->getEtudiant($_SESSION['etu']);
         $n=$note->existe_note_etu($id_classe,$_SESSION['id_devoir'],$_SESSION['etu']);


    if (isset($_POST['notedev'])) { 
                $noted=$_POST['noted'];

                 if ($n) { 
                             // echo "esxiste deja";
                              $idn=$n['ID_NOTE'];
                             $note->modifier($idn,$noted);
                              $idn=$noted;
                             // var_dump($n);
    
                  }else{
                            $n=$note->ajouternotedevoir($id_classe,$_SESSION['id_devoir'],$_SESSION['etu'],$noted) ;
                            $idn=$noted;
                       }    
         }else if($n){
                   $idn=$n['NOTE'];  
                    
         }

    if (isset($_POST['supp'])) {

           $date=$_POST['supp'];
         $e= $dep->delete($_SESSION['id_devoir'],$_SESSION['etu'],$date);
         if (count($tvrs) == 0) {
            header('location:VersionsDevoirsEns.php');
         }
 
    }



    



} catch (Exception $e) {
    echo $e->getMessage();
} 


   include '../Vues/AttribuerDemande.php';


 ?>