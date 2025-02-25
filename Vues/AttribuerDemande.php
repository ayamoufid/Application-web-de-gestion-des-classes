    <!DOCTYPE html>  
<html lang="fr">
<head>  
  <title>Devoirs Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com">
  <!-- <link rel="stylesheet" href="testa.css"> -->
</head>
<style type="text/css">
    
.css


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
.p{
    color: black;
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
fieldset{
    margin-top: 40px;
    margin-left: 51px;
    width: 89%;
    background: linear-gradient(to top,rgba(255, 226, 164, 1)40%,rgba(255, 226, 164, 1)20%);
    box-shadow: 5px 5px 20px 1px  rgb(85,85,85);
    border: 0px;
    border-radius: 10px 10px 10px 10px;
    color: black;
    height: auto;
}
textarea{
    padding-top: 5%;
    margin-top: 3%;
}

label{
    padding-top: 0px;
    padding-left: 10px;
}

#submit{
    margin-left: 40%;
    color: #318CE7;
    background-color: #CFCBD2;
    width: 20%;
    font-size: 17px;
    border-radius: 20px;
    border: 1px solid white;
    padding-bottom: 5px;
    margin-bottom:10px;
    margin-top: 10px;
}
#submit:hover{
    color: white;
    background-color: #3C21B7;
    cursor: pointer;
}
p {
    padding-right: 2%;
    padding-top: 5px;
    color: white;
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
    width: 10%;
    height: 25px;
}
#sub{
   
    color: #318CE7;
    background-color: #CFCBD2;
    width: 40%;
    font-size: 17px;
    border-radius: 20px;
    border: 1px solid white;
    padding-bottom: 5px;
    padding-top: 2px;
}
#sub:hover{
    color: white;
    background-color: #3C21B7;
    cursor: pointer;
}
#mit{
    margin-top: 20px;
    color: #318CE7;
    background-color: #CFCBD2;
    width: 18%;
    font-size: 17px;
    border-radius: 20px;
    border: 1px solid white;
    left: 600px;
    margin-left: 900px;

}
#mit:hover{
    color: white;
    background-color: #3C21B7;
    cursor: pointer;
}
.notedev{
    position: absolute;
    right: 0px;
   
    top: 300px;
    width: 35%;
}
a{
    text-decoration: none;
    color: white;
}
#vers{
    margin-top: 20px;
    color: #318CE7;
    background-color: #CFCBD2;
    width: 18%;
    font-size: 17px;
    border-radius: 20px;
    border: 1px solid white;
    position: absolute;
    left: 500px;
    margin-top: 30px;
    top: 463px;
}
#vers:hover{
    color: white;
    background-color: #3C21B7;
    cursor: pointer;
}
#version{
    width: 60%;
    padding-top: 10px;
    position: absolute;
    margin-top: 20px;
}
.in{
    padding-left: 800px;
    color: white;
}

</style>
<body>
  <div class="bar">
    <nav>
      <h2 class="logo"><span>BE</span>SMART</h2>
      <button type="button">Mes classes</button>
      <button type="button"> Annonces</button>
      <p>NOM&PRENOM
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
    <fieldset> 
        <p>l'etudiant :<?php echo $info['CNE'].'   '.$info['NOM_ETUDIANT'].'  '.$info['PRENOM_ETUDIANT']; ?> </p>
      <form method="post" action=""><br><br><br><br>
        <label>Travail:</label>
       <div style="color: black; margin-left: 100px; background-color: white; width: 400px;" ><?php echo $vrs[0]['DOCUMENT_DEPOT'];?></div >
        
        <div class="notedev">
            <input type="hidden" name="cne" value="<?php echo $vrs[0]['CNE'];?>">
            <input type="hidden" name="devoir" value="<?php echo $vrs[0]['ID_DEVOIR'];?>">
          <input type="number" name="noted" step="0.01" min="0" max="20" value="<?php if(isset($idn)) echo $idn; ?>">
          <input type="submit" id="sub" name="notedev"  value="Attribuer note">
        </div>
        <br><br>
           <button> <a href="telecharger.php?idclasse=<?php echo $_GET['idclasse'];?>&file=<?php echo $vrs[0]['DOCUMENT_DEPOT'];?>"> Télécharger</a> </button>
        <input type="submit" name="versions" id="vers" value="Afficher toutes les versions">
  <div style="text-align: right;"><button><a href="VersionsDev.php?idclasse=<?php echo $_GET['idclasse'];?>&id_dev=<?php echo $_SESSION['id_devoir'];?>"> autre etudiant </a></button></div> 
<div id="afficher" style="display: block;">
   <br><br><br>  <br><br><br>  <br><br><br>  <br><br><br>  <br>  
        <?php if(isset($_POST['versions'])){ 
     for($i=1;$i<count($tvrs);$i++) {?> 
        
       <input type="hidden" name="dt" value="<?php echo $tvrs[$i]['DATE_DEPOT'];?>">
    Travail:
          <a href="versionte.php?file=<?php echo $tvrs[$i]['DOCUMENT_DEPOT'];?>">
     <div style="color: black; margin-left: 100px; background-color: white; width: 600px; height: 30px;" >
     <?php echo $tvrs[$i]['DOCUMENT_DEPOT'].'       '.$tvrs[$i]['DATE_DEPOT'];?></div></a>
    <div class="in">
     <button type="submit" name="supp" value="<?php echo $tvrs[$i]['DATE_DEPOT'];?>"><i class="fa-solid fa-trash-can">  </i></button> 
    </div>
    <br><br><br>  <?php } ?>
    <!-- <input type="submit" id="mit" name="save" value="Enregistrer"> -->
 <?php } else {?>
   <!-- <input type="submit" id="mit" name="save" value="Enregistrer">  -->
   <?php   } ?> 
      </form>
    </fieldset>

  
  </div>
</body>

    
</html>


