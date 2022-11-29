<?php $count=count($lesClasses);
  ?>
<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
      <!-- <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css" /> -->
        <!-- Bootstrap icons-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

       
        <link href="../Vues/css/classesEnsEtu.css" rel="stylesheet" />
  <title>Toutes Les classes</title>
</head>

  <header  class="alt" >
 <h3>BE<span>SMART</span></h3>
<nav>
  <ul class="nav_links">
     <li><a href="ClassesEtudiant.php"><button>MES CLASSES</button></a></li>
     <li><a href="ToutesClassesEtu.php"><button>TOUTES LES CLASSES</button></a></li>
  </ul>
</nav>
<div class="cta">
  <p><?php echo $_SESSION['etudiant']['PRENOM_ETUDIANT']." " .$_SESSION['etudiant']['NOM_ETUDIANT'];?> 
<i class="fa fa-user-circle" style="font-size:30px"></i></p>
<div style="text-align: right;">
   <a href="connectionUtilisateur.php"  > <i class="fa fa-sign-out" style="font-size:24px" ></i></p></a></div>
</div>

</header>
<body>
<section class="body1" id="id1">

<div class="main">
  <div id="message" style="color: red;">
         <?php 
           
            if(isset($_GET['message']))  
                echo $_GET['message'];

          ?>
     </div>

  <div class="search-box">   
    <input type="text" class="input-search" placeholder="Type to Search..."><button><i class="fa fa-search"class="btn-search"></i></button>
  </div>
</div>
</section>
<br><br>
<section>
 <div class="classe">
  <div class="pt-4">     
       <div class="container px-lg-5">
                <div class="row gx-lg-5">  
                
                    <?php for($i=0;$i<$count;$i++){
                    ?>  
                   <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i>
                                </div>
                                <h2 class="fs-4 fw-bold"><?php echo $lesClasses[$i]['NOMCLASSE'];?></h2>
                                <p class="mb-0"><?php echo $lesClasses[$i]['NOMFORMATION'];?><br>
                                                <?php echo $lesClasses[$i]['SEMESTRE'];?><br>
                                                <?php echo $lesClasses[$i]['ANNEEUNIV'];?></p><br>
                                <form method="post" action="EnvoyerDemande.php?idclasse=<?php echo $lesClasses[$i]['ID_CLASSE'];?>">
                                <button name="demande"> Demande acces <i class="material-icons" style="font-size: 35px">&#xe148;</i></button>
</form>

                            </div>
                        </div>
                    </div>
                     <?php }?> 
                   
                </div>
            </div> 
          </div>
        </div>
        </section>
</body>
</html>

