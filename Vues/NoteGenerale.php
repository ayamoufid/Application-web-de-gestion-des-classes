<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../Vues/css/note.css">
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
        <li><a href="DevoirsEnst.php?idclasse=<?php echo $_GET['idclasse']; ?>">Devoirs</a></li>
        <li><a href="AbsencesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Absences</a></li>
        <li><a href="NotesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Notes</a></li>
        <li><a href="DemandesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Demandes</a></li>
      </ul>
      <div style="text-align: right;">
        <a href="connectionUtilisateur.php"> <i class="fa fa-sign-out" style="font-size:24px"></i></a>
      </div>
    </nav>
  <!--   <select>
      <option>note normal</option>
      <option>note control</option>
    </select> -->
<body>


<div class="row">
 <div class="column">
    <div class="column1">
    <a href="notectrl.php"> <button>creer controle</button></a> 
      <form method="POST">
      <div style="text-align:center;">
       <label style="color: white;">Note_reference: </label><input type="number" max="20" min="0" name="nr" value="20"><input class=".button" type="submit" name="valider" value="Generer note assiduite"></div> </form><br>
      <div style="height: 50%; overflow:auto;">
<table class="table">
  <tr style="background-color: purple;">
    <th style="width:20%">CNE</th>
    <th  style="width:30%">PRENOM</th>
    <th  style="width:30%">  NOM   </th>
     <th>Note controle</th>
    <th>Note rattrapage</th>
     <th>Note normal</th>
    <th>Note assiduit</th>
     <th>Note devoir</th>
   
  </tr>
  <?php for ($i=0; $i <5 ; $i++) { 
   
   ?>
  <tr>
    <td>Sample text</td>
     <td>Sample text</td>
     <td>Sample text</td>
     <td>Sample text</td>
     <td>Sample text</td>
      <td>Sample text</td>
  <!--   <td><i class="fa fa-check"></i></td> -->
       <td>Sample text</td> 
       <td>Sample text</td>
    
  </tr>
 <?php } ?>
 
  

  
</table></div>
</div></div>

 <div class="column">
    <div class="column2">
<div class="form">
  <fieldset style="width: 40%; height: 20%;" > 
    <legend color="black"> <h2>Coefficients</h2></legend> <hr>
      <form method="POST" action="" >  
      <table >
                <tr>
                    <td>
                        coff_Note_devoir
                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="price" min="0" max="1" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> 
              <tr>
                    <td>
                        coff_Note_normal

                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="price" min="0" max="1" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                       coff_Note_assiduite
                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="price" min="0" max="1" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> 
                <tr>
                    <td>
                       coff_Note_rattrapage


                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="price" min="0" max="1" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> 
                <tr>
                    <td>
                        coff_Note_controle
                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="price" min="0" max="1" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> <br> 
              
                 <tr></tr>  
            <tr>
                <td>
                    <input id="submit" type="submit" value="Calculer note"> 
                </td>
            </tr>
            </table>
        </form>
        </fieldset></div></div></div>
</div> </div>
</body>
</html>
