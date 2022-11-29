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
        <li><a href="DevoirsEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Devoirs</a></li>
        <li><a href="AbsencesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Absences</a></li>
        <li><a href="NotesEns.php?idclasse=<?php echo $_GET['idclasse']; ?>">Notes</a>
          </li>
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
    <a href="NoteControl.php?idclasse=<?php echo $_GET['idclasse']; ?>">  <button>Note Controle</button></a> 
        <a href="NoteNormal.php?idclasse=<?php echo $_GET['idclasse']; ?>">  <button>Note normal</button></a> 
    <a href="NoteRattrapage.php?idclasse=<?php echo $_GET['idclasse']; ?>">  <button>Note rattrapage</button></a> 
      <form method="POST">
      <div style="text-align:center;">
       <label style="color: white;">Note_reference: </label>
       <input type="number"  max="20" min="0" name="nr" value="20"> 
       <input class=".button" type="submit" name="valider" value="Generer note assiduite"></div><br>
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
  <?php for ($i=0; $i <count($info) ; $i++) { 
   
   ?>
  <tr>
    <td><?php echo  $info[$i]['CNE']; ?></td>
     <td><?php echo  $info[$i]['NOM_ETUDIANT']; ?></td>
     <td><?php echo  $info[$i]['PRENOM_ETUDIANT']; ?></td>

           <?php  $cntrl = $note->existe_note_type_etu($id_classe,4,$info[$i]['CNE']);?>
     <td><?php if (!isset($cntrl['NOTE'])) {
        echo 0; }else echo  $cntrl['NOTE'];  ?></td>

       <?php  $ratt = $note->existe_note_type_etu($id_classe,2,$info[$i]['CNE']);?>
     <td><?php if (!isset($ratt['NOTE'])) {
        echo 0; }else echo  $ratt['NOTE'];  ?></td>

      <?php  $noml = $note->existe_note_type_etu($id_classe,1,$info[$i]['CNE']);?>
      <td><?php if (!$noml) {
        echo 0; }else echo  $noml['NOTE']; ?></td>

       <?php  $p=$pr->getAbsenceclasse($info[$i]['CNE'],$id_classe);
            $pr_count=count($p);
     if (isset($_POST['nr'])) {
        $ass=$_POST['nr'];
     }else  $ass=20;
          
        ?>
       <td><?php echo $pr_count*$ass/($nb_s-1);?> </td>

        <!-- devoir -->
           <?php $dev=$note->existe_note_dev_etu($id_classe,$info[$i]['CNE']) ;

             $d = $note->existe_note_type_etu($id_classe,3,$info[$i]['CNE']);
               if($d){
                     $note->modifier($d['ID_NOTE'],$dev['moy']);
               }else{ 
                   if(empty($dev['moy'])){ $dev['moy']=0;}
                     $note->ajouter($id_classe,$info[$i]['CNE'],3,$dev['moy']);
                   
                }
         
           ?>
       <td><?php if (!$dev['moy']) {
        echo 0; }else echo  $dev['moy']; ?></td>
    
  </tr> </form>
 <?php } ?>
 
   

  
</table></div>
</div></div>

 <div class="column">
    <div class="column2">
<div class="form" >
  <fieldset style="width: 40%; height: 20%;" > 
    <legend color="black"> <h2>Coefficients</h2></legend> <hr>
      <form method="POST" action="GenererNote.php" >  
      <table >
                <tr>
                    <td>
                        coff_Note_devoir
                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="cof_d" min="0" max="1" value="1" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> 
              <tr>
                    <td>
                        coff_Note_normal

                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="cof_n" min="0" max="1" value="1" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                       coff_Note_assiduite
                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="cof_as" min="0" max="1" value="1" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> 
                <tr>
                    <td>
                       coff_Note_rattrapage


                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="cof_r" min="0" max="1" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
                    </td>
                </tr> 
                <tr>
                    <td>
                        coff_Note_controle
                    </td>
                     <td> : </td>

                    <td>
                         <input type="number" placeholder="0.00" required name="cof_c" min="0" max="1" value="1" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" ><br><br>
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
