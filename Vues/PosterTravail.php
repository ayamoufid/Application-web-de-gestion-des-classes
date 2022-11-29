 <?php $tab=array(1,2);?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Poster travail</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/PosterTravail.css">
  
    
  </head>
<body>
  <div class="bar">
    <nav>
      <h2 class="logo"><span>BE</span>SMART</h2>
      <a href="ClassesEtudiant.php"><button type="button">Mes classes</button></a>
      <a href="ToutesClassesEtu.php"><button type="button"> Toutes les classes</button></a>
      
      <p><?php echo $_SESSION['etudiant']['NOM_ETUDIANT'].'&'.$_SESSION['etudiant']['PRENOM_ETUDIANT'];?> 
         <i class="fa fa-user-circle" style="font-size:30px";></i>
      </p>
    </nav>
    <div style="text-align: right;">
        <a href="connectionUtilisateur.php"> <i class="fa fa-sign-out" style="font-size:24px"></i></a>
      </div>
 <nav>
       <ul>
        <li><a href="AnnoncesEtu.php?idclasse=<?php echo $_GET['idclasse']; ?>">Annonces</a></li>
        <li><a href="DocumentsEtu.php?idclasse=<?php echo $_GET['idclasse']; ?>">Documents</a></li>
        <li><a href="DevoirsEtu.php?idclasse=<?php echo $_GET['idclasse']; ?>">Devoirs</a></li>
        </ul>
    </nav>
   
  <center>
    <fieldset>
     

<div class="clearfix">
<img class="img2" src="https://th.bing.com/th/id/OIP.M5L6MClTEO6j7poTq4KP4QHaH_?w=171&h=184&c=7&r=0&o=5&dpr=1.5&pid=1.7"  width="550" height="200"> 

                          <div style="margin: 0px;" >   <p id="text" class="img2" style="color: black;">Ennoncé: <?php echo $tbl['ENONCE']; ?>  
                                                        </p> </div>   

                                    <h3>Titre: <?php echo $tbl['TITRE']; ?>  </h3>
                                    <h3>&nbsp;&nbsp;  Dernier délai: <?php echo $tbl['DERNIERDELAIDEDEPOT']; ?> </h3>
                                    <h3>
                                      Format demandé: <?php echo $tbl['FORMATDEMANDE']; ?> </h3>
                                 <?php if(count($vrs1) == 0){?>    
                                      <form method="POST" action="PosterTravail.php?idclasse=<?php echo $_GET['idclasse']; ?>">
                                      <input class="btn" type="submit" name="ajouter" value="Ajouter"> 
                                    </form>
                                  </div>
                              <?php }else{?>
                        <br>
    <br><br>
  <div class="search-container">
    <form  method="post" action="PosterTravail.php?idclasse=<?php echo $_GET['idclasse']; ?>">
     
    <label><?php echo $vrs1[0]['DOCUMENT_DEPOT']; ?></label>
    <form method="POST" action="PosterTravail.php?idclasse=<?php echo $_GET['idclasse']; ?>">
                                      <input class="btn" type="submit" name="modifier" value="Modifier"> 
                                    </form>
        
    </form><?php } ?>
  </div>


                 
                                
                        
    </fieldset> 
     </center>
  </body>
  </html>