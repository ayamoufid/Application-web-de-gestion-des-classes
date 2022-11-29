<?php $count=30;?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../Vues/css/note.css">
<style>

</style>
</head>
 <div class="bar">
    <nav id="header">
      <h2 class="logo"><span>BE</span>SMART</h2>
      <a href="ClasseEnseignant.php"><button type="button">Mes classes</button></a>
      <a href="ToutesAnnoncesEnse.php"><button type="button"> Annonces</button></a>
      <p><?php echo $_SESSION['enseignant']['PRENOM']." " .$_SESSION['enseignant']['NOM'];?>
         <i class="fa fa-user-circle" style="font-size:30px";></i>
      </p>
    </nav>
    <nav>
      <ul>
         <li><a href="AnnoncesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Annonces</a></li>
        <li><a href="DocumentsEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Documents</a></li>
        <li><a href="DevoirsEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Devoirs</a></li>
        <li><a href="AbsencesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Absences</a></li>
        <li><a href="NotesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Notes</a></li>
        <li><a href="DemandesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Demandes</a></li>
      </ul>
      <div style="text-align: right;">
        <a href="connectionUtilisateur.php"> <i class="fa fa-sign-out" style="font-size:24px"></i></a>
      </div>
    </nav>
<body>


<div class="row" >
  <div class="column">
    <div class="column1">

<a href="NotesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>"><button >Precedent</button> </a><br><br> 

 <center>    
<table class="table">
  <tr style="background-color: purple;">
    <th style="width:20%"> CNE</th>
    <th  style="width:10%">PRENOM</th>
    <th  style="width:10%">  NOM   </th>
     <th style="width:30%">Note controle</th>

   
</tr>
 
  <form method="POST" action="">
  <?php 
  for($i=0;$i<count($info);$i++){?>
  <tr>
    <td><?php echo  $info[$i]['CNE']; ?></td>
    <td><?php echo  $info[$i]['PRENOM_ETUDIANT']; ?></td> 
    <td><?php echo  $info[$i]['NOM_ETUDIANT']; ?></td>
     <?php  $d = $note->existe_note_type_etu($id_classe,4,$info[$i]['CNE']);  ?> 
      <td><input type="number" name="noten[<?php echo $info[$i]['CNE'] ;?>]" step="0.01" min="0" max="20" value=<?php if(isset($d['NOTE'])) {  echo $d['NOTE'];
      }else echo 0 ;?> ></td>
    

  </tr><?php }?>
 
</table>
</div></div>


</div>

<button style="margin-left:40%;" name="enregistrer">enregistrer</button> 

</div></form>

</body>
</html>
