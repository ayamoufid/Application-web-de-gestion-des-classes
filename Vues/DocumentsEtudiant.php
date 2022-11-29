<!DOCTYPE html>
<html>
<head>
  <title>document</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
  <link rel="stylesheet" href="../Vues/css/annoncesEtu.css">
  <link rel="stylesheet"  href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  
    
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
    
    </nav>
<center>
    <fieldset>
        
      
                <td id="example" class="display"><h4>affichage par type</h4/><td>
                <td>
                  <select name="type">
                    
                    <option value="cours" selected>date</option>
                    <option value="exercices" >type</option>
                    <option value="autres" >categorie</option>
                  </select><br><br>

                </td>
              </tr>
            </table>

 <?php 
 if (isset($_POST['type']) AND $_POST['type']=="autre") {
    $tab=$document->getDocumentClass_Cat();
 }
        for($i=0;$i<count($tab);$i++){ ?>
        <p class="para">
              <h3>DOC<span>UMENT</span></h3>
           
        <table border="1">
        <tr>

 

   <th> <div class="tab-pane fade active show" id="navs-pills-justified-devoir" role="tabpanel">
                        
                        <div class="row">
                          <div class="col">
                            <div class="card mb-3" >
                              <div class="row g-0">
                                <div class="col-md-2">
                                  <img class="card-img card-img-left img-annonce" src="../Vues/css/doc.jpg" alt="Card image" >
                                </div>
                                <div class="col-md-10">
                                  <div class="card-body">
                                    <h5 ><small class="text-muted"><h2>TITRE</h2><?php echo $tab[$i]['TITRE_DOCUMENT'] ; ?></small></h5>
                                    <p class="card-text"><small class="text-muted"><h5>Description: <?php echo $tab[$i]['DESCRIPTION_DOCUMENT'] ; ?></h5></small></p>
                                    <p class="card-text">
                                      Format :<?php echo $tab[$i]['TYPE'] ; ?>
                                    </p>
                                    <p class="card-text">
                          
                                    <button type="button" class="button">TELECHARGER</button>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                        </th>
</tr>
</table>
                          <?php } ?>
<div >
                        
                        
                      </center>
    </fieldset>

  </div>
   
</script>
</body>
</html>