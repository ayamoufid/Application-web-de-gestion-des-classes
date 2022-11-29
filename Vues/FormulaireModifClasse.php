<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Documents Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/FormAjouterClasse.css">
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
      <div style="text-align: right;">
        <a href="connectionUtilisateur.php"> <i class="fa fa-sign-out" style="font-size:24px"></i></a>
      </div>
    </nav>
    <center>
    <fieldset>
    <legend><h1>Creer une classe</h1></legend>
    <form method="POST" action="">
      <br><br><br>
      <table>
        <tr>
          <td>Nom du cours</td>
          <td><input type="text" name="nom_cours" value="<?php if(isset($c)) echo $c['NOMCLASSE'];?>"><br><br></td>
        </tr>
        <tr>
          <td>Nom de formation</td>
          <td><input type="text" name="nom_formation" value="<?php if(isset($c)) echo $c['NOMFORMATION'];?>"><br><br></td>
        </tr>
        <tr>
          <td>Semestre</td>
          <td><input type="text" name="semestre" value="<?php if(isset($c)) echo $c['SEMESTRE'];?>"><br><br></td>
        </tr>
        <tr>
          <td>Annee universitaire</td>
          <td><input type="text" name="annee_univ" value="<?php if(isset($c)) echo $c['ANNEEUNIV'];?>"><br><br></td>
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