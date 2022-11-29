<?php
$count = count($e);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../Vues/css/nvlleSeance.css">
<style>

</style>
</head>
 <div class="bar">
    <nav>
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
 <div class="row">
  <div class="column">
    <div class="column1">
      <form method="POST" action="EnregistrerAbs.php?idclasse=<?php echo $_GET['idclasse'];?>">
        <div style="text-align:center;">
          <input type="datetime-local"  name="date_seance" >
          
        </div> 
      
      <div style="height: 50%;" class="tab">
        <table class="table">
          <tr style="background-color: #CFCBD2;">
            <th style="width:20%">CNE</th>
            <th  style="width:30%">PRENOM</th>
            <th  style="width:30%">NOM</th>
             <th>Date seance</th>
          </tr>
          <?php for ($i=0; $i <$count ; $i++) { ?>
          <tr>
            <td><?php echo $e[$i]['CNE'];?></td>
             <td><?php echo $e[$i]['PRENOM_ETUDIANT'];?></td>
             <td><?php echo $e[$i]['NOM_ETUDIANT'];?></td>
            <td><input type="checkbox" name="present[<?php echo $e[$i]['CNE'];?>]" value="<?php if("checked"){echo 1;}else echo 0 ?>"></td>
          </tr>
          <?php } ?> 
        </table>
      </div>
    </div>
  </div>
   <input type="submit" name="enregistrer" id="submit" value="Enregistrer" ></form><br>
 </div> 
</body>
</html>
