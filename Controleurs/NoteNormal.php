<?php 
session_start();
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";
     require_once  "../Modeles/note.php";

$id_classe=$_GET['idclasse'];

try{
   $note=new note();
  $etu=new Etudiant();
  $info=$etu->getLesEtudiants($id_classe);


  if(isset($_POST['enregistrer'])){ 
           foreach ($_POST['noten'] as $key => $value) {
               // echo $key."->".$value;
               $d = $note->existe_note_type_etu($id_classe,1,$key);
               if($d){
                     $note->modifier($d['ID_NOTE'],$value);
               }else{
                     $note->ajouter($id_classe,$key,1,$value);
                }

            }

  }


}catch(PDOException $e){  echo $e;}


include '../Vues/NoteNormal.php';
?>   