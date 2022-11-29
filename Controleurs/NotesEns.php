<?php 
session_start();
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/etudiant.php";
     require_once  "../Modeles/note.php";
     require_once  "../Modeles/presence.php";
     require_once  "../Modeles/seance.php";

$id_classe=$_GET['idclasse'];

try{
   $note=new note();
  $etu=new Etudiant();
  $pr=new presence();
  $sc=new Seance();


   $info=$etu->getLesEtudiants($id_classe);
   // $p=$pr->getAbsenceclasse('abcd3',$id_classe);
     // echo count($p);
   $nbr_seance=$sc->get_seance($id_classe); 
  if (!$nbr_seance) {
      $nb_s=2;
  }else
      $nb_s=count($nbr_seance); 

  if(isset($_POST['enregistrer'])){ 
                    
               $d = $note->existe_note_type_etu($id_classe,2,$key);
  }

    if(isset($_POST['valider'])){ 
           for ($i=0; $i <count($info) ; $i++) {
             $p=$pr->getAbsenceclasse($info[$i]['CNE'],$id_classe);
             $pr_count=count($p);
             $note_ass= $pr_count*$_POST['nr']/($nb_s-1);
            $d = $note->existe_note_type_etu($id_classe,5,$info[$i]['CNE']);
               if($d){
                     $note->modifier($d['ID_NOTE'],$note_ass);
               }else{
                     $note->ajouter($id_classe,$info[$i]['CNE'],5,$note_ass);
                }

            }

  }

}catch(PDOException $e){  echo $e;}


include '../Vues/NotesEnseignant.php';
?>   