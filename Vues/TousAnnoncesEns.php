<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="../Vues/css/ToutesAnnoncesEnse.css">
  <title></title>
</head>
<div class="bar">
<header>
    <nav>
      <h2 class="logo"><span>BE</span>SMART</h2>
      <a href="ClasseEnseignant.php"><button type="button">Mes classes</button></a>
      <a href="ToutesAnnoncesEnse.php"><button type="button"> Annonces</button></a>
      <p><?php echo $_SESSION['enseignant']['PRENOM']." " .$_SESSION['enseignant']['NOM'];?>
         <i class="fa fa-user-circle" style="font-size:30px";></i>
      </p>
      <a href="connectionUtilisateur.php"><i class="fa fa-sign-out" style="font-size:24px"></i></a>
    </nav>
</header>
<body >
  <div class="form">
  <fieldset style="width: 60%; height: 70%;" >      
     <form method="POST" action="">  
           <h2>Ajouter annonce</h2>  
     <?php  if (isset($erreur)) {
           echo $erreur;
           header("refresh:2;location:ToutesAnnoncesEnse.php");
         } ?>
  
          <table >

                <tr>
                    <td>
                        Titre 
                    </td>
                     <td> : </td>

                    <td>
                        <input class="input"  type="text" name="nom"><br><br>
                    </td>
                </tr> <br> <br>
                <tr>
                    <td>
                          Date 
                    </td>
                     <td> : </td>
                    <td>
                    <input type="date" name="date"><br><br>
                    </td>
                </tr>
                   
            <tr>
                <td>
                   Les classes <br> conserner
                </td><br>
                <td>:  </td>
                 <td>
                    <?php for ($i=0; $i<count($cl_ens); $i++) { ?>
                    <input type="checkbox" name="classe[]" value="<?php echo $cl_ens[$i]['ID_CLASSE']; ?>"><?php  echo $cl_ens[$i]['NOMCLASSE']; ?>
                    <?php    } ?>
    
                </td>
           </tr>
              
            <tr>
                <td>
                    description: 
                </td>
                <td>:</td>
                <td>
                  <br>  <textarea rows="3" col="60" placeholder="description" name="description"></textarea><br><br>
                </td>
            </tr><br>
            <tr>
                <td>
                    <input id="submit" type="submit" value="Submit" name="enregistrer"> 
                </td>
            </tr>
            </table>
        </form>
        </fieldset></div>
        </body>
    </div>
</html>