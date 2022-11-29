<?php 
session_start();
require_once '../Modeles/devoir.php';
require_once '../Modeles/depot.php';

      $_SESSION['id']=$_GET['id'];
            $depot=new travail();
            $dev=new Devoir();
          
                   $tbl=$dev->getDevoir($_GET['id']);
                   $vrs1=$depot->afficherversionetu1($_GET['id'],$_SESSION['etudiant']['CNE']);

     $delai=$tbl['DERNIERDELAIDEDEPOT'];
         $date1 = new DateTime("now");
         $date2 = new DateTime($delai);

// echo $tbl['DERNIERDELAIDEDEPOT'];
// var_dump($date1 < $date2); 

    if (isset($_POST['ajouter'])OR isset($_POST['modifier']) ) {
         if($date1 < $date2) {
	     	?>
	     	<script>
                    alert("le delai est terminer");

            </script>
	     	<?php  
	     } else

	          header('location:PosterTravail.php'); 
  
    } 
  


 include '../Vues/PosterTravail.php';


 ?>