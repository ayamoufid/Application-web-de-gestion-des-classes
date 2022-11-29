 <!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
 data-assets-path="../assets/" data-template="vertical-menu-template-free">
 <head>
  <title>Formulaire ajout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/devoirsEtu.css">   
 </head>
 <body>
  <div class="bar">
    <nav>
      <h2 class="logo"><span>BE</span>SMART</h2>
      <a href="ClassesEtudiant.php"><button type="button">Mes classes</button></a>
      <a href="ToutesClassesEtu.php"><button type="button"> Toutes les classes</button></a>      
      <p><?php echo $_SESSION['etudiant']['NOM_ETUDIANT'].' '.$_SESSION['etudiant']['PRENOM_ETUDIANT'];  ?>
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
        <li><a href="DevoirsEtu.php?idclasse=<?php echo $_GET['idclasse']; ?>">Devoir</a></li>
      </ul>
    </nav>    
    <center>
      <h3 style="color: purple;">DE<span>VOIR</span></h3>
      <fieldset>     
        <div class="tab-pane fade active show" id="navs-pills-justified-devoir" role="tabpanel" style="margin-top: 10%;">
        <?php
          if(count($tab)>0) 
          {
            for($i=0;$i<count($tab);$i++ )
            {?>   
              <div class="row" style="width: 90%;">
                <div class="col">           
                  <div class="card mb-3"  >
                    <div class="row g-0">
                      <div class="col-md-2"> 
                        <img class="card-img card-img-left img-annonce" src="https://img-4.linternaute.com/P8MkSFAdr2wLURDmmYzGGGclpiY=/400x/smart/718d38339e6240a19aa7aff5bba1cfe5/ccmcms-linternaute/574762.jpg" alt="Card image" style="margin: 55%;">
                      </div>
                      <div class="col-md-10">
                        <div class="card-body">
                          <h5><small class="text-muted">Titre: <?php echo $tab[$i]['TITRE']; ?><br><br> </small></h5>
                          <p class="card-text"><small class="text-muted">Dernier delai :<?php echo $tab[$i]['DERNIERDELAIDEDEPOT']; ?></small></p>
                          <p class="card-text"><small class="text-muted">
                           Extension :<?php echo $tab[$i]['FORMATDEMANDE']; ?>
                          </p></small>
                          <p class="card-text">                                    
                            <a href="Versionc.php?idclasse=<?php echo $_GET['idclasse']; ?>&id=<?php echo $tab[$i]['ID_DEVOIR']; ?>"> <button type="button" class="button">Afficher le devoir</button></a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <?php } ?>
            </div>
          </div>
          <br>
          <?php } else { echo " <h1 style='color: black;'>aucun devoir poster </h1>";} ?>
      </fieldset>
    </center>
  </div>
 </body>
</html>