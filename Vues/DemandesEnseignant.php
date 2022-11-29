
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Demandes Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com">
  <link rel="stylesheet" href="../Vues/css/demandesEnse.css">
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
      <?php
        $count=0;
        foreach($lesdemandes as $demande)
        { 
           $count++;
        }  
        if($count>0)
        {
          foreach ($lesdemandes as $demande) { 
             if($demande['ETAT_DEMANDE'] != 1){
              ?>
               <form method="post" action="DemandesEns.php?idclasse=<?php echo $demande['ID_CLASSE'];?>">
                <div class="bande">
                <h3><span>photo</span></h3>
           <div class="photoEtu">
              <img width="100px" src=<?php echo "../Controleurs/Photo/$demande[PHOTO_ETUDIANT]"; ?> >
        </div>
       
        <!-- <div class="classe">
                  <p>Classe demandée :</p>
        </div>
        <div class="nomcours">
           <?php echo $demande['NOMCLASSE']; ?><br>
        </div>  -->
          <p class="para">           
            <?php echo $demande['CNE']; ?><br><?php echo $demande['NOM_ETUDIANT'];echo "   ";echo $demande['PRENOM_ETUDIANT']; ?><br><?php echo $demande['EMAIL_ETUDIANT']; ?><br>       
          </p>
         
           <?php// for($i=0;$i<$count;$i++){?> 
                  <input type="hidden" name="cne" value="<?php echo $demande['CNE']; ?>">
           <?php// } ?>
            <input type="submit" id="submit" name="accept" value="ACCEPTER" >
            <input type="submit" id="submit" name="refuse" value="REFUSER" >
             <div id="message">
         <?php 
            if(isset($_GET['message']))  
                echo $_GET['message'];
          ?>
            <?php  } }
            ?>
        </form> 
          <?php
               }else{
                     ?>
                     <h2 style="color: white;
                                padding: 100px 20px;
                                font-family: elephant;">
                          Vous n'avez aucune demande dans cette classe!
                        </h2>
                     <?php   } ?> 
      </div>
    </div>
  </body>
</html>