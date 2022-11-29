<?php 
session_start();
     require_once  "../Modeles/Classe.php";
     require_once  "../Modeles/Etudiant.php";
     require_once  "../Modeles/note.php";
      require_once  "../Modeles/typenote.php";
$id_classe=$_GET['idclasse'];

try{
   $type=new Typenote();
   $note=new note();
  $etu=new Etudiant();
  $info=$etu->getLesEtudiants($id_classe);

if(isset($_GET['ajouter'])){ 
   header("location:NoteCotrol.php");
}

  if(isset($_POST['enregistrer'])){ 
           foreach ($_POST['noten'] as $key => $value) {
               // echo $key."->".$value;
               $d = $note->existe_note_type_etu($id_classe,4,$key);
               if($d){
                     $note->modifier($d['ID_NOTE'],$value);
               }else{
                     $note->ajouter($id_classe,$key,4,$value);
                }

            }

  }


}catch(PDOException $e){  echo $e;}


include '../Vues/NoteControle.php';
?>  