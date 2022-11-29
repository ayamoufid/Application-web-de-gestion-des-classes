
<!DOCTYPE html>  
<html lang="fr">
<head>
  <title>Devoirs Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com">
  <!-- <link rel="stylesheet" href="../Vues/css/VersionsDevoirsEnse.css"> -->
</head>
<style type="text/css">
  

body{
    background-size: cover;
    background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(https://img.freepik.com/photos-gratuite/e-learning-education-ligne-pour-etudiant-universite-concept_31965-6536.jpg);
}
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Josefin Sans', sans-serif;
}
.logo{
    color: #CFCBD2;
    font-size: 28px; 
}
span{
    color: #8B98ED;
}
.bar {
    height: auto;
    width: 100%;
    /*background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(https://img.freepik.com/photos-gratuite/e-learning-education-ligne-pour-etudiant-universite-concept_31965-6536.jpg);
    background-size: cover;*/
    background-position: center;
}
nav{ display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 0px;
    padding-left: 5%;
    padding-right: 0%;
}
nav ul li{
    list-style-type: none;
    display: inline-block;
    padding: 30px 50px;
}
nav ul li a{
    color: #CB98ED;
    text-decoration: none;
    font-weight: bold;
}
nav ul li a:hover{
    color: #3C21B7;
    transition: .3s;
    cursor: pointer;
    transform: scale(1.3);
    text-decoration: underline;
}
button {
    padding: 12px 30px;
    border-radius: 30px;
    border: none;
    background: #3C21B7;
    color: white;
    font-size: 15px;
    font-weight: bold;
    transition: .4s;
}
button:hover{
    transform: scale(1.3);
    cursor: pointer;
}
a{
  text-decoration: none;
  color: white;
}
fieldset{
    margin-top: 70px;
    width: 95%;
    background: linear-gradient(to top,rgba(188,220,251,0.8)40%,rgba(188,220,251,0.8)40%);
    box-shadow: 5px 5px 20px 1px  rgb(85,85,85);
    border: 0px;
    padding-left: 80px;
    border-radius: 10px 10px 10px 10px;
    color: black;
    height: auto;
}
td{
    letter-spacing: 2px;
    padding-top: 20px;
    width: 30%;
}
#submit{
    margin: 15px 95px;
    color: #318CE7;
    background-color: #CFCBD2;
    width: 50%;
    font-size: 17px;
    border-radius: 20px;
    border: 1px solid white;
    padding-bottom: 5px;
}
#submit:hover{
    color: white;
    background-color: #3C21B7;
}
p {
    padding-right: 2%;
    padding-top: 5px;
    color: white;

}
.input{
    padding-right: 2%;
    padding-top: 5px;
    color: black;
    background-color: white;
}
p i {
    padding-top: 5px;
    position: relative;
    text-align: right;
    align-items: center;
    color: white;
}
a i{
    padding-top: 0px;
    margin-top: 0px;
    padding-right: 25px;
    padding-bottom: 30px;
    color: white;
}

input{
    width: 100%;
    height: 25px;
}
.tab{
    padding-left: 25%;
}
.form{
    padding-left: 6%;
}
</style>
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
  </div>
    <div class="form">
    <fieldset>
      <form method="POST" action="">
        <table>
          <tr>
            <td>Titre:</td>
            <td><p class="input"> <?php echo $tab['TITRE']; ?></p></td>
          </tr>
          <tr>
            <td>Format demande:</td>
            <td><p class="input"> <?php echo $tab['FORMATDEMANDE']; ?></p></td>
          </tr>
          <tr>
            <td>Dernier delai:</td>
            <td><p class="input"> <?php echo $tab['DERNIERDELAIDEDEPOT']; ?></p></td>
          </tr>
        </table>
        <br><br>
        <table class="tab">
          <tr>
            <th>CNE</th>
            <th>Nom et Prenom</th>
          </tr>
<?php  for ($i=0; $i <count($dept) ; $i++) { ?>
 
          <tr>
            <td>
              <p class="input" ><?php echo $dept[$i]['CNE']; ?></p>
            </td>
            <td>
              <p class="input"><?php echo $dept[$i]['NOM_ETUDIANT'].' '.$dept[$i]['PRENOM_ETUDIANT']; ?></p>
            </td>
            <td>
             <button> <a href="AttribuerNoteDevoir.php?idclasse=<?php echo $_GET['idclasse'];?>&id_dev=<?php echo $_SESSION['id_devoir'];?>&etu=<?php echo $dept[$i]['CNE'];?>">Voir</a></button>
            </td>
          </tr>
      <?php   }  ?>
          <tr>
            <td colspan="2">
              <input type="submit" name="submit" id="submit" value="Enregistrer">
            </td>
          </tr>
        </table>
      </form>
    </fieldset>
    </div>
 
</body>
</html>

