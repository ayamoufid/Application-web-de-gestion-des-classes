<?php $count=count($enseignant);?> 
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700;&family+Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="httpps://fonts.gstatic.com"> 
      <!-- <link rel="stylesheet" href="bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css" /> -->
        <!-- Bootstrap icons-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="../Vues/css/classesEnsEtu.css" rel="stylesheet" />
  <title></title>
</head>
  <header  class="alt" >
      <h3 class="logo"><span>BE</span>SMART</h3>
    <nav>
      <ul class="nav_links">
         <li><a href="ClasseEnseignant.php"><button type="button">Mes classes</button></a></li>
         <li><a href="ToutesAnnoncesEnse.php"><button type="button"> Annonces</button></a></li>
      </ul>
    </nav>
    <div class="cta">
      <p><?php echo $_SESSION['enseignant']['PRENOM']." " .$_SESSION['enseignant']['NOM'];?>
         <i class="fa fa-user-circle" style="font-size:30px"></i>
      </p>
      <div style="text-align: right;">
         <a href="connectionUtilisateur.php"> 
           <i class="fa fa-sign-out" style="font-size:24px" ></i>
         </a>
       </div>
    </div>
  </header>
<body>
<section class="body1" id="id1">
<div class="main">
  <sdiv id="message" style="color:red; padding:0px; width:100em;">
    <?php
        if (isset($_GET['erreur'])) 
                    echo "<b><center><p>Suppression avec succes ".$_GET['erreur']."</p></center></b>";
        header("refresh:5;url=ClasseEnseignant.php");
    ?>
     </div>
  <div class="search-box">   
    <!--<input type="text" class="input-search" placeholder="Type to Search..."><button><i class="fa fa-search"class="btn-search"></i></button><br>--> 
  </div>
</div>
</section><br><br><br><br><br>
 
 <div class="classe">
  <div class="pt-4"> 
  <?php if($count==0){ ?>
   <div   style=" color:red;  width: 95em; padding: 100px 250px;"> 
     <h1>vous n'avez aucune classe  <a  href="AjouterClasse.php"style="margin-left: 150px;" >Creer classe <i class="material-icons" style=" font-size: 60px">&#xe148;</i> </a>
    </h1>
</div>
<?php }else{ ?> 
<section> 
  
  <div class="add">
  <h3 style="color: black;"><a  href="AjouterClasse.php" >Ajouter classe<i class="material-icons" style="font-size: 35px">&#xe148;</i></a>
</h3>  </div>

</section>  <br>
<section>    
  
       <div class="container px-lg-5">
                <!-- Page Features-->
                <div class="row gx-lg-5">     
                       <?php for($i=0;$i<$count;$i++){?>
                   <div class="col-lg-6 col-xxl-4 mb-5">
                    
                        <div class="card bg-light border-0 h-100">

                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                               
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="bi bi-collection"></i></div>
                               
                                <h2 class="fs-4 fw-bold"><?php echo $enseignant[$i]['NOMCLASSE'];?></h2>
                                <p class="mb-0"><?php echo $enseignant[$i]['NOMFORMATION'];?><br>
                                                <?php echo $enseignant[$i]['SEMESTRE']; ?><br>
                                                <?php echo $enseignant[$i]['ANNEEUNIV']; ?>
                                </p><br>
                               <form method="post" action="AnnoncesEns.php?idclasse=<?php echo $enseignant[$i]['ID_CLASSE'];?>">
                                <a href="DemandesEns.php"><button> consulter <i class="material-icons" style="font-size: 25px">&#xe148;</i></button></a>
                              </form>
                                <form method="post" action="SuppModiClasse.php?idclasse=<?php echo $enseignant[$i]['ID_CLASSE'];?>">
                                  <button name="update"><i class="fa-solid fa-square-pen"style="font-size: 15px"></i></button>
                                  <button name="delete"><i class="fa-solid fa-trash-can" style="font-size: 15px"></i></button>
                                </form>
                            </div>
                           
                        </div>

                    </div>  
                     <?php } ?> 
                </div>
            </div> 
         <?php }  ?>
          </div>
        </div>
        </section>
<script >
    // (function($) {

    // var $window = $(window),
    //     $body = $('body'),
    //     $header = $('header'),
    //  if (!browser.mobile
    //     &&  $header.hasClass('alt')
    //     &&  $banner.length > 0) {

    //         $window.on('load', function() {

    //             $banner.scrollex({
    //                 bottom:     $header.outerHeight(),
    //                 terminate:  function() { $header.removeClass('alt'); },
    //                 enter:      function() { $header.addClass('alt reveal'); },
    //                 leave:      function() { $header.removeClass('alt'); }
    //             });

    //         });

    //     }
    // })(jQuery);
</script>
<!--<?php for($i=0;$i<9;$i++){?>
                                <h2 class="fs-4 fw-bold"><?php echo $mesClasses[$i]['NOMCLASSE']; ?></h2>
                                <p class="mb-0"><?php echo $mesClasses[$i]['NOMFORMATION']; ?><br>
                                                <?php echo $mesClasses[$i]['SEMESTRE']; ?><br>
                                                <?php echo $mesClasses[$i]['ANNEEUNIV']; ?></p><br>
                                <?php } ?>-->
</body>
</html>

