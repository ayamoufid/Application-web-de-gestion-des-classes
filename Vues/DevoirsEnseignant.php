<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Devoirs Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/devoirsEnse.css">
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
    <div class="bande">
     <div class="devoir">      
      <h3>DE<span>VOIR</span></h3>
       <?php if (count($tab)==0) {
            echo "<br><br><h1>vous n'avez aucun devoir</h1>";
          } ?>
      <?php
        if (isset($err1)) {
                            echo "  <p><strong>Success!</strong> $err1.</p> ";
                            header( "refresh:5;url=DevoirsEns.php?idclasse=".$_GET['idclasse']);
                          }
        elseif (isset($err2)) {
                                 echo "<p>$err2</p>";
                                 header( "refresh:5;url=DevoirsEns.php?idclasse=".$_GET['idclasse']);
                               }
       for($i=0;$i<count($tab);$i++)
       {
       ?>
     <!-- <img src="https://media.ccmbg.com/tc/244668216/880267/1600704791" width="200px"  height="30px" style="margin: 1px;"> -->
        <p class="para">
          <?php echo $tab[$i]['TITRE']; ?> <br> <?php echo $tab[$i]['DERNIERDELAIDEDEPOT']; ?> <br> <?php echo $tab[$i]['FORMATDEMANDE']; ?> 
        </p><br>
        <div class="in">
          <a href="VersionsDev.php?idclasse=<?php echo $_GET['idclasse'];?>&id_dev=<?php echo $tab[$i]['ID_DEVOIR'];?>">
            <i class="fa fa-arrow-right" ></i>
          </a> 
          <a href="ModifierDevoirs.php?idclasse=<?php echo $_GET['idclasse'];?>&id=<?php echo $tab[$i]['ID_DEVOIR'];?>">
            <i class="fa-solid fa-square-pen"></i>
          </a> 
          <a href="DevoirsEns.php?idclasse=<?php echo $_GET['idclasse']; ?>&id_s=<?php echo $tab[$i]['ID_DEVOIR']; ?>"> 
            <i class="fa fa-trash"></i>
          </a>
        </div>
        <?php } ?>   
      </div>
    </div>
      <div class="form">
        <fieldset>
          <h2>Ajouter un devoir</h2>
         
          <form method="POST" >
            <table>
              <tr id="error">
                <?php if (isset($erreur)) {echo $erreur;} ?>
              </tr>
              <tr>
                <td>Titre</td>
                <td><input type="text" name="titre" value="<?php if(isset($_GET['id'])) echo $d['TITRE'];?>">
                </td>
              </tr> 
              <?php $dt_min = new DateTime('');
                    $dt_min= $dt_min->format('Y-m-d\TH:i'); 
                    if(isset($_GET['id'])) {
                                             $dt = new DateTime($d['DERNIERDELAIDEDEPOT']);
                                             $dt= $dt->format('Y-m-d\TH:i'); 
                                          }
              ?>
              <tr>
                <td>Dernier delai</td>
                <td><input type="datetime-local" name="date" min="<?php echo $dt_min;?>" value="<?php if(isset($_GET['id'])) echo $dt;?>">
                </td>
              </tr>
              <tr>
                <td>Format demande</td>
                <td><input type="text" name="format" value="<?php if(isset($_GET['id'])) echo $d['FORMATDEMANDE'];?>"></td>
              </tr>
              <tr>
                <td>Ennonce</td>
                <td><textarea name="ennonce" rows="3" cols="20"><?php if(isset($_GET['id'])) echo $d['ENONCE'];?></textarea>
                </td>
              </tr>
              <tr>
                <?php if(isset($_GET['id'])) {?>
                <td><a href="DevoirsEns.php?idclasse=<?php echo $_GET['idclasse'];?>">Annuler</a></td>
                <td colspan=2><input type="submit" name="btn" id="submit" value="Modifier"></td>
                <?php }else{ ?>
                <td colspan=2><input type="submit" name="btn" id="submit" value="Publier"></td>
                <?php } ?>
              </tr>
            </table>
          </form>
        </fieldset>
      </div>
  </div>
</body>
</html>