<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Documents Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/modifierdoc.css">
</head>
<body>
  <div class="bar">
   <div class="bar">
    <nav>
      <h2 class="logo"><span>BE</span>SMART</h2>
      <a href="ClasseEnseignant.php"><button type="button">Mes classes</button></a>
      <a href="ToutesAnnoncesEnse.php"><button type="button"> Annonces</button></a>
      <p><?php echo $_SESSION['enseignant']['PRENOM']." " .$_SESSION['enseignant']['NOM'];?>
         <i class="fa fa-user-circle" style="font-size:30px";></i>
      </p>
    </nav>
    <div style="text-align: right;">
        <a href="connectionUtilisateur.php"> <i class="fa fa-sign-out" style="font-size:24px"></i></a>
    </div>
    <nav>
      <ul>
        <li><a href="AnnoncesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Annonces</a></li>
        <li><a href="DocumentsEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Documents</a></li>
        <li><a href="DevoirsEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Devoirs</a></li>
        <li><a href="AbsencesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Absences</a></li>
        <li><a href="NotesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Notes</a></li>
        <li><a href="DemandesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Demandes</a></li>
      </ul>
    </nav>
    <center>
    <fieldset>
    <legend><h1>MODIFIER LE DOCUMENT</h1></legend>
    <form method="POST" action="">
      <br><br><br>
      <table>
        <tr>
          <td>Titre</td>
          <td><input type="text" name="titre" value="<?php if(isset($c)) echo $c['TITRE_DOCUMENT'];?>"><br><br></td>
        </tr>
        <tr>
          <?php 
                                $dt = new DateTime($c['DATEDEMISEENLIGNE']);
                                             $dt= $dt->format('Y-m-d'); ?>
          <td>Date</td>
          <td><input type="date" name="datemiseenligne" value="<?php if(isset($c)) echo $dt;?>"><br><br></td>
        </tr>
        <tr>
          <td>Categorie</td>
          <td><input type="text" name="categorie" value="<?php if(isset($c)) echo $c['CATEGORIE_DOCUMENT'];?>"><br><br></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><input type="text" name="Description" value="<?php if(isset($c)) echo $c['DESCRIPTION_DOCUMENT'];?>"><br><br></td>
        </tr>
       
        <tr>
                <td>Importer le document</td>
                <td><input type="file" name="doc"></td>
              </tr>
              <tr>
        

          <td style="text-align:right;"><input  type="submit" name="btn1" id="submit" value="Modifier"></td>
        </tr>
      </table>
    </form>
  </fieldset>
  </center>
  </div>
</body>
</html>