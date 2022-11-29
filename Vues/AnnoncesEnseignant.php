<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Annonces Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/annoncesEnse.css">
</head>
<body>
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
    <div class="devoir">
      <?php  if (count($tab)>0) {
        
      for ($i=0; $i<count($tab); $i++) { ?>
        <div class="bande">
           <h3>AN<span>NONCES</span></h3>
            <p class="para">
           <?php echo $tab[$i]['NOM_ANNONCE']; ?><br> <?php echo $tab[$i]['DATE_ANNONCE']; ?><br> <?php echo $tab[$i]['DESCRIPTION_ANNONCE']; ?>
          </p>
          <div class="in"> <a href="ModifierAnnonces.php?idclasse=<?php echo $_GET['idclasse']; ?>&id=<?php echo$tab[$i]['ID_ANNONCE']; ?>" ><i class="fa-solid fa-square-pen"></i></a>
        <a href="ModifierAnnonces.php?idclasse=<?php echo $_GET['idclasse']; ?>&id_s=<?php echo$tab[$i]['ID_ANNONCE']; ?>" >  <i class="fa-solid fa-trash-can"></i></a></div>
          </div> 
        <?php  }  ?>
        <div class="form">
    <fieldset>
    <h2>Ajouter une annonce</h2>
    <form method="POST" action="">
      <table>
        <tr>
          <td>Titre</td>
          <td><input type="text" name="nom" value="<?php if(isset($_GET['id'])) echo $ann['NOM_ANNONCE']; ?>"><br><br></td>
        </tr>
        <?php        
            

           if(isset($_GET['id'])) {
                 $dt = new DateTime($ann['DATE_ANNONCE']);
                 $dt= $dt->format('d-m-Y'); 
                 }
            ?>
        <tr>
          <td>Description</td>
          <td><textarea name="description" ><?php if(isset($_GET['id'])) echo $ann['DESCRIPTION_ANNONCE']; ?></textarea><br><br></td>
        </tr>
        <tr>
          <td colspan=2> <input type="submit" name="ajouter" id="submit" value="Publier"></td>
        </tr>
      </table>
    </form>
  </fieldset></div>
<?php }else{?>
  <center>
   <div >
    
    <fieldset>
    <h2>Ajouter une annonce</h2>
    <form method="POST" action="">
      <table>
        <tr>
          <td>Titre</td>
          <td><input type="text" name="nom" value="<?php if(isset($_GET['id'])) echo $ann['NOM_ANNONCE']; ?>"><br><br></td>
        </tr>
        <?php        
            

           if(isset($_GET['id'])) {
                 $dt = new DateTime($ann['DATE_ANNONCE']);
                 $dt= $dt->format('d-m-Y'); 
                 }
            ?>
        <tr>
          <td>Description</td>
          <td><textarea name="description" ><?php if(isset($_GET['id'])) echo $ann['DESCRIPTION_ANNONCE']; ?></textarea><br><br></td>
        </tr>
        <tr>
          <td colspan=2> <input type="submit" name="ajouter" id="submit" value="Publier"></td>
        </tr>
      </table>
    </form>
  </fieldset></div></center>
<?php } ?>
  
</div>
</body>
</html>